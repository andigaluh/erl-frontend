<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  English language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'This form post did not pass our security checks.';

// Login
$lang['login_heading']         = 'Login';
$lang['login_subheading']      = 'Please login with your email/username and password below.';
$lang['login_identity_label']  = 'Email/Username:';
$lang['login_password_label']  = 'Password:';
$lang['login_remember_label']  = 'Remember Me:';
$lang['login_submit_btn']      = 'Login';
$lang['login_forgot_password'] = 'Forgot your password?';

// Index
$lang['index_heading']           = 'Users';
$lang['index_subheading']        = 'Below is a list of the users.';
$lang['index_fname_th']          = 'First Name';
$lang['index_lname_th']          = 'Last Name';
$lang['index_email_th']          = 'Email';
$lang['index_groups_th']         = 'Groups';
$lang['index_status_th']         = 'Status';
$lang['index_action_th']         = 'Action';
$lang['index_active_link']       = 'Active';
$lang['index_inactive_link']     = 'Inactive';
$lang['index_create_user_link']  = 'Create a new user';
$lang['index_create_group_link'] = 'Create a new group';
$lang['index_course_title_th'] 	 = 'Course Title';
$lang['index_certificate_title_th'] 	= 'Certificate Title';
$lang['index_education_title_th'] 		= 'Education Title';
$lang['index_experience_title_th'] 	 	= 'Experience Title';
$lang['index_sk_title_th']		 = 'SK Title';
$lang['index_sti_title_th']		 = 'STI Title';

// Deactivate User
$lang['deactivate_heading']                  = 'Deactivate User';
$lang['deactivate_subheading']               = 'Are you sure you want to deactivate the user \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Yes:';
$lang['deactivate_confirm_n_label']          = 'No:';
$lang['deactivate_submit_btn']               = 'Submit';
$lang['deactivate_validation_confirm_label'] = 'confirmation';
$lang['deactivate_validation_user_id_label'] = 'user ID';

// Create User
$lang['create_user_heading']                           = 'Create User';
$lang['create_user_subheading']                        = 'Please enter the user\'s information below.';
$lang['create_user_fname_label']                       = 'First Name:';
$lang['create_user_lname_label']                       = 'Last Name:';
$lang['create_user_company_label']                     = 'Company Name:';
$lang['create_user_email_label']                       = 'Email:';
$lang['create_user_phone_label']                       = 'Phone:';
$lang['create_user_password_label']                    = 'Password:';
$lang['create_user_password_confirm_label']            = 'Confirm Password:';
$lang['create_user_submit_btn']                        = 'Create User';
$lang['create_user_validation_fname_label']            = 'First Name';
$lang['create_user_validation_lname_label']            = 'Last Name';
$lang['create_user_validation_email_label']            = 'Email Address';
$lang['create_user_validation_phone1_label']           = 'First Part of Phone';
$lang['create_user_validation_phone2_label']           = 'Second Part of Phone';
$lang['create_user_validation_phone3_label']           = 'Third Part of Phone';
$lang['create_user_validation_company_label']          = 'Company Name';
$lang['create_user_validation_password_label']         = 'Password';
$lang['create_user_validation_password_confirm_label'] = 'Password Confirmation';

// Edit User
$lang['edit_user_heading']                           = 'Edit User';
$lang['edit_user_subheading']                        = 'Please enter the user\'s information below.';
$lang['edit_user_fname_label']                       = 'First Name:';
$lang['edit_user_lname_label']                       = 'Last Name:';
$lang['edit_user_company_label']                     = 'Company Name:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_phone_label']                       = 'Phone:';
$lang['edit_user_password_label']                    = 'Password: (if changing password)';
$lang['edit_user_password_confirm_label']            = 'Confirm Password: (if changing password)';
$lang['edit_user_groups_heading']                    = 'Member of groups';
$lang['edit_user_submit_btn']                        = 'Save User';
$lang['edit_user_validation_fname_label']            = 'First Name';
$lang['edit_user_validation_lname_label']            = 'Last Name';
$lang['edit_user_validation_email_label']            = 'Email Address';
$lang['edit_user_validation_phone1_label']           = 'First Part of Phone';
$lang['edit_user_validation_phone2_label']           = 'Second Part of Phone';
$lang['edit_user_validation_phone3_label']           = 'Third Part of Phone';
$lang['edit_user_validation_company_label']          = 'Company Name';
$lang['edit_user_validation_groups_label']           = 'Groups';
$lang['edit_user_validation_password_label']         = 'Password';
$lang['edit_user_validation_password_confirm_label'] = 'Password Confirmation';

// Create Group
$lang['create_group_title']                  = 'Create Group';
$lang['create_group_heading']                = 'Create Group';
$lang['create_group_subheading']             = 'Please enter the group information below.';
$lang['create_group_name_label']             = 'Group Name:';
$lang['create_group_desc_label']             = 'Description:';
$lang['create_group_submit_btn']             = 'Create Group';
$lang['create_group_validation_name_label']  = 'Group Name';
$lang['create_group_validation_desc_label']  = 'Description';

// Edit Group
$lang['edit_group_title']                  = 'Edit Group';
$lang['edit_group_saved']                  = 'Group Saved';
$lang['edit_group_heading']                = 'Edit Group';
$lang['edit_group_subheading']             = 'Please enter the group information below.';
$lang['edit_group_name_label']             = 'Group Name:';
$lang['edit_group_desc_label']             = 'Description:';
$lang['edit_group_submit_btn']             = 'Save Group';
$lang['edit_group_validation_name_label']  = 'Group Name';
$lang['edit_group_validation_desc_label']  = 'Description';

// Change Password
$lang['change_password_heading']                               = 'Change Password';
$lang['change_password_old_password_label']                    = 'Old Password:';
$lang['change_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['change_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['change_password_submit_btn']                            = 'Change';
$lang['change_password_validation_old_password_label']         = 'Old Password';
$lang['change_password_validation_new_password_label']         = 'New Password';
$lang['change_password_validation_new_password_confirm_label'] = 'Confirm New Password';

// Forgot Password
$lang['forgot_password_heading']                 = 'Forgot Password';
$lang['forgot_password_subheading']              = 'Please enter your %s so we can send you an email to reset your password.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Submit';
$lang['forgot_password_validation_email_label']  = 'Email Address';
$lang['forgot_password_username_identity_label'] = 'Username';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'No record of that email address.';

// Reset Password
$lang['reset_password_heading']                               = 'Change Password';
$lang['reset_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['reset_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['reset_password_submit_btn']                            = 'Change';
$lang['reset_password_validation_new_password_label']         = 'New Password';
$lang['reset_password_validation_new_password_confirm_label'] = 'Confirm New Password';


//additional
$lang['login_user_heading']						= 'Sign in Web-HRIS';
$lang['company_name']							= 'PT. Penerbit Erlangga';
$lang['register_here']							= 'Register here';
$lang['register_opening_description']			= 'for PT. Penerbit Erlangga web-HRIS account.';
$lang['user_registration']						= 'User Registration';
$lang['employee_information_subheading']		= 'Employee Information';
$lang['course_information_subheading']			= 'Company Sponsor Course Information';
$lang['user_contact_subheading']						= 'Contact Information';
$lang['register_foto_label']						= 'Foto';
$lang['register_nik_label']						= 'NIK';
$lang['register_fullname_label']				= 'Fullname';
$lang['register_dob_label']						= 'Date of birth';
$lang['register_bu_label']						= 'Business Unit';
$lang['register_marital_label']						= 'Marital Status';
$lang['register_firstname_label']						= 'First name';
$lang['register_lastname_label']						= 'Last name';
$lang['user_information_subheading']						= 'User Information';
$lang['back_button_label']						= 'Back';
$lang['list_of_subheading']						= 'List of -';
$lang['users_subheading']						= 'Users';
$lang['edit_user_validation_bod_label']            = 'Date of Birth';
$lang['edit_user_validation_business_unit_id_label']            = 'Business Unit';
$lang['edit_user_validation_marital_label']            = 'Marital Status';
$lang['edit_user_mobile_phone_label']            = 'Mobile Phone';
$lang['edit_user_previous_email_label']            = 'Previous Email';
$lang['edit_user_bb_pin_label']            = 'BB Pin';
$lang['logout_link_label']            = 'Logout';
$lang['search_of_subheading'] = 'Search';
$lang['user_subheading'] = 'User';
$lang['course_subheading'] = 'Courses';
$lang['certificate_subheading'] = 'Certificates';
$lang['education_subheading'] = 'Educations';
$lang['experience_subheading'] = 'Experiences';
$lang['found_subheading'] = 'Found';
$lang['search_name_email'] = 'Name or Email';
$lang['users_course_subheading'] = "User's Course";
$lang['users_certificate_subheading'] = "User's Certificate";
$lang['users_education_subheading'] = "User's Education";
$lang['users_experience_subheading'] = "User's Experience";
$lang['delete_confirmation'] = "Delete Confirmation";
$lang['delete_this_data'] = "Are you sure want to delete ";
$lang['personal_label'] = "Personal";

//button
$lang['add_button'] = 'Add';
$lang['save_button'] = 'Save';
$lang['close_button'] = 'Close';
$lang['edit_button'] = 'Edit';
$lang['delete_button'] = 'Delete';
$lang['cancel_button'] = 'Cancel';
$lang['search_button'] = 'Search';

//person label
$lang['person_course_label'] = 'Company Course';
$lang['person_certificate_label'] = 'Certificate';
$lang['person_education_label'] = 'Education';
$lang['person_experience_label'] = 'Experience';
$lang['person_sk_label'] = 'Surat Keputusan';
$lang['person_sti_label'] = 'Surat Terima Ijazah';
$lang['person_jabatan_label'] = 'Position History';
$lang['person_award_label'] = 'Award Warning';
$lang['person_ikatan_label'] = 'Ikatan Dinas';

//Users Course

$lang['course_id'] = 'Course ID';
$lang['course_description'] = 'Course Title';
$lang['course_registration_date'] = 'Registration Date';
$lang['course_status'] = 'Course Status';
$lang['add_course'] = 'Add Course';
$lang['edit_course'] = 'Edit Course';


//Users Certificate

$lang['certificate_id'] = 'Certificate ID';
$lang['certification_type'] = 'Certification Type';
$lang['start_date'] = 'Start Date';
$lang['end_date'] = 'End Date';
$lang['add_certificate'] = 'Add Certificate';
$lang['edit_certificate'] = 'Edit Certificate';

//Users Education

$lang['education'] = 'Education';
$lang['description'] = 'Description';
$lang['education_group'] = 'Education Group';
$lang['education_degree'] = 'Education Degree';
$lang['institution'] = 'Institution';
$lang['add_education'] = 'Add Education';
$lang['edit_education'] = 'Edit Education';

//Users Exp

$lang['company'] = 'Company';
$lang['position'] = 'Position';
$lang['address'] = 'Address';
$lang['line_business'] = 'Line Of Business';
$lang['resign_reason'] = 'Resign Reason';
$lang['last_salary'] = 'Last Salary';
$lang['add_experience'] = 'Add Experience';
$lang['edit_experience'] = 'Edit Experience';

//Users SK

$lang['sk_date'] = 'SK Date';
$lang['sk_no'] = 'SK No';
$lang['departement'] = 'Departement';
$lang['effective_date'] = 'Effective Date';
$lang['location'] = 'Location';
$lang['sign_name'] = 'Sign Name';
$lang['sign_position'] = 'Sign Position';
$lang['add_sk'] = 'Add SK';
$lang['edit_sk'] = 'Edit SK';

//Users STI
$lang['add_sti'] = 'Add STI';
$lang['edit_sti'] = 'Edit STI';
$lang['identity_no'] = 'Identity No';
$lang['ijazah_name'] = 'Ijazah Name';
$lang['ijazah_number'] = 'Ijazah Number';
$lang['ijazah_history'] = 'Ijazah History';
$lang['published_place'] = 'Published Place';
$lang['activation_date'] = 'Activation Date';
$lang['receivedby'] = 'Received By';
$lang['acknowledgeby'] = 'Acknowledge By';

//Users Position history
$lang['add_jabatan'] = 'Add Position History';
$lang['edit_jabatan'] = 'Edit Position History';
$lang['organization'] = 'Organization';
$lang['employee_group'] = 'Employee Group';
$lang['branch'] = 'branch';
$lang['grade'] = 'grade';
$lang['personel_action'] = 'Personel Action';

//Users Award Warning
$lang['add_award'] = 'Add Award Warning';
$lang['edit_award'] = 'Edit Award Warning';
$lang['award_warning_type'] = 'Award Warning Type';
$lang['app_date'] = 'App Date';
$lang['title'] = 'Title';
$lang['sk_number'] = 'SK Number';
$lang[''] = '';
$lang[''] = '';
$lang[''] = '';
$lang[''] = '';
$lang[''] = '';
