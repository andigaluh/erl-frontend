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
        $this->load->model('person_model');
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
        $user_emp = $this->person_model->getUserEmp($id)->row();
        $user_course = $this->person_model->getUserCourse($id)->row();
        $sess_id = $this->session->userdata('user_id');
        
        $data = array(
                'first_name'            => $this->input->post('first_name'),
                'last_name'             => $this->input->post('last_name'),
                'bod'                   => date('Y-m-d',strtotime($this->input->post('bod'))),
                'marital_id'            => $this->input->post('marital_id'),
                'business_unit_id'      => $this->input->post('business_unit_id'),
                'phone'                 => $this->input->post('phone'),
                'prev_email'            => $this->input->post('prev_email'),
                'bb_pin'                => $this->input->post('bb_pin'),
            );

        $data2 = array(
                'seniority_date'        => date('Y-m-d',strtotime($this->input->post('seniority_date'))),
                'position_id'           => $this->input->post('position_id'),
                'empl_status_id'        => $this->input->post('empl_status_id'),
                'employee_status_id'    => $this->input->post('employee_status_id'),
                'cost_center'           => $this->input->post('cost_center'),
                'position_group_id'     => $this->input->post('position_group_id'),
                'grade_id'              => $this->input->post('grade_id'),
                'resign_reason_id'      => $this->input->post('resign_reason_id'),
                'active_inactive_id'    => $this->input->post('active_inactive_id'),
                'edited_by'             => $sess_id,
                'edited_on'             => date('Y-m-d',strtotime('now'))
            );

        

        $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('bod', $this->lang->line('edit_user_validation_bod_label'), 'required|xss_clean');
        $this->form_validation->set_rules('business_unit_id', $this->lang->line('edit_user_validation_business_unit_id_label'), 'required|xss_clean');
        $this->form_validation->set_rules('marital_id', $this->lang->line('edit_user_validation_marital_label'), 'required|xss_clean');
        $this->form_validation->set_rules('phone', 'phone', 'xss_clean|numeric');
        $this->form_validation->set_rules('prev_email', 'prev_email', 'xss_clean|valid_email');
        $this->form_validation->set_rules('seniority_date', 'seniority_date', 'required|xss_clean');
        $this->form_validation->set_rules('position_id', 'position_id', 'required|xss_clean');
        $this->form_validation->set_rules('empl_status_id', 'empl_status_id', 'required|xss_clean');
        $this->form_validation->set_rules('employee_status_id', 'employee_status_id', 'required|xss_clean');
        $this->form_validation->set_rules('cost_center', 'cost center', 'xss_clean');
        $this->form_validation->set_rules('position_group_id', 'position_group_id', 'required|xss_clean');
        $this->form_validation->set_rules('grade_id', 'grade_id', 'required|xss_clean');
        $this->form_validation->set_rules('resign_reason_id', 'resign_reason_id', 'required|xss_clean');
        $this->form_validation->set_rules('active_inactive_id', 'active_inactive_id', 'required|xss_clean');

        if ($this->form_validation->run() === TRUE)
            {               
                //check to see if we are creating the user            
                $this->ion_auth->update($user->id, $data);
                $this->person_model->updateUserEmp($user->id, $data2);
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

        $this->data['seniority_date'] = array(
            'name'  => 'seniority_date',
            'id'    => 'seniority_date',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('seniority_date', $user_emp->seniority_date),
        );


        $this->data['cost_center'] = array(
            'name'  => 'cost_center',
            'id'    => 'cost_center',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('cost_center', $user_emp->cost_center),
        );

        $this->data['phone'] = array(
            'name'  => 'phone',
            'id'    => 'phone',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('phone', $user->phone),
        );

        $this->data['prev_email'] = array(
            'name'  => 'prev_email',
            'id'    => 'prev_email',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('prev_email', $user->previous_email),
        );

        $this->data['bb_pin'] = array(
            'name'  => 'bb_pin',
            'id'    => 'bb_pin',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('bb_pin', $user->bb_pin),
        );
        
        $this->data['marital_id'] = $this->form_validation->set_value('marital_id', $user->marital_id);
        $f_marital = array("is_deleted" => 0);
        $q_marital = GetAll('marital',$f_marital);
        $this->data['marital'] = ($q_marital->num_rows() > 0 ) ? $q_marital : array();

        $this->data['s_photo'] = $this->form_validation->set_value('photo', $user->photo);
        $user_folder = $user->id.$user->first_name;
        $this->data['u_folder'] = $user_folder;


        $this->data['position_id'] = $this->form_validation->set_value('position_id', $user_emp->position_id);
        $position = GetAll('position');
        $this->data['position'] = ($position->num_rows() > 0 ) ? $position : array();

        $this->data['empl_status_id'] = $this->form_validation->set_value('empl_status_id', $user_emp->empl_status_id);
        $position = GetAll('empl_status');
        $this->data['empl_status'] = ($position->num_rows() > 0 ) ? $position : array();

        $this->data['employee_status_id'] = $this->form_validation->set_value('employee_status_id', $user_emp->employee_status_id);
        $position = GetAll('employee_status');
        $this->data['employee_status'] = ($position->num_rows() > 0 ) ? $position : array();

        $this->data['position_group_id'] = $this->form_validation->set_value('position_group_id', $user_emp->position_group_id);
        $position = GetAll('position_group');
        $this->data['position_group'] = ($position->num_rows() > 0 ) ? $position : array();

        $this->data['grade_id'] = $this->form_validation->set_value('grade_id', $user_emp->grade_id);
        $position = GetAll('grade');
        $this->data['grade'] = ($position->num_rows() > 0 ) ? $position : array();

        $this->data['resign_reason_id'] = $this->form_validation->set_value('resign_reason_id', $user_emp->resign_reason_id);
        $position = GetAll('resign_reason');
        $this->data['resign_reason'] = ($position->num_rows() > 0 ) ? $position : array();

        $this->data['active_inactive_id'] = $this->form_validation->set_value('active_inactive_id', $user_emp->active_inactive_id);
        $position = GetAll('active_inactive');
        $this->data['active_inactive'] = ($position->num_rows() > 0 ) ? $position : array();


        //Company Sponsor Course Tab

        $this->data['user_course'] = GetAll('users_course');

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
