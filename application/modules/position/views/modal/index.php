<!-- Add Course Modal -->
<?php echo form_open('position/add/', array('id'=>'formadd'))?> 
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="modaldialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo lang('add_pos_group', 'add_pos_group')?></h4>
      </div>
      <p class="error_msg" id="MsgBad" style="background: #fff; display: none;"></p>
      <div class="modal-body">
        
             <div class="row form-row">
                <div class="col-md-3">
                    <?php echo lang('title', 'title');?>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="title" name="title">         
                </div>
            </div>

            <div class="row form-row">
                <div class="col-md-3">
                    <?php echo lang('abbr', 'abbr');?>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="abbr" name="abbr">         
                </div>
            </div>

            <div class="row form-row">
                <div class="col-md-3">
                    <?php echo lang('position_group', 'position_group_id');?>
                </div>
                <div class="col-md-9">
                    <select name="position_group_id" class="select2" id="position_group_id" style="width:100%">
                        <?php
                            echo '<option value="0">Top Level</option>';
                            foreach ($position_group->result_array() as $key => $value) {
                                $selected = ($position_group_id <> 0 && $position_group_id == $value['position_group_position_id']) ? 'selected = selected' : '';
                                echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                            }
                        ?>
                        </select>
                </div>
            </div>

            <div class="row form-row">
                <div class="col-md-3">
                    <?php echo lang('position_parent', 'parent_position_id');?>
                </div>
                <div class="col-md-9">
                    <select name="parent_position_id" class="select2" id="parent_position_id" style="width:100%">
                        <?php
                            echo '<option value="0">Top Level</option>';
							if($q_parent->num_rows()>0){
                            foreach ($parent->result_array() as $key => $value) {
                                $selected = ($parent_id <> 0 && $parent_id == $value['parent_position_id']) ? 'selected = selected' : '';
                                echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                            }}
                        ?>
                        </select>
                </div>
            </div>
			
			<div class="row form-row">
                <div class="col-md-3">
                    <?php echo lang('organization', 'organization_id');?>
                </div>
                <div class="col-md-9">
                    <select name="organization_id" class="select2" id="organization_id" style="width:100%">
                        <?php
                            echo '<option value="0">Top Level</option>';
                            foreach ($organization->result_array() as $key => $value) {
                                $selected = ($organization_id <> 0 && $organization_id == $value['organization_position_id']) ? 'selected = selected' : '';
                                echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                            }
                        ?>
                        </select>
                </div>
            </div>

            <div class="row form-row">
                <div class="col-md-3">
                    <?php echo lang('description', 'description');?>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="description" name="description">         
                </div>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i>&nbsp;<?php echo lang('close_button')?></button> 
        <button type="submit" class="btn btn-primary lnkBlkWhtArw" name="btn_add" id="btnRetPass" style="margin-top: 3px;"><i class="icon-ok-sign"></i>&nbsp;<?php echo lang('save_button')?></button> 
      </div>
        
    </div>
  </div>
</div>
<?php echo form_close()?>
<!--end add modal-->

<?php foreach ($position as $user):?>
<!--Edit Modal-->
        <?php echo form_open('position/update/'.$user->id, array('id'=>'formupdate'.$user->id))?>
        <div class="modal fade" id="editModal<?php echo $user->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo lang('edit_pos_group', 'edit_pos_group')?></h4>
                    </div>
                        <p class="error_msg" id="MsgBad2<?php echo $user->id?>" style="background: #fff; display: none;"></p>
                    <div class="modal-body">
                        
                        <div class="row form-row">
							<div class="col-md-3">
								<?php echo lang('title', 'title');?>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" id="title" name="title" value="<?php echo $user->title?>">         
							</div>
						</div>

						<div class="row form-row">
							<div class="col-md-3">
								<?php echo lang('abbr', 'abbr');?>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" id="abbr" name="abbr" value="<?php echo $user->abbr?>">         
							</div>
						</div>

						<div class="row form-row">
							<div class="col-md-3">
								<?php echo lang('position_group', 'position_group_id');?>
							</div>
							<div class="col-md-9">
								<select name="position_group_id" class="select2" id="position_group_id" style="width:100%">
									<?php
										echo '<option value="0">Top Level</option>';
										foreach ($position_group->result_array() as $key => $value) {
											$selected = ($user->position_group_id <> 0 && $user->position_group_id == $value['id']) ? 'selected = selected' : '';
											echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
										}
									?>
									</select>
							</div>
						</div>

						<div class="row form-row">
							<div class="col-md-3">
								<?php echo lang('position_parent', 'parent_position_id');?>
							</div>
							<div class="col-md-9">
								<select name="parent_position_id" class="select2" id="parent_position_id" style="width:100%">
									<?php
										echo '<option value="0">Top Level</option>';
										if($q_parent->num_rows()>0){
										foreach ($parent->result_array() as $key => $value) {
											$selected = ($user->parent_position_id <> 0 && $user->parent_position_id == $value['parent_position_id']) ? 'selected = selected' : '';
											echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
										}}
									?>
									</select>
							</div>
						</div>
						
						<div class="row form-row">
							<div class="col-md-3">
								<?php echo lang('organization', 'organization_id');?>
							</div>
							<div class="col-md-9">
								<select name="organization_id" class="select2" id="organization_id" style="width:100%">
									<?php
										echo '<option value="0">Top Level</option>';
										foreach ($organization->result_array() as $key => $value) {
											$selected = ($user->organization_id <> 0 && $user->organization_id == $value['id']) ? 'selected = selected' : '';
											echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
										}
									?>
									</select>
							</div>
						</div>

						<div class="row form-row">
							<div class="col-md-3">
								<?php echo lang('description', 'description');?>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" id="description" name="description" value="<?php echo $user->description?>">         
							</div>
						</div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i>&nbsp;<?php echo lang('close_button')?></button> 
                        <button type="submit" class="btn btn-primary lnkBlkWhtArw" style="margin-top: 3px;" id="submit"><i class="icon-ok-sign"></i>&nbsp;<?php echo lang('save_button')?></button> 
                    </div>             
                </div>
            </div>
        </div>
       
        
        <?php echo form_close()?>
        <!-- End Edit Modal-->

        <!--Delete Modal-->
        <div class="modal fade" id="deleteModal<?php echo $user->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo lang('delete_confirmation').' for '.$user->title; ?></h4>
                </div>
              <?php echo form_open('position/delete/'.$user->id, array("id"=>"formdelete".$user->id))?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display:none"><span aria-hidden="true">&times;</span></button>
              <div class="modal-body">
                <p><?php echo lang('delete_this_data').$user->title.' ?'; ?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="icon-ban-circle"></i>&nbsp;<?php echo lang('cancel_button')?></button> 
                <button type="submit" class="btn btn-danger lnkBlkWhtArw" style="margin-top: 3px;"><i class="icon-warning-sign"></i>&nbsp;<?php echo lang('delete_button')?></button>
              </div>
                <?php echo form_close()?>
            </div>
          </div>
        </div>
        <!-- End Delete Modal-->
        <script type="text/javascript">
            $(document).ready(function(){
                $('#formupdate<?php echo $user->id?>').on("submit",function(response){
                    $.post($('#formupdate<?php echo $user->id?>').attr('action'), $('#formupdate<?php echo $user->id?>').serialize(),function(json){
                        if(json.st == 0){
                            $('#MsgBad2<?=$user->id?>').html(json.errors).fadeIn();
                        }else{
                            getTable();getModal();;
                            $("[data-dismiss=modal]").trigger({ type: "click" });
                            $('#MsgBad2<?=$user->id?>').hide();
                            $('#MsgGood').text('Data Updated').fadeIn().delay(3000).fadeOut("slow");
                        }
                    }, 'json');
                    return false;
                });

                $('#formdelete<?php echo $user->id?>').submit(function(response){
                    $.post($('#formdelete<?php echo $user->id?>').attr('action'), $('#formdelete<?php echo $user->id?>').serialize(),function(json){
                        if(json.st == 0){
                            $('#MsgBad').text('Delete Failed').fadeIn();
                        }else{
                            getTable();getModal();;
                            $("[data-dismiss=modal]").trigger({ type: "click" });
                            $('#MsgGood').text('Data Deleted').fadeIn().delay(4000).fadeOut("slow");
                        }
                    }, 'json');
                    return false;
                });
            });
        </script>
    <?php endforeach;?>	
<script src="<?php echo assets_url('js/main.js'); ?>"></script>