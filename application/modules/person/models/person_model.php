<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Person_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function userbyid($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('users_employement');
    }

     function update($id,$data2)
    {
        $this->db->where('id',$id);
        $this->db->update('users_employement',$data2);
    }
}