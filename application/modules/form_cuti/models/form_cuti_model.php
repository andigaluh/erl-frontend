<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_cuti_model extends CI_Model
{
     /**
     * Holds an array of tables used
     *
     * @var array
     **/
    public $tables = array();

    /**
     * Identity
     *
     * @var string
     **/
    public $identity;

    /**
     * Where
     *
     * @var array
     **/
    public $_ion_where = array();

    /**
     * Select
     *
     * @var array
     **/
    public $_ion_select = array();

    /**
     * Like
     *
     * @var array
     **/
    public $_ion_like = array();

    /**
     * Limit
     *
     * @var string
     **/
    public $_ion_limit = NULL;

    /**
     * Offset
     *
     * @var string
     **/
    public $_ion_offset = NULL;

    /**
     * Order By
     *
     * @var string
     **/
    public $_ion_order_by = NULL;

    /**
     * Order
     *
     * @var string
     **/
    public $_ion_order = NULL;

    /**
     * Hooks
     *
     * @var object
     **/
    protected $_ion_hooks;

    /**
     * Response
     *
     * @var string
     **/
    protected $response = NULL;

    /**
     * message (uses lang file)
     *
     * @var string
     **/
    protected $messages;

    /**
     * error message (uses lang file)
     *
     * @var string
     **/
    protected $errors;

    /**
     * error start delimiter
     *
     * @var string
     **/
    protected $error_start_delimiter;

    /**
     * error end delimiter
     *
     * @var string
     **/
    protected $error_end_delimiter;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->config('ion_auth', TRUE);
        $this->load->helper('cookie');
        $this->load->helper('date');
        $this->lang->load('ion_auth');

        //initialize db tables data
        $this->tables  = $this->config->item('tables', 'ion_auth');

        //initialize messages and error
        $this->messages    = array();
        $this->errors      = array();
        $delimiters_source = $this->config->item('delimiters_source', 'ion_auth');

        //load the error delimeters either from the config file or use what's been supplied to form validation
        if ($delimiters_source === 'form_validation')
        {
            //load in delimiters from form_validation
            //to keep this simple we'll load the value using reflection since these properties are protected
            $this->load->library('form_validation');
            $form_validation_class = new ReflectionClass("CI_Form_validation");

            $error_prefix = $form_validation_class->getProperty("_error_prefix");
            $error_prefix->setAccessible(TRUE);
            $this->error_start_delimiter = $error_prefix->getValue($this->form_validation);
            $this->message_start_delimiter = $this->error_start_delimiter;

            $error_suffix = $form_validation_class->getProperty("_error_suffix");
            $error_suffix->setAccessible(TRUE);
            $this->error_end_delimiter = $error_suffix->getValue($this->form_validation);
            $this->message_end_delimiter = $this->error_end_delimiter;
        }
        else
        {
            //use delimiters from config
            $this->message_start_delimiter = $this->config->item('message_start_delimiter', 'ion_auth');
            $this->message_end_delimiter   = $this->config->item('message_end_delimiter', 'ion_auth');
            $this->error_start_delimiter   = $this->config->item('error_start_delimiter', 'ion_auth');
            $this->error_end_delimiter     = $this->config->item('error_end_delimiter', 'ion_auth');
        }


        //initialize our hooks object
        $this->_ion_hooks = new stdClass;

        $this->trigger_events('model_constructor');
    }

    public function limit($limit)
    {
        $this->trigger_events('limit');
        $this->_ion_limit = $limit;

        return $this;
    }

    public function offset($offset)
    {
        $this->trigger_events('offset');
        $this->_ion_offset = $offset;

        return $this;
    }

    public function where($where, $value = NULL)
    {
        $this->trigger_events('where');

        if (!is_array($where))
        {
            $where = array($where => $value);
        }

        array_push($this->_ion_where, $where);

        return $this;
    }

    public function like($like, $value = NULL, $position = 'both')
    {
        $this->trigger_events('like');

        if (!is_array($like))
        {
            $like = array($like => array(
                'value'    => $value,
                'position' => $position,
            ));
        }

        array_push($this->_ion_like, $like);

        return $this;
    }

    public function select($select)
    {
        $this->trigger_events('select');

        $this->_ion_select[] = $select;

        return $this;
    }

    public function order_by($by, $order='desc')
    {
        $this->trigger_events('order_by');

        $this->_ion_order_by = $by;
        $this->_ion_order    = $order;

        return $this;
    }

    public function row()
    {
        $this->trigger_events('row');

        $row = $this->response->row();
        $this->response->free_result();

        return $row;
    }

    public function row_array()
    {
        $this->trigger_events(array('row', 'row_array'));

        $row = $this->response->row_array();
        $this->response->free_result();

        return $row;
    }

    public function result()
    {
        $this->trigger_events('result');

        $result = $this->response->result();
        $this->response->free_result();

        return $result;
    }

    public function result_array()
    {
        $this->trigger_events(array('result', 'result_array'));

        $result = $this->response->result_array();
        $this->response->free_result();

        return $result;
    }

    public function num_rows()
    {
        $this->trigger_events(array('num_rows'));

        $result = $this->response->num_rows();
        $this->response->free_result();

        return $result;
    }

    /**
     * form_cuti
     *
     * @return object form_cuti
     * @author Deni
     **/
    public function form_cuti()
    {
        $this->trigger_events('form_cuti');

        if (isset($this->_ion_select) && !empty($this->_ion_select))
        {
            foreach ($this->_ion_select as $select)
            {
                $this->db->select($select);
            }

            $this->_ion_select = array();
        }
        else
        {
            //default selects
            $this->db->select(array(
                $this->tables['users_cuti'].'.*',
                $this->tables['users_cuti'].'.id as id',
                $this->tables['users_cuti'].'.id as form_cuti_id',

                $this->tables['alasan_cuti'].'.title as alasan_cuti',
                $this->tables['comp_session'].'.year as comp_session',
                $this->tables['users'].'.first_name as first_name',
                $this->tables['users'].'.last_name as last_name',
            ));

            $this->db->join('alasan_cuti', 'users_cuti.alasan_cuti_id = alasan_cuti.id', 'left');
            $this->db->join('comp_session', 'users_cuti.id_comp_session = comp_session.id', 'left');
            $this->db->join('users', 'users_cuti.user_pengganti = users.id', 'left');

            $this->db->where('users_cuti.is_deleted', 0);
        }

        $this->trigger_events('extra_where');

        //run each where that was passed

        if (isset($this->_ion_like) && !empty($this->_ion_like))
        {
            foreach ($this->_ion_like as $like)
            {
                $this->db->or_like($like);
            }

            $this->_ion_like = array();
        }

        if (isset($this->_ion_limit) && isset($this->_ion_offset))
        {
            $this->db->limit($this->_ion_limit, $this->_ion_offset);

            $this->_ion_limit  = NULL;
            $this->_ion_offset = NULL;
        }
        else if (isset($this->_ion_limit))
        {
            $this->db->limit($this->_ion_limit);

            $this->_ion_limit  = NULL;
        }

        //set the order
        if (isset($this->_ion_order_by) && isset($this->_ion_order))
        {
            $this->db->order_by($this->_ion_order_by, $this->_ion_order);

            $this->_ion_order    = NULL;
            $this->_ion_order_by = NULL;
        }

        $this->response = $this->db->get($this->tables['users_cuti']);

        return $this;
    }

    public function form_cuti_input()
    {
        $this->trigger_events('form_cuti_input');

        if (isset($this->_ion_select) && !empty($this->_ion_select))
        {
            foreach ($this->_ion_select as $select)
            {
                $this->db->select($select);
            }

            $this->_ion_select = array();
        }
        else
        {
            //default selects
            $this->db->select(array(
                $this->tables['users'].'.*',
                $this->tables['users'].'.id as id',
                $this->tables['users'].'.id as user_id',

                $this->tables['users'].'.first_name as first_name',
                $this->tables['users'].'.last_name as last_name',
                $this->tables['users_employement'].'.position_id as position_id',
                $this->tables['users_employement'].'.organization_id as organization_id',
                $this->tables['users_employement'].'.seniority_date as seniority_date',
                $this->tables['organization'].'.title as organization_title',
                $this->tables['position'].'.title as position_title',
                $this->tables['users_cuti_plafon'].'.hak_cuti as hak_cuti',
                $this->tables['users_cuti_plafon'].'.id_comp_session as id_comp_session',
                $this->tables['comp_session'].'.year as session_year'
                
            ));

            $this->db->join('users_employement', 'users.id = users_employement.user_id', 'left');
            $this->db->join('organization', 'users_employement.organization_id = organization.id', 'left');
            $this->db->join('position', 'users_employement.position_id = position.id', 'left');
            $this->db->join('users_cuti_plafon', 'users.id = users_cuti_plafon.user_id', 'left');
            $this->db->join('comp_session', 'users_cuti_plafon.id_comp_session = comp_session.id', 'left');

            //$this->db->where('users.is_deleted', 0);
        }

        $this->trigger_events('extra_where');

        //run each where that was passed

        if (isset($this->_ion_where) && !empty($this->_ion_where))
        {
            foreach ($this->_ion_where as $where)
            {
                $this->db->where($where);
            }

            $this->_ion_where = array();
        }

        if (isset($this->_ion_like) && !empty($this->_ion_like))
        {
            foreach ($this->_ion_like as $like)
            {
                $this->db->or_like($like);
            }

            $this->_ion_like = array();
        }

        if (isset($this->_ion_limit) && isset($this->_ion_offset))
        {
            $this->db->limit($this->_ion_limit, $this->_ion_offset);

            $this->_ion_limit  = NULL;
            $this->_ion_offset = NULL;
        }
        else if (isset($this->_ion_limit))
        {
            $this->db->limit($this->_ion_limit);

            $this->_ion_limit  = NULL;
        }

        //set the order
        if (isset($this->_ion_order_by) && isset($this->_ion_order))
        {
            $this->db->order_by($this->_ion_order_by, $this->_ion_order);

            $this->_ion_order    = NULL;
            $this->_ion_order_by = NULL;
        }

        $this->response = $this->db->get($this->tables['users']);

        return $this;
    }

    public function form_cuti_supervisor()
    {
        $this->trigger_events('form_cuti_supervisor');

        if (isset($this->_ion_select) && !empty($this->_ion_select))
        {
            foreach ($this->_ion_select as $select)
            {
                $this->db->select($select);
            }

            $this->_ion_select = array();
        }
        else
        {
            //default selects
            $this->db->select(array(
                $this->tables['users_cuti'].'.*',
                $this->tables['users_cuti'].'.id as id',
                $this->tables['users_cuti'].'.id as user_id',

                $this->tables['users'].'.first_name as first_name',
                $this->tables['users'].'.last_name as last_name',
                $this->tables['users_employement'].'.position_id as position_id',
                $this->tables['users_employement'].'.organization_id as organization_id',
                $this->tables['users_employement'].'.seniority_date as seniority_date',
                $this->tables['organization'].'.title as organization_title',
                $this->tables['position'].'.title as position_title',
                $this->tables['users_cuti_plafon'].'.hak_cuti as hak_cuti',
                $this->tables['users_cuti_plafon'].'.id_comp_session as id_comp_session',
                $this->tables['comp_session'].'.year as session_year',
                $this->tables['users_cuti'].'.created_on as tgl_pengajuan'
                
            ));
            
            $this->db->join('users', 'users_cuti.user_id = users.id', 'left');
            $this->db->join('users_employement', 'users.id = users_employement.user_id', 'left');
            $this->db->join('organization', 'users_employement.organization_id = organization.id', 'left');
            $this->db->join('position', 'users_employement.position_id = position.id', 'left');
            $this->db->join('users_cuti_plafon', 'users.id = users_cuti_plafon.user_id', 'left');
            $this->db->join('comp_session', 'users_cuti.id_comp_session = comp_session.id', 'left');

            //$this->db->where('users.is_deleted', 0);
        }

        $this->trigger_events('extra_where');

        //run each where that was passed

        if (isset($this->_ion_where) && !empty($this->_ion_where))
        {
            foreach ($this->_ion_where as $where)
            {
                $this->db->where($where);
            }

            $this->_ion_where = array();
        }

        if (isset($this->_ion_like) && !empty($this->_ion_like))
        {
            foreach ($this->_ion_like as $like)
            {
                $this->db->or_like($like);
            }

            $this->_ion_like = array();
        }

        if (isset($this->_ion_limit) && isset($this->_ion_offset))
        {
            $this->db->limit($this->_ion_limit, $this->_ion_offset);

            $this->_ion_limit  = NULL;
            $this->_ion_offset = NULL;
        }
        else if (isset($this->_ion_limit))
        {
            $this->db->limit($this->_ion_limit);

            $this->_ion_limit  = NULL;
        }

        //set the order
        if (isset($this->_ion_order_by) && isset($this->_ion_order))
        {
            $this->db->order_by($this->_ion_order_by, $this->_ion_order);

            $this->_ion_order    = NULL;
            $this->_ion_order_by = NULL;
        }

        $this->response = $this->db->get($this->tables['users_cuti']);

        return $this;
    }

    public function render_session()
    {
         $this->trigger_events('form_cuti_input');

        if (isset($this->_ion_select) && !empty($this->_ion_select))
        {
            foreach ($this->_ion_select as $select)
            {
                $this->db->select($select);
            }

            $this->_ion_select = array();
        }
        else
        {
            //default selects
            $this->db->select(array(
                $this->tables['comp_session'].'.*',
                $this->tables['comp_session'].'.id as id',
                $this->tables['comp_session'].'.id as user_id',

                $this->tables['comp_session'].'.title as title',
                $this->tables['comp_session'].'.year as year'
            ));


            $this->db->where('comp_session.is_deleted', 0);
        }

        $this->trigger_events('extra_where');

        //run each where that was passed

        if (isset($this->_ion_where) && !empty($this->_ion_where))
        {
            foreach ($this->_ion_where as $where)
            {
                $this->db->where($where);
            }

            $this->_ion_where = array();
        }

        if (isset($this->_ion_like) && !empty($this->_ion_like))
        {
            foreach ($this->_ion_like as $like)
            {
                $this->db->or_like($like);
            }

            $this->_ion_like = array();
        }

        if (isset($this->_ion_limit) && isset($this->_ion_offset))
        {
            $this->db->limit($this->_ion_limit, $this->_ion_offset);

            $this->_ion_limit  = NULL;
            $this->_ion_offset = NULL;
        }
        else if (isset($this->_ion_limit))
        {
            $this->db->limit($this->_ion_limit);

            $this->_ion_limit  = NULL;
        }

        //set the order
        if (isset($this->_ion_order_by) && isset($this->_ion_order))
        {
            $this->db->order_by($this->_ion_order_by, $this->_ion_order);

            $this->_ion_order    = NULL;
            $this->_ion_order_by = NULL;
        }

        $this->response = $this->db->get($this->tables['comp_session']);

        return $this;
    }

    public function render_alasan()
    {
         $this->trigger_events('form_cuti_input');

        if (isset($this->_ion_select) && !empty($this->_ion_select))
        {
            foreach ($this->_ion_select as $select)
            {
                $this->db->select($select);
            }

            $this->_ion_select = array();
        }
        else
        {
            //default selects
            $this->db->select(array(
                $this->tables['alasan_cuti'].'.*',
                $this->tables['alasan_cuti'].'.id as id',
                $this->tables['alasan_cuti'].'.id as user_id',

                $this->tables['alasan_cuti'].'.title as title',
            ));


            $this->db->where('alasan_cuti.is_deleted', 0);
        }

        $this->trigger_events('extra_where');

        //run each where that was passed

        if (isset($this->_ion_where) && !empty($this->_ion_where))
        {
            foreach ($this->_ion_where as $where)
            {
                $this->db->where($where);
            }

            $this->_ion_where = array();
        }

        if (isset($this->_ion_like) && !empty($this->_ion_like))
        {
            foreach ($this->_ion_like as $like)
            {
                $this->db->or_like($like);
            }

            $this->_ion_like = array();
        }

        if (isset($this->_ion_limit) && isset($this->_ion_offset))
        {
            $this->db->limit($this->_ion_limit, $this->_ion_offset);

            $this->_ion_limit  = NULL;
            $this->_ion_offset = NULL;
        }
        else if (isset($this->_ion_limit))
        {
            $this->db->limit($this->_ion_limit);

            $this->_ion_limit  = NULL;
        }

        //set the order
        if (isset($this->_ion_order_by) && isset($this->_ion_order))
        {
            $this->db->order_by($this->_ion_order_by, $this->_ion_order);

            $this->_ion_order    = NULL;
            $this->_ion_order_by = NULL;
        }

        $this->response = $this->db->get($this->tables['alasan_cuti']);

        return $this;
    }

    public function render_pengganti()
    {
         $this->trigger_events('form_cuti_input');

        if (isset($this->_ion_select) && !empty($this->_ion_select))
        {
            foreach ($this->_ion_select as $select)
            {
                $this->db->select($select);
            }

            $this->_ion_select = array();
        }
        else
        {
            //default selects
            $this->db->select(array(
                $this->tables['users'].'.*',
                $this->tables['users'].'.id as id',
                $this->tables['users'].'.id as user_id',

                $this->tables['users'].'.first_name as first_name',
                $this->tables['users'].'.last_name as last_name',
                $this->tables['users_employement'].'.position_id as position_id',
                $this->tables['users_employement'].'.organization_id as organization_id',
                $this->tables['users_employement'].'.seniority_date as seniority_date',
                $this->tables['organization'].'.title as organization_title',
            ));

            $this->db->join('users_employement', 'users.id = users_employement.user_id', 'left');
            $this->db->join('organization', 'users_employement.organization_id = organization.id', 'left');
            $this->db->join('position', 'users_employement.position_id = position.id', 'left');


            //$this->db->where('users.is_deleted', 0);
        }

        $this->trigger_events('extra_where');

        //run each where that was passed

        if (isset($this->_ion_where) && !empty($this->_ion_where))
        {
            foreach ($this->_ion_where as $where)
            {
                $this->db->where($where);
            }

            $this->_ion_where = array();
        }

        if (isset($this->_ion_like) && !empty($this->_ion_like))
        {
            foreach ($this->_ion_like as $like)
            {
                $this->db->or_like($like);
            }

            $this->_ion_like = array();
        }

        if (isset($this->_ion_limit) && isset($this->_ion_offset))
        {
            $this->db->limit($this->_ion_limit, $this->_ion_offset);

            $this->_ion_limit  = NULL;
            $this->_ion_offset = NULL;
        }
        else if (isset($this->_ion_limit))
        {
            $this->db->limit($this->_ion_limit);

            $this->_ion_limit  = NULL;
        }

        //set the order
        if (isset($this->_ion_order_by) && isset($this->_ion_order))
        {
            $this->db->order_by($this->_ion_order_by, $this->_ion_order);

            $this->_ion_order    = NULL;
            $this->_ion_order_by = NULL;
        }

        $this->response = $this->db->get($this->tables['users']);


        return $this;
    }

    public function get_org_id()
    {
        $this->trigger_events('form_cuti_input');

        if (isset($this->_ion_select) && !empty($this->_ion_select))
        {
            foreach ($this->_ion_select as $select)
            {
                $this->db->select($select);
            }

            $this->_ion_select = array();
        }
        else
        {
            //default selects
            $this->db->select(array(
                $this->tables['users'].'.*',
                $this->tables['users'].'.id as id',
                $this->tables['users'].'.id as user_id',

                $this->tables['users_employement'].'.organization_id as organization_id',
            ));

            $this->db->join('users_cuti', 'users.id = users_cuti.user_id', 'left');
            $this->db->join('users_employement', 'users.id = users_employement.user_id', 'left');
        }

        $this->trigger_events('extra_where');

        //run each where that was passed

        if (isset($this->_ion_where) && !empty($this->_ion_where))
        {
            foreach ($this->_ion_where as $where)
            {
                $this->db->where($where);
            }

            $this->_ion_where = array();
        }

        if (isset($this->_ion_like) && !empty($this->_ion_like))
        {
            foreach ($this->_ion_like as $like)
            {
                $this->db->or_like($like);
            }

            $this->_ion_like = array();
        }

        if (isset($this->_ion_limit) && isset($this->_ion_offset))
        {
            $this->db->limit($this->_ion_limit, $this->_ion_offset);

            $this->_ion_limit  = NULL;
            $this->_ion_offset = NULL;
        }
        else if (isset($this->_ion_limit))
        {
            $this->db->limit($this->_ion_limit);

            $this->_ion_limit  = NULL;
        }

        //set the order
        if (isset($this->_ion_order_by) && isset($this->_ion_order))
        {
            $this->db->order_by($this->_ion_order_by, $this->_ion_order);

            $this->_ion_order    = NULL;
            $this->_ion_order_by = NULL;
        }

        $this->response = $this->db->get($this->tables['users']);

        return $this;
    }

    public function get_comp_session_id()
    {
        $this->trigger_events('form_cuti_input');

        if (isset($this->_ion_select) && !empty($this->_ion_select))
        {
            foreach ($this->_ion_select as $select)
            {
                $this->db->select($select);
            }

            $this->_ion_select = array();
        }
        else
        {
            //default selects
            $this->db->select(array(
                $this->tables['comp_session'].'.*',
                $this->tables['comp_session'].'.id as id',
                $this->tables['comp_session'].'.id as user_id',
            ));
            
        }

        $this->trigger_events('extra_where');

        //run each where that was passed

        if (isset($this->_ion_where) && !empty($this->_ion_where))
        {
            foreach ($this->_ion_where as $where)
            {
                $this->db->where($where);
            }

            $this->_ion_where = array();
        }

        if (isset($this->_ion_like) && !empty($this->_ion_like))
        {
            foreach ($this->_ion_like as $like)
            {
                $this->db->or_like($like);
            }

            $this->_ion_like = array();
        }

        if (isset($this->_ion_limit) && isset($this->_ion_offset))
        {
            $this->db->limit($this->_ion_limit, $this->_ion_offset);

            $this->_ion_limit  = NULL;
            $this->_ion_offset = NULL;
        }
        else if (isset($this->_ion_limit))
        {
            $this->db->limit($this->_ion_limit);

            $this->_ion_limit  = NULL;
        }

        //set the order
        if (isset($this->_ion_order_by) && isset($this->_ion_order))
        {
            $this->db->order_by($this->_ion_order_by, $this->_ion_order);

            $this->_ion_order    = NULL;
            $this->_ion_order_by = NULL;
        }

        $this->response = $this->db->get($this->tables['users']);

        return $this;
    }

    public function get_user()
    {
        $this->trigger_events('form_cuti_input');

        if (isset($this->_ion_select) && !empty($this->_ion_select))
        {
            foreach ($this->_ion_select as $select)
            {
                $this->db->select($select);
            }

            $this->_ion_select = array();
        }
        else
        {
            //default selects
            $this->db->select(array(
                $this->tables['users'].'.*',
                $this->tables['users'].'.id as id',
                $this->tables['users'].'.id as user_id',
            ));
        }

        $this->trigger_events('extra_where');

        //run each where that was passed

        if (isset($this->_ion_where) && !empty($this->_ion_where))
        {
            foreach ($this->_ion_where as $where)
            {
                $this->db->where($where);
            }

            $this->_ion_where = array();
        }

        if (isset($this->_ion_like) && !empty($this->_ion_like))
        {
            foreach ($this->_ion_like as $like)
            {
                $this->db->or_like($like);
            }

            $this->_ion_like = array();
        }

        if (isset($this->_ion_limit) && isset($this->_ion_offset))
        {
            $this->db->limit($this->_ion_limit, $this->_ion_offset);

            $this->_ion_limit  = NULL;
            $this->_ion_offset = NULL;
        }
        else if (isset($this->_ion_limit))
        {
            $this->db->limit($this->_ion_limit);

            $this->_ion_limit  = NULL;
        }

        //set the order
        if (isset($this->_ion_order_by) && isset($this->_ion_order))
        {
            $this->db->order_by($this->_ion_order_by, $this->_ion_order);

            $this->_ion_order    = NULL;
            $this->_ion_order_by = NULL;
        }

        $this->response = $this->db->get($this->tables['users']);

        return $this;
    }

    public function delete($id)
    {
        $this->trigger_events('pre_delete_frm_cuti');

        $this->db->trans_begin();

        // delete organization from users_cuti table
        $this->db->delete($this->tables['users_cuti'], array('id' => $id));

        // if user does not exist in database then it returns FALSE else removes the user from groups
        if ($this->db->affected_rows() == 0)
        {
            return FALSE;
        }

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $this->trigger_events(array('post_delete_frm_cuti', 'post_delete_frm_cuti_unsuccessful'));
            $this->set_error('delete_unsuccessful');
            return FALSE;
        }

        $this->db->trans_commit();

        $this->trigger_events(array('post_delete_frm_cuti', 'post_delete_frm_cuti_successful'));
        $this->set_message('delete_successful');
        return TRUE;
    }

    public function create_($user_id = FALSE, $additional_data = array())
    {

        $data = array('user_id'=>$user_id);

        //filter out any data passed that doesnt have a matching column in the form cuti table
        //and merge the set group data and the additional data
        if (!empty($additional_data)) $data = array_merge($this->_filter_data($this->tables['users_cuti'], $additional_data), $data);

        $this->trigger_events('extra_group_set');

        // insert the new form_cuti
        $this->db->insert($this->tables['users_cuti'], $data);
        $id = $this->db->insert_id();

        // report success
        $this->set_message('frm_cuti_creation_successful');
        // return the brand new id
        return $id;
    }

    public function update($id, array $data)
    {
        $this->trigger_events('pre_update_frm_cuti');

        $frm_cuti = $this->frm_cuti($id)->row();

        $this->db->trans_begin();

        // Filter the data passed
        $data = $this->_filter_data($this->tables['users_cuti'], $data);

        $this->trigger_events('extra_where');
        $this->db->update($this->tables['users_cuti'], $data, array('id' => $frm_cuti->id));

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();

            $this->trigger_events(array('post_update_frm_cuti', 'post_update_frm_cuti_unsuccessful'));
            $this->set_error('update_unsuccessful');
            return FALSE;
        }

        $this->db->trans_commit();

        $this->trigger_events(array('post_update_frm_cuti', 'post_update_frm_cuti_unsuccessful'));
        $this->set_message('update_successful');
        return TRUE;
    }

    public function trigger_events($events)
    {
        if (is_array($events) && !empty($events))
        {
            foreach ($events as $event)
            {
                $this->trigger_events($event);
            }
        }
        else
        {
            if (isset($this->_ion_hooks->$events) && !empty($this->_ion_hooks->$events))
            {
                foreach ($this->_ion_hooks->$events as $name => $hook)
                {
                    $this->_call_hook($events, $name);
                }
            }
        }
    }

    /**
     * set_message_delimiters
     *
     * Set the message delimiters
     *
     * @return void
     * @author Ben Edmunds
     **/
    public function set_message_delimiters($start_delimiter, $end_delimiter)
    {
        $this->message_start_delimiter = $start_delimiter;
        $this->message_end_delimiter   = $end_delimiter;

        return TRUE;
    }

    /**
     * set_error_delimiters
     *
     * Set the error delimiters
     *
     * @return void
     * @author Ben Edmunds
     **/
    public function set_error_delimiters($start_delimiter, $end_delimiter)
    {
        $this->error_start_delimiter = $start_delimiter;
        $this->error_end_delimiter   = $end_delimiter;

        return TRUE;
    }

    /**
     * set_message
     *
     * Set a message
     *
     * @return void
     * @author Ben Edmunds
     **/
    public function set_message($message)
    {
        $this->messages[] = $message;

        return $message;
    }

    /**
     * messages
     *
     * Get the messages
     *
     * @return void
     * @author Ben Edmunds
     **/
    public function messages()
    {
        $_output = '';
        foreach ($this->messages as $message)
        {
            $messageLang = $this->lang->line($message) ? $this->lang->line($message) : '##' . $message . '##';
            $_output .= $this->message_start_delimiter . $messageLang . $this->message_end_delimiter;
        }

        return $_output;
    }

    /**
     * messages as array
     *
     * Get the messages as an array
     *
     * @return array
     * @author Raul Baldner Junior
     **/
    public function messages_array($langify = TRUE)
    {
        if ($langify)
        {
            $_output = array();
            foreach ($this->messages as $message)
            {
                $messageLang = $this->lang->line($message) ? $this->lang->line($message) : '##' . $message . '##';
                $_output[] = $this->message_start_delimiter . $messageLang . $this->message_end_delimiter;
            }
            return $_output;
        }
        else
        {
            return $this->messages;
        }
    }

    /**
     * set_error
     *
     * Set an error message
     *
     * @return void
     * @author Ben Edmunds
     **/
    public function set_error($error)
    {
        $this->errors[] = $error;

        return $error;
    }

    /**
     * errors
     *
     * Get the error message
     *
     * @return void
     * @author Ben Edmunds
     **/
    public function errors()
    {
        $_output = '';
        foreach ($this->errors as $error)
        {
            $errorLang = $this->lang->line($error) ? $this->lang->line($error) : '##' . $error . '##';
            $_output .= $this->error_start_delimiter . $errorLang . $this->error_end_delimiter;
        }

        return $_output;
    }

    /**
     * errors as array
     *
     * Get the error messages as an array
     *
     * @return array
     * @author Raul Baldner Junior
     **/
    public function errors_array($langify = TRUE)
    {
        if ($langify)
        {
            $_output = array();
            foreach ($this->errors as $error)
            {
                $errorLang = $this->lang->line($error) ? $this->lang->line($error) : '##' . $error . '##';
                $_output[] = $this->error_start_delimiter . $errorLang . $this->error_end_delimiter;
            }
            return $_output;
        }
        else
        {
            return $this->errors;
        }
    }

    protected function _filter_data($table, $data)
    {
        $filtered_data = array();
        $columns = $this->db->list_fields($table);

        if (is_array($data))
        {
            foreach ($columns as $column)
            {
                if (array_key_exists($column, $data))
                    $filtered_data[$column] = $data[$column];
            }
        }

        return $filtered_data;
    }

    public function frm_cuti($id = NULL)
    {
        $this->trigger_events('frm_cuti');

        $this->limit(1);
        $this->where($this->tables['users_cuti'].'.id', $id);

        $this->form_cuti();

        return $this;
    }

    
    
}