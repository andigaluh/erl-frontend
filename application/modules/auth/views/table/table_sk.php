<div id="tabel" class="row">
                                            <div class="col-md-6">
                                            <h4><?php echo lang('found_subheading')?>&nbsp;<span class="semi-bold"><?php echo $num_rows_sk;?>&nbsp;<?php echo lang('sk_subheading');?></span></h4>
                                               
                                            </div>
                                             <div class="bs-example"  data-example-id="labels-in-headings" style="z-index:-10;">
                                             </div>
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
                                                    <th width="2%"><?php //echo anchor('auth/detail/'.$user->id.'/'.$ctitle_param.'/sk_title/'.(($sort_order == 'asc' && $sort_by == 'sk_title') ? 'desc' : 'asc'), lang('sk_description'));?></th>
                                                    <th width="10%"><?php echo 'Company'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/last_name/'.(($sort_order == 'asc' && $sort_by == 'last_name') ? 'desc' : 'asc'), lang('index_lname_th'));?></th>
                                                    <th width="10%"><?php echo 'Position'//anchor('auth/index/'.$fname_param.'/'.$email_param.'/email/'.(($sort_order == 'asc' && $sort_by == 'email') ? 'desc' : 'asc'), lang('index_email_th'));?></th>
                                                    <th width="10%"><?php echo 'Start Date';?></th>
                                                    <th width="10%"><?php echo 'End Date';?></th>
                                                    <th width="10%"><?php echo 'address';?></th>
                                                    <th width="10%"><?php echo 'Line OF Business';?></th>
                                                    <th width="5%"><?php echo 'Resign Reason';?></th>
                                                    <th width="10%"><?php echo 'Last Salary';?></th>
                                                    <th width="20%"><?php echo lang('index_action_th');?></th>                                  
                                                </tr>
                                            </thead>
                                            <tbody id="tabel">
                                            <?php if ($user_sk->num_rows() > 0){
                                                        foreach($user_sk->result() as $row){?>
                                                <tr>
                                                    <td valign="middle">
                                                         <div class="checkbox check-default">
                                                            <input id="checkbox<?php echo $row->id;?>" type="checkbox" value="<?php echo $row->id;?>">
                                                            <label for="checkbox<?php echo $row->id;?>"></label>
                                                        </div>
                                                    </td>


                                                    <td valign="middle"><?php echo $row->id;?></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->sk_date;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->sk_no;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->position;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->departement;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->effective_date;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->location;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->sign_name;?></span></td>
                                                    <td valign="middle"><span class="muted"><?php echo $row->sign_position;?></span></td>
                                                    <td valign="middle">
                                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editskModal<?= $row->id?>"><?php echo lang('edit_button')?></button>
                                                        &nbsp;|&nbsp;
                                                        <button class='btn btn-danger btn-xs' type="submit" name="remove_levels" value="Delete" data-toggle="modal" data-target="#deleteskModal<?php echo $row->id?>">Delete</button>
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