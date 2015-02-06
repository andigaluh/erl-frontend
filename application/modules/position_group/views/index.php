<div class="page-content">
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
            <i class="icon-custom-left"></i>
            <h3><?php echo lang('list_of_subheading')?>&nbsp;<span class="semi-bold"><?php echo lang('pos_group_subheading');?></span></h3> 
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="grid simple ">                            
                    <div class="grid-body no-border">
                        <br/>
                        <div class="row">
                            <div class="col-md-6">
                                <h4><?php echo lang('search_of_subheading')?>&nbsp;<span class="semi-bold"><?php echo lang('pos_group_subheading');?></span></h4>
                            </div>
                        </div>
                        <?php echo form_open(site_url('position_group/keywords'),array( 'id'=>'search_pos_group'))?>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-3 search_label"><?php echo form_label(lang('index_ftitle_th'),'Title')?></div>
                                        <div class="col-md-9"><?php echo bs_form_input($ftitle_search)?></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-info"><i class="icon-search"></i>&nbsp;<?php echo lang('search_button')?></button>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="icon-plus"></i>&nbsp;<?php echo lang('add_button');?></button>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        <?php echo form_close()?>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="MsgGood" class="alert alert-success text-center" style="display:none;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tabel"></div>

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
                                    echo '&nbsp;'.lang('found_subheading').'&nbsp;'.$num_rows_all.'&nbsp;'.lang('pos_group_subheading');
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

<!-- Add Course Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="modaldialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo lang('add_pos_group', 'add_pos_group')?></h4>
      </div>
      <p class="error_msg" id="MsgBad" style="background: #fff; display: none;"></p>
      <div class="modal-body">
        <?php echo form_open('position_group/add/', array('id'=>'formadd'))?> 
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
                    <?php echo lang('level_order', 'level_order');?>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="level_order" name="level_order">         
                </div>
            </div>

            <div class="row form-row">
                <div class="col-md-3">
                    <?php echo lang('parent_pos_group_id', 'parent_pos_group_id');?>
                </div>
                <div class="col-md-9">
                    <select name="parent_id" class="select2" id="parent_id" style="width:100%">
                        <?php
                            echo '<option value="0">Top Level</option>';
                            foreach ($parent->result_array() as $key => $value) {
                                $selected = ($parent_id <> 0 && $parent_id == $value['parent_position_group_id']) ? 'selected = selected' : '';
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
        <?php echo form_close()?>
    </div>
  </div>
</div>
<!--end add modal-->

<script type="text/javascript">
    
    window.onload = function(){
        getTable();
    };  

    function getTable() 
    {
        $('#tabel').load('<?php echo site_url('position_group/get_table/'); ?>');
    }

    $(document).ready(function(){
        $('#parent_id').select2();
    });

    
</script>