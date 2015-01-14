<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends MX_Controller {

    public $data;

    function __construct()
    {
        parent::__construct();
        $this->load->library('authentication', NULL, 'ion_auth');
        $this->load->library('form_validation');
        $this->load->helper('url');

        $this->load->database();

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->helper('language');
    }

    //redirect if needed, otherwise display the user list
    function index()
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

            $filter = array();
            $query_options = GetAll('users',$filter);
            $this->data['user_all'] = ($query_options->num_rows() > 0 ) ? $query_options : array();
 
            $this->_render_page('person/index', $this->data);
        }
    }

    function keywords()
    {
        $keyword = $this->input->post('first_name');
        $id = $this->uri->segment(3, 0);

        redirect(base_url()."person/detail/".$id);
    }

    function detail($id)
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

        $this->data['csrf'] = $this->_get_csrf_nonce();
        $user = $this->ion_auth->user($id)->row();

        $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'business_unit_id'      => $this->input->post('business_unit_id'),
                'bod'                   => date('Y-m-d',strtotime($this->input->post('bod'))),
                'marital_id'      => $this->input->post('marital_id'),
                'phone' => $this->input->post('phone'),
            );

        $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('bod', $this->lang->line('edit_user_validation_bod_label'), 'required|xss_clean');
        $this->form_validation->set_rules('business_unit_id', $this->lang->line('edit_user_validation_business_unit_id_label'), 'required|xss_clean');
        $this->form_validation->set_rules('marital_id', $this->lang->line('edit_user_validation_marital_label'), 'required|xss_clean');
        $this->form_validation->set_rules('groups', $this->lang->line('edit_user_validation_groups_label'), 'xss_clean');

        if ($this->form_validation->run() === TRUE)
            {               
                //check to see if we are creating the user
               
                $this->ion_auth->update($user->id, $data);
                $this->session->set_flashdata('message', "User Saved");
                $id = $this->uri->segment(3, 0);
                redirect(base_url()."person/detail/".$id);

            }

        //set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        //pass the user to the view
        $this->data['user'] = $user;

        

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

        $this->data['marital_id'] = $this->form_validation->set_value('email', $user->marital_id);
        $this->data['s_photo'] = $this->form_validation->set_value('photo', $user->photo);
        $user_folder = $user->id.$user->first_name;
        $this->data['u_folder'] = $user_folder;
        $f_marital = array("is_deleted" => 0);
        $q_marital = GetAll('marital',$f_marital);
        $this->data['marital'] = ($q_marital->num_rows() > 0 ) ? $q_marital : array();
        
        $this->_render_page('person/detail', $this->data);
        }
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

            if(in_array($view, array('person/index')))
            {
                $this->template->set_layout('default');

                $this->template->add_js('jquery-ui-1.10.1.custom.min.js');
                $this->template->add_js('jquery.sidr.min.js');
                $this->template->add_js('breakpoints.js');
                $this->template->add_js('select2.min.js');
                $this->template->add_js('person.js');
                $this->template->add_js('core.js');
                
                $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                $this->template->add_css('plugins/select2/select2.css');
            }elseif(in_array($view, array('person/detail')))
            {
                $this->template->set_layout('default');

                $this->template->add_js('jquery-ui-1.10.1.custom.min.js');
                $this->template->add_js('jquery.sidr.min.js');
                $this->template->add_js('breakpoints.js');
                $this->template->add_js('select2.min.js');
                $this->template->add_js('persondetail.js');
                $this->template->add_js('core.js');
                $this->template->add_js('bootstrap-datepicker.js');
                $this->template->add_js('jquery.animateNumbers.js');
                $this->template->add_js('jqueryblockui.js');

                $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                $this->template->add_css('plugins/select2/select2.css');
                $this->template->add_css('datepicker.css');
            }

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
