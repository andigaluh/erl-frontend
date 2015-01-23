<div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button"></button>
             <h3>Widget Settings</h3>
        </div>
        <div class="modal-body">Widget settings form goes here</div>
    </div>
    <div class="clearfix"></div>
    <div class="content">
        <!-- <ul class="breadcrumb">
            <li>
                <p>KARYAWAN</p>
            </li> <i class="icon-angle-right"></i> 
            <li>
                <a href="#" class="active">User Management</a>
            </li>
        </ul> -->
        <div class="page-title">
            <a href="<?php echo site_url('auth')?>"><i class="icon-custom-left"></i></a>
            <h3><?php echo lang('detail_user_heading');?></h3> 
        </div>
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="search-bar grid simple ">      
                    <select name="dep" id="sdep" class="simple-dropdown select2">
                        <option value="" selected="selected">Semua departmen</option>
                        <option value="1">Factory Management</option>
                        <option value="2">Process</option>
                        <option value="3">Engineering Sec. Mechanical</option>
                        <option value="4">Engineering Sec. Power Plant</option>                                    
                    </select>
                    <button type="button" class="btn btn-primary btn-cons"><i class="icon-search"></i>&nbsp;&nbsp;Cari</button>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12">
                <div class="grid simple ">
                    <div class="grid-title no-border">
                      <h4><a href="<?php echo site_url('auth/index')?>"><?php echo lang('change_user_detail_link')?></a></h4>
                    </div>                          
                    <div class="grid-body no-border">
                        
                        <div class="row">
                            <div <?php ( ! empty($message)) && print('class="alert alert-info"'); ?> id="infoMessage"><?php echo $message;?></div>
                                <div class="col-md-4">
                                    <h4><?php echo lang('employee_information_subheading')?></h4>
                                    <div class="form-group">
                                        <!-- <div class="input-with-icon right"> -->
                                            <div class="row">
                                               <!--  <div class="col-md-6">
                                                    <?php if($s_photo && file_exists('./uploads/'.$u_folder.'/'.$s_photo)) {?>
                                                    <img alt="" src="<?php echo base_url()?>uploads/<?php echo $u_folder.'/225x225/'.$s_photo?>">
                                                    <?php }else{ ?>
                                                    <img alt="" src="<?php echo base_url()?>assets/img/no-image.png" class="img-responsive">
                                                    <?php } ?>
                                                </div> -->
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <?php echo lang('register_firstname_label', 'firstname');?>
                                                        </div>
                                                        <div class="col-md-7">
                                                            : <?php echo strtoupper($first_name);?>&nbsp;<?php echo strtoupper($last_name);?> 
                                                        </div>                               
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <?php echo lang('register_nik_label', 'nik');?>
                                                        </div>
                                                        <div class="col-md-7">
                                                            : <?php echo strtoupper($nik);?>
                                                        </div>                               
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <?php echo lang('register_bu_label', 'business_unit');?>
                                                        </div>
                                                        <div class="col-md-7">
                                                            : <?php echo strtoupper($business_unit_id);?>
                                                        </div>                               
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <?php echo lang('register_dob_label', 'dob');?>
                                                        </div>
                                                        <div class="col-md-7">
                                                            : <?php echo strtoupper(date('d-m-Y',strtotime($bod)));?>
                                                        </div>                               
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <?php echo lang('register_marital_label', 'marital');?>
                                                        </div>
                                                        <div class="col-md-7">
                                                            : <?php echo strtoupper($marital_id);?>
                                                        </div>                               
                                                    </div>
                                                </div>
                                                
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4><?php echo lang('user_contact_subheading')?></h4>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <?php echo lang('edit_user_mobile_phone_label', 'phone');?>
                                            </div>
                                            <div class="col-md-7">
                                                : <?php echo strtoupper($phone);?>
                                            </div>                               
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <?php echo lang('create_user_email_label', 'email');?>
                                            </div>
                                            <div class="col-md-7">
                                                : <?php echo $email;?>
                                            </div>                               
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <?php echo lang('edit_user_previous_email_label', 'previous_email');?>
                                            </div>
                                            <div class="col-md-7">
                                                : <?php echo $previous_email;?>
                                            </div>                               
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <?php echo lang('edit_user_bb_pin_label', 'bb_pin');?>
                                            </div>
                                            <div class="col-md-7">
                                                : <?php echo strtoupper($bb_pin);?>
                                            </div>                               
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4><?php echo lang('user_photo_subheading')?></h4>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php if($s_photo && file_exists('./uploads/'.$u_folder.'/'.$s_photo)) {?>
                                                    <img alt="" src="<?php echo base_url()?>uploads/<?php echo $u_folder.'/100x100/'.$s_photo?>">
                                                <?php }else{ ?>
                                                    <img alt="" src="<?php echo base_url()?>assets/img/no-image.png" class="img-responsive">
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills nav-justified">
                                                                    <li role="presentation" class="active"><a href="<?php echo base_url('auth/detail_course/'.$user->id);?>"><?php echo lang('person_course_label')?></a></li>
                                                                    <li role="presentation"><a href="<?php echo base_url('auth/detail_certificate/'.$user->id);?>"><?php echo lang('person_certificate_label')?></a></li>
                                                                    <li role="presentation"><a href="<?php echo base_url('auth/detail_education/'.$user->id);?>"><?php echo lang('person_education_label')?>Education</a></li>
                                                                    <li role="presentation"><a href="#"><?php echo lang('person_experience_label')?></a></li>
                                                                    <li role="presentation"><a href="#"><?php echo lang('person_sk_label')?></a></li>
                                                                    <li role="presentation"><a href="#"><?php echo lang('person_sti_label')?></a></li>
                                                                    <li role="presentation"><a href="#"><?php echo lang('person_riwayat_jabatan_label')?></a></li>
                                                                    <li role="presentation"><a href="#"><?php echo lang('person_ikatan_dinas_label')?></a></li>                            
                                </ul>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE -->
</div>

                        

                    
                       <?php /* 

                        <!--start Experience Row -->

                        <div class="row">
                            
                                <div class="grid simple ">                            
                                    <div class="grid-body no-border">
                                        <br/>
                                        <!--
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4><?php echo lang('search_of_subheading')?>&nbsp;<span class="semi-bold"><?php echo lang('user_subheading');?></span></h4>
                                            </div>
                                        </div>

                                        <?php echo form_open(site_url('auth/keywords'))?>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-md-3 search_label"><?php echo form_label(lang('index_fname_th'),'first_name')?></div>
                                                        <div class="col-md-9"><?php// echo bs_form_input($fname_search)?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-md-3 search_label"><?php echo form_label(lang('index_email_th'),'email')?></div>
                                                        <div class="col-md-9"><?php// echo bs_form_input($email_search)?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row">
                                                        <div class="col-md-12"><?php echo form_submit('submit','Search','class="btn btn-primary"')?></div>
                                                    </div>
                                                </div>    
                                            </div>
                                        <?php echo form_close()?>
                                        -->
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4><?php echo lang('found_subheading')?>&nbsp;<span class="semi-bold"><?php echo $num_rows_exp;?>&nbsp;<?php echo lang('experience_subheading');?></span></h4>
                                            </div>
                                        </div>

                                        <a class="btn btn-primary" href="#" rel="async" ajaxify="<?php echo site_url('auth/auth_ajax/test_ajaxify'); ?>">Tambah</a>

                                        <table class="table no-more-tables">
                                            <thead>
                                                <tr>
                                                    <th width="1%">
                                                        <div class="checkbox check-default">
                                                            <input id="checkbox10" type="checkbox" value="1" class="checkall">
                                                            <label for="checkbox10"></label>
                                                        </div>
                                                    </th>
                                                    <th width="10%"><?php echo 'Company' //anchor('auth/index/'.$fname_param.'/'.$email_param.'/first_name/'.(($sort_order == 'asc' && $sort_by == 'first_name') ? 'desc' : 'asc'), lang('index_fname_th'));?></th>
                                                    <th width="10%"><?php echo 'Position'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
                                                    <th width="10%"><?php echo 'Start Date'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/email/'.(($sort_order == 'asc' && $sort_by == 'email') ? 'desc' : 'asc'), lang('index_email_th'));?></th>
                                                    <th width="10%"><?php echo 'End Date';?></th>
                                                    <th width="10%"><?php echo 'Street'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
                                                    <th width="10%"><?php echo 'Line of Business'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/email/'.(($sort_order == 'asc' && $sort_by == 'email') ? 'desc' : 'asc'), lang('index_email_th'));?></th>
                                                    <th width="10%"><?php echo 'Resignation Reason';?></th>
                                                    <th width="10%"><?php echo 'Last Salary';?></th>
                                                    <th width="10%"><?php echo lang('index_action_th');?></th>                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if ($user_exp->num_rows() > 0){
                                                        foreach($user_exp->result() as $row){?>
                                                <tr>
                                                    <td valign="middle">
                                                         <div class="checkbox check-default">
                                                            <input id="checkbox<?php echo $row->id;?>" type="checkbox" value="<?php echo $row->id;?>">
                                                            <label for="checkbox<?php echo $row->id;?>"></label>
                                                        </div>
                                                    </td>
                                                    <td valign="middle"><?php echo $row->company;?></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->position;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->start_date;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->end_date;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->address;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->line_business;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->resign_reason;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->last_salary;?></span></td>
                                                    <td valign="middle">
                                                        <span class="muted"><?php echo anchor("auth/edit_user/".$row->id, 'Edit') ;?></span>
                                                        &nbsp;|&nbsp; 
                                                        <span class="muted"><?php echo anchor("auth/detail/".$row->id, 'Personal') ;?></span>
                                                    </td>
                                                </tr>

                                            <?php }}else{?>
                                                <tr>
                                                    <td valign="middle">
                                                         <div class="checkbox check-default">
                                                            <input id="checkbox11" type="checkbox" value="1">
                                                            <label for="checkbox11"></label>
                                                        </div>
                                                    </td>
                                                    <td valign="middle">No Data</td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle">
                                                        No Data
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                            </tbody>
                                        </table>
                                        <div class="row">
                                            
                                            <div class="col-md-2 page_limit">
                                                <?php// echo form_open(uri_string());?>
                                                <!--<?php 
                                                    $selectComponentData = array(
                                                        10  => '10',
                                                        25 => '25',
                                                        50 =>'50',
                                                        75 => '75',
                                                        100 => '100',);
                                                    $selectComponentJs = 'class="select2" onChange="this.form.submit()" id="limit"';
                                                    echo "Per page: ".form_dropdown('limit', $selectComponentData, $limit, $selectComponentJs);
                                                ?>
                                                <?php echo form_close();?>-->
                                            </div>
                                            <div class="col-md-10">
                                                <ul class="pagination">
                                                    <?php// echo $halaman;?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                        </div>

                        <!-- End Experience Tab -->

                        <!--start SK Row -->

                        <div class="row">
                            
                                <div class="grid simple ">                            
                                    <div class="grid-body no-border">
                                        <br/>
                                        <!--
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4><?php echo lang('search_of_subheading')?>&nbsp;<span class="semi-bold"><?php echo lang('user_subheading');?></span></h4>
                                            </div>
                                        </div>

                                        <?php echo form_open(site_url('auth/keywords'))?>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-md-3 search_label"><?php echo form_label(lang('index_fname_th'),'first_name')?></div>
                                                        <div class="col-md-9"><?php// echo bs_form_input($fname_search)?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-md-3 search_label"><?php echo form_label(lang('index_email_th'),'email')?></div>
                                                        <div class="col-md-9"><?php// echo bs_form_input($email_search)?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row">
                                                        <div class="col-md-12"><?php echo form_submit('submit','Search','class="btn btn-primary"')?></div>
                                                    </div>
                                                </div>    
                                            </div>
                                        <?php echo form_close()?>
                                        -->
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4><?php echo lang('found_subheading')?>&nbsp;<span class="semi-bold"><?php echo $num_rows_sk;?>&nbsp;<?php echo 'SK'//lang('experience_subheading');?></span></h4>
                                            </div>
                                        </div>

                                        <a class="btn btn-primary" href="#" rel="async" ajaxify="<?php echo site_url('auth/auth_ajax/test_ajaxify'); ?>">Tambah</a>

                                        <table class="table no-more-tables">
                                            <thead>
                                                <tr>
                                                    <th width="1%">
                                                        <div class="checkbox check-default">
                                                            <input id="checkbox10" type="checkbox" value="1" class="checkall">
                                                            <label for="checkbox10"></label>
                                                        </div>
                                                    </th>
                                                    <th width="10%"><?php echo 'SK Date' //anchor('auth/index/'.$fname_param.'/'.$email_param.'/first_name/'.(($sort_order == 'asc' && $sort_by == 'first_name') ? 'desc' : 'asc'), lang('index_fname_th'));?></th>
                                                    <th width="10%"><?php echo 'Nomor SK'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
                                                    <th width="10%"><?php echo 'Position'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/email/'.(($sort_order == 'asc' && $sort_by == 'email') ? 'desc' : 'asc'), lang('index_email_th'));?></th>
                                                    <th width="10%"><?php echo 'Departement';?></th>
                                                    <th width="10%"><?php echo 'Tanggal Efektif'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
                                                    <th width="10%"><?php echo 'Tempat'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/email/'.(($sort_order == 'asc' && $sort_by == 'email') ? 'desc' : 'asc'), lang('index_email_th'));?></th>
                                                    <th width="10%"><?php echo 'Penandatangan';?></th>
                                                    <th width="10%"><?php echo 'Lokasi Penandatangan';?></th>
                                                    <th width="10%"><?php echo lang('index_action_th');?></th>                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if ($user_sk->num_rows() > 0){
                                                        foreach($user_sk->result() as $row){?>
                                                <tr>
                                                    <td valign="middle">
                                                         <div class="checkbox check-default">
                                                            <input id="checkbox<?php echo $row->id;?>" type="checkbox" value="<?php echo $row->id;?>">
                                                            <label for="checkbox<?php echo $row->id;?>"></label>
                                                        </div>
                                                    </td>
                                                    <td valign="middle"><?php echo $row->sk_date;?></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->sk_no;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->position;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->departement;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->effective_date;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->location;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->sign_name;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->sign_position;?></span></td>
                                                    <td valign="middle">
                                                        <span class="muted"><?php echo anchor("auth/edit_user/".$row->id, 'Edit') ;?></span>
                                                        &nbsp;|&nbsp; 
                                                        <span class="muted"><?php echo anchor("auth/detail/".$row->id, 'Personal') ;?></span>
                                                    </td>
                                                </tr>

                                            <?php }}else{?>
                                                <tr>
                                                    <td valign="middle">
                                                         <div class="checkbox check-default">
                                                            <input id="checkbox11" type="checkbox" value="1">
                                                            <label for="checkbox11"></label>
                                                        </div>
                                                    </td>
                                                    <td valign="middle">No Data</td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle">
                                                        No Data
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                            </tbody>
                                        </table>
                                        <div class="row">
                                            
                                            <div class="col-md-2 page_limit">
                                                <?php// echo form_open(uri_string());?>
                                                <!--<?php 
                                                    $selectComponentData = array(
                                                        10  => '10',
                                                        25 => '25',
                                                        50 =>'50',
                                                        75 => '75',
                                                        100 => '100',);
                                                    $selectComponentJs = 'class="select2" onChange="this.form.submit()" id="limit"';
                                                    echo "Per page: ".form_dropdown('limit', $selectComponentData, $limit, $selectComponentJs);
                                                ?>
                                                <?php echo form_close();?>-->
                                            </div>
                                            <div class="col-md-10">
                                                <ul class="pagination">
                                                    <?php// echo $halaman;?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                        </div>

                        <!-- End SK Tab -->

                        <!--start STI Row -->

                        <div class="row">
                            
                                <div class="grid simple ">                            
                                    <div class="grid-body no-border">
                                        <br/>
                                        <!--
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4><?php echo lang('search_of_subheading')?>&nbsp;<span class="semi-bold"><?php echo lang('user_subheading');?></span></h4>
                                            </div>
                                        </div>

                                        <?php echo form_open(site_url('auth/keywords'))?>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-md-3 search_label"><?php echo form_label(lang('index_fname_th'),'first_name')?></div>
                                                        <div class="col-md-9"><?php// echo bs_form_input($fname_search)?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-md-3 search_label"><?php echo form_label(lang('index_email_th'),'email')?></div>
                                                        <div class="col-md-9"><?php// echo bs_form_input($email_search)?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row">
                                                        <div class="col-md-12"><?php echo form_submit('submit','Search','class="btn btn-primary"')?></div>
                                                    </div>
                                                </div>    
                                            </div>
                                        <?php echo form_close()?>
                                        -->
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4><?php echo lang('found_subheading')?>&nbsp;<span class="semi-bold"><?php echo $num_rows_sti;?>&nbsp;<?php echo 'STI'//lang('experience_subheading');?></span></h4>
                                            </div>
                                        </div>

                                        <a class="btn btn-primary" href="#" rel="async" ajaxify="<?php echo site_url('auth/auth_ajax/test_ajaxify'); ?>">Tambah</a>

                                        <table class="table no-more-tables">
                                            <thead>
                                                <tr>
                                                    <th width="1%">
                                                        <div class="checkbox check-default">
                                                            <input id="checkbox10" type="checkbox" value="1" class="checkall">
                                                            <label for="checkbox10"></label>
                                                        </div>
                                                    </th>
                                                    <th width="10%"><?php echo 'Employee' //anchor('auth/index/'.$fname_param.'/'.$email_param.'/first_name/'.(($sort_order == 'asc' && $sort_by == 'first_name') ? 'desc' : 'asc'), lang('index_fname_th'));?></th>
                                                    <th width="10%"><?php echo 'No Identitas'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
                                                    <th width="10%"><?php echo 'Ijazah Name'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/email/'.(($sort_order == 'asc' && $sort_by == 'email') ? 'desc' : 'asc'), lang('index_email_th'));?></th>
                                                    <th width="10%"><?php echo 'Ijazah No';?></th>
                                                    <th width="10%"><?php echo 'Tempat Tanggal Dikeluarkan'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
                                                    <th width="10%"><?php echo 'Dikeluarkan Oleh'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/email/'.(($sort_order == 'asc' && $sort_by == 'email') ? 'desc' : 'asc'), lang('index_email_th'));?></th>
                                                    <th width="10%"><?php echo lang('index_action_th');?></th>                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if ($user_sti->num_rows() > 0){
                                                        foreach($user_sti->result() as $row){?>
                                                <tr>
                                                    <td valign="middle">
                                                         <div class="checkbox check-default">
                                                            <input id="checkbox<?php echo $row->id;?>" type="checkbox" value="<?php echo $row->id;?>">
                                                            <label for="checkbox<?php echo $row->id;?>"></label>
                                                        </div>
                                                    </td>
                                                    <td valign="middle"><?php echo $row->username;?></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->identity_no;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->ijazah_name;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->ijazah_number;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->ijazah_history;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->institution;?></span></td>
                                                    <td valign="middle">
                                                        <span class="muted"><?php echo anchor("auth/edit_user/".$row->id, 'Edit') ;?></span>
                                                        &nbsp;|&nbsp; 
                                                        <span class="muted"><?php echo anchor("auth/detail/".$row->id, 'Personal') ;?></span>
                                                    </td>
                                                </tr>

                                            <?php }}else{?>
                                                <tr>
                                                    <td valign="middle">
                                                         <div class="checkbox check-default">
                                                            <input id="checkbox11" type="checkbox" value="1">
                                                            <label for="checkbox11"></label>
                                                        </div>
                                                    </td>
                                                    <td valign="middle">No Data</td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle">
                                                        No Data
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                            </tbody>
                                        </table>
                                        <div class="row">
                                            
                                            <div class="col-md-2 page_limit">
                                                <?php// echo form_open(uri_string());?>
                                                <!--<?php 
                                                    $selectComponentData = array(
                                                        10  => '10',
                                                        25 => '25',
                                                        50 =>'50',
                                                        75 => '75',
                                                        100 => '100',);
                                                    $selectComponentJs = 'class="select2" onChange="this.form.submit()" id="limit"';
                                                    echo "Per page: ".form_dropdown('limit', $selectComponentData, $limit, $selectComponentJs);
                                                ?>
                                                <?php echo form_close();?>-->
                                            </div>
                                            <div class="col-md-10">
                                                <ul class="pagination">
                                                    <?php// echo $halaman;?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                        </div>

                        <!-- End STI Tab -->


                        <!--start Jabatan Row -->

                        <div class="row">
                            
                                <div class="grid simple ">                            
                                    <div class="grid-body no-border">
                                        <br/>
                                        <!--
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4><?php echo lang('search_of_subheading')?>&nbsp;<span class="semi-bold"><?php echo lang('user_subheading');?></span></h4>
                                            </div>
                                        </div>

                                        <?php echo form_open(site_url('auth/keywords'))?>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-md-3 search_label"><?php echo form_label(lang('index_fname_th'),'first_name')?></div>
                                                        <div class="col-md-9"><?php// echo bs_form_input($fname_search)?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-md-3 search_label"><?php echo form_label(lang('index_email_th'),'email')?></div>
                                                        <div class="col-md-9"><?php// echo bs_form_input($email_search)?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row">
                                                        <div class="col-md-12"><?php echo form_submit('submit','Search','class="btn btn-primary"')?></div>
                                                    </div>
                                                </div>    
                                            </div>
                                        <?php echo form_close()?>
                                        -->
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4><?php echo lang('found_subheading')?>&nbsp;<span class="semi-bold"><?php echo $num_rows_jabatan;?>&nbsp;<?php echo 'Riwayat Jabatan'//lang('experience_subheading');?></span></h4>
                                            </div>
                                        </div>

                                        <a class="btn btn-primary" href="#" rel="async" ajaxify="<?php echo site_url('auth/auth_ajax/test_ajaxify'); ?>">Tambah</a>

                                        <table class="table no-more-tables">
                                            <thead>
                                                <tr>
                                                    <th width="1%">
                                                        <div class="checkbox check-default">
                                                            <input id="checkbox10" type="checkbox" value="1" class="checkall">
                                                            <label for="checkbox10"></label>
                                                        </div>
                                                    </th>
                                                    <th width="10%"><?php echo 'Name' //anchor('auth/index/'.$fname_param.'/'.$email_param.'/first_name/'.(($sort_order == 'asc' && $sort_by == 'first_name') ? 'desc' : 'asc'), lang('index_fname_th'));?></th>
                                                    <th width="10%"><?php echo 'Organization Unit'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
                                                    <th width="10%"><?php echo 'Position Description'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/email/'.(($sort_order == 'asc' && $sort_by == 'email') ? 'desc' : 'asc'), lang('index_email_th'));?></th>
                                                    <th width="10%"><?php echo 'Empl Group';?></th>
                                                    <th width="10%"><?php echo 'Grade'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
                                                    <th width="10%"><?php echo 'Branch ID'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/email/'.(($sort_order == 'asc' && $sort_by == 'email') ? 'desc' : 'asc'), lang('index_email_th'));?></th>
                                                    <th width="10%"><?php echo 'Personnel Action ID'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
                                                    <th width="10%"><?php echo 'Tanggal SK'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/email/'.(($sort_order == 'asc' && $sort_by == 'email') ? 'desc' : 'asc'), lang('index_email_th'));?></th>
                                                    
                                                    <th width="10%"><?php echo lang('index_action_th');?></th>                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if ($user_jabatan->num_rows() > 0){
                                                        foreach($user_jabatan->result() as $row){?>
                                                <tr>
                                                    <td valign="middle">
                                                         <div class="checkbox check-default">
                                                            <input id="checkbox<?php echo $row->id;?>" type="checkbox" value="<?php echo $row->id;?>">
                                                            <label for="checkbox<?php echo $row->id;?>"></label>
                                                        </div>
                                                    </td>
                                                    <td valign="middle"><?php echo $row->username;?></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->organization;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->position;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo '-';?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->grade;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo '-';?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo '-';?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->sk_date;?></span></td>
                                                    <td valign="middle">
                                                        <span class="muted"><?php echo anchor("auth/edit_user/".$row->id, 'Edit') ;?></span>
                                                        &nbsp;|&nbsp; 
                                                        <span class="muted"><?php echo anchor("auth/detail/".$row->id, 'Personal') ;?></span>
                                                    </td>
                                                </tr>

                                            <?php }}else{?>
                                                <tr>
                                                    <td valign="middle">
                                                         <div class="checkbox check-default">
                                                            <input id="checkbox11" type="checkbox" value="1">
                                                            <label for="checkbox11"></label>
                                                        </div>
                                                    </td>
                                                    <td valign="middle">No Data</td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle">
                                                        No Data
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                            </tbody>
                                        </table>
                                        <div class="row">
                                            
                                            <div class="col-md-2 page_limit">
                                                <?php// echo form_open(uri_string());?>
                                                <!--<?php 
                                                    $selectComponentData = array(
                                                        10  => '10',
                                                        25 => '25',
                                                        50 =>'50',
                                                        75 => '75',
                                                        100 => '100',);
                                                    $selectComponentJs = 'class="select2" onChange="this.form.submit()" id="limit"';
                                                    echo "Per page: ".form_dropdown('limit', $selectComponentData, $limit, $selectComponentJs);
                                                ?>
                                                <?php echo form_close();?>-->
                                            </div>
                                            <div class="col-md-10">
                                                <ul class="pagination">
                                                    <?php// echo $halaman;?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                        </div>

                        <!-- End Jabatan Tab -->

                        <!--start Award Row -->

                        <div class="row">
                            
                                <div class="grid simple ">                            
                                    <div class="grid-body no-border">
                                        <br/>
                                        <!--
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4><?php echo lang('search_of_subheading')?>&nbsp;<span class="semi-bold"><?php echo lang('user_subheading');?></span></h4>
                                            </div>
                                        </div>

                                        <?php echo form_open(site_url('auth/keywords'))?>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-md-3 search_label"><?php echo form_label(lang('index_fname_th'),'first_name')?></div>
                                                        <div class="col-md-9"><?php// echo bs_form_input($fname_search)?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-md-3 search_label"><?php echo form_label(lang('index_email_th'),'email')?></div>
                                                        <div class="col-md-9"><?php// echo bs_form_input($email_search)?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row">
                                                        <div class="col-md-12"><?php echo form_submit('submit','Search','class="btn btn-primary"')?></div>
                                                    </div>
                                                </div>    
                                            </div>
                                        <?php echo form_close()?>
                                        -->
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4><?php echo lang('found_subheading')?>&nbsp;<span class="semi-bold"><?php echo $num_rows_award;?>&nbsp;<?php echo 'Award Warning'//lang('experience_subheading');?></span></h4>
                                            </div>
                                        </div>

                                        <a class="btn btn-primary" href="#" rel="async" ajaxify="<?php echo site_url('auth/auth_ajax/test_ajaxify'); ?>">Tambah</a>

                                        <table class="table no-more-tables">
                                            <thead>
                                                <tr>
                                                    <th width="1%">
                                                        <div class="checkbox check-default">
                                                            <input id="checkbox10" type="checkbox" value="1" class="checkall">
                                                            <label for="checkbox10"></label>
                                                        </div>
                                                    </th>
                                                    <th width="10%"><?php echo 'Award/Warning Type' //anchor('auth/index/'.$fname_param.'/'.$email_param.'/first_name/'.(($sort_order == 'asc' && $sort_by == 'first_name') ? 'desc' : 'asc'), lang('index_fname_th'));?></th>
                                                    <th width="10%"><?php echo 'Award/Warning ID'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
                                                    <th width="10%"><?php echo 'Description'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/email/'.(($sort_order == 'asc' && $sort_by == 'email') ? 'desc' : 'asc'), lang('index_email_th'));?></th>
                                                    <th width="10%"><?php echo 'Approved Date';?></th>
                                                    <th width="10%"><?php echo 'SK Date'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
                                                    <th width="10%"><?php echo 'From Date'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/email/'.(($sort_order == 'asc' && $sort_by == 'email') ? 'desc' : 'asc'), lang('index_email_th'));?></th>
                                                    <th width="10%"><?php echo 'To Date'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
                                                    
                                                    <th width="10%"><?php echo lang('index_action_th');?></th>                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if ($user_award->num_rows() > 0){
                                                        foreach($user_award->result() as $row){?>
                                                <tr>
                                                    <td valign="middle">
                                                         <div class="checkbox check-default">
                                                            <input id="checkbox<?php echo $row->id;?>" type="checkbox" value="<?php echo $row->id;?>">
                                                            <label for="checkbox<?php echo $row->id;?>"></label>
                                                        </div>
                                                    </td>
                                                    <td valign="middle"><?php echo $row->type;?></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->id;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->description;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->app_date;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->sk_number;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->start_date;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->end_date;?></span></td>
                                                    <td valign="middle">
                                                        <span class="muted"><?php echo anchor("auth/edit_user/".$row->id, 'Edit') ;?></span>
                                                        &nbsp;|&nbsp; 
                                                        <span class="muted"><?php echo anchor("auth/detail/".$row->id, 'Personal') ;?></span>
                                                    </td>
                                                </tr>

                                            <?php }}else{?>
                                                <tr>
                                                    <td valign="middle">
                                                         <div class="checkbox check-default">
                                                            <input id="checkbox11" type="checkbox" value="1">
                                                            <label for="checkbox11"></label>
                                                        </div>
                                                    </td>
                                                    <td valign="middle">No Data</td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle">
                                                        No Data
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                            </tbody>
                                        </table>
                                        <div class="row">
                                            
                                            <div class="col-md-2 page_limit">
                                                <?php// echo form_open(uri_string());?>
                                                <!--<?php 
                                                    $selectComponentData = array(
                                                        10  => '10',
                                                        25 => '25',
                                                        50 =>'50',
                                                        75 => '75',
                                                        100 => '100',);
                                                    $selectComponentJs = 'class="select2" onChange="this.form.submit()" id="limit"';
                                                    echo "Per page: ".form_dropdown('limit', $selectComponentData, $limit, $selectComponentJs);
                                                ?>
                                                <?php echo form_close();?>-->
                                            </div>
                                            <div class="col-md-10">
                                                <ul class="pagination">
                                                    <?php// echo $halaman;?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                        </div>

                        <!-- End Award Tab -->


                        <!--start Ikatan Row -->

                        <div class="row">
                            
                                <div class="grid simple ">                            
                                    <div class="grid-body no-border">
                                        <br/>
                                        <!--
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4><?php echo lang('search_of_subheading')?>&nbsp;<span class="semi-bold"><?php echo lang('user_subheading');?></span></h4>
                                            </div>
                                        </div>

                                        <?php echo form_open(site_url('auth/keywords'))?>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-md-3 search_label"><?php echo form_label(lang('index_fname_th'),'first_name')?></div>
                                                        <div class="col-md-9"><?php// echo bs_form_input($fname_search)?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-md-3 search_label"><?php echo form_label(lang('index_email_th'),'email')?></div>
                                                        <div class="col-md-9"><?php// echo bs_form_input($email_search)?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row">
                                                        <div class="col-md-12"><?php echo form_submit('submit','Search','class="btn btn-primary"')?></div>
                                                    </div>
                                                </div>    
                                            </div>
                                        <?php echo form_close()?>
                                        -->
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4><?php echo lang('found_subheading')?>&nbsp;<span class="semi-bold"><?php echo $num_rows_ikatan;?>&nbsp;<?php echo 'Ikatan Dinas'//lang('experience_subheading');?></span></h4>
                                            </div>
                                        </div>

                                        <a class="btn btn-primary" href="#" rel="async" ajaxify="<?php echo site_url('auth/auth_ajax/test_ajaxify'); ?>">Tambah</a>

                                        <table class="table no-more-tables">
                                            <thead>
                                                <tr>
                                                    <th width="1%">
                                                        <div class="checkbox check-default">
                                                            <input id="checkbox10" type="checkbox" value="1" class="checkall">
                                                            <label for="checkbox10"></label>
                                                        </div>
                                                    </th>
                                                    <th width="10%"><?php echo 'ID' //anchor('auth/index/'.$fname_param.'/'.$email_param.'/first_name/'.(($sort_order == 'asc' && $sort_by == 'first_name') ? 'desc' : 'asc'), lang('index_fname_th'));?></th>
                                                    <th width="10%"><?php echo 'Type'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
                                                    <th width="10%"><?php echo 'Employee'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/email/'.(($sort_order == 'asc' && $sort_by == 'email') ? 'desc' : 'asc'), lang('index_email_th'));?></th>
                                                    <th width="10%"><?php echo 'Description';?></th>
                                                    <th width="10%"><?php echo 'To Date'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
                                                    <th width="10%"><?php echo 'From Date'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/email/'.(($sort_order == 'asc' && $sort_by == 'email') ? 'desc' : 'asc'), lang('index_email_th'));?></th>
                                                    <th width="10%"><?php echo 'Amount'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
                                                    
                                                    <th width="10%"><?php echo lang('index_action_th');?></th>                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if ($user_ikatan->num_rows() > 0){
                                                        foreach($user_ikatan->result() as $row){?>
                                                <tr>
                                                    <td valign="middle">
                                                         <div class="checkbox check-default">
                                                            <input id="checkbox<?php echo $row->id;?>" type="checkbox" value="<?php echo $row->id;?>">
                                                            <label for="checkbox<?php echo $row->id;?>"></label>
                                                        </div>
                                                    </td>
                                                    <td valign="middle"><?php echo $row->type;?></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->type;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->username;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->title;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->start_date;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->end_date;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->amount;?></span></td>
                                                    <td valign="middle">
                                                        <span class="muted"><?php echo anchor("auth/edit_user/".$row->id, 'Edit') ;?></span>
                                                        &nbsp;|&nbsp; 
                                                        <span class="muted"><?php echo anchor("auth/detail/".$row->id, 'Personal') ;?></span>
                                                    </td>
                                                </tr>

                                            <?php }}else{?>
                                                <tr>
                                                    <td valign="middle">
                                                         <div class="checkbox check-default">
                                                            <input id="checkbox11" type="checkbox" value="1">
                                                            <label for="checkbox11"></label>
                                                        </div>
                                                    </td>
                                                    <td valign="middle">No Data</td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle"><span class="muted">No Data</span></td>
                                                    <td valign="middle">
                                                        No Data
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                            </tbody>
                                        </table>
                                        <div class="row">
                                            
                                            <div class="col-md-2 page_limit">
                                                <?php// echo form_open(uri_string());?>
                                                <!--<?php 
                                                    $selectComponentData = array(
                                                        10  => '10',
                                                        25 => '25',
                                                        50 =>'50',
                                                        75 => '75',
                                                        100 => '100',);
                                                    $selectComponentJs = 'class="select2" onChange="this.form.submit()" id="limit"';
                                                    echo "Per page: ".form_dropdown('limit', $selectComponentData, $limit, $selectComponentJs);
                                                ?>
                                                <?php echo form_close();?>-->
                                            </div>
                                            <div class="col-md-10">
                                                <ul class="pagination">
                                                    <?php// echo $halaman;?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                        </div>

                        <!-- End Ikatan Dinas Tab -->
                        \*?>















                  