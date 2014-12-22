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
            <h3><?php echo lang('list_of_subheading')?>&nbsp;<span class="semi-bold"><?php echo lang('users_subheading')?></span></h3> 
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
                    <div class="grid-body no-border">
                        <br/>
                        <table class="table no-more-tables">
                            <thead>
                                <tr>
                                    <th width="1%">
                                        <div class="checkbox check-default">
                                            <input id="checkbox10" type="checkbox" value="1" class="checkall">
                                            <label for="checkbox10"></label>
                                        </div>
                                    </th>
                                    <th width="10%"><?php echo lang('index_fname_th');?></th>
                                    <th width="10%"><?php echo lang('index_lname_th');?></th>
                                    <th width="10%"><?php echo lang('index_email_th');?></th>
                                    <th width="10%"><?php echo lang('index_groups_th');?></th>
                                    <th width="10%"><?php echo lang('index_status_th');?></th>
                                    <th width="10%"><?php echo lang('index_action_th');?></th>                                  
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user):?>
                                <tr>
                                    <td valign="middle">
                                         <div class="checkbox check-default">
                                            <input id="checkbox11" type="checkbox" value="1">
                                            <label for="checkbox11"></label>
                                        </div>
                                    </td>
                                    <td valign="middle"><?php echo $user->first_name;?></td>
                                    <td valign="middle"><span class="muted"><?php echo $user->last_name;?></span></td>
                                    <td valign="middle"><span class="muted"><?php echo $user->email;?></span></td>
                                    <td valign="middle"><span class="muted">
                                        <?php foreach ($user->groups as $group):?>
                                            <?php echo anchor("auth/edit_group/".$group->id, $group->name) ;?><br />
                                        <?php endforeach?>
                                    </span></td>
                                    <td valign="middle">
                                        <span class="muted">
                                            <?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?>
                                        </span>
                                    </td>
                                    <td valign="middle">
                                        <span class="muted"><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></span>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE -->
</div>