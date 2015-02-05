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
            $this->data['organization_class_all'] = $this->organization_class_model->like($ftitle_post)->where('is_deleted',0)->organization_class()->result();
            
            $this->data['num_rows_all'] = $this->organization_class_model->like($ftitle_post)->where('is_deleted',0)->organization_class()->num_rows();

            //list of filterize limit organization_class for pagination  
            $this->data['organization_class'] = $this->organization_class_model->like($ftitle_post)->where('is_deleted',0)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->organization_class()->result();

            $this->data['_num_rows'] = $this->organization_class_model->like($ftitle_post)->where('is_deleted',0)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->organization_class()->num_rows();

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

    function get_table($ftitle = "fn:",$sort_by = "id", $sort_order = "asc", $offset = 0)
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
            $this->data['organization_class_all'] = $this->organization_class_model->like($ftitle_post)->where('is_deleted',0)->organization_class()->result();

            $this->data['num_rows_all'] = $this->organization_class_model->like($ftitle_post)->where('is_deleted',0)->organization_class()->num_rows();

            //list of filterize limit organization_class for pagination  
            $this->data['organization_class'] = $this->organization_class_model->like($ftitle_post)->where('is_deleted',0)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->organization_class()->result();

            $this->data['_num_rows'] = $this->organization_class_model->like($ftitle_post)->where('is_deleted',0)->limit($limit)->offset($offset)->order_by($sort_by, $sort_order)->organization_class()->num_rows();

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

            $this->_render_page('organization_class/table/index', $this->data);
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
            $title = $this->input->post('title');
            $base = base_url();

            if($title=null){
                echo json_encode(array('st'=>0));
            }else{
                echo json_encode(array('st' =>1, 'title'=>$this->input->post('title'), 'base_url' => $base));
            }
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        
        if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('st'=>0, 'errors'=>validation_errors('<div class="alert alert-danger" role="alert">', '</div>')));
        }
        else
        {         
            $data = array(
                    'title'             => $this->input->post('title'),
                    'edited_on'         => date('Y-m-d',strtotime('now')),
                    'edited_by'         => $this->session->userdata('user_id'),
                    );

            $this->organization_class_model->update($id, $data);

            echo json_encode(array('st'=>1));
            
        }

    }

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

    public function delete($id)
    {
        $data = array(
                'is_deleted'    => 1,
                'deleted_on'    =>date('Y-m-d',strtotime('now')),
                'deleted_by'    =>$this->session->userdata('user_id'),
                );

        $this->organization_class_model->update($id, $data);

        echo json_encode(array('st'=>1));
    }

    public function add()
    {

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        
        if($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('st'=>0, 'errors'=>validation_errors('<div class="alert alert-danger" role="alert">', '</div>')));
        }
        else
        {
           
            $title    = $this->input->post('title');

            $additional_data = array(
                'created_on'        => date('Y-m-d',strtotime('now')),
                'created_by'        => $this->session->userdata('user_id'),
            );

            if ($this->form_validation->run() == true && $this->organization_class_model->create_($title, $additional_data))
            {
                echo json_encode(array('st'=>1));   
            }else{
                echo json_encode(array('st'=>0, 'errors'=>validation_errors('<div class="alert alert-danger" role="alert">', '</div>')));
            }
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

                if(in_array($view, array('organization_class/index')))
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

                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    $this->template->add_css('plugins/select2/select2.css');
                    
                }
                elseif(in_array($view, array('organization_class/edit')))
                {

                    $this->template->set_layout('default');

                    $this->template->add_js('jquery-ui-1.10.1.custom.min.js');
                    $this->template->add_js('jqueryblockui.js');
                    $this->template->add_js('jquery.sidr.min.js');
                    $this->template->add_js('breakpoints.js');
                    $this->template->add_js('pace.min.js');
                    $this->template->add_js('core.js');
                    
                    $this->template->add_js('select2.min.js');
                    
                    $this->template->add_css('jquery-ui-1.10.1.custom.min.css');
                    $this->template->add_css('pace-theme-flash.css');
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
