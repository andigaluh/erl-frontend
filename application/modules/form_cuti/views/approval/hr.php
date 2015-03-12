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
                <h4>Form <span class="semi-bold">Cuti</span> - HRD Approval</h4>
              </div>
              <div class="grid-body no-border">
                <form class="form-no-horizontal-spacing" id="formAppLv3"> 
                  <div class="row column-seperation">
                    <div class="col-md-5">
                      <h4>Informasi karyawan</h4>
                      <?php if ($_num_rows > 0) { ?>
                      <?php foreach ($form_cuti as $user) : ?>
                      <?php 
                      $cur_sess = date('Y');
                      // convert date time
                      $submission_date = date('d F Y',strtotime($user->created_on));
                      $date_start_cuti = date('d F Y',strtotime($user->date_mulai_cuti));
                      $date_end_cuti = date('d F Y',strtotime($user->date_selesai_cuti));

                      $date_app_lv1 = date('d F Y', strtotime($user->date_app_lv1));
                      $date_app_lv2 = date('d F Y', strtotime($user->date_app_lv2));
                      $date_app_lv3 = date('d F Y', strtotime($user->date_app_lv3));

                      $sisa_cuti = $user->hak_cuti;
                     ?>
                       <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">No</label>
                        
                      </div>
                      <div class="col-md-9">
                        <input name="no" id="no" type="text"  class="form-control" placeholder="No" value="<?php echo $user->id; ?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo lang('start_working') ?></label>
                      </div>
                      <div class="col-md-9">
                        <input name="seniority_date" id="seniority_date" type="text"  class="form-control" placeholder="Lama Bekerja" value="<?php echo date('d F Y',strtotime($user->seniority_date)); ?>" disabled="disabled">
                      </div>
                    </div>          
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo lang('name') ?></label>
                      </div>
                      <div class="col-md-9">
                        <input name="name" id="name" type="text"  class="form-control" placeholder="Nama" value="<?php echo $user->first_name.' '.$user->last_name; ?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo lang('dept_div') ?></label>
                      </div>
                      <div class="col-md-9">
                        <input name="organization" id="organization" type="text"  class="form-control" placeholder="Organization" value="<?php echo $user->organization_title; ?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo lang('position') ?></label>
                      </div>
                      <div class="col-md-9">
                        <input name="position" id="position" type="text"  class="form-control" placeholder="Jabatan" value="<?php echo $user->position_title; ?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo lang('cuti_remain') ?></label>
                      </div>
                      <div class="col-md-9">
                        <input name="sisa_cuti" id="sisa_cuti" type="text"  class="form-control" placeholder="Sisa Cuti" value="<?php echo $sisa_cuti; ?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">Tanggal pengajuan</label>
                      </div>
                      <div class="col-md-9">
                        <input name="tgl_pengajuan" id="tgl_pengajuan" type="text"  class="form-control" placeholder="Tanggal Pengajuan" value="<?php echo $submission_date; ?>" disabled="disabled">
                      </div>
                    </div>  
                    </div>

                    <div class="col-md-7">
                      <h4>Cuti yang akan diambil</h4>
                      <div class="row form-row">
                        <div class="col-md-3">
                          <label class="form-label text-right">Tahun</label>
                        </div>
                        <div class="col-md-9">
                          <input name="tahuncuti" id="tahuncuti" type="text"  class="form-control" placeholder="Nama" value="<?php echo $user->session_year; ?>" disabled="disabled">
                        </div>
                      </div>
                      <div class="row form-row">
                        <div class="col-md-3">
                          <label class="form-label text-right">Tgl. mulai cuti</label>
                        </div>
                        <div class="col-md-4">
                          <input name="start_cuti" id="start_cuti" type="text"  class="form-control" placeholder="Nama" value="<?php echo $date_start_cuti; ?>" disabled="disabled">
                        </div>
                        <div class="col-md-1">
                          <label class="form-label text-center">s/d</label>
                        </div>
                        <div class="col-md-4">
                          <input name="end_cuti" id="end_cuti" type="text"  class="form-control" placeholder="Nama" value="<?php echo $date_end_cuti; ?>" disabled="disabled">
                        </div>
                      </div>
                      <div class="row form-row">
                        <div class="col-md-3">
                          <label class="form-label text-right">Jml. Hari</label>
                        </div>
                        <div class="col-md-2">
                          <input name="form3PostalCode" id="form3PostalCode" type="text"  class="form-control" placeholder="Jml. Hari" value="<?php echo $user->jumlah_hari; ?>" disabled="disabled">
                        </div>
                      </div>
                      <div class="row form-row">
                        <div class="col-md-3">
                          <label class="form-label text-right">Alasan</label>
                        </div>
                        <div class="col-md-9">
                          <select id="formalasan" class="select2" style="width:100%" disabled="disabled">
                          <?php if ($alasan_cuti > 0) { ?>
                              <?php foreach ($alasan_cuti as $cs) : ?>
                              <?php if ($cs->id == $user->alasan_cuti_id) {
                                $selected = "selected";
                              }else{
                                $selected = "";
                              } ?>
                                <option value="<?php echo $cs->id; ?>" <?php echo $selected; ?>><?php echo $cs->title;?> </option>
                              <?php endforeach; ?>                      
                          <?php } ?>
                          </select> 
                        </div>
                      </div>
                      <div class="row form-row">
                        <div class="col-md-3">
                          <label class="form-label text-right">Pengganti</label>
                        </div>
                        <div class="col-md-9">
                          <input name="pengganti_cuti" id="pengganti_cuti" type="text"  class="form-control" placeholder="Nama" value="<?php echo $user->first_name.' '.$user->last_name; ?>" disabled="disabled">
                        </div>
                      </div>
                    
                      <div class="row form-row">
                        <div class="col-md-3">
                          <label class="form-label text-right">Alamat selama cuti</label>
                        </div>
                        <div class="col-md-9">
                          <input name="alamat_cuti" id="alamat_cuti" type="text"  class="form-control" placeholder="Nama" value="<?php echo $user->alamat_cuti; ?>" disabled="disabled">
                        </div>
                      </div>
                      <div class="row form-row">
                        <div class="col-md-3">
                          <label class="form-label text-right">Note (spv): </label>
                        </div>
                        <div class="col-md-9">
                          <textarea name="notes" class="custom-txtarea-form" disabled="disabled"><?php echo $user->note_app_lv1 ?></textarea>
                        </div>
                      </div>
                      <div class="row form-row">
                        <div class="col-md-3">
                          <label class="form-label text-right">Note (ka. bag): </label>
                        </div>
                        <div class="col-md-9">
                          <textarea name="notes" class="custom-txtarea-form" disabled="disabled"><?php echo $user->note_app_lv2 ?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-actions">
                    <div class="col-md-8 text-center">
                      Disetujui oleh,
                      <div class="row wf-cuti">
                        <div class="col-md-6">
                          <?php if ($user->is_app_lv1 == 1) { ?>
                            <p class="wf-approve-sp">
                              <span class="semi-bold"><?php echo $nm_app_lv1 ?></span><br>
                              <span class="small"><?php echo $date_app_lv1; ?></span><br>
                              (Supervisor)
                            </p>
                          <?php }else{ ?>
                            <p class="wf-approve-hr">(Supervisor)</p>
                          <?php } ?>
                        </div>
                          <div class="col-md-6">
                          <?php if ($user->is_app_lv2 == 1) { ?>
                            <p class="wf-approve-sp">
                              <span class="semi-bold"><?php echo $nm_app_lv2 ?></span><br>
                              <span class="small"><?php echo $date_app_lv2 ?></span><br>
                              (Ka. Cabang / Ka. Bagian)
                            </p>   
                          <?php }else{ ?>
                            <p class="wf-approve-sm">(Ka. Cabang / Ka. Bagian)</p>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 text-center">
                      &nbsp;
                      <div class="row wf-cuti">
                        <div class="col-md-12">
                          <?php if ($user->is_app_lv3 == 1) { ?>
                            <p class="wf-approve-sp">
                              <span class="semi-bold"><?php echo $nm_app_lv3 ?></span><br>
                              <span class="small"><?php echo $date_app_lv3 ?></span><br>
                              (Personalia)
                            </p>   
                          <?php }else{ ?>
                            <input type="hidden" name="cuti_id" value="<?php echo $user->id ?>">
                            <button id="btn_app_lv3" class="btn btn-success btn-cons"><i class="icon-ok"></i>Approve</button>
                            <button class="btn btn-danger btn-cons"><i class="icon-remove"></i>Not Approve</button>
                            <p class="">(Personalia)</p>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                  <?php } ?>
                </form>
              </div>
            </div>
          </div>
        </div>
	          	
		
      </div>
		
	</div>  
	<!-- END PAGE --> 