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
                                    <li role="presentation" class="active"><a href="#"><?php echo lang('person_course_label')?></a></li>
                                    <li role="presentation"><a href="#"><?php echo lang('person_certificate_label')?></a></li>
                                    <li role="presentation"><a href="#"><?php echo lang('person_education_label')?></a></li>
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