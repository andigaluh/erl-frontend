<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {

    public $data;

    function __construct()
    {
        parent::__construct();
        $this->load->library('authentication', NULL, 'ion_auth');
        $this->load->library('form_validation');
        $this->load->helper('url');
        
        $this->load->database();
        $this->load->model('person/person_model','person_model');
        $this->load->model('auth/auth_model','auth_model');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->helper('language');

    }

    //redirect if needed, otherwise display the user list
    function index($fname = "fn:",$email = "em:",$sort_by = "id", $sort_order = "asc", $offset = 0)
    {

        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
        {
            //redirect them to the home page because they must be an administrator to view this
            //return show_error('You must be an administrator to view this page.');
            return show_error('You must be an administrator to view this page.');
        }
        else
        {
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //set sort order
            $this->data['sort_order'] = $sort_order;
            
            //set sort by
            $this->data['sort_by'] = $sort_by;
           
            //set filter by first name
            $this->data['fname_param'] = $fname; 
            $exp_fname = explode(":",$fname);
            $fname_re = str_replace("_", " ", $exp_fname[1]);
            $fname_post = (strlen($fname_re) > 0) ? array('users.first_name'=>$fname_re) : array() ;
            
            //set filter by email
            $this->data['email_param'] = $email;
            $exp_email = explode(":",$email);
            if(strlen($exp_email[1]) > 0) 
            {
                $rep_email_char = array("%5Bat%5D","%5Bdot%5D");
                $std_email_char = array("@",".");
                
                $email_post = array('users.email'=>str_replace($rep_email_char,$std_email_char,$exp_email[1]));
            }else{
                $email_post = array();
            }
            
            //set default limit in var $config['list_limit'] at application/config/ion_auth.php 
            $this->data['limit'] = $limit = (strlen($this->input->post('limit')) > 0) ? $this->input->post('limit') : $this->config->item('list_limit', 'ion_auth') ;

            $this->data['offset'] = $offset = $this->uri->segment($this->config->item('uri_segment_pager', 'ion_auth'));

            //list of filterize all users  
            $this->data['users_all'] = $this->ion_auth->like($fname_post)->like($email_post)->users()->result();
            
            //num rows of filterize all users
            $this->data['num_rows_all'] = $this->ion_auth->like($fname_post)->like($email_post)->users()->num_rows();

            //list of filterize limit users for pagination  
            $this->data['users'] = $this->ion_auth->like($fname_post)->like($email_post)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->users()->result();

            $this->data['users_num_rows'] = $this->ion_auth->like($fname_post)->like($email_post)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->users()->num_rows();

            foreach ($this->data['users'] as $k => $user)
            {
                $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }

             //config pagination
             $config['base_url'] = base_url().'auth/index/fn:'.$exp_fname[1].'/em:'.$exp_email[1].'/'.$sort_by.'/'.$sort_order.'/';
             $config['total_rows'] = $this->data['num_rows_all'];
             $config['per_page'] = $limit;
             $config['uri_segment'] = $this->config->item('uri_segment_pager', 'ion_auth');

            //inisialisasi config
             $this->pagination->initialize($config);

            //create pagination
            $this->data['halaman'] = $this->pagination->create_links();

            $this->data['fname_search'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );

            $this->data['email_search'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email'),
            );

            $this->_render_page('auth/index', $this->data);
        }
    }

    function keywords(){
        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
        {
            //redirect them to the home page because they must be an administrator to view this
            //return show_error('You must be an administrator to view this page.');
            return show_error('You must be an administrator to view this page.');
        }
        else
        {
            $fname_post = (strlen($this->input->post('first_name')) > 0) ? strtolower(url_title($this->input->post('first_name'),'_')) : "" ;

            if(strlen($this->input->post('email')) > 0){
                $std_email_char = array("@",".");
                $rep_email_char = array("[at]","[dot]");
                //$email_at = str_replace("@", "[at]", $this->input->post('email'));
                //$email_dot = str_replace(".", "[dot]", $email_at);
                $email_post = strtolower(str_replace($std_email_char,$rep_email_char,$this->input->post('email')));
            }else{
                $email_post = "";
            }
            

            redirect('auth/index/fn:'.$fname_post.'/em:'.$email_post, 'refresh');
        }
    }

    //log the user in
    function login()
    {
        $this->data['title'] = "Login";

        //validate form input
        $this->form_validation->set_rules('identity', 'Identity', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == true)
        {
            //check to see if the user is logging in
            //check for "remember me"
            $remember = (bool) $this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
            {
                //if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('/', 'refresh');
            }
            else
            {
                //if the login was un-successful
                //redirect them back to the login page
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('auth/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        }
        else
        {
            //the user is not logging in so display the login page
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
            );

            $this->_render_page('auth/login', $this->data);

           
        }
    }

    //log the user out
    function logout()
    {
        $this->data['title'] = "Logout";

        //log the user out
        $logout = $this->ion_auth->logout();

        //redirect them to the login page
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('auth/login', 'refresh');
    }

    //change password
    function change_password()
    {
        $this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
        $this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }

        $user = $this->ion_auth->user()->row();

        if ($this->form_validation->run() == false)
        {
            //display the form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
            $this->data['old_password'] = array(
                'name' => 'old',
                'id'   => 'old',
                'type' => 'password',
            );
            $this->data['new_password'] = array(
                'name' => 'new',
                'id'   => 'new',
                'type' => 'password',
                'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
            );
            $this->data['new_password_confirm'] = array(
                'name' => 'new_confirm',
                'id'   => 'new_confirm',
                'type' => 'password',
                'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
            );
            $this->data['user_id'] = array(
                'name'  => 'user_id',
                'id'    => 'user_id',
                'type'  => 'hidden',
                'value' => $user->id,
            );

            //render
            $this->_render_page('auth/change_password', $this->data);
        }
        else
        {
            $identity = $this->session->userdata('identity');

            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

            if ($change)
            {
                //if the password was successfully changed
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->logout();
            }
            else
            {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('auth/change_password', 'refresh');
            }
        }
    }

    //forgot password
    function forgot_password()
    {
        $this->form_validation->set_rules('email', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
        if ($this->form_validation->run() == false)
        {
            //setup the input
            $this->data['email'] = array('name' => 'email',
                'id' => 'email',
            );

            if ( $this->config->item('identity', 'ion_auth') == 'username' ){
                $this->data['identity_label'] = $this->lang->line('forgot_password_username_identity_label');
            }
            else
            {
                $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
            }

            //set any errors and display the form
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->_render_page('auth/forgot_password', $this->data);
        }
        else
        {
            // get identity from username or email
            if ( $this->config->item('identity', 'ion_auth') == 'username' ){
                $identity = $this->ion_auth->where('username', strtolower($this->input->post('email')))->users()->row();
            }
            else
            {
                $identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
            }
            if(empty($identity)) {
                $this->ion_auth->set_message('forgot_password_email_not_found');
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("auth/forgot_password", 'refresh');
            }

            //run the forgotten password method to email an activation code to the user
            $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

            if ($forgotten)
            {
                //if there were no errors
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
            }
            else
            {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("auth/forgot_password", 'refresh');
            }
        }
    }

    //reset password - final step for forgotten password
    public function reset_password($code = NULL)
    {
        if (!$code)
        {
            show_404();
        }

        $user = $this->ion_auth->forgotten_password_check($code);

        if ($user)
        {
            //if the code is valid then display the password reset form

            $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

            if ($this->form_validation->run() == false)
            {
                //display the form

                //set the flash data error message if there is one
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id'   => 'new',
                'type' => 'password',
                    'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id'   => 'new_confirm',
                    'type' => 'password',
                    'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
                );
                $this->data['user_id'] = array(
                    'name'  => 'user_id',
                    'id'    => 'user_id',
                    'type'  => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;

                //render
                $this->_render_page('auth/reset_password', $this->data);
            }
            else
            {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
                {

                    //something fishy might be up
                    $this->ion_auth->clear_forgotten_password_code($code);

                    show_error($this->lang->line('error_csrf'));

                }
                else
                {
                    // finally change the password
                    $identity = $user->{$this->config->item('identity', 'ion_auth')};

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                    if ($change)
                    {
                        //if the password was successfully changed
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        $this->logout();
                    }
                    else
                    {
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect('auth/reset_password/' . $code, 'refresh');
                    }
                }
            }
        }
        else
        {
            //if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("auth/forgot_password", 'refresh');
        }
    }


    //activate the user
    function activate($id, $code=false)
    {
        if ($code !== false)
        {
            $activation = $this->ion_auth->activate($id, $code);
        }
        else if ($this->ion_auth->is_admin())
        {
            $activation = $this->ion_auth->activate($id);
        }

        if ($activation)
        {
            //redirect them to the auth page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth", 'refresh');
        }
        else
        {
            //redirect them to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("auth/forgot_password", 'refresh');
        }
    }

    //deactivate the user
    function deactivate($id = NULL)
    {
        $id = (int) $id;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
        $this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

        if ($this->form_validation->run() == FALSE)
        {
            // insert csrf check
            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['user'] = $this->ion_auth->user($id)->row();

            $this->_render_page('auth/deactivate_user', $this->data);
        }
        else
        {
            // do we really want to deactivate?
            if ($this->input->post('confirm') == 'yes')
            {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
                {
                    show_error($this->lang->line('error_csrf'));
                }

                // do we have the right userlevel?
                if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
                {
                    $this->ion_auth->deactivate($id);
                }
            }

            //redirect them back to the auth page
            redirect('auth', 'refresh');
        }
    }

    //create a new user
    function create_user()
    {
        $this->data['title'] = "Create User";

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }

        $tables = $this->config->item('tables','ion_auth');

        //validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique['.$tables['users'].'.email]');
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'required|xss_clean');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true)
        {
            $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
            $email    = strtolower($this->input->post('email'));
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'company'    => $this->input->post('company'),
                'phone'      => $this->input->post('phone'),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
        {
            //check to see if we are creating the user
            //redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth", 'refresh');
        }
        else
        {
            //display the create user form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name'  => 'last_name',
                'id'    => 'last_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['company'] = array(
                'name'  => 'company',
                'id'    => 'company',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('company'),
            );
            $this->data['phone'] = array(
                'name'  => 'phone',
                'id'    => 'phone',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name'  => 'password',
                'id'    => 'password',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            $this->_render_page('auth/create_user', $this->data);
        }
    }

    //register a new user
    function register_user()
    {
        $this->data['title'] = "Register New User";

        $tables = $this->config->item('tables','ion_auth');

        //validate form input
        $this->form_validation->set_rules('nik', 'NIK', 'required|xss_clean');
        $this->form_validation->set_rules('first_name', 'Nama depan', 'required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Nama belakang', 'required|xss_clean');
        $this->form_validation->set_rules('bod', 'Tanggal lahir', 'required|xss_clean');
        $this->form_validation->set_rules('business_unit_id', 'Business unit', 'required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique['.$tables['users'].'.email]');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true)
        {
            $username = strtolower($this->input->post('first_name')) . '' . strtolower($this->input->post('last_name'));
            $email    = strtolower($this->input->post('email'));
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name'            => $this->input->post('first_name'),
                'last_name'             => $this->input->post('last_name'),
                'business_unit_id'      => $this->input->post('business_unit_id'),
                'nik'                   => $this->input->post('nik'),
                'bod'                   => date('Y-m-d',strtotime($this->input->post('bod'))),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
        {
            //check to see if we are creating the user
            //redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth/login", 'refresh');
        }
        else
        {
            //die('here');
            //display the create user form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['nik'] = array(
                'name'  => 'nik',
                'id'    => 'nik',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('nik'),
            );

            $this->data['bod'] = array(
                'name'  => 'bod',
                'id'    => 'bod',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('bod'),
            );

            $this->data['first_name'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'placeholder' => lang('create_user_validation_fname_label'),
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name'  => 'last_name',
                'id'    => 'last_name',
                'type'  => 'text',
                'placeholder' => lang('create_user_validation_lname_label'),
                'value' => $this->form_validation->set_value('last_name'),
            );


            $f_business_unit = array("is_deleted" => 0);
            $q_business_unit = GetAll('organization',$f_business_unit);
            $this->data['business_unit'] = ($q_business_unit->num_rows() > 0 ) ? $q_business_unit : array();

            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email'),
            );

            $this->data['company'] = array(
                'name'  => 'company',
                'id'    => 'company',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('company'),
            );
            $this->data['phone'] = array(
                'name'  => 'phone',
                'id'    => 'phone',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name'  => 'password',
                'id'    => 'password',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            $this->_render_page('auth/register_user', $this->data);
        }
    }

    //edit a user
    function edit_user($id)
    {
        $this->data['title'] = "Edit User";

        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
        {
            redirect('auth', 'refresh');
        }

        $user = $this->ion_auth->user($id)->row();
        $groups=$this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups($id)->result();

        //validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('bod', $this->lang->line('edit_user_validation_bod_label'), 'required|xss_clean');
        $this->form_validation->set_rules('business_unit_id', $this->lang->line('edit_user_validation_business_unit_id_label'), 'required|xss_clean');
        $this->form_validation->set_rules('marital_id', $this->lang->line('edit_user_validation_marital_label'), 'required|xss_clean');
        $this->form_validation->set_rules('groups', $this->lang->line('edit_user_validation_groups_label'), 'xss_clean');
        $this->form_validation->set_rules('photo', $this->lang->line('edit_user_validation_photo_label'), 'xss_clean');

        /*$this->form_validation->set_rules('nik', 'NIK', 'required|xss_clean');
        $this->form_validation->set_rules('first_name', 'Nama depan', 'required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Nama belakang', 'required|xss_clean');
        $this->form_validation->set_rules('bod', 'Tanggal lahir', 'required|xss_clean');
        $this->form_validation->set_rules('business_unit_id', 'Business unit', 'required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique['.$tables['users'].'.email]');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');*/

        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }
            // Config for image upload

            $user_folder = $user->id.$user->first_name;
            if(!is_dir('./uploads/'.$user_folder)){
            mkdir('./uploads/'.$user_folder, 0777);
            }

             $this->load->library('image_lib');
             $config['upload_path'] = './uploads/'.$user_folder;
             $config['overwrite']=TRUE;
             $config['allowed_types'] = 'gif|jpg|png|jpeg';
             $config['max_size'] = '3000';
             //$config['encrypt_name'] = TRUE;
             $this->load->library('upload', $config);

            if (!$this->upload->do_upload('photo')){
                $this->data['error'] = array('error' => $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
                //error
             }else{

            $upload_data = $this->upload->data();

            //resize:
            $resize1='80x80';
            if(!is_dir('./uploads/'.$user_folder.'/'.$resize1)){
                mkdir('./uploads/'.$user_folder.'/'.$resize1, 0777);
            }
            $config = array(
                            'source_image'      => $upload_data['full_path'], //path to the uploaded image
                            'new_image'         => './uploads/'.$user_folder.'/'.$resize1, //path to
                            'maintain_ratio'    => TRUE,
                            'width'             => 80,
                            'height'            => 80
                        );
 
    
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
 
            $resize2='100x100';
            if(!is_dir('./uploads/'.$user_folder.'/'.$resize2)){
            mkdir('./uploads/'.$user_folder.'/'.$resize2, 0777);
            }
            $config = array(
                            'source_image'      => $upload_data['full_path'], //path to the uploaded image
                            'new_image'         => './uploads/'.$user_folder.'/'.$resize2, //path to
                            'maintain_ratio'    => TRUE,
                            'width'             => 100,
                            'height'            => 100
                        );
 
    
            $this->image_lib->initialize($config);
            $this->image_lib->resize();

            $resize3='225x225';
            if(!is_dir('./uploads/'.$user_folder.'/'.$resize3)){
            mkdir('./uploads/'.$user_folder.'/'.$resize3, 0777);
            }
            $config = array(
                            'source_image'      => $upload_data['full_path'], //path to the uploaded image
                            'new_image'         => './uploads/'.$user_folder.'/'.$resize3,
                            'maintain_ratio'    => TRUE,
                            'width'             => 225,
                            'height'            => 225
                        );
 
    
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            
        }
                                                      
            if(!$this->upload->do_upload('photo'))
            {
                            $data = array(
                            'first_name' => $this->input->post('first_name'),
                            'last_name'  => $this->input->post('last_name'),
                            'business_unit_id'      => $this->input->post('business_unit_id'),
                            'bod'                   => date('Y-m-d',strtotime($this->input->post('bod'))),
                            'marital_id'      => $this->input->post('marital_id'),
                            'phone'      => $this->input->post('phone'),
                            'previous_email'      => $this->input->post('previous_email'),
                            'bb_pin'      => $this->input->post('bb_pin')
                            );

            }else{
            $image_name = $upload_data['file_name'];
            $data = array(
                            'first_name' => $this->input->post('first_name'),
                            'last_name'  => $this->input->post('last_name'),
                            'business_unit_id'      => $this->input->post('business_unit_id'),
                            'bod'                   => date('Y-m-d',strtotime($this->input->post('bod'))),
                            'marital_id'      => $this->input->post('marital_id'),
                            'phone'      => $this->input->post('phone'),
                            'previous_email'      => $this->input->post('previous_email'),
                            'bb_pin'      => $this->input->post('bb_pin'),
                            'photo'     =>$image_name
                         );
            }
            // Only allow updating groups if user is admin
            if ($this->ion_auth->is_admin())
            {
                //Update the groups user belongs to
                $groupData = $this->input->post('groups');

                if (isset($groupData) && !empty($groupData)) {

                    $this->ion_auth->remove_from_group('', $id);

                    foreach ($groupData as $grp) {
                        $this->ion_auth->add_to_group($grp, $id);
                    }

                }
            }

            //update the password if it was posted
            if ($this->input->post('password'))
            {
                $this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');

                $data['password'] = $this->input->post('password');
            }

            if ($this->form_validation->run() === TRUE)
            {
                $this->ion_auth->update($user->id, $data);

                //check to see if we are creating the user
                //redirect them back to the admin page
                $this->session->set_flashdata('message', "User Saved");
                if ($this->ion_auth->is_admin())
                {
                    redirect('auth', 'refresh');
                }
                else
                {
                    redirect('/', 'refresh');
                }
            }

        }

        //display the edit user form
        $this->data['csrf'] = $this->_get_csrf_nonce();

        //set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        //pass the user to the view
        $this->data['user'] = $user;
        $this->data['groups'] = $groups;
        $this->data['currentGroups'] = $currentGroups;

        $this->data['photo'] = array(
            'name'  => 'photo',
            'id'    => 'photo',
            'class'    => 'input-file-control',
            'value' => $this->form_validation->set_value('photo', $user->photo),
        );

        $this->data['nik'] = array(
            'name'  => 'nik',
            'id'    => 'nik',
            'type'  => 'text',
            'disabled'  => 'disabled',
            'value' => $this->form_validation->set_value('nik', $user->nik),
        );

        $this->data['bod'] = array(
            'name'  => 'bod',
            'id'    => 'bod',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bod', $user->bod),
        );

        $this->data['first_name'] = array(
            'name'  => 'first_name',
            'id'    => 'first_name',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('first_name', $user->first_name),
        );
        $this->data['last_name'] = array(
            'name'  => 'last_name',
            'id'    => 'last_name',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('last_name', $user->last_name),
        );
        $this->data['company'] = array(
            'name'  => 'company',
            'id'    => 'company',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('company', $user->company),
        );
        $this->data['phone'] = array(
            'name'  => 'phone',
            'id'    => 'phone',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('phone', $user->phone),
        );

        $this->data['email'] = array(
            'name'  => 'email',
            'id'    => 'email',
            'type'  => 'text',
            'disabled'  => 'disabled',
            'value' => $this->form_validation->set_value('email', $user->email),
        );

        $this->data['mobile_phone'] = array(
            'name'  => 'mobile_phone',
            'id'    => 'mobile_phone',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('mobile_phone', $user->mobile_phone),
        );

        $this->data['previous_email'] = array(
            'name'  => 'previous_email',
            'id'    => 'previous_email',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('previous_email', $user->previous_email),
        );

        $this->data['bb_pin'] = array(
            'name'  => 'bb_pin',
            'id'    => 'bb_pin',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bb_pin', $user->bb_pin),
        );

        $this->data['password'] = array(
            'name' => 'password',
            'id'   => 'password',
            'type' => 'password'
        );

        $this->data['password_confirm'] = array(
            'name' => 'password_confirm',
            'id'   => 'password_confirm',
            'type' => 'password'
        );

        $this->data['business_unit_id'] = $this->form_validation->set_value('business_unit_id', $user->business_unit_id);
        $f_business_unit = array("is_deleted" => 0);
        $q_business_unit = GetAll('organization',$f_business_unit);
        $this->data['business_unit'] = ($q_business_unit->num_rows() > 0 ) ? $q_business_unit : array();


        $this->data['marital_id'] = $this->form_validation->set_value('email', $user->marital_id);
        $this->data['s_photo'] = $this->form_validation->set_value('photo', $user->photo);
        $user_folder = $user->id.$user->first_name;
        $this->data['u_folder'] = $user_folder;

        $f_marital = array("is_deleted" => 0);
        $q_marital = GetAll('marital',$f_marital);
        $this->data['marital'] = ($q_marital->num_rows() > 0 ) ? $q_marital : array();

        $this->_render_page('auth/edit_user', $this->data);
    }

    function detail($id, $ctitle = "ct:", $sort_by = "id", $sort_order = "asc", $offset = 0)
    {
        $this->data['title'] = "Detail User";

        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
        {
            redirect('auth', 'refresh');
        }

        //$user = $this->ion_auth->user($id)->row();
        $user = $this->person_model->getUsers($id)->row();
        $user_course = $this->person_model->getUserCourse($id);
        //die($user->row()->organization_title);
        $groups=$this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups($id)->result();

        //display the edit user form
        $this->data['csrf'] = $this->_get_csrf_nonce();

        //set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        //set sort order
            $this->data['sort_order'] = $sort_order;
            
            //set sort by
            $this->data['sort_by'] = $sort_by;
           
            //set filter by first name
            $this->data['ctitle_param'] = $ctitle; 
            $exp_ctitle = explode(":",$ctitle);
            $ctitle_re = str_replace("_", " ", $exp_ctitle[1]);
            $ctitle_post = (strlen($ctitle_re) > 0) ? array('users_course.title'=>$ctitle_re) : array() ;
            
            //set default limit in var $config['list_limit'] at application/config/ion_auth.php 
            $this->data['limit'] = $limit = (strlen($this->input->post('limit')) > 0) ? $this->input->post('limit') : $this->config->item('list_limit', 'ion_auth') ;

            $this->data['offset'] = $offset = $this->uri->segment($this->config->item('uri_segment_pager', 'ion_auth'));

            //list of filterize all users  
            $this->data['course_all'] = $this->ion_auth->like($ctitle_post)->users()->result();
            
            //num rows of filterize all users
            $this->data['num_rows_all'] = $this->ion_auth->like($ctitle_post)->users()->num_rows();

            //list of filterize limit users for pagination  
            //$this->data['user_course'] = $this->person_model->like($ctitle_post)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->users()->result();

            $this->data['users_num_rows'] = $this->ion_auth->like($ctitle_post)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->users()->num_rows();

           /* foreach ($this->data['users'] as $k => $user)
            {
                $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }*/

             //config pagination
             $config['base_url'] = base_url().'auth/index/fn:'.$exp_ctitle[1].'/'.$sort_by.'/'.$sort_order.'/';
             $config['total_rows'] = $this->data['num_rows_all'];
             $config['per_page'] = $limit;
             $config['uri_segment'] = $this->config->item('uri_segment_pager', 'ion_auth');

            //inisialisasi config
             $this->pagination->initialize($config);

            //create pagination
            $this->data['halaman'] = $this->pagination->create_links();

            $this->data['course_title_search'] = array(
                'name'  => 'course_detail',
                'id'    => 'course_detail',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('course_detail'),
            );

        //pass the user to the view
        $this->data['user'] = $user;
        $this->data['nik'] = (!empty($user->nik)) ? $user->nik : '-';
        $this->data['bod'] = (!empty($user->bod)) ? $user->bod : '-';
        $this->data['first_name'] = (!empty($user->first_name)) ? $user->first_name : '';
        $this->data['last_name'] = (!empty($user->last_name)) ? $user->last_name : '';
        $this->data['business_unit_id'] = (!empty($user->organization_title)) ? $user->organization_title : '';
        $this->data['marital_id'] = (!empty($user->marital_title)) ? $user->marital_title : '';
        $this->data['phone'] = (!empty($user->phone)) ? $user->phone : '';

        $this->data['email'] = (!empty($user->email)) ? $user->email : '';

        $this->data['previous_email'] = (!empty($user->previous_email)) ? $user->previous_email : '';

        $this->data['bb_pin'] = (!empty($user->bb_pin)) ? $user->bb_pin : '';

        $this->data['s_photo'] = $this->form_validation->set_value('photo', (!empty($user->photo)) ? $user->photo : '');
        
        $user_folder = $user->id.$user->first_name;
        $this->data['u_folder'] = $user_folder;

        $this->data['user_course'] = $user_course;

        $f_course_status = array("is_deleted" => 0);
        $q_course_status = GetAll('course_status', $f_course_status);
        $this->data['course_status'] = ($q_course_status->num_rows() > 0 ) ? $q_course_status : array();
       

        $this->_render_page('auth/detail', $this->data);
    }

    public function get_course($id){


        $user = $this->ion_auth->user($id)->row();
        $this->data['user'] = $user;
        $user_course = $this->person_model->getUserCourse($id);
        $this->data['user_course'] = $user_course;
        $this->data['num_rows_course'] = $user_course->num_rows();
       

        $this->load->view('table/table_course', $this->data);
    }

    public function add_course($id)
    {

        $this->form_validation->set_rules('description', 'Course Title', 'trim|required');
        $this->form_validation->set_rules('registration_date', 'Registration Date', 'trim|required');
        $this->form_validation->set_rules('course_status_id', 'Status', 'trim|required');
        

      if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('st'=>0, 'errors'=>validation_errors()));
        }
        else
        {
           
            $data = array(
                    'title'             => $this->input->post('description'),
                    'registration_date' => date('Y-m-d',strtotime($this->input->post('registration_date'))),
                    'course_status_id'  => $this->input->post('course_status_id'),
                    'user_id'           => $id,
                    'created_on'        => date('Y-m-d',strtotime('now')),
                    'created_by'        => $this->session->userdata('user_id'),
                    );

            $this->auth_model->addCourse($data);

            echo json_encode(array('st'=>1));     
        }
    }

    public function edit_course($id)
    {
        $this->form_validation->set_rules('description', 'Course Title', 'trim|required');
        $this->form_validation->set_rules('registration_date', 'Registration Date', 'trim|required');
        $this->form_validation->set_rules('course_status_id', 'Status', 'trim|required');
        
        if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('st'=>0, 'errors'=>validation_errors()));
        }
        else
        {         
            $data = array(
                    'title'             => $this->input->post('description'),
                    'registration_date' => date('Y-m-d',strtotime($this->input->post('registration_date'))),
                    'course_status_id'  => $this->input->post('course_status_id'),
                    'edited_on'         => date('Y-m-d',strtotime('now')),
                    'edited_by'         => $this->session->userdata('user_id'),
                    );

            $this->auth_model->editCourse($id, $data);
            echo json_encode(array('st'=>1));
            
        }

    }

    public function delete_course($id)
    {
        $data = array(
                'is_deleted'    => 1,
                'deleted_on'    =>date('Y-m-d',strtotime('now')),
                'deleted_by'    =>$this->session->userdata('user_id'),
                );

        $this->auth_model->deleteCourse($id, $data);

        echo json_encode(array('st'=>1));
    }


     public function detail_certificate($id, $fname = "fn:",$email = "em:",$sort_by = "id", $sort_order = "asc", $offset = 0)
    {
         $this->data['title'] = "Certificate Detail";

        $user_certificate = $this->person_model->getUserCertificate($id);

        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
        {
            redirect('auth', 'refresh');
        }

        $user = $this->ion_auth->user($id)->row();
        $groups=$this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups($id)->result();

        //validate form input
        
        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }
            // Config for image upload
        }

         //set sort order
            $this->data['sort_order'] = $sort_order;
            
            //set sort by
            $this->data['sort_by'] = $sort_by;
           
            //set filter by first name
            $this->data['fname_param'] = $fname; 
            $exp_fname = explode(":",$fname);
            $fname_re = str_replace("_", " ", $exp_fname[1]);
            $fname_post = (strlen($fname_re) > 0) ? array('users.first_name'=>$fname_re) : array() ;
            
            //set filter by email
            $this->data['email_param'] = $email;
            $exp_email = explode(":",$email);
            if(strlen($exp_email[1]) > 0) 
            {
                $rep_email_char = array("%5Bat%5D","%5Bdot%5D");
                $std_email_char = array("@",".");
                
                $email_post = array('users.email'=>str_replace($rep_email_char,$std_email_char,$exp_email[1]));
            }else{
                $email_post = array();
            }
            
            //set default limit in var $config['list_limit'] at application/config/ion_auth.php 
            $this->data['limit'] = $limit = (strlen($this->input->post('limit')) > 0) ? $this->input->post('limit') : $this->config->item('list_limit', 'ion_auth') ;

            $this->data['offset'] = $offset = $this->uri->segment($this->config->item('uri_segment_pager', 'ion_auth'));

            //list of filterize all users  
            $this->data['users_all'] = $this->ion_auth->like($fname_post)->like($email_post)->users()->result();
            
            //num rows of filterize all users
            $this->data['num_rows_all'] = $this->ion_auth->like($fname_post)->like($email_post)->users()->num_rows();

            //list of filterize limit users for pagination  
            $this->data['users'] = $this->ion_auth->like($fname_post)->like($email_post)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->users()->result();

            $this->data['users_num_rows'] = $this->ion_auth->like($fname_post)->like($email_post)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->users()->num_rows();

            /*foreach ($this->data['users'] as $k => $user)
            {
                $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }*/

             //config pagination
             $config['base_url'] = base_url().'auth/index/fn:'.$exp_fname[1].'/em:'.$exp_email[1].'/'.$sort_by.'/'.$sort_order.'/';
             $config['total_rows'] = $this->data['num_rows_all'];
             $config['per_page'] = $limit;
             $config['uri_segment'] = $this->config->item('uri_segment_pager', 'ion_auth');

            //inisialisasi config
             $this->pagination->initialize($config);

            //create pagination
            $this->data['halaman'] = $this->pagination->create_links();

            $this->data['fname_search'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );

            $this->data['email_search'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email'),
            );


        //pass the user to the view
        $this->data['user'] = $user;
        $this->data['groups'] = $groups;
        $this->data['currentGroups'] = $currentGroups;
        $this->data['nik'] = (!empty($user->nik)) ? $user->nik : '-';
        $this->data['bod'] = (!empty($user->bod)) ? $user->bod : '-';
        $this->data['first_name'] = (!empty($user->first_name)) ? $user->first_name : '';
        $this->data['last_name'] = (!empty($user->last_name)) ? $user->last_name : '';
        $this->data['business_unit_id'] = (!empty($user->organization_title)) ? $user->organization_title : '';
        $this->data['marital_id'] = (!empty($user->marital_title)) ? $user->marital_title : '';
        $this->data['phone'] = (!empty($user->phone)) ? $user->phone : '';

        $this->data['email'] = (!empty($user->email)) ? $user->email : '';

        $this->data['previous_email'] = (!empty($user->previous_email)) ? $user->previous_email : '';

        $this->data['bb_pin'] = (!empty($user->bb_pin)) ? $user->bb_pin : '';

        $this->data['s_photo'] = $this->form_validation->set_value('photo', (!empty($user->photo)) ? $user->photo : '');
        
        $user_folder = $user->id.$user->first_name;
        $this->data['u_folder'] = $user_folder;

        $this->data['user'] = $user;
        $this->data['user_certificate'] = $user_certificate;
        $this->data['num_rows_certificate'] = $user_certificate->num_rows();

        $f_certification_type = array("is_deleted" => 0);
        $q_certification_type = GetAll('certification_type', $f_certification_type);
        $this->data['certification_type'] = ($q_certification_type->num_rows() > 0 ) ? $q_certification_type : array();

        $this->_render_page('auth/detail_certificate', $this->data);
    
    }

     public function get_certificate($id){

        $user_certificate = $this->person_model->getUsercertificate($id);
        $this->data['user_certificate'] = $user_certificate;
        $this->data['num_rows_certificate'] = $user_certificate->num_rows();
       

        $this->load->view('table/table_certificate', $this->data);
    }

    public function add_certificate($id){

        $this->form_validation->set_rules('certification_type_id', 'Certification Type', 'trim|required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
        

      if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('st'=>0, 'errors'=>validation_errors()));
        }
        else
        {
           
            $data = array(
                    'certification_type_id' => $this->input->post('certification_type_id'),
                    'start_date' => date('Y-m-d',strtotime($this->input->post('start_date'))),
                    'end_date'  => date('Y-m-d',strtotime($this->input->post('end_date'))),
                    'user_id'           => $id,
                    'created_on'        => date('Y-m-d',strtotime('now')),
                    'created_by'        => $this->session->userdata('user_id'),
                    );

            $this->auth_model->addCertificate($data);

            echo json_encode(array('st'=>1));     
        }
    }

    public function edit_certificate($id){

        $this->form_validation->set_rules('certification_type_id', 'Certification Type', 'trim|required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');

        if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('st'=>0, 'errors'=>validation_errors()));
        }
        else
        {
           
            $data = array(
                    'certification_type_id' => $this->input->post('certification_type_id'),
                    'start_date' => date('Y-m-d',strtotime($this->input->post('start_date'))),
                    'end_date'  => date('Y-m-d',strtotime($this->input->post('end_date'))),
                    'edited_on'        => date('Y-m-d',strtotime('now')),
                    'edited_by'        => $this->session->userdata('user_id'),
                    );

            $this->auth_model->editCertificate($id, $data);

            echo json_encode(array('st'=>1));     
        }
    }

    public function delete_certificate($id){

        $data = array(
                'is_deleted'    => 1,
                'deleted_on'    =>date('Y-m-d',strtotime('now')),
                'deleted_by'    =>$this->session->userdata('user_id'),
                );

        $this->auth_model->deleteCertificate($id, $data);

        echo json_encode(array('st'=>1));
    }

     public function detail_education($id, $fname = "fn:",$email = "em:",$sort_by = "id", $sort_order = "asc", $offset = 0)
    {
         $this->data['title'] = "education Detail";

        $user_education = $this->person_model->getUsereducation($id);

        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
        {
            redirect('auth', 'refresh');
        }

        $user = $this->ion_auth->user($id)->row();
        $groups=$this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups($id)->result();

        //validate form input
        
        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }
            // Config for image upload
        }

         //set sort order
            $this->data['sort_order'] = $sort_order;
            
            //set sort by
            $this->data['sort_by'] = $sort_by;
           
            //set filter by first name
            $this->data['fname_param'] = $fname; 
            $exp_fname = explode(":",$fname);
            $fname_re = str_replace("_", " ", $exp_fname[1]);
            $fname_post = (strlen($fname_re) > 0) ? array('users.first_name'=>$fname_re) : array() ;
            
            //set filter by email
            $this->data['email_param'] = $email;
            $exp_email = explode(":",$email);
            if(strlen($exp_email[1]) > 0) 
            {
                $rep_email_char = array("%5Bat%5D","%5Bdot%5D");
                $std_email_char = array("@",".");
                
                $email_post = array('users.email'=>str_replace($rep_email_char,$std_email_char,$exp_email[1]));
            }else{
                $email_post = array();
            }
            
            //set default limit in var $config['list_limit'] at application/config/ion_auth.php 
            $this->data['limit'] = $limit = (strlen($this->input->post('limit')) > 0) ? $this->input->post('limit') : $this->config->item('list_limit', 'ion_auth') ;

            $this->data['offset'] = $offset = $this->uri->segment($this->config->item('uri_segment_pager', 'ion_auth'));

            //list of filterize all users  
            $this->data['users_all'] = $this->ion_auth->like($fname_post)->like($email_post)->users()->result();
            
            //num rows of filterize all users
            $this->data['num_rows_all'] = $this->ion_auth->like($fname_post)->like($email_post)->users()->num_rows();

            //list of filterize limit users for pagination  
            $this->data['users'] = $this->ion_auth->like($fname_post)->like($email_post)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->users()->result();

            $this->data['users_num_rows'] = $this->ion_auth->like($fname_post)->like($email_post)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->users()->num_rows();

            /*foreach ($this->data['users'] as $k => $user)
            {
                $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }*/

             //config pagination
             $config['base_url'] = base_url().'auth/index/fn:'.$exp_fname[1].'/em:'.$exp_email[1].'/'.$sort_by.'/'.$sort_order.'/';
             $config['total_rows'] = $this->data['num_rows_all'];
             $config['per_page'] = $limit;
             $config['uri_segment'] = $this->config->item('uri_segment_pager', 'ion_auth');

            //inisialisasi config
             $this->pagination->initialize($config);

            //create pagination
            $this->data['halaman'] = $this->pagination->create_links();

            $this->data['fname_search'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );

            $this->data['email_search'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email'),
            );


        //pass the user to the view
        $this->data['user'] = $user;
        $this->data['groups'] = $groups;
        $this->data['currentGroups'] = $currentGroups;
        $this->data['nik'] = (!empty($user->nik)) ? $user->nik : '-';
        $this->data['bod'] = (!empty($user->bod)) ? $user->bod : '-';
        $this->data['first_name'] = (!empty($user->first_name)) ? $user->first_name : '';
        $this->data['last_name'] = (!empty($user->last_name)) ? $user->last_name : '';
        $this->data['business_unit_id'] = (!empty($user->organization_title)) ? $user->organization_title : '';
        $this->data['marital_id'] = (!empty($user->marital_title)) ? $user->marital_title : '';
        $this->data['phone'] = (!empty($user->phone)) ? $user->phone : '';

        $this->data['email'] = (!empty($user->email)) ? $user->email : '';

        $this->data['previous_email'] = (!empty($user->previous_email)) ? $user->previous_email : '';

        $this->data['bb_pin'] = (!empty($user->bb_pin)) ? $user->bb_pin : '';

        $this->data['s_photo'] = $this->form_validation->set_value('photo', (!empty($user->photo)) ? $user->photo : '');
        
        $user_folder = $user->id.$user->first_name;
        $this->data['u_folder'] = $user_folder;

        $this->data['user'] = $user;
        $this->data['user_education'] = $user_education;
        $this->data['num_rows_education'] = $user_education->num_rows();

        $f_education_group = array("is_deleted" => 0);
        $q_education_group = GetAll('education_group', $f_education_group);
        $this->data['q_education_group'] = $q_education_group;
        $this->data['education_group'] = ($q_education_group->num_rows() > 0 ) ? $q_education_group : array();

        $f_education_degree = array("is_deleted" => 0);
        $q_education_degree = GetAll('education_degree', $f_education_degree);
        $this->data['q_education_degree'] = $q_education_degree;
        $this->data['education_degree'] = ($q_education_degree->num_rows() > 0 ) ? $q_education_degree : array();

        $f_education_center = array("is_deleted" => 0);
        $q_education_center = GetAll('education_center', $f_education_center);
        $this->data['q_education_center'] = $q_education_center;
        $this->data['education_center'] = ($q_education_center->num_rows() > 0 ) ? $q_education_center : array();

        $this->_render_page('auth/detail_education', $this->data);
    }

    public function get_education($id){

        $user_education = $this->person_model->getUsereducation($id);
        $this->data['user_education'] = $user_education;
        $this->data['num_rows_education'] = $user_education->num_rows();
       

        $this->load->view('table/table_education', $this->data);
    }

    public function add_education($id)
    {
        $this->form_validation->set_rules('title', 'Education', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('education_degree_id', 'Degree', 'trim|required');
        $this->form_validation->set_rules('education_group_id', 'Education Group', 'trim|required');
        $this->form_validation->set_rules('education_center_id', 'Institution', 'trim|required');      
        $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');

        if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('st'=>0, 'errors'=>validation_errors()));
        }
        else
        {
           
            $data = array(
                    'title'=>$this->input->post('title'),
                    'description'             => $this->input->post('description'),
                    'education_center_id' => $this->input->post('education_center_id'),
                    'education_degree_id'  => $this->input->post('education_degree_id'),
                    'education_group_id'           => $this->input->post('education_group_id'),
                    'start_date'    =>date('Y-m-d',strtotime($this->input->post('start_date'))),
                    'end_date'  =>date('Y-m-d',strtotime($this->input->post('end_date'))),
                    'user_id' =>$id,
                    'created_on'        => date('Y-m-d',strtotime('now')),
                    'created_by'        => $this->session->userdata('user_id'),
                    );

            $this->auth_model->addEducation($data);

            echo json_encode(array('st'=>1));     
        }
    }

    public function edit_education($id)
    {
        $this->form_validation->set_rules('title', 'Education', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('education_degree_id', 'Degree', 'trim|required');
        $this->form_validation->set_rules('education_group_id', 'Education Group', 'trim|required');
        $this->form_validation->set_rules('education_center_id', 'Institution', 'trim|required');      
        $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');

        if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('st'=>0, 'errors'=>validation_errors()));
        }
        else
        {
           
            $data = array(
                    'title'=>$this->input->post('title'),
                    'description'             => $this->input->post('description'),
                    'education_center_id' => $this->input->post('education_center_id'),
                    'education_degree_id'  => $this->input->post('education_degree_id'),
                    'education_group_id'           => $this->input->post('education_group_id'),
                    'start_date'    =>date('Y-m-d',strtotime($this->input->post('start_date'))),
                    'end_date'  =>date('Y-m-d',strtotime($this->input->post('end_date'))),
                    'edited_on'        => date('Y-m-d',strtotime('now')),
                    'edited_by'        => $this->session->userdata('user_id'),
                    );

            $this->auth_model->editEducation($id, $data);

            echo json_encode(array('st'=>1));     
        }
    }

    public function delete_education($id)
    {
        $data = array(
                'is_deleted'    => 1,
                'deleted_on'    =>date('Y-m-d',strtotime('now')),
                'deleted_by'    =>$this->session->userdata('user_id'),
                );

        $this->auth_model->deleteEducation($id, $data);

        echo json_encode(array('st'=>1));
    }

    public function detail_experience($id, $fname = "fn:",$email = "em:",$sort_by = "id", $sort_order = "asc", $offset = 0)
    {
         $this->data['title'] = "Experience Detail";

        $user_experience = $this->person_model->getUserExperience($id);

        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
        {
            redirect('auth', 'refresh');
        }

        $user = $this->ion_auth->user($id)->row();
        $groups=$this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups($id)->result();

        //validate form input
        
        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }
            // Config for image upload
        }

         //set sort order
            $this->data['sort_order'] = $sort_order;
            
            //set sort by
            $this->data['sort_by'] = $sort_by;
           
            //set filter by first name
            $this->data['fname_param'] = $fname; 
            $exp_fname = explode(":",$fname);
            $fname_re = str_replace("_", " ", $exp_fname[1]);
            $fname_post = (strlen($fname_re) > 0) ? array('users.first_name'=>$fname_re) : array() ;
            
            //set filter by email
            $this->data['email_param'] = $email;
            $exp_email = explode(":",$email);
            if(strlen($exp_email[1]) > 0) 
            {
                $rep_email_char = array("%5Bat%5D","%5Bdot%5D");
                $std_email_char = array("@",".");
                
                $email_post = array('users.email'=>str_replace($rep_email_char,$std_email_char,$exp_email[1]));
            }else{
                $email_post = array();
            }
            
            //set default limit in var $config['list_limit'] at application/config/ion_auth.php 
            $this->data['limit'] = $limit = (strlen($this->input->post('limit')) > 0) ? $this->input->post('limit') : $this->config->item('list_limit', 'ion_auth') ;

            $this->data['offset'] = $offset = $this->uri->segment($this->config->item('uri_segment_pager', 'ion_auth'));

            //list of filterize all users  
            $this->data['users_all'] = $this->ion_auth->like($fname_post)->like($email_post)->users()->result();
            
            //num rows of filterize all users
            $this->data['num_rows_all'] = $this->ion_auth->like($fname_post)->like($email_post)->users()->num_rows();

            //list of filterize limit users for pagination  
            $this->data['users'] = $this->ion_auth->like($fname_post)->like($email_post)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->users()->result();

            $this->data['users_num_rows'] = $this->ion_auth->like($fname_post)->like($email_post)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->users()->num_rows();

            /*foreach ($this->data['users'] as $k => $user)
            {
                $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }*/

             //config pagination
             $config['base_url'] = base_url().'auth/index/fn:'.$exp_fname[1].'/em:'.$exp_email[1].'/'.$sort_by.'/'.$sort_order.'/';
             $config['total_rows'] = $this->data['num_rows_all'];
             $config['per_page'] = $limit;
             $config['uri_segment'] = $this->config->item('uri_segment_pager', 'ion_auth');

            //inisialisasi config
             $this->pagination->initialize($config);

            //create pagination
            $this->data['halaman'] = $this->pagination->create_links();

            $this->data['fname_search'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );

            $this->data['email_search'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email'),
            );


        //pass the user to the view
        $this->data['user'] = $user;
        $this->data['groups'] = $groups;
        $this->data['currentGroups'] = $currentGroups;
        $this->data['nik'] = (!empty($user->nik)) ? $user->nik : '-';
        $this->data['bod'] = (!empty($user->bod)) ? $user->bod : '-';
        $this->data['first_name'] = (!empty($user->first_name)) ? $user->first_name : '';
        $this->data['last_name'] = (!empty($user->last_name)) ? $user->last_name : '';
        $this->data['business_unit_id'] = (!empty($user->organization_title)) ? $user->organization_title : '';
        $this->data['marital_id'] = (!empty($user->marital_title)) ? $user->marital_title : '';
        $this->data['phone'] = (!empty($user->phone)) ? $user->phone : '';

        $this->data['email'] = (!empty($user->email)) ? $user->email : '';

        $this->data['previous_email'] = (!empty($user->previous_email)) ? $user->previous_email : '';

        $this->data['bb_pin'] = (!empty($user->bb_pin)) ? $user->bb_pin : '';

        $this->data['s_photo'] = $this->form_validation->set_value('photo', (!empty($user->photo)) ? $user->photo : '');
        
        $user_folder = $user->id.$user->first_name;
        $this->data['u_folder'] = $user_folder;

        $this->data['user'] = $user;
        $this->data['user_experience'] = $user_experience;
        $this->data['num_rows_experience'] = $user_experience->num_rows();

        $f_exp_field = array("is_deleted" => 0);
        $q_exp_field = GetAll('exp_field', $f_exp_field);
        $this->data['exp_field'] = ($q_exp_field->num_rows() > 0 ) ? $q_exp_field : array();

        $f_exp_level = array("is_deleted" => 0);
        $q_exp_level = GetAll('exp_level', $f_exp_level);
        $this->data['exp_level'] = ($q_exp_level->num_rows() > 0 ) ? $q_exp_level : array();

        $f_exp_year = array("is_deleted" => 0);
        $q_exp_year = GetAll('exp_year', $f_exp_year);
        $this->data['exp_year'] = ($q_exp_year->num_rows() > 0 ) ? $q_exp_year : array();
        
        $f_resign_reason = array("is_deleted" => 0);
        $q_resign_reason = GetAll('resign_reason', $f_resign_reason);
        $this->data['resign_reason'] = ($q_resign_reason->num_rows() > 0 ) ? $q_resign_reason : array();

        $this->_render_page('auth/detail_experience', $this->data);
    }

    public function get_experience($id){

        $user_experience = $this->person_model->getUserexperience($id);
        $this->data['user_experience'] = $user_experience;
        $this->data['num_rows_experience'] = $user_experience->num_rows();
       

        $this->load->view('table/table_experience', $this->data);
    }

    public function add_experience($id)
    {

        $this->form_validation->set_rules('company', 'Company', 'trim|required');
        $this->form_validation->set_rules('position', 'Position', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('line_business', 'Education Group', 'trim|required');
        $this->form_validation->set_rules('resign_reason_id', 'Resign Reason', 'trim|required');
        $this->form_validation->set_rules('last_salary', 'Last Salary', 'trim|required|numeric');      
        $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');

        if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('st'=>0, 'errors'=>validation_errors()));
        }
        else
        {
           
            $data = array(
                    'company'           => $this->input->post('company'),
                    'position'          => $this->input->post('position'),
                    'address'           => $this->input->post('address'),
                    'line_business'     => $this->input->post('line_business'),
                    'resign_reason_id'  => $this->input->post('resign_reason_id'),
                    'last_salary'       => $this->input->post('last_salary'),
                    'start_date'        => date('Y-m-d',strtotime($this->input->post('start_date'))),
                    'end_date'          => date('Y-m-d',strtotime($this->input->post('end_date'))),
                    'user_id'           => $id,
                    'created_on'        => date('Y-m-d',strtotime('now')),
                    'created_by'        => $this->session->userdata('user_id'),
                    /*
                    'exp_level_id' =>'',
                    'exp_year_id'=>'',
                    'exp_year_id' =>'',
                    */
                    );

            $this->auth_model->addExperience($data);

            echo json_encode(array('st'=>1));     
        }
    }

    public function edit_experience($id)
    {
        $this->form_validation->set_rules('company', 'Company', 'trim|required');
        $this->form_validation->set_rules('position', 'Position', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('line_business', 'Education Group', 'trim|required');
        $this->form_validation->set_rules('resign_reason_id', 'Resign Reason', 'trim|required');
        $this->form_validation->set_rules('last_salary', 'Last Salary', 'trim|required|numeric');      
        $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');


        if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('st'=>0, 'errors'=>validation_errors()));
        }
        else
        {
           
            $data = array(
                    'company'           => $this->input->post('company'),
                    'position'          => $this->input->post('position'),
                    'address'           => $this->input->post('address'),
                    'line_business'     => $this->input->post('line_business'),
                    'resign_reason_id'  => $this->input->post('resign_reason_id'),
                    'last_salary'       => $this->input->post('last_salary'),
                    'start_date'        => date('Y-m-d',strtotime($this->input->post('start_date'))),
                    'end_date'          => date('Y-m-d',strtotime($this->input->post('end_date'))),
                    'edited_on'        => date('Y-m-d',strtotime('now')),
                    'edited_by'        => $this->session->userdata('user_id'),
                    /*
                    'exp_level_id' =>'',
                    'exp_year_id'=>'',
                    'exp_year_id' =>'',
                    */
                    );

            $this->auth_model->editExperience($id, $data);

            echo json_encode(array('st'=>1));     
        }

    }

    public function delete_experience($id)
    {
        $data = array(
                'is_deleted'    => 1,
                'deleted_on'    =>date('Y-m-d',strtotime('now')),
                'deleted_by'    =>$this->session->userdata('user_id'),
                );

        $this->auth_model->deleteExperience($id, $data);

        echo json_encode(array('st'=>1));
    }   

    public function detail_sk($id, $fname = "fn:",$email = "em:",$sort_by = "id", $sort_order = "asc", $offset = 0)
    {
        $this->data['title'] = "SK Detail";

        $user_sk = $this->person_model->getUsersk($id);

        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
        {
            redirect('auth', 'refresh');
        }

        $user = $this->ion_auth->user($id)->row();
        $groups=$this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups($id)->result();

        //validate form input
        
        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }
            // Config for image upload
        }

         //set sort order
            $this->data['sort_order'] = $sort_order;
            
            //set sort by
            $this->data['sort_by'] = $sort_by;
           
            //set filter by first name
            $this->data['fname_param'] = $fname; 
            $exp_fname = explode(":",$fname);
            $fname_re = str_replace("_", " ", $exp_fname[1]);
            $fname_post = (strlen($fname_re) > 0) ? array('users.first_name'=>$fname_re) : array() ;
            
            //set filter by email
            $this->data['email_param'] = $email;
            $exp_email = explode(":",$email);
            if(strlen($exp_email[1]) > 0) 
            {
                $rep_email_char = array("%5Bat%5D","%5Bdot%5D");
                $std_email_char = array("@",".");
                
                $email_post = array('users.email'=>str_replace($rep_email_char,$std_email_char,$exp_email[1]));
            }else{
                $email_post = array();
            }
            
            //set default limit in var $config['list_limit'] at application/config/ion_auth.php 
            $this->data['limit'] = $limit = (strlen($this->input->post('limit')) > 0) ? $this->input->post('limit') : $this->config->item('list_limit', 'ion_auth') ;

            $this->data['offset'] = $offset = $this->uri->segment($this->config->item('uri_segment_pager', 'ion_auth'));

            //list of filterize all users  
            $this->data['users_all'] = $this->ion_auth->like($fname_post)->like($email_post)->users()->result();
            
            //num rows of filterize all users
            $this->data['num_rows_all'] = $this->ion_auth->like($fname_post)->like($email_post)->users()->num_rows();

            //list of filterize limit users for pagination  
            $this->data['users'] = $this->ion_auth->like($fname_post)->like($email_post)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->users()->result();

            $this->data['users_num_rows'] = $this->ion_auth->like($fname_post)->like($email_post)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->users()->num_rows();

            /*foreach ($this->data['users'] as $k => $user)
            {
                $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }*/

             //config pagination
             $config['base_url'] = base_url().'auth/index/fn:'.$exp_fname[1].'/em:'.$exp_email[1].'/'.$sort_by.'/'.$sort_order.'/';
             $config['total_rows'] = $this->data['num_rows_all'];
             $config['per_page'] = $limit;
             $config['uri_segment'] = $this->config->item('uri_segment_pager', 'ion_auth');

            //inisialisasi config
             $this->pagination->initialize($config);

            //create pagination
            $this->data['halaman'] = $this->pagination->create_links();

            $this->data['fname_search'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );

            $this->data['email_search'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email'),
            );


        //pass the user to the view
        $this->data['user'] = $user;
        $this->data['groups'] = $groups;
        $this->data['currentGroups'] = $currentGroups;
        $this->data['nik'] = (!empty($user->nik)) ? $user->nik : '-';
        $this->data['bod'] = (!empty($user->bod)) ? $user->bod : '-';
        $this->data['first_name'] = (!empty($user->first_name)) ? $user->first_name : '';
        $this->data['last_name'] = (!empty($user->last_name)) ? $user->last_name : '';
        $this->data['business_unit_id'] = (!empty($user->organization_title)) ? $user->organization_title : '';
        $this->data['marital_id'] = (!empty($user->marital_title)) ? $user->marital_title : '';
        $this->data['phone'] = (!empty($user->phone)) ? $user->phone : '';

        $this->data['email'] = (!empty($user->email)) ? $user->email : '';

        $this->data['previous_email'] = (!empty($user->previous_email)) ? $user->previous_email : '';

        $this->data['bb_pin'] = (!empty($user->bb_pin)) ? $user->bb_pin : '';

        $this->data['s_photo'] = $this->form_validation->set_value('photo', (!empty($user->photo)) ? $user->photo : '');
        
        $user_folder = $user->id.$user->first_name;
        $this->data['u_folder'] = $user_folder;

        $this->data['user'] = $user;
        $this->data['user_sk'] = $user_sk;
        $this->data['num_rows_sk'] = $user_sk->num_rows();

        $f_position = array("is_deleted" => 0);
        $q_position = GetAll('position', $f_position);
        $this->data['position'] = ($q_position->num_rows() > 0 ) ? $q_position : array();

        $f_departement = array("is_deleted" => 0);
        $q_departement = GetAll('departement', $f_departement);
        $this->data['q_departement'] = $q_departement;
        $this->data['departement'] = ($q_departement->num_rows() > 0 ) ? $q_departement : array();


        $this->_render_page('auth/detail_sk', $this->data);
    }

    public function get_sk($id){

        $user_sk = $this->person_model->getUsersk($id);
        $this->data['user_sk'] = $user_sk;
        $this->data['num_rows_sk'] = $user_sk->num_rows();
       

        $this->load->view('table/table_sk', $this->data);
    }


    public function add_sk($id)
    {
        $this->form_validation->set_rules('sk_date','SK Date','trim|required');
        $this->form_validation->set_rules('sk_no','SK No','trim|required');
        $this->form_validation->set_rules('position_id','Position','trim|required');
        $this->form_validation->set_rules('effective_date','Effective Date','trim|required');
        $this->form_validation->set_rules('departement_id','Departement','trim|required');
        $this->form_validation->set_rules('location','Location','trim|required');
        $this->form_validation->set_rules('sign_name','Sign Name','trim|required');
        $this->form_validation->set_rules('sign_position','Sign Position','trim|required');

        if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('st'=>0, 'errors'=>validation_errors()));
        }
        else
        {
           
            $data = array(
                    'sk_no'             => $this->input->post('sk_no'),
                    'position_id'       => $this->input->post('position_id'),
                    'departement_id'    => $this->input->post('departement_id'),
                    'sk_date'           => date('Y-m-d',strtotime($this->input->post('sk_date'))),
                    'effective_date'    => date('Y-m-d',strtotime($this->input->post('effective_date'))),
                    'location'          =>$this->input->post('location'),
                    'sign_name'         =>$this->input->post('sign_name'),
                    'sign_position'     =>$this->input->post('sign_position'),
                    'user_id'           => $id,
                    'created_on'        => date('Y-m-d',strtotime('now')),
                    'created_by'        => $this->session->userdata('user_id'),
                    );

            $this->auth_model->addSk($data);

            echo json_encode(array('st'=>1));     
        }
    }

    public function edit_sk($id)
    {
        $this->form_validation->set_rules('sk_date','SK Date','trim|required');
        $this->form_validation->set_rules('sk_no','SK No','trim|required');
        $this->form_validation->set_rules('position_id','Position','trim|required');
        $this->form_validation->set_rules('effective_date','Effective Date','trim|required');
        $this->form_validation->set_rules('departement_id','Departement','trim|required');
        $this->form_validation->set_rules('location','Location','trim|required');
        $this->form_validation->set_rules('sign_name','Sign Name','trim|required');
        $this->form_validation->set_rules('sign_position','Sign Position','trim|required');

        if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('st'=>0, 'errors'=>validation_errors()));
        }
        else
        {
           
            $data = array(
                    'sk_no'             => $this->input->post('sk_no'),
                    'position_id'       => $this->input->post('position_id'),
                    'departement_id'    => $this->input->post('departement_id'),
                    'sk_date'           => date('Y-m-d',strtotime($this->input->post('sk_date'))),
                    'effective_date'    => date('Y-m-d',strtotime($this->input->post('effective_date'))),
                    'location'          =>$this->input->post('location'),
                    'sign_name'         =>$this->input->post('sign_name'),
                    'sign_position'     =>$this->input->post('sign_position'),
                    'edited_on'        => date('Y-m-d',strtotime('now')),
                    'edited_by'        => $this->session->userdata('user_id'),
                    );

            $this->auth_model->addSk($data);

            echo json_encode(array('st'=>1));
        }

    }

    public function delete_sk($id)
    {
        $data = array(
                'is_deleted'    => 1,
                'deleted_on'    =>date('Y-m-d',strtotime('now')),
                'deleted_by'    =>$this->session->userdata('user_id'),
                );

        $this->auth_model->deleteSk($id, $data);

        echo json_encode(array('st'=>1));
    }




    // create a new group
    function create_group()
    {
        $this->data['title'] = $this->lang->line('create_group_title');

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }

        //validate form input
        $this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash|xss_clean');
        $this->form_validation->set_rules('description', $this->lang->line('create_group_validation_desc_label'), 'xss_clean');

        if ($this->form_validation->run() == TRUE)
        {
            $new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
            if($new_group_id)
            {
                // check to see if we are creating the group
                // redirect them back to the admin page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("auth", 'refresh');
            }
        }
        else
        {
            //display the create group form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['group_name'] = array(
                'name'  => 'group_name',
                'id'    => 'group_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('group_name'),
            );
            $this->data['description'] = array(
                'name'  => 'description',
                'id'    => 'description',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('description'),
            );

            $this->_render_page('auth/create_group', $this->data);
        }
    }

    //edit a group
    function edit_group($id)
    {
        // bail if no group id given
        if(!$id || empty($id))
        {
            redirect('auth', 'refresh');
        }

        $this->data['title'] = $this->lang->line('edit_group_title');

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }

        $group = $this->ion_auth->group($id)->row();

        //validate form input
        $this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash|xss_clean');
        $this->form_validation->set_rules('group_description', $this->lang->line('edit_group_validation_desc_label'), 'xss_clean');

        if (isset($_POST) && !empty($_POST))
        {
            if ($this->form_validation->run() === TRUE)
            {
                $group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

                if($group_update)
                {
                    $this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
                }
                else
                {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                }
                redirect("auth", 'refresh');
            }
        }

        //set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        //pass the user to the view
        $this->data['group'] = $group;

        $this->data['group_name'] = array(
            'name'  => 'group_name',
            'id'    => 'group_name',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('group_name', $group->name),
        );
        $this->data['group_description'] = array(
            'name'  => 'group_description',
            'id'    => 'group_description',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('group_description', $group->description),
        );

        $this->_render_page('auth/edit_group', $this->data);
    }




    function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key   = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    function _valid_csrf_nonce()
    {
        if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
            $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function _render_page($view, $data=null, $render=false)
    {
        // $this->viewdata = (empty($data)) ? $this->data: $data;
        // $view_html = $this->load->view($view, $this->viewdata, $render);
        // if (!$render) return $view_html;
        $data = (empty($data)) ? $this->data : $data;
        if ( ! $render)
        {
            $this->load->library('template');

            /*if ( ! in_array($view, array('auth/index')))
            {*/
                if(in_array($view, array('auth/index')))
                {
                    $this->template->set_layout('default');

                    $this->template->add_js('jquery.min.js');
                    $this->template->add_js('bootstrap.min.js');

                    $this->template->add_js('jquery-ui-1.10.1.custom.min.js');
                    //$this->template->add_js('jqueryblockui.js');
                    $this->template->add_js('jquery.sidr.min.js');
                    $this->template->add_js('breakpoints.js');
                    $this->template->add_js('select2.min.js');
                    //$this->template->add_js('pace.min.js');
                    //$this->template->add_js('bootstrap-datepicker.js');
                    $this->template->add_js('list_user.js');
                    $this->template->add_js('core.js');
                    //$this->template->add_js('modules/skeleton.js');
                    //$this->template->add_css('modules/skeleton.css');
                    $this->template->add_js('main.js');
                    $this->template->add_js('respond.min.js');
                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    $this->template->add_css('plugins/select2/select2.css');
                    //$this->template->add_css('pace-theme-flash.css');
                    //$this->template->add_css('datepicker.css');
                }
                elseif(in_array($view, array('auth/login')))
                {
                    $this->template->set_layout('single');

                    $this->template->add_js('main.js');
                    $this->template->add_js('jquery.validate.min.js');

                    $this->template->add_css('main.css');
                }
                elseif(in_array($view, array('auth/register_user')))
                {
                    $this->template->set_layout('single');

                    $this->template->add_js('bootstrap-datepicker.js');
                    $this->template->add_js('jquery.validate.min.js');
                    $this->template->add_js('select2.min.js');
                    $this->template->add_js('register.js');
                    
                    $this->template->add_css('datepicker.css');
                    $this->template->add_css('plugins/select2/select2.css');
                }
                elseif(in_array($view, array('auth/edit_user')))
                {

                    $this->template->set_layout('default');

                    /*$this->template->add_js('jquery-1.8.3.min.js');*/
                    $this->template->add_js('jquery-ui-1.10.1.custom.min.js');
                    $this->template->add_js('jqueryblockui.js');
                    $this->template->add_js('jquery.sidr.min.js');
                    $this->template->add_js('breakpoints.js');
                    $this->template->add_js('pace.min.js');
                    $this->template->add_js('bootstrap-datepicker.js');
                    $this->template->add_js('edit_user.js');
                    $this->template->add_js('core.js');
                    
                    $this->template->add_js('select2.min.js');
                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    $this->template->add_css('plugins/select2/select2.css');
                    $this->template->add_css('pace-theme-flash.css');
                    $this->template->add_css('datepicker.css');
                }
                elseif(in_array($view, array('auth/detail',
                                             'auth/detail_certificate',
                                             'auth/detail_education',
                                             'auth/detail_experience',
                                             'auth/detail_sk',
                                             'auth/detail_sti',
                                             'auth/detail_jabatan',
                                             'auth/detail_award',
                                             'auth/detail_ikatan',
                    )))
                {
                    $this->template->set_layout('default');

                    $this->template->add_js('jquery.min.js');
                    $this->template->add_js('bootstrap.min.js');
                    $this->template->add_js('main.js');
                    $this->template->add_js('jquery-ui-1.10.1.custom.min.js');
                    $this->template->add_js('jqueryblockui.js');
                    $this->template->add_js('jquery.sidr.min.js');
                    $this->template->add_js('breakpoints.js');
                    $this->template->add_js('pace.min.js');
                    $this->template->add_js('bootstrap-datepicker.js');
                    $this->template->add_js('edit_user.js');
                    $this->template->add_js('core.js');

                    
                    $this->template->add_js('select2.min.js');
                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    $this->template->add_css('plugins/select2/select2.css');
                    $this->template->add_css('pace-theme-flash.css');
                    $this->template->add_css('datepicker.css');
                }
           /* }*/


            if ( ! empty($data['title']))
            {
                $this->template->set_title($data['title']);
            }

            $this->template->load_view($view, $data);
        }
        else
        {
            return $this->load->view($view, $data, TRUE);
        }
    }

    

}
