<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        <p class="txtBold txtRed" id="passMsgBad" style="background: #fff; display: none;"><!-- show if failure -->
                                               
                                            </p>
      </div>
      <div class="modal-body">
     <?= form_open('organization_class/submit', array('id'=>'frm'))?> 
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

<!-- <a class="btn btn-primary" href="#" rel="async" ajaxify="<?php echo site_url('organization_class/organization_class_ajax/test_ajaxify'); ?>">Tambah</a> -->
<!-- Modal End -->


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
            <i class="icon-custom-left"></i>
            <h3><?php echo lang('list_of_subheading')?>&nbsp;<span class="semi-bold"><?php echo lang('org_class_subheading');?></span></h3> 
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="grid simple ">                            
                    <div class="grid-body no-border">
                        <br/>
                        <div class="row">
                            <div class="col-md-6">
                                <h4><?php echo lang('search_of_subheading')?>&nbsp;<span class="semi-bold"><?php echo lang('org_class_subheading');?></span></h4>
                            </div>
                        </div>
                        <?php echo form_open(site_url('organization_class/keywords'))?>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-3 search_label"><?php echo form_label(lang('index_ftitle_th'),'Title')?></div>
                                        <div class="col-md-9"><?php echo bs_form_input($ftitle_search)?></div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-info"><i class="icon-search"></i>&nbsp;<?php echo lang('search_button')?></button>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        <?php echo form_close()?>
                        <br/>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="1%">
                                        <div class="checkbox check-default">
                                            <input id="checkbox10" type="checkbox" value="1" class="checkall">
                                            <label for="checkbox10"></label>
                                        </div>
                                    </th>
                                    <th width="10%"><?php echo anchor('organization_class/index/'.$ftitle_param.'/title/'.(($sort_order == 'asc' && $sort_by == 'title') ? 'desc' : 'asc'), lang('index_ftitle_th'));?></th>
                                    <th width="10%"><?php echo lang('index_action_th');?></th>                                  
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($organization_class as $user):?>
                                <tr>
                                    <td valign="middle">
                                         <div class="checkbox check-default">
                                            <input id="checkbox11" type="checkbox" value="1">
                                            <label for="checkbox11"></label>
                                        </div>
                                    </td>
                                    <td valign="middle"><?php echo $user->title;?></td>
                                    <td valign="middle">
                                        <?php //echo anchor("organization_class/edit_user/".$user->id, 'Edit') ;?>
                                        <a href="<?php echo site_url('organization_class/edit/'.$user->id)?>">
                                            <button type="button" class="btn btn-info btn-small" title="<?php echo lang('edit_button')?>"><i class="icon-paste"></i></button>
                                        </a>
                                        <a href="<?php echo site_url('organization_class/delete/'.$user->id)?>">
                                            <button class='btn btn-danger btn-small' type="button" title="<?php echo lang('delete_label')?>"><i class="icon-warning-sign"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-4 page_limit">
                                <?php echo form_open(uri_string());?>
                                <?php 
                                    $selectComponentData = array(
                                        10  => '10',
                                        25 => '25',
                                        50 =>'50',
                                        75 => '75',
                                        100 => '100',);
                                    $selectComponentJs = 'class="select2" onChange="this.form.submit()" id="limit"';
                                    echo "Per page: ".form_dropdown('limit', $selectComponentData, $limit, $selectComponentJs);
                                    echo '&nbsp;'.lang('found_subheading').'&nbsp;'.$num_rows_all.'&nbsp;'.lang('org_class_subheading');
                                ?>
                                <?php echo form_close();?>
                            </div>
                            <div class="col-md-10">
                                <ul class="pagination">
                                    <?php echo $halaman;?>
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