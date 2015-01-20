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

    function getUserCourse($id){
        $this->db->select('users_course.id,users_course.user_id,users_course.title as description, users_course.registration_date, course_status.title as status');
        $this->db->from('users_course');
        $this->db->join('course_status', 'users_course.course_status_id = course_status.id');
        $this->db->where('users_course.user_id', $id);

        $query = $this->db->get();
        return $query->result();
    }

    function getUserCertificate($id){
        $this->db->select('users_certificate.id, certification_type.title as certification_type,users_certificate.description, users_certificate.start_date, users_certificate.end_date');
        $this->db->from('users_certificate');
        $this->db->join('certification_type', 'users_certificate.certification_type_id = certification_type.id');
        $this->db->where('users_certificate.user_id', $id);

        $query = $this->db->get();
        return $query->result();
    }

    function getUserEducation($id){
        $this->db->select('users_education.education_group_id, education_group.id, education_group.title as edu_group, users_education.id, users_education.user_id, users_education.title as education, users_education.description, users_education.start_date, users_education.end_date, users_education.education_center_id, education_center.id, education_center.title as institution, users_education.education_degree_id, education_degree.id, education_degree.title as degree');
        //$this->db->select('users_education.id,  users_education.user_id, users_education.education_center_id, users_education.education_degree_id, users_education.education_group_id, users_education.title as education, users_education.description, users_education.start_date, users_education.end_date, education_group.id, education_degree.id, education_center.id, education_center.title as institution, education_degree.title as degree, education_group.title as group');
        //$this->db->select('*');
        $this->db->from('users_education');
        $this->db->join('education_degree', 'users_education.education_degree_id = education_degree.id');
        $this->db->join('education_group', 'users_education.education_group_id = education_group.id');
        $this->db->join('education_center', 'users_education.education_center_id = education_center.id');
        $this->db->where('users_education.user_id', $id);

        $query = $this->db->get();
        return $query->result();
    }

    function getUserExperience($id){
        $this->db->select('users_experience.id, users_experience.user_id, users_experience.company, users_experience.start_date, users_experience.end_date, users_experience.position, users_experience.address, users_experience.line_business, users_experience.last_salary, exp_field.title as field, exp_level.title as level, exp_year.title as year, resign_reason.title as resign_reason');
        $this->db->from('users_experience');
        $this->db->join('exp_field', 'users_experience.exp_field_id = exp_field.id');
        $this->db->join('exp_level', 'users_experience.exp_level_id = exp_level.id');
        $this->db->join('exp_year', 'users_experience.exp_year_id = exp_year.id');
        $this->db->join('resign_reason', 'users_experience.resign_reason_id = resign_reason.id');

        $this->db->where('users_experience.user_id', $id);

        $query = $this->db->get();
        return $query->result();
    }


}