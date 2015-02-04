<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Organization_class extends MX_Controller {

    public $data;

    function __construct()
    {
        parent::__construct();
        $this->load->library('authentication', NULL, 'ion_auth');
        $this->load->library('form_validation');
        $this->load->helper('url');
        
        $this->load->database();
        $this->load->model('organization_class/organization_class_model','organization_class_model');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->helper('language');

    }

    //redirect if needed, otherwise display the user list
    function index($ftitle = "fn:",$sort_by = "id", $sort_order = "asc", $offset = 0)
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
           
            //set filter by title
            $this->data['ftitle_param'] = $ftitle; 
            $exp_ftitle = explode(":",$ftitle);
            $ftitle_re = str_replace("_", " ", $exp_ftitle[1]);
            $ftitle_post = (strlen($ftitle_re) > 0) ? array('organization_class.title'=>$ftitle_re) : array() ;
            
            //set default limit in var $config['list_limit'] at application/config/ion_auth.php 
            $this->data['limit'] = $limit = (strlen($this->input->post('limit')) > 0) ? $this->input->post('limit') : 10 ;

            $this->data['offset'] = $offset = $this->uri->segment(6);

            //list of filterize all organization_class  
            $this->data['organization_class_all'] = $this->organization_class_model->like($ftitle_post)->organization_class()->result();
            //die(print_mz($this->data['organization_class_all']));
            //num rows of filterize all organization_class
            $this->data['num_rows_all'] = $this->organization_class_model->like($ftitle_post)->organization_class()->num_rows();

            //list of filterize limit organization_class for pagination  
            $this->data['organization_class'] = $this->organization_class_model->like($ftitle_post)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->organization_class()->result();

            $this->data['users_num_rows'] = $this->organization_class_model->like($ftitle_post)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->organization_class()->num_rows();

           /* foreach ($this->data['users'] as $k => $user)
            {
                $this->data['users'][$k]->groups = $this->organization_class_model->get_users_groups($user->id)->result();
            }*/

             //config pagination
             $config['base_url'] = base_url().'organization_class/index/fn:'.$exp_ftitle[1].'/'.$sort_by.'/'.$sort_order.'/';
             $config['total_rows'] = $this->data['num_rows_all'];
             $config['per_page'] = $limit;
             $config['uri_segment'] = $offset = $this->uri->segment(6);

            //inisialisasi config
             $this->pagination->initialize($config);

            //create pagination
            $this->data['halaman'] = $this->pagination->create_links();

            $this->data['ftitle_search'] = array(
                'name'  => 'title',
                'id'    => 'title',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('title'),
            );

            $this->_render_page('organization_class/index', $this->data);
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
            $ftitle_post = (strlen($this->input->post('title')) > 0) ? strtolower(url_title($this->input->post('title'),'_')) : "" ;

            redirect('organization_class/index/fn:'.$ftitle_post, 'refresh');
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
    function edit($id)
    {
        $this->data['title'] = "Edit Organization Class";

        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
        {
            redirect('auth', 'refresh');
        }

        $org_class = $this->organization_class_model->org_class($id)->row();

        //validate form input
        $this->form_validation->set_rules('ftitle', $this->lang->line('edit_validation_ftitle_label'), 'required|xss_clean');
        
        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }
            
            $data = array(
                            'title' => $this->input->post('ftitle')
                         );

            if ($this->form_validation->run() === TRUE)
            {
                $this->organization_class_model->update($org_class->id, $data);

                $this->session->set_flashdata('message', "Organization Class Saved");
                if ($this->ion_auth->is_admin())
                {
                    redirect('organization_class', 'refresh');
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

        //pass the organization_class to the view
        $this->data['org_class'] = $org_class;

        $this->data['ftitle'] = array(
            'name'  => 'ftitle',
            'id'    => 'ftitle',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('ftitle', $org_class->title),
        );
        
        $this->_render_page('organization_class/edit', $this->data);
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
                if(in_array($view, array('organization_class/index')))
                {
                    $this->template->set_layout('default');

                    $this->template->add_js('jquery.min.js');
                    $this->template->add_js('bootstrap.min.js');

                    $this->template->add_js('jquery-ui-1.10.1.custom.min.js');
                    $this->template->add_js('jquery.sidr.min.js');
                    $this->template->add_js('breakpoints.js');
                    $this->template->add_js('select2.min.js');

                    $this->template->add_js('list_organization_class.js');
                    $this->template->add_js('core.js');

                    $this->template->add_js('main.js');
                    $this->template->add_js('respond.min.js');
                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    $this->template->add_css('plugins/select2/select2.css');
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
                elseif(in_array($view, array('organization_class/edit')))
                {

                    $this->template->set_layout('default');

                    /*$this->template->add_js('jquery-1.8.3.min.js');*/
                    $this->template->add_js('jquery-ui-1.10.1.custom.min.js');
                    $this->template->add_js('jqueryblockui.js');
                    $this->template->add_js('jquery.sidr.min.js');
                    $this->template->add_js('breakpoints.js');
                    $this->template->add_js('pace.min.js');
                    //$this->template->add_js('bootstrap-datepicker.js');
                    $this->template->add_js('edit_user.js');
                    $this->template->add_js('core.js');
                    
                    //$this->template->add_js('select2.min.js');
                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    //$this->template->add_css('plugins/select2/select2.css');
                    $this->template->add_css('pace-theme-flash.css');
                    //$this->template->add_css('datepicker.css');
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
