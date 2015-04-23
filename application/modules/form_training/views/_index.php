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
              <div class="grid simple ">
                <div class="grid-title no-border">
                  <h4>Daftar Permintaan <span class="semi-bold">Pelatihan</span></h4>
                  <div class="tools"> 
                    <a href="<?php echo site_url('form_training/input')?>" class="config"></a>
                  </div>
                </div>
                  <div class="grid-body no-border">
                        
                          <table class="table table-striped table-flip-scroll cf">
                              <thead>
                                <tr>
                                  <th width="20%">Nama Karyawan</th>
                                  <th width="10%">Nama pelatihan</th>
                                  <th width="40%">Tujuan</th>
                                  <th width="10%" style="text-align:center;">APPR SPV</th>
                                  <th width="10%" style="text-align:center;">APPR HRD</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php 
                              if($form_training->num_rows()>0){
                                foreach($form_training->result() as $user){
                                $id_training = $user->id;
                                  $session_id = get_nik($this->session->userdata('user_id'));
                                  $id_user = $this->session->userdata('user_id');
                                  $txt_app_lv1 = $txt_app_lv2 = $txt_app_lv3 = "-";
                                  
                                  // approval training
                                  //Approval Level 1
                                  
                                  if(!empty(is_have_subordinate($session_id)))
                                  {
                                    if(cek_subordinate(is_have_subordinate($session_id),'id', $user->user_id)){
                                          if($user->is_app_lv1 == 0){
                                              $txt_app_lv1 = "<a href='".site_url('form_training/approval_spv/'.$user->id)."''>
                                                  <button type='button' class='btn btn-info btn-small' title='Make Approval'><i class='icon-paste'></i></button>
                                              </a>";
                                          }else{
                                            $txt_app_lv1 =  "<a href='".site_url('form_training/approval_spv/'.$user->id)."''>Ya</a>";
                                            
                                          }
                                      }elseif($user->is_app_lv1== 1){
                                        $txt_app_lv1 =  "<a href='".site_url('form_training/approval_spv/'.$user->id)."''>Ya</a>";
                                      }elseif($user->is_app_lv1== 0){
                                         $txt_app_lv1 = '-';
                                      }
                                  }else{
                                    if ($user->is_app_lv1== 1){
                                    $txt_app_lv1 =  "<a href='".site_url('form_training/approval_spv/'.$user->id)."''>Ya</a>";
                                    }
                                  }

                                  //Approval Level 3
                                    if(is_admin()){
                                          if($user->is_app_lv2 == 0){
                                              $txt_app_lv2 = "<a href='".site_url('form_training/approval_hrd/'.$user->id)."''>
                                                  <button type='button' class='btn btn-info btn-small' title='Make Approval'><i class='icon-paste'></i></button>
                                              </a>";
                                          }else{
                                            $txt_app_lv2 =  "<a href='".site_url('form_training/approval_hrd/'.$user->id)."''>Ya</a>";
                                          }
                                      }else{
                                        if($user->is_app_lv2 == 0){
                                              $txt_app_lv2 = "-";
                                          }else{
                                            $txt_app_lv2 =  "<a href='".site_url('form_training/approval_hrd/'.$user->id)."''>Ya</a>";
                                          }
                                      }
                                  ?>

                                  <tr>
                                    <td>
                                      <a href="<?php echo site_url('form_training/detail/'.$user->id)?>"><?php echo $user->name?></a>
                                    </td>

                                    <td>
                                      <?php echo $user->training_name?>
                                    </td>

                                    <td>
                                      <?php echo $user->tujuan_training?>
                                    </td>

                                    <td style="text-align:center;">
                                    <?php echo $txt_app_lv1?>
                                    </td>

                                    <td style="text-align:center;">
                                    <?php echo $txt_app_lv2?>
                                    </td>

                                  </tr>
                                  
                              </tbody>
                              <?php }}?>
                          </table>
                  </div>
              </div>
          </div>
        </div>
      </div>
	          	
		
      </div>
		
	</div>  
	<!-- END PAGE --> 