<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Person_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getUserEmp($id)
    {
        $this->db->where('user_id',$id);
        return $this->db->get('users_employement');
    }

     function updateUserEmp($id,$data2)
    {
        $this->db->where('user_id',$id);
        $this->db->update('users_employement',$data2);
    }

    function getUserCourse($id)
    {
        $this->db->where('user_id',$id);
        return $this->db->get('users_course');
    }
}