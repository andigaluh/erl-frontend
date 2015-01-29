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
                        <?php include 'auth_detail_navbar.php';?>
                        <hr />

                        <!--start sti Row -->

                        <div class="row">
                            
                                <div class="grid simple ">                            
                                    <div class="grid-body no-border">
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4><?php echo lang('search_of_subheading')?>&nbsp;<span class="semi-bold"><?php echo lang('sti_subheading');?></span></h4>
                                            </div>
                                        </div>

                                        <?php echo form_open('auth/search/'.$user->id, array( 'id'=>'search'))?>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-2 search_label"><?php echo form_label(lang('index_sti_title_th'),'sti_title_search')?></div>
                                                        <div class="col-md-10"><?php echo bs_form_input(array('id'=>'title', 'name'=>'title'));?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <?php echo form_submit('submit',lang('search_button'),'class="btn btn-primary"')?>
                                                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addstiModal"><?php echo lang('add_button');?></button>
                                                        <!-- <input type="submit" name="btn_add" id="btnRetPass" class="btn btn-default" value="<?php echo lang('search_button')?>" class="lnkBlkWhtArw" style="margin-top: 3px;"> -->
                                                    </div>
                                                </div>    
                                            </div>
                                        <?php echo form_close()?>
                                        
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div id="MsgGood" class="msggood text-center" style="display:none;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="tabel">

                                        <div class="row">
                                            
                                            <div class="col-md-2 page_limit">
                                                <!--<?php echo form_open(uri_string());?>
                                                <?php/* 
                                                    $selectComponentData = array(
                                                        10  => '10',
                                                        25 => '25',
                                                        50 =>'50',
                                                        75 => '75',
                                                        100 => '100',);
                                                    $selectComponentJs = 'class="select2" onChange="this.form.submit()" id="limit"';
                                                    echo "Per page: ".form_dropdown('limit', $selectComponentData, $limit, $selectComponentJs);
                                                */?> -->
                                                <?php echo form_close();?>
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
             </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE -->
</div>


<!-- Add sti Modal -->
<div class="modal fade" id="addstiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog" id="modaldialog">
    	<div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel"><?php echo lang('add_sti', 'add_sti')?></h4>
		        <p class="txtBold txtRed" class="error_msg" id="MsgBad" style="background: #fff; display: none;"></p>
		    </div>
	      	<div class="modal-body">
	        	<?= form_open('auth/add_sti/'.$user->id, array('id'=>'formadd'))?> 
	             <div class="row form-row">

	             	<div class="col-md-3">
	                    <?php echo lang('identity_no', 'identity_no');?>
	                </div>
	                 <div class="col-md-9">
	                    <input type="text" class="form-control" name="identity_no">         
	                </div>

	                <div class="col-md-3">
	                    <?php echo lang('ijazah_name', 'ijazah_name');?>
	                </div>
	                 <div class="col-md-9">
	                    <input type="text" class="form-control" name="ijazah_name">         
	                </div>

	                 <div class="col-md-3">
	                    <?php echo lang('ijazah_no', 'ijazah_no');?>
	                </div>
	                 <div class="col-md-9">
	                    <input type="text" class="form-control" name="ijazah_no">         
	                </div>

	                <div class="col-md-3">
	                    <?php echo lang('ijazah_history', 'ijazah_history');?>
	                </div>
	                 <div class="col-md-9">
	                    <input type="text" class="form-control" name="ijazah_history">         
	                </div>

	                <div class="col-md-3">
	                    <?php echo lang('institution', 'institution');?>
	                </div>
	                 <div class="col-md-9">
	                    <input type="text" class="form-control" name="institution">         
	                </div>

	                <div class="col-md-3">
	                    <?php echo lang('published_place', 'published_place');?>
	                </div>
	                 <div class="col-md-9">
	                    <input type="text" class="form-control" name="published_place">         
	                </div>

	                <div class="col-md-3">
	                    <?php echo lang('activation_date', 'activation_date');?>
	                </div>
	                <div class="col-md-9">
	                        <div class="input-with-icon right">
	                            <div class="input-append success date no-padding">
	                                <input type="text" class="form-control" name="activation_date">
	                                <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span> 
	                            </div>
	                        </div>
	                </div>

	                <div class="col-md-3">
	                    <?php echo lang('position', 'position');?>
	                </div>
	                <div class="col-md-9">
	                    <select name="position_id" class="select2" id="position_id" style="width:100%">
	                        <?php
	                            foreach ($position->result_array() as $key => $value) {
	                            $selected = ($position_id <> 0 && $position_id == $value['id']) ? 'selected = selected' : '';
	                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
	                            }
	                            ?>
	                        </select>        
	                </div>

	                <div class="col-md-3">
	                    <?php echo lang('departement', 'departement');?>
	                </div>
	                <div class="col-md-9">
	                    <select name="departement_id" class="select2" id="departement_id" style="width:100%">
	                        <?php
	                            if($q_departement->num_rows() > 0){
	                            foreach ($departement->result_array() as $key => $value) {
	                            $selected = ($departement_id <> 0 && $departement_id == $value['id']) ? 'selected = selected' : '';
	                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
	                            }}else{
	                                echo '<option value="0">'.'No Data'.'</option>';
	                            }
	                            ?>
	                        </select>        
	                </div>

	                <div class="col-md-3">
	                    <?php echo lang('receivedby', 'receivedby');?>
	                </div>
	                <div class="col-md-9">
	                    <select name="receivedby_id" class="select2" id="receivedby_id" style="width:100%">
	                        <?php
	                            foreach ($receivedby->result_array() as $key => $value) {
	                            $selected = ($receivedby_id <> 0 && $receivedby_id == $value['id']) ? 'selected = selected' : '';
	                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['first_name'].'</option>';
	                            }
	                            ?>
	                        </select>        
	                </div>

	                <div class="col-md-3">
	                    <?php echo lang('acknowledgeby', 'acknowledgeby');?>
	                </div>
	                <div class="col-md-9">
	                    <select name="acknowledgeby_id" class="select2" id="acknowledgeby_id" style="width:100%">
	                        <?php
	                            foreach ($receivedby->result_array() as $key => $value) {
	                            $selected = ($receivedby_id <> 0 && $receivedby_id == $value['id']) ? 'selected = selected' : '';
	                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['first_name'].'</option>';
	                            }
	                            ?>
	                        </select>        
	                </div>
	            </div>
	        </div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close_button')?></button> 
		        <input type="submit" name="btn_submit" id="btnRetPass" class="btn btn-default" value="<?php echo lang('save_button')?>" class="lnkBlkWhtArw" style="margin-top: 3px;">
		    </div>
	        <?php echo form_close()?>
      	</div>
    </div>
</div>

<!--end add modal-->






<!--Edit Modal-->
<?php foreach($user_sti->result() as $row){?>
<div class="modal fade" id="editstiModal<?=$row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
		       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		       <h4 class="modal-title" id="myModalLabel"><?php echo lang('edit_sti', 'edit_sti')?></h4>
		       <p class="txtBold txtRed" class="error_msg" id="MsgBad" style="background: #fff; display: none;"></p>
			</div>
	       		<div class="modal-body">
	                <?= form_open('auth/edit_sti/'.$user->id, array('id'=>'formupdate'))?> 
	                <div class="row form-row">

	                    <div class="col-md-3">
	                    <?php echo lang('identity_no', 'identity_no');?>
	                	</div>
		                <div class="col-md-9">
		                    <input type="text" class="form-control" name="identity_no" value="<?php echo $row->identity_no?>">         
		                </div>

		                <div class="col-md-3">
		                    <?php echo lang('ijazah_name', 'ijazah_name');?>
		                </div>
		                <div class="col-md-9">
		                    <input type="text" class="form-control" name="ijazah_name" value="<?php echo $row->identity_no?>">         
		                </div>

		                <div class="col-md-3">
		                    <?php echo lang('ijazah_no', 'ijazah_no');?>
		                </div>
		                <div class="col-md-9">
		                    <input type="text" class="form-control" name="ijazah_no" value="<?php echo $row->ijazah_number?>">         
		                </div>

		                <div class="col-md-3">
		                    <?php echo lang('ijazah_history', 'ijazah_history');?>
		                </div>
		                 <div class="col-md-9">
		                    <input type="text" class="form-control" name="ijazah_history" value="<?php echo $row->ijazah_history?>">         
		                </div>

		                <div class="col-md-3">
		                    <?php echo lang('institution', 'institution');?>
		                </div>
		                 <div class="col-md-9">
		                    <input type="text" class="form-control" name="institution" value="<?php echo $row->institution?>">         
		                </div>

		                <div class="col-md-3">
		                    <?php echo lang('published_place', 'published_place');?>
		                </div>
		                 <div class="col-md-9">
		                    <input type="text" class="form-control" name="published_place" value="<?php echo $row->published_place?>">         
		                </div>

		                <div class="col-md-3">
		                    <?php echo lang('activation_date', 'activation_date');?>
		                </div>
		                <div class="col-md-9">
		                        <div class="input-with-icon right">
		                            <div class="input-append success date no-padding">
		                                <input type="text" class="form-control" name="activation_date">
		                                <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span> 
		                            </div>
		                        </div>
		                </div>

		                <div class="col-md-3">
		                    <?php echo lang('position', 'position');?>
		                </div>
		                <div class="col-md-9">
		                    <select name="position_id" class="select2" id="position_id" style="width:100%">
		                        <?php
		                            foreach ($position->result_array() as $key => $value) {
		                            $selected = ($position_id <> 0 && $position_id == $value['id']) ? 'selected = selected' : '';
		                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
		                            }
		                            ?>
		                        </select>        
		                </div>

		                <div class="col-md-3">
		                    <?php echo lang('departement', 'departement');?>
		                </div>
		                <div class="col-md-9">
		                    <select name="departement_id" class="select2" id="departement_id" style="width:100%">
		                        <?php
		                            if($q_departement->num_rows() > 0){
		                            foreach ($departement->result_array() as $key => $value) {
		                            $selected = ($departement_id <> 0 && $departement_id == $value['id']) ? 'selected = selected' : '';
		                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
		                            }}else{
		                                echo '<option value="0">'.'No Data'.'</option>';
		                            }
		                            ?>
		                        </select>        
		                </div>

		                <div class="col-md-3">
		                    <?php echo lang('received_by', 'received_by');?>
		                </div>
		                <div class="col-md-9">
		                    <select name="receivedby_id" class="select2" id="receivedby_id" style="width:100%">
		                        <?php
		                            foreach ($receivedby->result_array() as $key => $value) {
		                            $selected = ($receivedby_id <> 0 && $receivedby_id == $value['id']) ? 'selected = selected' : '';
		                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['first_name'].'</option>';
		                            }
		                            ?>
		                        </select>        
		                </div>

		                <div class="col-md-3">
		                    <?php echo lang('acknowledgeby', 'acknowledgeby');?>
		                </div>
		                <div class="col-md-9">
		                    <select name="acknowledgeby_id" class="select2" id="acknowledgeby_id" style="width:100%">
		                        <?php
		                            foreach ($receivedby->result_array() as $key => $value) {
		                            $selected = ($receivedby_id <> 0 && $receivedby_id == $value['id']) ? 'selected = selected' : '';
		                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['first_name'].'</option>';
		                            }
		                            ?>
		                        </select>        
		                </div>
		            </div>
	            </div>
	      		<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close_button')?></button> 
			        <input type="submit" name="btn_submit" id="btnRetPass" class="btn btn-default" value="<?php echo lang('save_button')?>" class="lnkBlkWhtArw" style="margin-top: 3px;">
			    </div>
	        <?php echo form_close()?>
		</div>
    </div>
</div>
<?php } ?>



<!--Delete Modal Window-->
<?php foreach($user_sti->result() as $row){?>
<div class="modal fade" id="deletestiModal<?=$row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open('auth/delete_sti/'.$row->id, array("id"=>"formdelete"))?>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display:none"><span aria-hidden="true">&times;</span></button>
                <div class="modal-body">
                    <p>Are You Sure ?</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('cancel_button')?></button> 
                <input type="submit" name="btn_update" id="btnRetPass" class="btn btn-danger" value="<?php echo lang('delete_button')?>" class="lnkBlkWhtArw" style="margin-top: 3px;">
                </div>
            <?php echo form_close()?>
        </div>
    </div>
</div>
<?php }?>

<script type="text/javascript">
    window.onload = function(){getTable();};

    function getTable() 
    {
        $('#tabel').load('<?php echo site_url('auth/get_sti/'.$user->id); ?>');
    }
</script>


