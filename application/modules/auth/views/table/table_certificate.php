<table class="table table-bordered">
    <thead>
        <tr>
            <th width="1%">
                <div class="checkbox check-default">
                    <input id="checkbox10" type="checkbox" value="1" class="checkall">
                    <label for="checkbox10"></label>
                </div>
            </th>
            <!--<th width="10%"><?php echo "ID"?>-->
            <th width="10%"><?php echo lang('certification_type');?></th>
            <th width="10%"><?php echo lang('start_date');?></th>
            <th width="10%"><?php echo lang('end_date');?></th>
            <th width="10%"><?php echo lang('index_action_th');?></th>                                  
        </tr>
    </thead>
    <tbody id="tabel"> 
        <?php if ($user_certificate->num_rows() > 0){
            foreach($user_certificate->result() as $row){?>
            <tr>
                <td valign="middle">
                    <div class="checkbox check-default">
                        <input id="checkbox<?php echo $row->id;?>" type="checkbox" value="<?php echo $row->id;?>">
                        <label for="checkbox<?php echo $row->id;?>"></label>
                    </div>
                </td>
                <!--<td valign="middle"><?php echo $row->id;?></td>-->
                <td valign="middle"><span class="muted"><?php echo $row->certification_type;?></span></td>
                <td valign="middle"><span class="muted"><?php echo $row->start_date;?></span></td>
                <td valign="middle"><span class="muted"><?php echo $row->end_date;?></span></td>
                <td valign="middle">
                    <button type="button" class="btn btn-info btn-small" data-toggle="modal" data-target="#editcertificateModal<?= $row->id?>"><i class="icon-paste"></i>&nbsp;<?php echo lang('edit_button')?></button>
                    <button class='btn btn-danger btn-small' type="submit" name="remove_levels" value="Delete" data-toggle="modal" data-target="#deletecertificateModal<?php echo $row->id?>"><i class="icon-warning-sign"></i>&nbsp;<?php echo lang('delete_button')?></button>
                </td>   
            </tr>
            <?php }}else{?>
            <tr>
                <td valign="middle" colspan="5">
                    <p class="text-center">No Data</p>
                </td>
            </tr>
            <?php } ?>
    </tbody>
</table>