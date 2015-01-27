<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function addCourse($data)
    {
    	$this->db->insert('users_course', $data);
    }

    function editCourse($id, $data){
    	$this->db->where('id', $id);
    	$this->db->update('users_course', $data);
    }

    function deleteCourse($id, $data){
    	$this->db->where('id', $id);
    	$this->db->update('users_course', $data);
    }

    function addCertificate($data)
    {
    	$this->db->insert('users_certificate', $data);
    }

    function editCertificate($id, $data){
        $this->db->where('id', $id);
        $this->db->update('users_certificate', $data);
    }

    function deleteCertificate($id, $data){
        $this->db->where('id', $id);
        $this->db->update('users_certificate', $data);
    }

    function addEducation($data)
    {
        $this->db->insert('users_education', $data);
    }

    function editEducation($id, $data){
        $this->db->where('id', $id);
        $this->db->update('users_education', $data);
    }

    function deleteEducation($id, $data){
        $this->db->where('id', $id);
        $this->db->update('users_education', $data);
    }

    function addExperience($data)
    {
        $this->db->insert('users_experience', $data);
    }

    function editExperience($id, $data){
        $this->db->where('id', $id);
        $this->db->update('users_experience', $data);
    }

    function deleteExperience($id, $data){
        $this->db->where('id', $id);
        $this->db->update('users_experience', $data);
    }

    function addSk($data)
    {
        $this->db->insert('users_sk', $data);
    }

    function editSk($id, $data){
        $this->db->where('id', $id);
        $this->db->update('users_sk', $data);
    }

    function deletesk($id, $data){
        $this->db->where('id', $id);
        $this->db->update('users_sk', $data);
    }

}