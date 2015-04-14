<!-- BEGIN PAGE CONTAINER-->
  <div class="page-content"> 
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">  
	    <div id="container">
	    	<div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Form Perjalanan Dinas <span class="semi-bold">Dalam Kota</span></h4>
            </div>
            <div class="grid-body no-border">
              <form class="form-no-horizontal-spacing" id="form_spd_luar" action="<?php echo site_url() ?>form_spd_luar/update" method="post"> 
                <div class="row column-seperation">
                  <div class="col-md-5">
                    <h4>Yang Memberi Tugas</h4>   
                    <?php
                    if ($tc_num_rows > 0) {
                    foreach ($task_creator as $tc) : ?>  
                        <div class="row form-row">
                          <div class="col-md-3">
                            <label class="form-label text-right">Nama</label>
                          </div>
                          <div class="col-md-9">
                            <input name="name" id="name" type="text"  class="form-control" placeholder="Nama" value="<?php echo $tc->first_name.' '.$tc->last_name ?>" disabled="disabled">
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-3">
                            <label class="form-label text-right">Dept/Bagian</label>
                          </div>
                          <div class="col-md-9">
                            <input name="org" id="org" type="text"  class="form-control" placeholder="Nama" value="<?php echo $tc->organization_title?>" disabled="disabled">
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-3">
                            <label class="form-label text-right">Jabatan</label>
                          </div>
                          <div class="col-md-9">
                            <input name="position" id="position" type="text"  class="form-control" placeholder="Nama" value="<?php echo $tc->position_title ?>" disabled="disabled">
                          </div>
                        </div>
                        <?php endforeach; 
                        }
                        ?> 
                      </div>
                      <div class="col-md-7">
                        <h4>Memberi tugas / Ijin Kepada</h4>
                      <?php if ($td_num_rows > 0) {
                      foreach ($task_detail as $td) : ?>
                      <input type="hidden" name="spd_id" value="<?php echo $td->id ?>" name="spd_id">
                        <div class="row form-row">
                          <div class="col-md-3">
                            <label class="form-label text-right">Nama</label>
                          </div>
                          <div class="col-md-9">
                            <select id="emp_name" name="emp_name" class="select2" style="width:100%" disabled="disabled">
                              <?php if ($el_num_rows > 0) {
                              foreach ($employee_list as $el) :
                              if ($el->id == $td->id) {
                                $selected = "selected";
                              }else{
                                $selected = "";
                              }
                              ?>    
                              <option value="<?php echo $el->id ?>" <?php echo $selected ?>><?php echo $el->first_name.' '.$el->last_name; ?></option>
                            <?php endforeach;
                            } ?>
                            </select>
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-3">
                            <label class="form-label text-right">Dept/Bagian</label>
                          </div>
                          <div class="col-md-9">
                            <input name="organization" id="org_trx" type="text"  class="form-control" placeholder="Dept/Bagian" value="<?php echo $organization_title ?>" disabled="disabled">
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-3">
                            <label class="form-label text-right">Jabatan</label>
                          </div>
                          <div class="col-md-9">
                            <input name="position" id="pos_trx" type="text"  class="form-control" placeholder="Jabatan" value="<?php echo $position_title ?>" disabled="disabled">
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-3">
                            <label class="form-label text-right">Tujuan</label>
                          </div>
                          <div class="col-md-9">
                            <input name="destination" id="destination" type="text"  class="form-control" placeholder="Tujuan" value="<?php echo $td->destination ?>">
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-3">
                            <label class="form-label text-right">Dalam Rangka</label>
                          </div>
                          <div class="col-md-9">
                            <input name="title" id="title" type="text"  class="form-control" placeholder="Dalam Rangka" value="<?php echo $td->title ?>">
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-3">
                            <label class="form-label text-right">Kota Tujuan</label>
                          </div>
                          <div class="col-md-9">
                            <select id="city_to" name="city_to" class="select2" style="width:100%">
                              <?php if ($cl_num_rows > 0) {
                              foreach ($city_list as $cl) :
                              if ($cl->id == $td->to_city_id) {
                                $selected = "selected";
                              }else{
                                $selected = "";
                              }
                              ?>    
                              <option value="<?php echo $cl->id ?>" <?php echo $selected ?>><?php echo $cl->title ?></option>
                            <?php endforeach;
                            } ?>
                            </select>
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-3">
                            <label class="form-label text-right">Dari</label>
                          </div>
                          <div class="col-md-9">
                            <select id="city_from" name="city_from" class="select2" style="width:100%">
                              <?php if ($cl_num_rows > 0) {
                              foreach ($city_list as $cl) :
                              if ($cl->id == $td->from_city_id) {
                                $selected = "selected";
                              }else{
                                $selected = "";
                              }
                              ?>    
                              <option value="<?php echo $cl->id ?>" <?php echo $selected ?>><?php echo $cl->title ?></option>
                            <?php endforeach;
                            } ?>
                            </select>
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-3">
                            <label class="form-label text-right">Kendaraan</label>
                          </div>
                          <div class="col-md-9">
                            <select id="vehicle" name="vehicle" class="select2" style="width:100%">
                              <?php if ($tl_num_rows > 0) {
                              foreach ($transportation_list as $tl) :
                              if ($tl->id == $td->transportation_id) {
                                $selected = "selected";
                              }else{
                                $selected = "";
                              }
                              ?>    
                              <option value="<?php echo $tl->id ?>" <?php echo $selected ?>><?php echo $tl->title ?></option>
                            <?php endforeach;
                            } ?>
                            </select>
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-3">
                            <label class="form-label text-right">Tgl. Berangkat</label>
                          </div>
                          <div class="col-md-8">
                            <div class="input-append date success no-padding">
                              <input type="text" class="form-control" name="date_spd" value="<?php echo date('d/m/Y',strtotime($td->date_spd)) ?>">
                              <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-actions">
                      <div class="pull-right">
                        <button class="btn btn-danger btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
                        <a href="<?php echo site_url() ?>form_spd_luar"><button class="btn btn-white btn-cons" type="button">Cancel</button></a>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </form>
                <div class="form-actions text-center">
                  <form class="form-no-horizontal-spacing" id="form_spd_luar" action="<?php echo site_url() ?>form_spd_luar/do_submit" method="post">
                    <!-- <div class="col-md-12 text-center"> -->
                     <input type="hidden" name="spd_id" value="<?php echo $td->id ?>" name="spd_id">
                      <div class="row wf-spd">
                        <div class="col-md-6">
                          <p>Yang bersangkutan</p>
                          <?php if ($this->session->userdata('user_id') == $td->user_id && $td->is_submit == 0) { ?>
                            <button id="btn_submit" class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i>Submit</button>
                            <p class="">...............................</p>
                          <?php }elseif ($this->session->userdata('user_id') != $td->user_id && $td->is_submit == 0) { ?>
                            <p class="">...............................</p>
                          <?php }else{ ?>
                          <p class="wf-submit">
                            <span class="semi-bold"><?php echo $task_receiver_nm ?></span><br/>
                            <span class="small"><?php echo date('d F Y',strtotime($td->date_submit)) ?></span><br/>
                          </p>
                          <?php } ?>
                        </div>
                        <div class="col-md-6">
                          <p>Yang memberi tugas / ijin</p>
                          <p class="wf-approve-sp">
                            <span class="semi-bold"><?php echo $task_creator_nm ?></span><br/>
                            <span class="small"><?php echo date('d F Y',strtotime($td->created_on)) ?></span><br/>
                          </p>
                          <?php endforeach;
                            }
                           ?>
                        </div>
                      </div>
                    <!-- /div> -->
                  </form>
                  </div>  
            </div>
          </div>
        </div>
      </div>
	          	
		
      </div>
		
	</div>  
	<!-- END PAGE -->