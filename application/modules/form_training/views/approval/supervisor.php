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
              <h4>Form Pengajuan <span class="semi-bold">Pelatihan</span></h4>
            </div>
            <div class="grid-body no-border">
              <form class="form-no-horizontal-spacing" id="formAppLv1">
              <?php if($form_training->num_rows()>0){
                foreach($form_training->result() as $user){
                $session_nik = get_nik($this->session->userdata('user_id'));
                ?> 
                <div class="row column-seperation">
                  <div class="col-md-12">    
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">NIK</label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" class="form-control" name="start_cuti" value="<?php echo $user_info['EMPLID']?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Nama</label>
                      </div>
                      <div class="col-md-10">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Nama" value="<?php echo $user->name?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Jabatan</label>
                      </div>
                      <div class="col-md-10">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Nama" value="<?php echo $user_info['POSITION']?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Dept/Bagian</label>
                      </div>
                      <div class="col-md-10">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Nama" value="<?php echo $user_info['ORGANIZATION']?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Nama Program Pelatihan</label>
                      </div>
                      <div class="col-md-10">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Nama program pelatihan" value="<?php echo $user->training_name?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Tujuan Pelatihan</label>
                      </div>
                      <div class="col-md-10">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Tujuan pelatihan" value="<?php echo $user->tujuan_training?>" disabled="disabled">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="col-md-12 text-center">
                    <div class="row wf-cuti">
                      <div class="col-md-4">
                        Diusulkan oleh,<br/><br/>
                         <p class="wf-approve-sp">
                            <span class="semi-bold"><?php echo $user->name?></span><br/>
                            <span class="small"><?php echo $user->created_on?></span><br/>
                          </p>
                      </div>
                      <div class="col-md-4">
                        Persetujuan atasan,<br/><br/>
                        <?php if ($user->is_app_lv1 == 1) { ?>
                            <span class="semi-bold"><?php echo $name_app_lv1?></span><br/>
                            <span class="small"><?php echo $user->date_app_lv1?></span>
                            <?php }elseif(cek_subordinate(is_have_subordinate($session_nik),'id', $user->user_id))
                                  {
                                    if($user->is_app_lv1 == 0){?>
                          <button class="btn btn-danger btn-cons" id="btn_app_lv1" type=""><i class="icon-ok"></i>Approve</button>
                          <?php }}?>
                      </div>
                      <div class="col-md-4">
                        Mengetahui HRD,<br/><br/>
                        <p class="wf-approve-sp">
                          <span class="semi-bold">-</span><br/>
                          <span class="small">-</span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <?php }}?>
            </div>
          </div>
        </div>
      </div>
	          	
		
      </div>
		
	</div>  
	<!-- END PAGE --> 