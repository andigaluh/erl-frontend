<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        <p class="txtBold txtRed" id="passMsgBad" style="background: #fff; display: none;"></p>
      </div>
      <div class="modal-body">
        <?= form_open('auth/submit', array('id'=>'frm'))?> 
                                    <div class="row form-row">
                                      <div class="col-md-3">
                                        <?php echo lang('register_nik_label', 'nik');?>
                                      </div>
                                      <div class="col-md-9">
                                        <input type="text" class="form-control" name="nik" value=""> 
                                        <input type="text" class="form-control" name="name" value="">          
                                      </div>
                                    </div>
                                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
        <input type="submit" name="btn_submit" id="btnRetPass" value="submit" class="lnkBlkWhtArw" style="margin-top: 3px;">
      </div>
        <?= form_close()?>
    </div>
  </div>
</div>



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
      
        <div class="page-title">
            <a href="<?php echo site_url('auth')?>"><i class="icon-custom-left"></i></a>
            <h3><?php echo lang('detail_user_heading');?></h3> 
        </div>


         <!--start Certificate Row -->

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
                                                <h4><?php echo lang('found_subheading')?>&nbsp;<span class="semi-bold"><?php echo $num_rows_certificate;?>&nbsp;<?php echo lang('certificate_subheading');?></span></h4>
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
                                                    <th width="10%"><?php echo 'Course ID' //anchor('auth/index/'.$fname_param.'/'.$email_param.'/first_name/'.(($sort_order == 'asc' && $sort_by == 'first_name') ? 'desc' : 'asc'), lang('index_fname_th'));?></th>
                                                    <th width="10%"><?php echo 'Description'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
                                                    <th width="10%"><?php echo 'Registration Date'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/email/'.(($sort_order == 'asc' && $sort_by == 'email') ? 'desc' : 'asc'), lang('index_email_th'));?></th>
                                                    <th width="10%"><?php echo 'Status';?></th>
                                                    <th width="10%"><?php echo lang('index_action_th');?></th>                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if ($user_certificate->num_rows() > 0){
                                                        foreach($user_certificate->result() as $row){?>
                                                <tr>
                                                    <td valign="middle">
                                                         <div class="checkbox check-default">
                                                            <input id="checkbox<?php echo $row->id;?>" type="checkbox" value="<?php echo $row->id;?>">
                                                            <label for="checkbox<?php echo $row->id;?>"></label>
                                                        </div>
                                                    </td>
                                                    <td valign="middle"><?php echo $row->certification_type;?></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->description;?></span></td>
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

                                            <!--Navbar-->
                                            <div class="row">

                                            <div class="col-md-12">
                                                <div class="grid simple ">
                                                    <div class="grid-title no-border">
                                                      <h4><a href="<?php echo site_url('auth/index')?>"><?php echo lang('change_user_detail_link')?></a></h4>
                                                    </div>                          
                                                    <div class="grid-body no-border">
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
                                            <!-- End Navbar>
                                        </div>


                                        </div>
                                    </div>
                                </div>
                           
                        </div>

                        <!-- End Course Row -->

      

    </div>
    <!-- END PAGE -->
</div>