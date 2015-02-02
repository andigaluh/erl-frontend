<table class="table table-bordered">
    <thead>
        <tr>
            <th width="1%">
                <div class="checkbox check-default">
                    <input id="checkbox10" type="checkbox" value="1" class="checkall">
                    <label for="checkbox10"></label>
                </div>
            </th>
            <!-- <th width="10%"><?php //echo anchor('auth/detail/'.$user->id.'/'.$ctitle_param.'/sti_title/'.(($sort_order == 'asc' && $sort_by == 'sti_title') ? 'desc' : 'asc'), lang('sti_description'));?></th> -->
            <th width="2%"><?php echo lang('identity_no')//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
            <th width="2%"><?php echo lang('ijazah_name')//anchor('auth/index/'.$fname_param.'/'.$email_param.'/email/'.(($sort_order == 'asc' && $sort_by == 'email') ? 'desc' : 'asc'), lang('index_email_th'));?></th>
            <th width="2%"><?php echo lang('ijazah_number');?></th>
            <th width="2%"><?php echo lang('ijazah_history');?></th>
            <th width="2%"><?php echo lang('institution')?></th>
            <th width="2%"><?php echo lang('activation_date')?></th>
            <th width="2%"><?php echo lang('published_place')?></th>
            <th width="2%"><?php echo lang('departement');?></th>
            <th width="2%"><?php echo lang('position');?></th>
            <th width="2%"><?php echo lang('receivedby');?></th>
            <th width="2%"><?php echo lang('acknowledgeby');?></th>
            <th width="20%"><?php echo lang('index_action_th');?></th>                                  
        </tr>
    </thead>
    <tbody id="tabel">
        <?php if ($user_sti->num_rows() > 0){
        foreach($user_sti->result() as $row){?>
        <tr>
            <td valign="middle">
                <div class="checkbox check-default">
                    <input id="checkbox<?php echo $row->id;?>" type="checkbox" value="<?php echo $row->id;?>">
                    <label for="checkbox<?php echo $row->id;?>"></label>
                </div>
            </td>
            <!--<td valign="middle"><?php echo $row->id;?></td>-->
            <td valign="middle"><span class="muted"><?php echo $row->identity_no;?></span></td>
            <td valign="middle"><span class="muted"><?php echo $row->ijazah_name;?></span></td>
            <td valign="middle"><span class="muted"><?php echo $row->ijazah_number;?></span></td>
            <td valign="middle"><span class="muted"><?php echo $row->ijazah_history;?></span></td>
            <td valign="middle"><span class="muted"><?php echo $row->institution;?></span></td>
            <td valign="middle"><span class="muted"><?php echo $row->activation_date;?></span></td>
            <td valign="middle"><span class="muted"><?php echo $row->published_place;?></span></td>
            <td valign="middle"><span class="muted"><?php echo $row->departement;?></span></td>
            <td valign="middle"><span class="muted"><?php echo $row->position;?></span></td>
            <td valign="middle"><span class="muted"><?php echo $row->receivedby;?></span></td>
            <td valign="middle"><span class="muted"><?php echo $row->acknowledgeby;?></span></td>
            <td valign="middle">
                <button type="button" class="btn btn-info btn-small" data-toggle="modal" data-target="#editstiModal<?php echo $row->id?>"><i class="icon-paste"></i>&nbsp;<?php echo lang('edit_button')?></button>
                <button class='btn btn-danger btn-small' type="submit" name="remove_levels" value="Delete" data-toggle="modal" data-target="#deletestiModal<?php echo $row->id?>"><i class="icon-warning-sign"></i>&nbsp;<?php echo lang('delete_button')?></button>
            </td>
        </tr>
        <?php }}else{?>
        <tr>
            <td valign="middle" colspan="12">
                <p class="text-center">No Data</p>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<!--Delete Modal Window-->
<?php foreach($user_sti->result() as $row){?>
<div class="modal fade" id="deletestiModal<?=$row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo lang('delete_confirmation').' for '.$row->identity_no; ?></h4>
        </div>
      <?php echo form_open('auth/delete_sti/'.$row->id, array("id"=>"formdelete".$row->id))?>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display:none"><span aria-hidden="true">&times;</span></button>
      <div class="modal-body">
        <p><?php echo lang('delete_this_data').$row->identity_no.' ?'; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="icon-ban-circle"></i>&nbsp;<?php echo lang('cancel_button')?></button> 
        <button type="submit" class="btn btn-danger lnkBlkWhtArw" style="margin-top: 3px;"><i class="icon-warning-sign"></i>&nbsp;<?php echo lang('delete_button')?></button>
      </div>
        <?php echo form_close()?>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function(){
 $('#formdelete<?php echo $row->id?>').submit(function(response){
                    $.post($('#formdelete<?php echo $row->id?>').attr('action'), $('#formdelete<?php echo $row->id?>').serialize(),function(json){
                        if(json.st == 0){
                            $('#MsgBad').text('Delete Failed').fadeIn();
                        }else{
                            getTable();
                            $("[data-dismiss=modal]").trigger({ type: "click" });
                            $('#MsgGood').text('Data Deleted').fadeIn().delay(4000).fadeOut("slow");
                        }
                    }, 'json');
                    return false;
                });
            });
</script>
<?php }?>