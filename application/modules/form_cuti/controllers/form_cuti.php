<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Form_cuti extends MX_Controller {

	public $data;

    function __construct()
    {
        parent::__construct();
        $this->load->library('authentication', NULL, 'ion_auth');
        $this->load->library('form_validation');
        $this->load->helper('url');
        
        $this->load->database();
        $this->load->model('form_cuti/form_cuti_model','form_cuti_model');
        
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
            $ftitle_post = (strlen($ftitle_re) > 0) ? array('form_cuti.title'=>$ftitle_re) : array() ;
            
            //set default limit in var $config['list_limit'] at application/config/ion_auth.php 
            $this->data['limit'] = $limit = (strlen($this->input->post('limit')) > 0) ? $this->input->post('limit') : 10 ;

            $this->data['offset'] = 6;

            //list of filterize all form_cuti  
            $this->data['form_cuti_all'] = $this->form_cuti_model->like($ftitle_post)->where('is_deleted',0)->form_cuti()->result();
            
            $this->data['num_rows_all'] = $this->form_cuti_model->like($ftitle_post)->where('is_deleted',0)->form_cuti()->num_rows();

            //list of filterize limit form_cuti for pagination  
            $this->data['form_cuti'] = $this->form_cuti_model->like($ftitle_post)->where('is_deleted',0)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->form_cuti()->result();

            $this->data['_num_rows'] = $this->form_cuti_model->like($ftitle_post)->where('is_deleted',0)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->form_cuti()->num_rows();

            $this->_render_page('form_cuti/index', $this->data);
        }
    }

    function input($ftitle = "fn:",$sort_by = "id", $sort_order = "asc", $offset = 0)
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

            $this->data['user_info'] = $this->form_cuti_model->where('users.id',$user_id)->form_cuti_input()->result();

            //get user org_id
            $data_result = $this->form_cuti_model->where('users.id',$user_id)->get_org_id()->result();
            foreach ($data_result as $dr) {
                $org_id = $dr->organization_id;
            }

            // form cuti yang akan diambil
            $this->data['comp_session'] = $this->form_cuti_model->render_session()->result();
            $this->data['alasan_cuti'] = $this->form_cuti_model->render_alasan()->result();
            $this->data['user_pengganti'] = $this->form_cuti_model->where('users_employement.organization_id',$org_id)->render_pengganti()->result();

            $this->data['_num_rows'] = $this->form_cuti_model->where('users.id',$user_id)->form_cuti_input()->num_rows();

            $this->_render_page('form_cuti/input', $this->data);
        }
    }

    function approval_spv($ftitle = "fn:",$sort_by = "id", $sort_order = "asc", $offset = 0)
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

            //get user_id
            $user_id = 1;

            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
           
            //set filter by title
            $this->data['ftitle_param'] = $ftitle; 
            $exp_ftitle = explode(":",$ftitle);
            $ftitle_re = str_replace("_", " ", $exp_ftitle[1]);
            $ftitle_post = (strlen($ftitle_re) > 0) ? array('form_cuti.title'=>$ftitle_re) : array() ;

            //list of filterize limit form_cuti for pagination  
            $cuti_details = $this->data['form_cuti'] = $this->form_cuti_model->like($ftitle_post)->where('users_cuti.id',$user_id)->form_cuti_supervisor()->result();

            $this->data['_num_rows'] = $this->form_cuti_model->like($ftitle_post)->where('users_cuti.id',$user_id)->form_cuti()->num_rows();

            //get user org_id
            $data_result = $this->form_cuti_model->where('users.id',$user_id)->get_org_id()->result();
            foreach ($data_result as $dr) {
                $org_id = $dr->organization_id;
            }

            foreach ($cuti_details as $cd) {
                $user_app_lv1 = $cd->user_app_lv1;
                $user_app_lv2 = $cd->user_app_lv2;
                $user_app_lv3 = $cd->user_app_lv3;
            }

            //get app user name
            $nm_app_lv1 = $this->form_cuti_model->where('users.id',$user_app_lv1)->get_user()->result();
            $nm_app_lv2 = $this->form_cuti_model->where('users.id',$user_app_lv2)->get_user()->result();
            $nm_app_lv3 = $this->form_cuti_model->where('users.id',$user_app_lv3)->get_user()->result();
            foreach ($nm_app_lv1 as $nmlv1) {
                $this->data['nm_app_lv1'] = $nmlv1->first_name." ".$nmlv1->last_name;
            }
            foreach ($nm_app_lv2 as $nmlv2) {
                $this->data['nm_app_lv2'] = $nmlv2->first_name." ".$nmlv2->last_name;
            }
            foreach ($nm_app_lv3 as $nmlv3) {
                $this->data['nm_app_lv3'] = $nmlv3->first_name." ".$nmlv3->last_name;
            }

             //render data
            $this->data['alasan_cuti'] = $this->form_cuti_model->render_alasan()->result();
            $this->data['user_pengganti'] = $this->form_cuti_model->where('users_employement.organization_id',$org_id)->render_pengganti()->result();

            $this->_render_page('form_cuti/approval/supervisor', $this->data);
        }
    }

    function approval_kbg($ftitle = "fn:",$sort_by = "id", $sort_order = "asc", $offset = 0)
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

            //get user_id
            $user_id = 1;

            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');


            //set filter by title
            $this->data['ftitle_param'] = $ftitle; 
            $exp_ftitle = explode(":",$ftitle);
            $ftitle_re = str_replace("_", " ", $exp_ftitle[1]);
            $ftitle_post = (strlen($ftitle_re) > 0) ? array('form_cuti.title'=>$ftitle_re) : array() ;

            //list of filterize limit form_cuti for pagination  
            $cuti_details = $this->data['form_cuti'] = $this->form_cuti_model->like($ftitle_post)->where('users_cuti.id',1)->form_cuti_supervisor()->result();

            $this->data['_num_rows'] = $this->form_cuti_model->like($ftitle_post)->where('users_cuti.id',1)->form_cuti()->num_rows();

            //get user org_id
            $data_result = $this->form_cuti_model->where('users.id',$user_id)->get_org_id()->result();
            foreach ($data_result as $dr) {
                $org_id = $dr->organization_id;
            }

            foreach ($cuti_details as $cd) {
                $user_app_lv1 = $cd->user_app_lv1;
                $user_app_lv2 = $cd->user_app_lv2;
                $user_app_lv3 = $cd->user_app_lv3;
            }

            //get app user name
            $nm_app_lv1 = $this->form_cuti_model->where('users.id',$user_app_lv1)->get_user()->result();
            $nm_app_lv2 = $this->form_cuti_model->where('users.id',$user_app_lv2)->get_user()->result();
            $nm_app_lv3 = $this->form_cuti_model->where('users.id',$user_app_lv3)->get_user()->result();
            foreach ($nm_app_lv1 as $nmlv1) {
                $this->data['nm_app_lv1'] = $nmlv1->first_name." ".$nmlv1->last_name;
            }
            foreach ($nm_app_lv2 as $nmlv2) {
                $this->data['nm_app_lv2'] = $nmlv2->first_name." ".$nmlv2->last_name;
            }
            foreach ($nm_app_lv3 as $nmlv3) {
                $this->data['nm_app_lv3'] = $nmlv3->first_name." ".$nmlv3->last_name;
            }

            //render data
            $this->data['alasan_cuti'] = $this->form_cuti_model->render_alasan()->result();
            $this->data['user_pengganti'] = $this->form_cuti_model->where('users_employement.organization_id',$org_id)->render_pengganti()->result();

            $this->_render_page('form_cuti/approval/kabagian', $this->data);
        }
    }

    function approval_hr($ftitle = "fn:",$sort_by = "id", $sort_order = "asc", $offset = 0)
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

            //get user_id
            $user_id = 1;

            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');


            //set filter by title
            $this->data['ftitle_param'] = $ftitle; 
            $exp_ftitle = explode(":",$ftitle);
            $ftitle_re = str_replace("_", " ", $exp_ftitle[1]);
            $ftitle_post = (strlen($ftitle_re) > 0) ? array('form_cuti.title'=>$ftitle_re) : array() ;

            //list of filterize limit form_cuti for pagination  
            $cuti_details = $this->data['form_cuti'] = $this->form_cuti_model->like($ftitle_post)->where('users_cuti.id',1)->form_cuti_supervisor()->result();

            $this->data['_num_rows'] = $this->form_cuti_model->like($ftitle_post)->where('users_cuti.id',1)->form_cuti()->num_rows();

            //get user org_id
            $data_result = $this->form_cuti_model->where('users.id',$user_id)->get_org_id()->result();
            foreach ($data_result as $dr) {
                $org_id = $dr->organization_id;
            }

            foreach ($cuti_details as $cd) {
                $user_app_lv1 = $cd->user_app_lv1;
                $user_app_lv2 = $cd->user_app_lv2;
                $user_app_lv3 = $cd->user_app_lv3;
            }

            //get app user name
            $nm_app_lv1 = $this->form_cuti_model->where('users.id',$user_app_lv1)->get_user()->result();
            $nm_app_lv2 = $this->form_cuti_model->where('users.id',$user_app_lv2)->get_user()->result();
            $nm_app_lv3 = $this->form_cuti_model->where('users.id',$user_app_lv3)->get_user()->result();
            foreach ($nm_app_lv1 as $nmlv1) {
                $this->data['nm_app_lv1'] = $nmlv1->first_name." ".$nmlv1->last_name;
            }
            foreach ($nm_app_lv2 as $nmlv2) {
                $this->data['nm_app_lv2'] = $nmlv2->first_name." ".$nmlv2->last_name;
            }
            foreach ($nm_app_lv3 as $nmlv3) {
                $this->data['nm_app_lv3'] = $nmlv3->first_name." ".$nmlv3->last_name;
            }

            //render data
            $this->data['alasan_cuti'] = $this->form_cuti_model->render_alasan()->result();
            $this->data['user_pengganti'] = $this->form_cuti_model->where('users_employement.organization_id',$org_id)->render_pengganti()->result();

            $this->_render_page('form_cuti/approval/hr', $this->data);
        }
    }

    public function add()
    {

        $this->form_validation->set_rules('start_cuti', 'Tanggal Mulai Cuti', 'trim|required');
        $this->form_validation->set_rules('end_cuti', 'Tanggal Terakhir Cuti', 'trim|required');
        $this->form_validation->set_rules('alasan_cuti', 'Alasan Cuti', 'trim|required');
        $this->form_validation->set_rules('user_pengganti', 'User Pengganti', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat Cuti', 'trim|required');
        
        if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('st'=>0, 'errors'=>validation_errors('<div class="alert alert-danger" role="alert">', '</div>')));
        }
        else
        {
            $user_id    = $this->input->post('user_id');

            $start_cuti = $this->input->post('start_cuti');
            $end_cuti = $this->input->post('end_cuti');

            $year_now = date('Y');
            $comp_session_now_arr = $this->form_cuti_model->where('comp_session.year',$year_now)->render_session()->result();
            foreach ($comp_session_now_arr as $csn) {
                $comp_session_now = $csn->id;
            }

            $additional_data = array(
                'id_comp_session'       => $comp_session_now,
                'date_mulai_cuti'       => date('Y-m-d', strtotime($this->input->post('start_cuti'))),
                'date_selesai_cuti'     => date('Y-m-d', strtotime($this->input->post('end_cuti'))),
                'jumlah_hari'           => $this->input->post('jml_cuti'),
                'alasan_cuti_id'        => $this->input->post('alasan_cuti'),
                'user_pengganti'        => $this->input->post('user_pengganti'),
                'alamat_cuti'           => $this->input->post('alamat'),
                'created_on'            => date('Y-m-d',strtotime('now')),
                'created_by'            => $this->session->userdata('user_id')
            );

            if ($this->form_validation->run() == true && $this->form_cuti_model->create_($user_id,$additional_data))
            {
                $this->index();   
            }
        }
    }

    public function do_approve_spv()
    {
        $user_id = $this->session->userdata('user_id');
        $date_now = date('Y-m-d');
        $cuti_id = $this->input->post('cuti_id');

        $additional_data = array(
        'is_app_lv1' => 1,
        'note_app_lv1' => $this->input->post('notes'), 
        'user_app_lv1' => $user_id, 
        'date_app_lv1' => $date_now);


       if ($this->form_cuti_model->update($cuti_id,$additional_data)) {
           return TRUE;
       }
    }

    public function do_approve_kbg()
    {
        $user_id = $this->session->userdata('user_id');
        $date_now = date('Y-m-d');
        $cuti_id = $this->input->post('cuti_id');

        $additional_data = array(
        'is_app_lv2' => 1,
        'note_app_lv2' => $this->input->post('notes'), 
        'user_app_lv2' => $user_id, 
        'date_app_lv2' => $date_now);


       if ($this->form_cuti_model->update($cuti_id,$additional_data)) {
           return TRUE;
       }
    }

    public function do_approve_hr()
    {
        $user_id = $this->session->userdata('user_id');
        $date_now = date('Y-m-d');
        $cuti_id = $this->input->post('cuti_id');

        $additional_data = array(
        'is_app_lv3' => 1,
        'user_app_lv3' => $user_id, 
        'date_app_lv3' => $date_now);

       if ($this->form_cuti_model->update($cuti_id,$additional_data)) {
           return TRUE;
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
        $data = (empty($data)) ? $this->data : $data;
        if ( ! $render)
        {
            $this->load->library('template');

                if(in_array($view, array('form_cuti/index')))
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
                    $this->template->add_js('form_cuti.js');

                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    $this->template->add_css('plugins/select2/select2.css');
                    
                }
                elseif(in_array($view, array('form_cuti/input')))
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
                    $this->template->add_js('bootstrap-timepicker.js');
                    $this->template->add_js('form_cuti.js');
                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    $this->template->add_css('plugins/select2/select2.css');
                    $this->template->add_css('datepicker.css');
                    $this->template->add_css('bootstrap-timepicker.css');
                     
                }elseif(in_array($view, array('form_cuti/approval/supervisor',
                                              'form_cuti/approval/kabagian',
                                              'form_cuti/approval/hr')))
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
                    $this->template->add_js('form_cuti.js');

                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    $this->template->add_css('plugins/select2/select2.css');
                    
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

/* End of file form_cuti.php */
/* Location: ./application/modules/form_cuti/controllers/form_cuti.php */