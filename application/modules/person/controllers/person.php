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
        $user = $this->person_model->getUsers($id)->row();
        $user_emp = $this->person_model->getUserEmp($id)->row();
        $user_course = $this->person_model->getUserCourse($id);
        $user_certificate= $this->person_model->getUserCertificate($id);
        $user_education=$this->person_model->getUserEducation($id);
        $user_exp=$this->person_model->getUserexperience($id);
        $user_sk=$this->person_model->getUserSk($id);
        $user_sti=$this->person_model->getUserSti($id);
        $user_jabatan = $this->person_model->getUserJabatan($id);
        $user_award = $this->person_model->getUserAward($id);
        $user_ikatan = $this->person_model->getUserIkatanDinas($id);

        //employee identity
        $this->data['nik'] = (!empty($user->nik)) ? $user->nik : '-';
        $this->data['bod'] = (!empty($user->bod)) ? $user->bod : '-';
        $this->data['first_name'] = (!empty($user->first_name)) ? $user->first_name : '';
        $this->data['last_name'] = (!empty($user->last_name)) ? $user->last_name : '';
        $this->data['business_unit'] = (!empty($user->organization_title)) ? $user->organization_title : '';
        $this->data['marital'] = (!empty($user->marital_title)) ? $user->marital_title : '';
        $this->data['phone'] = (!empty($user->phone)) ? $user->phone : '';
        $this->data['email'] = (!empty($user->email)) ? $user->email : '';
        $this->data['previous_email'] = (!empty($user->previous_email)) ? $user->previous_email : '';
        $this->data['bb_pin'] = (!empty($user->bb_pin)) ? $user->bb_pin : ''; 
        $this->data['photo'] = (!empty($user->photo)) ? $user->photo : ''; 
        $user_folder = $user->id.$user->first_name;
        $this->data['u_folder'] = $user_folder;

        //employement
        $this->data['seniority_date'] = (!empty($user_emp->seniority_date)) ? $user_emp->seniority_date : '-';
        $this->data['position'] = (!empty($user_emp->position)) ? $user_emp->position : '-';
        $this->data['empl_status'] = (!empty($user_emp->empl_status)) ? $user_emp->empl_status : '-';
        $this->data['employee_status'] = (!empty($user_emp->employee_status)) ? $user_emp->employee_status : '-';
        $this->data['cost_center'] = (!empty($user_emp->cost_center)) ? $user_emp->cost_center : '-';
        $this->data['position_group'] = (!empty($user_emp->position_group)) ? $user_emp->position_group : '-';
        $this->data['grade'] = (!empty($user_emp->grade)) ? $user_emp->grade : '-';
        $this->data['resign_reason'] = (!empty($user_emp->resign_reason)) ? $user_emp->resign_reason : '-';
        $this->data['active_inactive'] = (!empty($user_emp->active_inactive)) ? $user_emp->active_inactive : '-';
	
	$this->data['s_photo'] = $this->form_validation->set_value('photo', $user->photo);
        $user_folder = $user->id.$user->first_name;
        $this->data['u_folder'] = $user_folder;
		
        //Company Sponsor Course Tab
         $this->data['user_course'] = $user_course;

        //Certificate Tab
        $this->data['user_certificate'] = $user_certificate;

        //Education Tab
        $this->data['user_education'] = $user_education;

        //Experience Tab
        $this->data['user_exp'] = $user_exp;

        //SuraKeputusan Tab
        $this->data['user_sk'] = $user_sk;

        $this->data['user_sti'] = $user_sti;

        $this->data['user_jabatan'] = $user_jabatan;

        $this->data['user_award'] = $user_award;

        $this->data['user_ikatan'] = $user_ikatan;

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
