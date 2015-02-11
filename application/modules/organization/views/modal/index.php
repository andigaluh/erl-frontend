

<!-- Add Course Modal -->
<?php echo form_open('organization/add/', array('id'=>'formadd'))?> 
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
                    <?php echo lang('parent_organization', 'parent_organization');?>
                </div>
                <div class="col-md-9">
                    <select name="parent_organization_id" class="select2" id="parent" style="width:100%">
                        <?php
                            echo '<option value="0">Top Level</option>';
                            foreach ($parent->result_array() as $key => $value) {
                                $selected = ($parent <> 0 && $parent == $value['id']) ? 'selected = selected' : '';
                                echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                            }
                        ?>
                        </select>
                </div>
            </div>
			
			<div class="row form-row">
                <div class="col-md-3">
                    <?php echo lang('organization_class', 'organization_class');?>
                </div>
                <div class="col-md-9">
                    <select name="organization_class_id" class="select2" id="organization_class_id" style="width:100%">
                        <?php
                            echo '<option value="0">Top Level</option>';
                            foreach ($organization_class->result_array() as $key => $value) {
                                $selected = ($organization_class <> 0 && $organization_class == $value['id']) ? 'selected = selected' : '';
                                echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                            }
                        ?>
                        </select>
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

<?php foreach($organization->result() as $row){?>
<!--Edit Modal-->
<?php echo form_open('organization/update/'.$row->id, array('id'=>'formupdate'.$row->id))?>
<div class="modal fade" id="editorganizationModal<?php echo $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo lang('edit_organization', 'edit_organization')?></h4>
            </div>
                <p class="error_msg" id="MsgBad2<?php echo $row->id?>" style="background: #fff; display: none;"></p>
            <div class="modal-body">
                
                <div class="row form-row">
                <div class="col-md-3">
                    <?php echo lang('title', 'title');?>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $row->title?>">         
                </div>
            </div>

            <div class="row form-row">
                <div class="col-md-3">
                    <?php echo lang('parent_organization', 'parent_organization');?>
                </div>
                <div class="col-md-9">
                    <select name="parent" class="select2" id="parent" style="width:100%">
                        <?php
                            echo '<option value="0">Top Level</option>';
                            foreach ($parent->result_array() as $key => $value) {
                                $selected = ($row->parent_organization_id <> 0 && $row->parent_organization_id == $value['id']) ? 'selected = selected' : '';
                                echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                            }
                        ?>
                        </select>
                </div>
            </div>
			
			<div class="row form-row">
                <div class="col-md-3">
                    <?php echo lang('parent_organization', 'parent_organization');?>
                </div>
                <div class="col-md-9">
                    <select name="organization_class_id" class="select2" id="organization_class_id" style="width:100%">
                        <?php
                            echo '<option value="0">Top Level</option>';
                            foreach ($organization_class->result_array() as $key => $value) {
                                $selected = ($row->organization_class_id <> 0 && $row->organization_class_id == $value['id']) ? 'selected = selected' : '';
                                echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i>&nbsp;<?php echo lang('close_button')?></button> 
                <button type="submit" class="btn btn-primary lnkBlkWhtArw" style="margin-top: 3px;"><i class="icon-ok-sign"></i>&nbsp;<?php echo lang('save_button')?></button> 
            </div>             
        </div>
    </div>
</div>
<?php echo form_close()?>  
<script type="text/javascript">
            $(document).ready(function(){
                $('#formupdate<?php echo $row->id?>').on("submit",function(response){
                    $.post($('#formupdate<?php echo $row->id?>').attr('action'), $('#formupdate<?php echo $row->id?>').serialize(),function(json){
                        if(json.st == 0){
                            $('#MsgBad2<?=$row->id?>').html(json.errors).fadeIn();
                        }else{
                            getTable();getModal();;
                            $("[data-dismiss=modal]").trigger({ type: "click" });
                            $('#MsgBad2<?=$row->id?>').hide();
                            $('#MsgGood').text('Data Updated').fadeIn().delay(3000).fadeOut("slow");
                        }
                    }, 'json');
                    return false;
                });
            });
        </script>
<?php } ?>	
<script src="<?php echo assets_url('js/main.js'); ?>"></script>