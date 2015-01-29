<div id="tabel" class="row">
    <div class="col-md-6">
        <h4><?php echo lang('found_subheading')?>&nbsp;<span class="semi-bold"><?php echo $num_rows_jabatan;?>&nbsp;<?php echo lang('jabatan_subheading');?></span></h4>  
    </div>
    <div class="bs-example"  data-example-id="labels-in-headings" style="z-index:-10;"></div>
</div>
<table class="table no-more-tables">
    <thead>
        <tr>
            <th width="1%">
                <div class="checkbox check-default">
                    <input id="checkbox10" type="checkbox" value="1" class="checkall">
                    <label for="checkbox10"></label>
                </div>
            </th>
            <!-- <th width="10%"><?php //echo anchor('auth/detail/'.$user->id.'/'.$ctitle_param.'/jabatan_title/'.(($sort_order == 'asc' && $sort_by == 'jabatan_title') ? 'desc' : 'asc'), lang('jabatan_description'));?></th> -->
            <th width="10%"><?php echo 'Description'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
            <th width="10%"><?php echo 'Registration Date'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/email/'.(($sort_order == 'asc' && $sort_by == 'email') ? 'desc' : 'asc'), lang('index_email_th'));?></th>
            <th width="10%"><?php echo 'Status';?></th>
            <th width="10%"><?php echo lang('index_action_th');?></th>                                  
        </tr>
    </thead>
    <tbody id="tabel">
    <?php if ($user_jabatan->num_rows() > 0){
                foreach($user_jabatan->result() as $row){?>
        <tr>
            <td valign="middle">
                 <div class="checkbox check-default">
                    <input id="checkbox<?php echo $row->id;?>" type="checkbox" value="<?php echo $row->id;?>">
                    <label for="checkbox<?php echo $row->id;?>"></label>
                </div>
            </td>


            <!-- <td valign="middle"><?php echo $row->id;?></td> -->
            <td valign="middle"><span class="muted"><?php echo $row->organization;?></span></td>
            <td valign="middle"><span class="muted"><?php echo $row->position;?></span></td>
            <td valign="middle"><span class="muted"><?php echo $row->groups;?></span></td>
            <td valign="middle"><span class="muted"><?php echo $row->grade;?></span></td>
            <td valign="middle"><span class="muted"><?php echo $row->start_date;?></span></td>
            <td valign="middle"><span class="muted"><?php echo $row->end_date;?></span></td>
            <td valign="middle"><span class="muted"><?php //echo $row->branch;?></span></td>
            <td valign="middle"><span class="muted"><?php //echo $row->personnel_action;?></span></td>
            <td valign="middle"><span class="muted"><?php echo $row->sk_date;?></span></td>
            <td valign="middle">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editjabatanModal<?= $row->id?>"><?php echo lang('edit_button')?></button>
                &nbsp;|&nbsp;
                <button class='btn btn-danger btn-xs' type="submit" name="remove_levels" value="Delete" data-toggle="modal" data-target="#deletejabatanModal<?php echo $row->id?>">Delete</button>
            </td>

        </tr>
    <?php }}else{?>
        <tr>
            <td valign="middle" colspan="5">
                <p class="text-center">No Data</p>
            </td>
           <!--  <td valign="middle">
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
            </td> -->
        </tr>

    <?php } ?>

    </tbody>
</table>