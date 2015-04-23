<?php defined('BASEPATH') OR exit('No direct script access allowed');

class form_training extends MX_Controller {

  public $data;
    function __construct()
    {
        parent::__construct();
        $this->load->library('authentication', NULL, 'ion_auth');
        $this->load->library('form_validation');
        $this->load->helper('url');
        
        $this->load->database();
    $this->load->model('person/person_model','person_model');
        $this->load->model('form_training/form_training_model','form_training_model');
        
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->helper('language');
        
    }

    function index()
    {
        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else
        {
            if(is_admin()){
                $form_training = $this->data['form_training'] = $this->form_training_model->form_training_admin();
            }else{
                $form_training = $this->data['form_training'] = $this->form_training_model->form_training();
            }
            $this->_render_page('form_training/index', $this->data);
        }
    }

    function detail($id)
    {
        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else
        {
            $form_training = $this->data['form_training'] = $this->form_training_model->form_training($id);
            $user_id = $this->db->select('user_id')->where('id', $id)->get('users_training')->row('user_id');
            
            $this->get_user_info($user_id);
            $this->_render_page('form_training/detail', $this->data);
        }
    }

    function input()
    {
        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }

        $sess_id = $this->session->userdata('user_id');
        

        $this->data['user_name'] = $this->form_training_model->get_app_name($sess_id);
        $form_training = $this->data['training'] = $this->form_training_model->form_training($sess_id);

        $this->get_user_info($sess_id);


        $this->_render_page('form_training/input', $this->data);
    }

    function add()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            $this->form_validation->set_rules('training_name', 'Nama Program Pelatihan', 'trim|required');
            $this->form_validation->set_rules('tujuan_training', 'Tujuan Pelatihan', 'trim|required');

            if($this->form_validation->run() == FALSE)
            {
            echo json_encode(array('st'=>0, 'errors'=>validation_errors('<div class="alert alert-danger" role="alert">', '</div>')));
            }
            else
            {
                $user_id= $this->session->userdata('user_id');

                $data = array(
                    'user_id' => $user_id,
                    'id_comp_session' => 1,
                    'training_name' => $this->input->post('training_name'),
                    'tujuan_training' => $this->input->post('tujuan_training'),
                    'created_on'            => date('Y-m-d',strtotime('now')),
                    'created_by'            => $user_id
                    );

                    if ($this->form_validation->run() == true && $this->form_training_model->add($data))
                    {
                         echo json_encode(array('st' =>1));     
                    }
            }

        }
    }

    function approval_spv($id)
    {
        $sess_id = $this->session->userdata('user_id');
        $user_training_id = $this->db->select('user_id')->from('users_keterangan_absen')->where('id', $id)->get()->row('user_id');
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        elseif(is_authorized($sess_id, $user_training_id) == FALSE)
        {

            return show_error('You do not have authorization to view this page.');
        }
        else
        {
            $user_id = $this->db->select('user_id')->where('id', $id)->get('users_training')->row('user_id');
            
            $this->get_user_info($user_id);
            $form_training = $this->data['form_training'] = $this->form_training_model->form_training($id);
            if($form_training->num_rows>0){
                $this->get_app_name($id);
            }
        }

        $this->_render_page('form_training/approval/supervisor', $this->data);
    }

    function approval_hrd($id)
    {
        $sess_id = $this->session->userdata('user_id');
        $user_training_id = $this->db->select('user_id')->from('users_keterangan_absen')->where('id', $id)->get()->row('user_id');
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        elseif(is_authorized($sess_id, $user_training_id) == FALSE)
        {

            return show_error('You do not have authorization to view this page.');
        }
        else
        {
            $user_id = $this->db->select('user_id')->where('id', $id)->get('users_training')->row('user_id');
            
            $this->get_user_info($user_id);
            $form_training = $this->data['form_training'] = $this->form_training_model->form_training($id);
            $this->data['penyelenggara'] = GetAll('penyelenggara');
            $this->data['pembiayaan'] = GetAll('pembiayaan');
            if($form_training->num_rows>0){
                $this->get_app_name($id);
            }
        }

        $this->_render_page('form_training/approval/hrd', $this->data);
    }

    function do_approve_spv($id)
    {
        $user_id = $this->session->userdata('user_id');
        $date_now = date('Y-m-d');

        $data = array(
        'is_app_lv1' => 1, 
        'user_app_lv1' => $user_id, 
        'date_app_lv1' => $date_now);


       if ($this->form_training_model->update($id,$data)) {
           return TRUE;
       }
    }

    function do_approve_hrd($id)
    {
        $user_id = $this->session->userdata('user_id');
        $date_now = date('Y-m-d');

        $data = array(
        'penyelenggara_id' => $this->input->post('penyelenggara'),
        'pembiayaan_id' => $this->input->post('pembiayaan'),
        'besar_biaya' => $this->input->post('besar_biaya'),
        'tempat' => $this->input->post('tempat'),
        'tanggal'=> date('Y-m-d',strtotime($this->input->post('tanggal'))),
        'jam'   => $this->input->post('jam'),
        'is_app_lv2' => 1, 
        'user_app_lv2' => $user_id, 
        'date_app_lv2' => $date_now);


       if ($this->form_training_model->update($id,$data)) {
           return TRUE;
       }
    }

    public function getTable()
    {
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('id', 'title', 'user_id');
        
        // DB table to use
        $sTable = 'users_course';
        //
    
        $iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $iSortingCols = $this->input->get_post('iSortingCols', true);
        $sSearch = $this->input->get_post('sSearch', true);
        $sEcho = $this->input->get_post('sEcho', true);
    
        // Paging
        if(isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));
        }
        
        // Ordering
        if(isset($iSortCol_0))
        {
            for($i=0; $i<intval($iSortingCols); $i++)
            {
                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);
                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);
                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);
    
                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }
            }
        }
        
        /* 
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        if(isset($sSearch) && !empty($sSearch))
        {
            for($i=0; $i<count($aColumns); $i++)
            {
                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);
                
                // Individual column filtering
                if(isset($bSearchable) && $bSearchable == 'true')
                {
                    $this->db->or_like($aColumns[$i], $this->db->escape_like_str($sSearch));
                }
            }
        }
        
        // Select Data
        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false);
        $rResult = $this->db->get($sTable);
    
        // Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;
    
        // Total data set length
        $iTotal = $this->db->count_all($sTable);
    
        // Output
        $output = array(
            'sEcho' => intval($sEcho),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );
        
        foreach($rResult->result_array() as $aRow)
        {
            $row = array();
            
            foreach($aColumns as $col)
            {
                $row[] = $aRow[$col];
            }
    
            $output['aaData'][] = $row;
        }
    
        echo json_encode($output);
    }

    function get_app_name($id)
    {
        $form_training = $this->form_training_model->form_training($id);
        foreach($form_training->result() as $training){
            $user_app_lv1 = $training->user_app_lv1;
            $user_app_lv2 = $training->user_app_lv2;
        }

        $this->data['name_app_lv1'] = $this->form_training_model->get_app_name($user_app_lv1);
        $this->data['name_app_lv2'] = $this->form_training_model->get_app_name($user_app_lv2);

        return $this->data;
    }

    function get_user_info($user_id)
    {
        $user = $this->person_model->getUsers($user_id)->row();
            $url = 'http://admin:12345678@localhost/hris_api/users/employement/EMPLID/'.$user->nik.'/format/json';
            $headers = get_headers($url);
            $response = substr($headers[0], 9, 3);
            if ($response != "404") {
                $getuser_info = file_get_contents($url);
                $user_info = json_decode($getuser_info, true);
                return $this->data['user_info'] = $user_info;
            } else {
                //$this->data['user_info'] = $this->form_cuti_model->where('users.id',$user_id)->form_cuti_input()->result();
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

                if(in_array($view, array('form_training/index')))
                {
                    $this->template->set_layout('default');

                    $this->template->add_js('jquery.min.js');
                    $this->template->add_js('bootstrap.min.js');

                    $this->template->add_js('jquery-ui-1.10.1.custom.min.js');
                    $this->template->add_js('jquery.sidr.min.js');
                    $this->template->add_js('breakpoints.js');
                    $this->template->add_js('select2.min.js');

                    $this->template->add_js('core.js');

                    $this->template->add_js('main.js');
                    $this->template->add_js('respond.min.js');

                    $this->template->add_js('jquery.bootstrap.wizard.min.js');
                    $this->template->add_js('jquery.validate.min.js');
                    
                    $this->template->add_js('jquery.dataTables.min.js');
                    $this->template->add_js('jquery.dataTables.delay.min.js');
                    $this->template->add_js('javascript.js');
                    //$this->template->add_js('form_training.js');

                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    $this->template->add_css('plugins/select2/select2.css');
                    $this->template->add_css('jquery.dataTables.css');
                    
                }
                elseif(in_array($view, array('form_training/input',
                                             'form_training/detail',
                                             'form_training/approval/hrd',
                    )))
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
                    $this->template->add_js('form_training.js');
                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    $this->template->add_css('plugins/select2/select2.css');
                    $this->template->add_css('datepicker.css');
                    $this->template->add_css('bootstrap-timepicker.css');
                     
                }elseif(in_array($view, array('form_training/approval/supervisor',
                                              )))
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
                    $this->template->add_js('form_training.js');

                    
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