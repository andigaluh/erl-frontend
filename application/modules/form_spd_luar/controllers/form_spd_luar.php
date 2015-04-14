<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Form_spd_luar extends MX_Controller {

	public $data;

    function __construct()
    {
        parent::__construct();
        $this->load->library('authentication', NULL, 'ion_auth');
        $this->load->library('form_validation');
        $this->load->helper('url');
        
        $this->load->database();
        $this->load->model('form_spd_luar/form_spd_luar_model','form_spd_luar_model');
        
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->helper('language');
    }

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
            $ftitle_post = (strlen($ftitle_re) > 0) ? array('form_spd_luar.title'=>$ftitle_re) : array() ;
            
            //set default limit in var $config['list_limit'] at application/config/ion_auth.php 
            $this->data['limit'] = $limit = (strlen($this->input->post('limit')) > 0) ? $this->input->post('limit') : 10 ;

            $this->data['offset'] = 6;

            //list of filterize all form_spd_luar  
            $this->data['form_spd_luar_all'] = $this->form_spd_luar_model->like($ftitle_post)->where('users_spd_luar.is_deleted',0)->form_spd_luar()->result();
            
            $this->data['num_rows_all'] = $this->form_spd_luar_model->like($ftitle_post)->where('users_spd_luar.is_deleted',0)->form_spd_luar()->num_rows();

            //list of filterize limit form_spd_luar for pagination  
            $this->data['form_spd_luar'] = $this->form_spd_luar_model->like($ftitle_post)->where('users_spd_luar.is_deleted',0)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->form_spd_luar()->result();

            $this->data['_num_rows'] = $this->form_spd_luar_model->like($ftitle_post)->where('users_spd_luar.is_deleted',0)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->form_spd_luar()->num_rows();

            $this->_render_page('form_spd_luar/index', $this->data);
        }
    }

    function submit($id=0)
    {
        $user_id = $this->session->userdata('user_id');
        if ($id == 0) {
            $task_id = $this->uri->segment(3);
        }else{
            $task_id = $id;
        }
    
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

            $data_result = $this->data['task_detail'] = $this->form_spd_luar_model->where('users_spd_luar.id',$task_id)->form_spd_luar()->result();
            $this->data['td_num_rows'] = $this->form_spd_luar_model->where('users_spd_luar.id',$task_id)->form_spd_luar()->num_rows();

            //get task creator id
            foreach ($data_result as $dr) {
                $created_by_id = $dr->created_by;
                $receiver_user_id = $dr->user_id;
                $transportation_id = $dr->transportation_id;
                $from_city_id = $dr->from_city_id;
                $to_city_id = $dr->to_city_id;
            }

            //get task creator name
            $query_result = $this->form_spd_luar_model->where('users.id',$created_by_id)->get_emp_detail()->result();
            foreach ($query_result as $qr) {
                $this->data['task_creator_nm'] = $qr->first_name." ".$qr->last_name;
            }

            $this->data['task_receiver_nm'] = $receiver_user_id;

            //get tast receiver name
            $query_result = $this->form_spd_luar_model->where('users.id',$receiver_user_id)->get_emp_detail()->result();
            foreach ($query_result as $qr) {
                $this->data['task_receiver_nm'] = $qr->first_name." ".$qr->last_name;
                $this->data['organization_title'] = $qr->organization_title;
                $this->data['position_title'] = $qr->position_title;
            }

            //get transportation name
            $query_result = $this->form_spd_luar_model->where('id',$transportation_id)->get_transportation()->result();
            foreach ($query_result as $qr) {
                $this->data['transportation_nm'] = $qr->title;
            }
            //render transportation
            $this->data['transportation_list'] = $this->form_spd_luar_model->get_transportation()->result();
            $this->data['tl_num_rows'] = $this->form_spd_luar_model->get_transportation()->num_rows();


            //get city name
            $query_result = $this->form_spd_luar_model->where('id',$from_city_id)->get_city()->result();
            foreach ($query_result as $qr) {
                $this->data['from_city_nm'] = $qr->title;
            }
            $query_result = $this->form_spd_luar_model->where('id',$to_city_id)->get_city()->result();
            foreach ($query_result as $qr) {
                $this->data['to_city_nm'] = $qr->title;
            }

            //get task creator detail
            $this->data['task_creator'] = $this->form_spd_luar_model->where('users.id',$created_by_id)->get_emp_detail()->result();
            $this->data['tc_num_rows'] = $this->form_spd_luar_model->where('users.id',$created_by_id)->get_emp_detail()->num_rows();
            $this->data['task_receiver'] = $this->form_spd_luar_model->where('users.id',$receiver_user_id)->get_emp_detail()->result();
            $this->data['tr_num_rows'] = $this->form_spd_luar_model->where('users.id',$receiver_user_id)->get_emp_detail()->num_rows();

            //get user org_id
            $data_result = $this->form_spd_luar_model->where('users.id',$user_id)->get_org_id()->result();
            foreach ($data_result as $dr) {
                $org_id = $dr->organization_id;
            }

            // render employee
            $this->data['employee_list'] = $this->form_spd_luar_model->where('users_employement.organization_id',$org_id)->render_emp()->result();
            $this->data['el_num_rows'] = $this->form_spd_luar_model->where('users_employement.organization_id',$org_id)->render_emp()->num_rows();


            // render city
            $this->data['city_list'] = $this->form_spd_luar_model->get_city()->result();
            $this->data['cl_num_rows'] = $this->form_spd_luar_model->get_city()->num_rows();
            


            $this->_render_page('form_spd_luar/submit', $this->data);
        }
    }

    public function do_submit()
    {
        $user_id = $this->session->userdata('user_id');
        $date_now = date('Y-m-d');
        $spd_id = $this->input->post('spd_id');

        $additional_data = array(
        'is_submit' => 1,  
        'date_submit' => $date_now);

       if ($this->form_spd_luar_model->update($spd_id,$additional_data)) {
        redirect('form_spd_luar/submit/'.$spd_id,'refresh');
       }
    }

    public function update()
    {
        $user_id = $this->session->userdata('user_id');
        $date_now = date('Y-m-d');
        $spd_id = $this->input->post('spd_id');
        $date_spd = date('Y-m-d',strtotime($this->input->post('date_spd')));

        $additional_data = array(
            'title'   => $this->input->post('title'),
            'from_city_id' => $this->input->post('city_from'),
            'to_city_id'   => $this->input->post('city_to'),
            'transportation_id' => $this->input->post('vehicle'),
            'date_spd'          => $date_spd,
            'edited_on'         => $date_now,
            'edited_by'         => $user_id 
        );

        //print_r($additional_data);

       if ($this->form_spd_luar_model->update($spd_id,$additional_data)) {
        redirect('form_spd_luar/submit/'.$spd_id,'refresh');
       }
    }

    public function input()
    {
        $user_id = $this->session->userdata('user_id');

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

            //get task creator name
            $query_result = $this->form_spd_luar_model->where('users.id',$user_id)->get_emp_detail()->result();
            foreach ($query_result as $qr) {
                $this->data['task_creator_nm'] = $qr->first_name." ".$qr->last_name;
            }

            //get user org_id
            $data_result = $this->form_spd_luar_model->where('users.id',$user_id)->get_org_id()->result();
            foreach ($data_result as $dr) {
                $org_id = $dr->organization_id;
            }

            //get tast receiver name
            $query_result = $this->form_spd_luar_model->where('users_employement.organization_id',$org_id)->get_emp_detail()->result();
            foreach ($query_result as $qr) {
                $this->data['task_receiver_nm'] = $qr->first_name." ".$qr->last_name;
            }

            //get task creator detail
            $this->data['task_creator'] = $this->form_spd_luar_model->where('users.id',$user_id)->get_emp_detail()->result();
            $this->data['tc_num_rows'] = $this->form_spd_luar_model->where('users.id',$user_id)->get_emp_detail()->num_rows();

            //get user org_id
            $data_result = $this->form_spd_luar_model->where('users.id',$user_id)->get_org_id()->result();
            foreach ($data_result as $dr) {
                $org_id = $dr->organization_id;
            }

             //render transportation
            $this->data['transportation_list'] = $this->form_spd_luar_model->get_transportation()->result();
            $this->data['tl_num_rows'] = $this->form_spd_luar_model->get_transportation()->num_rows();

            // render city
            $this->data['city_list'] = $this->form_spd_luar_model->get_city()->result();
            $this->data['cl_num_rows'] = $this->form_spd_luar_model->get_city()->num_rows();

            // render employee
            $this->data['employee_list'] = $this->form_spd_luar_model->where('users_employement.organization_id',$org_id)->render_emp()->result();
            $this->data['el_num_rows'] = $this->form_spd_luar_model->where('users_employement.organization_id',$org_id)->render_emp()->num_rows();

            $this->_render_page('form_spd_luar/input', $this->data);
        }
    }

    public function add()
    {

        $this->form_validation->set_rules('destination', 'Tujuan', 'trim|required');
        $this->form_validation->set_rules('title', 'Tanggal Terakhir Cuti', 'trim|required');
        $this->form_validation->set_rules('date_spd', 'Tanggal Berangkat', 'trim|required');
        $this->form_validation->set_rules('city_to', 'Kota Tujuan', 'trim|required');
        $this->form_validation->set_rules('city_from', 'Kota Asal', 'trim|required');
        $this->form_validation->set_rules('vehicle', 'Kendaraan', 'trim|required');
        
        if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('st'=>0, 'errors'=>validation_errors('<div class="alert alert-danger" role="alert">', '</div>')));
        }
        else
        {
            $user_id    = $this->input->post('emp_name');

            $additional_data = array(
                'title'                 => $this->input->post('title'),
                'destination'           => $this->input->post('destination'),
                'date_spd'              => date('Y-m-d', strtotime($this->input->post('date_spd'))),
                'from_city_id'          => $this->input->post('city_from'),
                'to_city_id'            => $this->input->post('city_to'),
                'transportation_id'     => $this->input->post('vehicle'),
                'created_on'            => date('Y-m-d',strtotime('now')),
                'created_by'            => $this->session->userdata('user_id')
            );

            if ($this->form_validation->run() == true && $this->form_spd_luar_model->create_($user_id,$additional_data))
            {
                $this->index();   
            }
        }
    }

    public function get_emp_org()
    {
        $id = $this->input->post('id');

        $data_result = $this->form_spd_luar_model->where('users.id',$id)->render_emp()->result();
            foreach ($data_result as $dr) {
                $org_nm = $dr->organization_title;
            }
        
        echo $org_nm;
    }

    public function get_emp_pos()
    {
        $id = $this->input->post('id');

        $data_result = $this->form_spd_luar_model->where('users.id',$id)->render_emp()->result();
            foreach ($data_result as $dr) {
                $pos_nm = $dr->position_title;
            }
        
        echo $pos_nm;
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
        $data = (empty($data)) ? $this->data : $data;
        if ( ! $render)
        {
            $this->load->library('template');

                if(in_array($view, array('form_spd_luar/index')))
                {
                    $this->template->set_layout('default');

                    $this->template->add_js('jquery.min.js');
                    $this->template->add_js('bootstrap.min.js');

                    $this->template->add_js('jquery-ui-1.10.1.custom.min.js');
                    $this->template->add_js('jquery.sidr.min.js');
                    $this->template->add_js('breakpoints.js');
                    $this->template->add_js('select2.min.js');

                    $this->template->add_js('core.js');
                    $this->template->add_js('purl.js');

                    $this->template->add_js('main.js');
                    $this->template->add_js('respond.min.js');

                    $this->template->add_js('jquery.bootstrap.wizard.min.js');
                    $this->template->add_js('jquery.validate.min.js');
                    $this->template->add_js('form_spd_luar_input.js');
                    $this->template->add_js('bootstrap-timepicker.js');

                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    $this->template->add_css('plugins/select2/select2.css');
                    
                }
                elseif(in_array($view, array('form_spd_luar/input')))
                {

                    $this->template->set_layout('default');

                    $this->template->add_js('jquery.min.js');
                    $this->template->add_js('bootstrap.min.js');

                    $this->template->add_js('jquery-ui-1.10.1.custom.min.js');
                    $this->template->add_js('jquery.sidr.min.js');
                    $this->template->add_js('breakpoints.js');
                    $this->template->add_js('select2.min.js');

                    $this->template->add_js('core.js');
                    $this->template->add_js('purl.js');

                    $this->template->add_js('main.js');
                    $this->template->add_js('respond.min.js');

                    $this->template->add_js('jquery.bootstrap.wizard.min.js');
                    $this->template->add_js('jquery.validate.min.js');
                    $this->template->add_js('bootstrap-datepicker.js');
                    $this->template->add_js('jquery.slimscroll.js');
                    $this->template->add_js('bootstrap-timepicker.js');
                    $this->template->add_js('form_spd_luar_input.js');
                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    $this->template->add_css('plugins/select2/select2.css');
                    $this->template->add_css('datepicker.css');
                    $this->template->add_css('bootstrap-timepicker.css');
                     
                }
                elseif(in_array($view, array('form_spd_luar/submit')))
                {

                    $this->template->set_layout('default');

                    $this->template->add_js('jquery.min.js');
                    $this->template->add_js('bootstrap.min.js');

                    $this->template->add_js('jquery-ui-1.10.1.custom.min.js');
                    $this->template->add_js('jquery.sidr.min.js');
                    $this->template->add_js('breakpoints.js');
                    $this->template->add_js('select2.min.js');

                    $this->template->add_js('core.js');
                    $this->template->add_js('purl.js');

                    $this->template->add_js('main.js');
                    $this->template->add_js('respond.min.js');

                    $this->template->add_js('jquery.bootstrap.wizard.min.js');
                    $this->template->add_js('jquery.validate.min.js');
                    $this->template->add_js('bootstrap-datepicker.js');
                    $this->template->add_js('jquery.slimscroll.js');
                    $this->template->add_js('bootstrap-timepicker.js');
                    $this->template->add_js('form_spd_luar_submit.js');
                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    $this->template->add_css('plugins/select2/select2.css');
                    $this->template->add_css('datepicker.css');
                    $this->template->add_css('bootstrap-timepicker.css');
                     
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

/* End of file form_spd_luar.php */
/* Location: ./application/modules/form_spd_luar/controllers/form_spd_luar.php */