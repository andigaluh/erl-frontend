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
        $this->db->select('education_group.title as edu_group, users_education.id, users_education.user_id, users_education.title as education, users_education.description, users_education.start_date, users_education.end_date, users_education.education_center_id, education_center.id, education_center.title as institution, users_education.education_degree_id, education_degree.id, education_degree.title as degree');
        
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

    function getUserSk($id){
        $this->db->select('users_sk.id,users_sk.user_id, users_sk.sk_date, users_sk.sk_no, users_sk.effective_date, users_sk.location, users_sk.sign_position, users_sk.sign_name, departement.id, position.id, departement.title as departement, position.title as position');
        $this->db->from('users_sk');
        $this->db->join('departement', 'users_sk.departement_id = departement.id');
        $this->db->join('position', 'users_sk.position_id = position.id');

        $this->db->where('users_sk.user_id', $id);

        $query = $this->db->get();
        return $query->result();
    }

    function getUserSti($id){
        $this->db->select('users_sti.id, users_sti.activation_date, users_sti.identity_no, users_sti.ijazah_history, users_sti.ijazah_name, users_sti.ijazah_number, users_sti.institution, users_sti.published_place, users_sti.receivedby_id, users.username, departement.title as departement, position.title as position, acknowledge.username as acknowledge');
        $this->db->from('users_sti');
        $this->db->join('users', 'users_sti.user_id = users.id');
        $this->db->join('departement', 'users_sti.departement_id = departement.id');
        $this->db->join('position', 'users_sti.position_id = position.id');
        $this->db->join('users as acknowledge', 'users_sti.acknowledgeby_id = acknowledge.id');

        $this->db->where('user_id', $id);

        $query = $this->db->get();
        return $query->result();
    }

    function getUserJabatan($id){
        $this->db->select('users_jabatan.id, users.username, organization.title as organization, position.title as position, grade.title as grade, users_jabatan.sk_date');
        
        $this->db->from('users_jabatan');
        $this->db->join('users', 'users_jabatan.user_id = users.id');
        $this->db->join('organization', 'users_jabatan.organization_id = organization.id');
        $this->db->join('grade', 'users_jabatan.grade_id = grade.id');
        $this->db->join('position', 'users_jabatan.position_id = position.id');

        $this->db->where('user_id', $id);

        $query = $this->db->get();
        return $query->result();
    }

    function getUserAward($id){
        $this->db->select('users_awardwarning.id, users_awardwarning.app_date, users_awardwarning.award_warning_type_id, users_awardwarning.description, users_awardwarning.end_date, users_awardwarning.sk_number, users_awardwarning.start_date, users_awardwarning.title, award_warning_type.title as type');
        $this->db->from('users_awardwarning');
        $this->db->join('award_warning_type', 'users_awardwarning.award_warning_type_id = award_warning_type.id');

        $this->db->where('user_id', $id);

        $query = $this->db->get();
        return $query->result();
    }
   
    function getUserIkatanDinas($id){
        $this->db->select('users_ikatan_dinas.id, ikatan_dinas_type.title as type, users.username, users_ikatan_dinas.title, users_ikatan_dinas.start_date, users_ikatan_dinas.end_date, users_ikatan_dinas.amount');
        $this->db->from('users_ikatan_dinas');
        $this->db->join('users', 'users_ikatan_dinas.user_id = users.id');
        $this->db->join('ikatan_dinas_type', 'users_ikatan_dinas.ikatan_dinas_type = ikatan_dinas_type.id');
        
        $this->db->where('user_id', $id);

        $query = $this->db->get();
        return $query->result();
    }

    function getUsers($id){
        $this->db->select('users.*, organization.title as organization_title, marital.title as marital_title');
        $this->db->from('users');
        $this->db->join('organization', 'users.business_unit_id = organization.id');
        $this->db->join('marital', 'users.marital_id = marital.id');
        $this->db->where('users.id', $id);

        $query = $this->db->get();
        return $query;
    }




}