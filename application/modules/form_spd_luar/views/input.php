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
              <h4>Form Perjalanan Dinas <span class="semi-bold">Luar Kota</span></h4>
            </div>
            <div class="grid-body no-border">
              <form class="form-no-horizontal-spacing" id="add_spd" action="<?php echo site_url() ?>form_spd_luar/add" method="post"> 
                <div class="row column-seperation">
                  <div class="col-md-5">
                    <h4>Yang Memberi Tugas</h4>
                    <?php if ($tc_num_rows > 0) {
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
                        <input name="org_tc" id="org_tc" type="text"  class="form-control" placeholder="Nama" value="<?php echo $tc->organization_title?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Jabatan</label>
                      </div>
                      <div class="col-md-9">
                        <input name="pos_tc" id="pos_tc" type="text"  class="form-control" placeholder="Nama" value="<?php echo $tc->position_title ?>" disabled="disabled">
                      </div>
                    </div>
                    <?php  endforeach;
                    } ?>   
                    
                  </div>
                  <div class="col-md-7">
                    <h4>Memberi tugas / Ijin Kepada</h4>
                        <div class="row form-row">
                          <div class="col-md-3">
                            <label class="form-label text-right">Nama</label>
                          </div>
                          <div class="col-md-9">
                            <select id="emp_name" name="emp_name" class="select2" style="width:100%">
                              <?php if ($el_num_rows > 0) {
                              foreach ($employee_list as $el) :
                              ?>    
                              <option value="<?php echo $el->id ?>"><?php echo $el->first_name.' '.$el->last_name; ?></option>
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
                            <input name="organization" id="org_tr" type="text"  class="form-control" placeholder="Dept/Bagian" value="" disabled="disabled">
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-3">
                            <label class="form-label text-right">Jabatan</label>
                          </div>
                          <div class="col-md-9">
                            <input name="position" id="pos_tr" type="text"  class="form-control" placeholder="Jabatan" value="" disabled="disabled">
                          </div>
                        </div>
                         <div class="row form-row">
                          <div class="col-md-3">
                            <label class="form-label text-right">Tujuan</label>
                          </div>
                          <div class="col-md-9">
                            <input name="destination" id="destination" type="text"  class="form-control" placeholder="Tujuan" value="">
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-3">
                            <label class="form-label text-right">Dalam Rangka</label>
                          </div>
                          <div class="col-md-9">
                            <input name="title" id="title" type="text"  class="form-control" placeholder="Dalam Rangka" value="">
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
                              ?>    
                              <option value="<?php echo $cl->id ?>" ><?php echo $cl->title ?></option>
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
                              ?>    
                              <option value="<?php echo $cl->id ?>" ><?php echo $cl->title ?></option>
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
                              ?>    
                              <option value="<?php echo $tl->id ?>" ><?php echo $tl->title ?></option>
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
                              <input type="text" class="form-control" name="date_spd" value="">
                              <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span> 
                            </div>
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
              </form>
            </div>
          </div>
        </div>
      </div>
              
    
      </div>
    
  </div>  
  <!-- END PAGE --> 