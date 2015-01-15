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
			<div class="page-title">	
				<h3>Dashboard User</h3>		
			</div>
			
		   <div id="container">
		   	<div class="row spacing-bottom 2col">	
				<div class="col-md-3 col-sm-6 spacing-bottom-sm">	
					<div class="tiles blue added-margin">
					  <div class="tiles-body">
						<div class="controller">								
							<a href="javascript:;" class="reload"></a>
							<a href="javascript:;" class="remove"></a>		
						</div>		
						<div class="tiles-title">
							KEHADIRAN
						</div>	
						<div class="heading">
						<span class="animate-number" data-value="98.8" data-animation-duration="1200">0</span>%
												
						</div>
						<div class="progress transparent progress-small no-radius">
							<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="98.8%"></div>
						</div>					
						<div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; 4% lebih tinggi <span class="blend">dari rata-rata</span></span></div>
						</div>	
					</div>
				</div>
				<div class="col-md-3 col-sm-6 spacing-bottom-sm">
					<div class="tiles green added-margin">
					 <div class="tiles-body">
						<div class="controller">								
							<a href="javascript:;" class="reload"></a>
							<a href="javascript:;" class="remove"></a>									
						</div>		
						<div class="tiles-title">
							KETERLAMBATAN
						</div>	
						<div class="heading">
							<span class="animate-number" data-value="8.3" data-animation-duration="1000">0</span>%	
						</div>
						<div class="progress transparent progress-small no-radius">
								<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="8.3%" ></div>
						</div>				
						<div class="description"><i class="icon-custom-down"></i><span class="text-white mini-description ">&nbsp; 2% lebih rendah <span class="blend">dari rata-rata</span></span></div>	
					 </div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="tiles red added-margin">
					<div class="tiles-body">
						<div class="controller">								
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>										
							</div>	
						<div class="tiles-title">
							TIDAK HADIR
						</div>	
						<div class="heading">
							<span class="animate-number" data-value="18" data-animation-duration="1200">0</span> Kali	
						</div>
						<div class="progress transparent progress-white progress-small no-radius">
							<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="2%" ></div>
						</div>
						<div class="description"><i class="icon-male"></i><span class="text-white mini-description ">&nbsp;  </span></div>	
					</div>
					</div>
			
				</div> 
				<div class="col-md-3 col-sm-6">
					<div class="tiles purple added-margin">
					  <div class="tiles-body">
						<div class="controller">								
							<a href="javascript:;" class="reload"></a>
							<a href="javascript:;" class="remove"></a>									
						</div>		
						<div class="tiles-title">
							LEMBUR
						</div>	
						<div class="row-fluid">
							<div class="heading">
								<span class="animate-number" data-value="18" data-animation-duration="1200">0</span> Kali
							</div>
							<div class="progress transparent progress-white progress-small no-radius">
								<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="12%"></div>
							</div>
						</div>
						<div class="description"><i class="icon-male"></i><span class="text-white mini-description ">&nbsp; Mengajukan lembur </span></div>	
						
					 </div>
					</div>
				</div>			
			</div>
			
			<div class="row">		
				
				<div class="col-md-12">
		          <div class="tabbable tabs-left">
		            <ul class="nav nav-tabs" id="tab-1">
		              <li class="active"><a href="#tabpersonnel">Employee Identity</a></li>
		              <li><a href="#tabcourse">Company Sponsor Course</a></li>
		              <li><a href="#tabcertificate">Certificate</a></li>
		              <li><a href="#tabeducation">Education</a></li>
		              <li><a href="#tabexperience">Experience</a></li>
		              <li><a href="#tabsk">Surat Keputusan</a></li>
		              <li><a href="#tabsertijah">Serah Terima Ijazah</a></li>
		              <li><a href="#tabjabatan">Riwayat Jabatan</a></li>
		              <li><a href="#tabaward">Award & Warning</a></li>
		              <li><a href="#tabikatandinas">Ikatan Dinas</a></li>
		            </ul>
		            <div class="tab-content">

		              <!-- tabpersonnel -->

		              <div class="tab-pane active" id="tabpersonnel">

		              	<?php echo form_open_multipart(uri_string());?>
			                <div class="row column-seperation row-seperation" style="padding-bottom: 30px;">
			                	<div class="col-md-8">
				                  <h4>Employee Identity</h4>
				                  <div <?php ( ! empty($message)) && print('class="alert alert-info"'); ?> id="infoMessage"><?php echo $message;?></div>
				                    <div class="row form-row">
				                      <div class="col-md-3">
				                        <?php echo lang('register_nik_label', 'nik');?>
				                      </div>
				                      <div class="col-md-9">
				            
                                        <?php echo bs_form_input($nik);?>           
				                      </div>
				                    </div>
				                    <div class="row form-row">
				                     <div class="col-md-3">
				                       <?php echo lang('register_firstname_label', 'firstname');?>
				                      </div>
				                      <div class="col-md-9">
				                        <?php echo bs_form_input($first_name);?>
				                      </div>
				                    </div>
				                    <div class="row form-row">
				                     <div class="col-md-3">
				                       <?php echo lang('register_lastname_label', 'lasttname');?>
				                      </div>
				                      <div class="col-md-9">
				                        <?php echo bs_form_input($last_name);?>
				                      </div>
				                    </div>
				                    <div class="row form-row">
				                      <div class="col-md-3">
				                        <?php echo lang('register_dob_label', 'dob');?>
				                      </div>
				                      <div class="col-md-9">
				                        <div class="input-append success date no-padding">
							                <?php echo bs_form_input($bod);?>
							                <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span> 
							            </div>
				                      </div>
				                    </div>
				                    <div class="row form-row">
				                      <div class="col-md-3">
				                        <?php echo lang('register_marital_label', 'marital');?>
				                      </div>
				                      <div class="col-md-9">
				                      	<select name="marital_id" class="select2" id="marital_id" style="width:100%">
                                                    <?php
                                                        foreach ($marital->result_array() as $key => $value) {
                                                            $selected = ($marital_id <> 0 && $marital_id == $value['id']) ? 'selected = selected' : '';
                                                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                                                        }
                                                    ?>
                                                </select>
				                      </div>
				                    </div>
				                </div>

			                 

			                  <div class="col-md-4">
			                  	<div class="grid simple" style="margin-bottom : 0px !important;">
				                   <h4>Picture</h4>
					            </div>
                                <img alt="" src="<?php echo base_url()?>uploads/<?php echo $u_folder.'/225x225/'.$s_photo?>">
			                 	</div>
			                </div>
			                <div class="row row-seperation" style="margin-top: 20px;padding-bottom: 30px;">
			                	<div class="col-md-12">
			                		<h4>Employement</h4>
			                		<div class="row form-row">
				                		<div class="col-md-3">
					                      <label class="form-label">Seniority Date</label>
					                    </div>
					                   <div class="col-md-9">
				                        <div class="input-append success date no-padding">
							                <?php echo bs_form_input($seniority_date);?>
							                <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span> 
							            </div>
				                      </div>
						        	</div>
						        	<div class="row form-row">
				                		<div class="col-md-3">
					                      <label class="form-label">Position</label>
					                    </div>
					                   <div class="col-md-9">
				                      	<select name="position_id" class="select2" id="position_id" style="width:100%">
                                                    <?php
                                                        foreach ($position->result_array() as $key => $value) {
                                                            $selected = ($position_id <> 0 && $position_id == $value['id']) ? 'selected = selected' : '';
                                                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                                                        }
                                                    ?>
                                        </select>
				                        </div>
						        	</div>
						        	<div class="row form-row">
				                		<div class="col-md-3">
					                      <?php echo lang('register_bu_label', 'business_unit');?>
					                    </div>
					                    <div class="col-md-9">
				                        <div class="input-with-icon right">                                       
                                            <i class=""></i>
                                            <?php $options = array("1"=>"Head Office","2"=>"Bandung","3"=>"Surabaya");?>
                                            <?php $js = 'id="business_unit_id" class="select2" style="width:100%"';?>
                                            <?php echo form_dropdown('business_unit_id', $options, $this->form_validation->set_value('business_unit_id', $user->business_unit_id),$js);?>                               
                                        </div>
						                </select>
				                      	</div>
						        	</div>
						        	<div class="row form-row">
				                		<div class="col-md-3">
					                      <label class="form-label">Employee Status</label>
					                    </div>
					                    <div class="col-md-9">
				                      	<select name="empl_status_id" class="select2" id="empl_status_id" style="width:100%">
                                                    <?php
                                                        foreach ($empl_status->result_array() as $key => $value) {
                                                            $selected = ($empl_status_id <> 0 && $empl_status_id == $value['id']) ? 'selected = selected' : '';
                                                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                                                        }
                                                    ?>
                                        </select>
				                        </div>
						        	</div>
						        	<div class="row form-row">
				                		<div class="col-md-3">
					                      <label class="form-label">Status</label>
					                    </div>
					                    <div class="col-md-9">
				                      	<select name="employee_status_id" class="select2" id="employee_status_id" style="width:100%">
                                                    <?php
                                                        foreach ($employee_status->result_array() as $key => $value) {
                                                            $selected = ($employee_status_id <> 0 && $employee_status_id == $value['id']) ? 'selected = selected' : '';
                                                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                                                        }
                                                    ?>
                                        </select>
				                        </div>
						        	</div>
						        	<div class="row form-row">
				                		<div class="col-md-3">
					                      <label class="form-label">Cost Center</label>
					                    </div>
					                    <div class="col-md-9">
				                        	<?php echo bs_form_input($cost_center);?>
				                      	</div>
						        	</div>
						        	<div class="row form-row">
				                		<div class="col-md-3">
					                      <label class="form-label">Position Group</label>
					                    </div>
					                    <div class="col-md-9">
				                      	<select name="position_group_id" class="select2" id="position_group_id" style="width:100%">
                                                    <?php
                                                        foreach ($position_group->result_array() as $key => $value) {
                                                            $selected = ($position_group_id <> 0 && $position_group_id == $value['id']) ? 'selected = selected' : '';
                                                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                                                        }
                                                    ?>
                                        </select>
				                        </div>
						        	</div>
						        	<div class="row form-row">
				                		<div class="col-md-3">
					                      <label class="form-label">Grade</label>
					                    </div>
					                    <div class="col-md-9">
				                      	<select name="grade_id" class="select2" id="grade_id" style="width:100%">
                                                    <?php
                                                        foreach ($grade->result_array() as $key => $value) {
                                                            $selected = ($grade_id <> 0 && $grade_id == $value['id']) ? 'selected = selected' : '';
                                                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                                                        }
                                                    ?>
                                        </select>
				                        </div>
						        	</div>
						        	<div class="row form-row">
				                		<div class="col-md-3">
					                      <label class="form-label">Resign Reason</label>
					                    </div>
					                    <div class="col-md-9">
				                      	<select name="resign_reason_id" class="select2" id="resign_reason_id" style="width:100%">
                                                    <?php
                                                        foreach ($resign_reason->result_array() as $key => $value) {
                                                            $selected = ($resign_reason_id <> 0 && $resign_reason_id == $value['id']) ? 'selected = selected' : '';
                                                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                                                        }
                                                    ?>
                                        </select>
				                        </div>
						        	</div>
						        	<div class="row form-row">
				                		<div class="col-md-3">
					                      <label class="form-label">Active / Inactive</label>
					                    </div>
					                    <div class="col-md-9">
				                      	<select name="active_inactive_id" class="select2" id="active_inactive_id" style="width:100%">
                                                    <?php
                                                        foreach ($active_inactive->result_array() as $key => $value) {
                                                            $selected = ($active_inactive_id <> 0 && $active_inactive_id == $value['id']) ? 'selected = selected' : '';
                                                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                                                        }
                                                    ?>
                                        </select>
				                        </div>
						        	</div>
			                	</div>
			                </div>
			                <div class="row " style="margin-top:20px;">
			                	<div class="col-md-12">
			                		<h4>CONTACT</h4>
			                		<div class="row form-row">
				                		<div class="col-md-3">
					                      <label class="form-label">Mobile Phone</label>
					                    </div>
					                    <div class="col-md-9">
				                        	<?php echo bs_form_input($phone);?>
				                      	</div>
						        	</div>
						        	<div class="row form-row">
				                		<div class="col-md-3">
					                      <label class="form-label">Corporate Email</label>
					                    </div>
					                    <div class="col-md-9">
				                        	<input class="form-control" type="text" value="-">
				                      	</div>
						        	</div>
						        	<div class="row form-row">
				                		<div class="col-md-3">
					                      <label class="form-label">Previous Email</label>
					                    </div>
					                    <div class="col-md-9">
				                        	<?php echo bs_form_input($prev_email);?>
				                      	</div>
						        	</div>
						        	<div class="row form-row">
				                		<div class="col-md-3">
					                      <label class="form-label">Blackberry PIN</label>
					                    </div>
					                    <div class="col-md-9">
				                        	<?php echo bs_form_input($bb_pin);?>
				                      	</div>
						        	</div>
			                	</div>
			                </div>
			            	<div class="form-actions">
								<div class="pull-right">
								  <button class="btn btn-danger btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
								  <button class="btn btn-white btn-cons" type="button">Cancel</button>
								</div>
						  	</div>
		            	 <?php echo form_close();?>
		              </div>

		              <!-- tabcourse -->
		              <div class="tab-pane" id="tabcourse">
		                <form class="form-no-horizontal-spacing" id="form-condensed">
		                	<div class="row">
				                <div class="col-md-12">
			                        <div class="grid simple ">
			                            <div class="grid-body no-border grid-custom">
			                                  <h4>Company Sponsor Course</h4>
			                                    <table class="table no-more-tables table-hover">
			                                        <thead>
			                                            <tr>
			                                                <th width="20%">Course ID</th>
			                                                <th width="40%">Description</th>
			                                                <th width="20%">Registration Date</th>
			                                                <th width="20%">Status</th>
			                                            </tr>
			                                        </thead>
			                                        <tbody>
			                                            <tr class="itemtraining" id="1">
			                                                <td valign="middle"><a href="#" id="viewtraining-1">TRN_035</a></td>
			                                                <td valign="middle"><span class="muted">Business Intelligence Berbasis Web</span></td>
			                                                <td valign="middle">
			                                                    <span class="muted">23 November 2011</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">Completed</span>
			                                                </td>
			                                            </tr>
			                                            <tr id="trainingdetail-1" style="display:none">
			                                            	<td class="detail" colspan="5">
			                                            		<div class="row">
			                                            			<form action="#" method="enctype">
												                  	<div class="col-md-12">
												                  		<h4>ID : #1</h4>
												                  		<div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">course Id</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="courseid" id="courseid" type="text"  class="form-control" placeholder="courseid" value="TRN_035" disabled="disabled">
													                      </div>
													                    </div>
												                  		<div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Description</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="description" id="description" type="text"  class="form-control" placeholder="Description" value="Business Intelligence Berbasis Web" disabled="disabled">
													                      </div>
													                    </div>
													                    
													                    
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Registration Date</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="registration_date" id="registration_date" type="text"  class="form-control" placeholder="Registration Date" value="23 November 2011" disabled="disabled">
													                      </div>
													                    </div>

													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Status</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="status" id="status" type="text"  class="form-control" placeholder="Status" value="completed" disabled="disabled">
													                      </div>
													                    </div>
													                    
												                  	</div>
												                  	<!-- <div class="form-actions">
																		<div class="pull-right">
																		  <button class="btn btn-danger btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
																		  <button class="btn btn-white btn-cons" type="button">Cancel</button>
																		</div>
																	  </div> -->
												                  </form>
												                  </div>

			                                            	</td>
			                                            </tr>
			                                            <tr class="itemtraining" id="2">
			                                                <td valign="middle"><a href="#" id="viewtraining-2">TRN_037</a></td>
			                                                <td valign="middle"><span class="muted">Microsoft Dynamic Ax</span></td>
			                                                <td valign="middle">
			                                                    <span class="muted">04 Juli 2011</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">Completed</span>
			                                                </td>
			                                            </tr>
			                                            <tr id="trainingdetail-2" style="display:none">
			                                            	<td class="detail" colspan="5">
			                                            		<div class="row">
			                                            			<form action="#" method="enctype">
												                  	<div class="col-md-12">
												                  		<h4>ID : #2</h4>
												                  		<div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">course Id</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="courseid" id="courseid" type="text"  class="form-control" placeholder="courseid" value="TRN_037" disabled="disabled">
													                      </div>
													                    </div>
												                  		<div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Description</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="description" id="description" type="text"  class="form-control" placeholder="Description" value="Microsoft Dynamic Ax" disabled="disabled">
													                      </div>
													                    </div>
													                    
													                    
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Registration Date</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="registration_date" id="registration_date" type="text"  class="form-control" placeholder="Registration Date" value="04 Juli 2011" disabled="disabled">
													                      </div>
													                    </div>

													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Status</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="status" id="status" type="text"  class="form-control" placeholder="Status" value="completed" disabled="disabled">
													                      </div>
													                    </div>
													                    
												                  	</div>
												                  	<!-- <div class="form-actions">
																		<div class="pull-right">
																		  <button class="btn btn-danger btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
																		  <button class="btn btn-white btn-cons" type="button">Cancel</button>
																		</div>
																	  </div> -->
												                  </form>
												                  </div>

			                                            	</td>
			                                            </tr>
			                                        </tbody>
			                                    </table>
			                            </div>
			                        </div>
			                    </div>
	                		</div>
		                </form>
		              </div>

		              <!-- tabcertificate -->
		              <div class="tab-pane" id="tabcertificate">
		              	<form class="form-no-horizontal-spacing" id="form-condensed">
		                	<div class="row">
				                <div class="col-md-12">
			                        <div class="grid simple ">
			                            <div class="grid-body no-border grid-custom">
			                                  <h4>Certificate</h4>
			                                    <table class="table no-more-tables table-hover">
			                                        <thead>
			                                            <tr>
			                                                <th width="20%">Certificate type</th>
			                                                <th width="40%">Description</th>
			                                                <th width="20%">Start Date</th>
			                                                <th width="20%">End Date</th>
			                                            </tr>
			                                        </thead>
			                                        <tbody>
			                                            <tr class="itemcertificate" id="1">
			                                                <td valign="middle"><a href="#" id="viewcertificate-1">HPL</a></td>
			                                                <td valign="middle"><span class="muted">High Performance Leadership</span></td>
			                                                <td valign="middle">
			                                                    <span class="muted">23 November 2011</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">24 November 2011</span>
			                                                </td>
			                                            </tr>
			                                            <tr id="certificatedetail-1" style="display:none">
			                                            	<td class="detail" colspan="5">
			                                            		<div class="row">
			                                            			<form action="#" method="enctype">
												                  	<div class="col-md-12">
												                  		<h4>ID : #1</h4>
												                  		<div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Certificate Type</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="certificate_type" id="certificate_type" type="text"  class="form-control" placeholder="certificate_type" value="HPL" disabled="disabled">
													                      </div>
													                    </div>
												                  		<div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Description</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="description" id="description" type="text"  class="form-control" placeholder="Description" value="High Performance Leadership" disabled="disabled">
													                      </div>
													                    </div>
													                    
													                    
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Start Date</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="start_date" id="start_date" type="text"  class="form-control" placeholder="Start Date" value="23 November 2011" disabled="disabled">
													                      </div>
													                    </div>

													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">End Date</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="end_date" id="end_date" type="text"  class="form-control" placeholder="End Date" value="24 November 2011" disabled="disabled">
													                      </div>
													                    </div>
													                    
												                  	</div>
												                  	<!-- <div class="form-actions">
																		<div class="pull-right">
																		  <button class="btn btn-danger btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
																		  <button class="btn btn-white btn-cons" type="button">Cancel</button>
																		</div>
																	</div> -->
												                  </form>
												                  </div>
			                                            	</td>
			                                            </tr>
			                                        </tbody>
			                                    </table>
			                            </div>
			                        </div>
			                    </div>
	                		</div>
		                </form>
		              </div>

		              <!-- tabeducation -->
		              <div class="tab-pane" id="tabeducation">
		                <form class="form-no-horizontal-spacing" id="form-condensed">
		                	<div class="row">
				                <div class="col-md-12">
			                        <div class="grid simple ">
			                            <div class="grid-body no-border grid-custom">
			                                  <h4>Education</h4>
			                                    <table class="table no-more-tables table-hover">
			                                        <thead>
			                                            <tr>
			                                                <th width="20%">Education</th>
			                                                <th width="20%">Description</th>
			                                                <th width="10%">Start Date</th>
			                                                <th width="10%">End Date</th>
			                                                <th width="10%">Degree</th>
			                                                <th width="10%">Education Group</th>
			                                                <th width="20%">Institution</th>
			                                            </tr>
			                                        </thead>
			                                        <tbody>
			                                            <tr class="itemeducation" id="1">
			                                                <td valign="middle"><a href="#" id="vieweducation-1">S-INFORMASI</a></td>
			                                                <td valign="middle"><span class="muted">Sistem Informasi</span></td>
			                                                <td valign="middle">
			                                                    <span class="muted">1 Juli 1992</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">6 Mei 1997</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">S1</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">Komputer</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">Univ. Indonesia</span>
			                                                </td>
			                                            </tr>
			                                            <tr id="educationdetail-1" style="display:none">
			                                            	<td class="detail" colspan="7">
			                                            		<div class="row">
			                                            			<form action="#" method="enctype">
												                  	<div class="col-md-12">
												                  		<h4>ID : #1</h4>
												                  		<div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Education</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="education" id="education" type="text"  class="form-control" placeholder="education" value="S-INFORMASI" disabled="disabled">
													                      </div>
													                    </div>
												                  		<div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Description</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="description" id="description" type="text"  class="form-control" placeholder="Description" value="Sistem Informasi" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Start Date</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="start_date" id="start_date" type="text"  class="form-control" placeholder="Start Date" value="1 Juli 1992" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">End Date</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="end_date" id="end_date" type="text"  class="form-control" placeholder="End Date" value="6 Mei 1997" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Degree</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="degree" id="degree" type="text"  class="form-control" placeholder="Degree" value="S1" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Education Group</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="education_group" id="education_group" type="text"  class="form-control" placeholder="Education Group" value="Komputer" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Institution</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="institution" id="institution" type="text"  class="form-control" placeholder="Institution" value="Univ. Indonesia" disabled="disabled">
													                      </div>
													                    </div>
													                    
												                  	</div>
												                  </form>
												                  </div>
			                                            	</td>
			                                            </tr>
			                                        </tbody>
			                                    </table>
			                            </div>
			                        </div>
			                    </div>
	                		</div>
		                </form>
		              </div>

		               <!-- tabexperience -->
		              <div class="tab-pane" id="tabexperience">
		                <form class="form-no-horizontal-spacing" id="form-condensed">
		                	<div class="row">
				                <div class="col-md-12">
			                        <div class="grid simple ">
			                            <div class="grid-body no-border grid-custom">
			                                  <h4>Experience</h4>
			                                    <table class="table no-more-tables table-hover">
			                                        <thead>
			                                            <tr>
			                                                <th width="20%">Company</th>
			                                                <th width="10%">Start Date</th>
			                                                <th width="10%">End Date</th>
			                                            </tr>
			                                        </thead>
			                                        <tbody>
			                                            <tr class="itemexperience" id="1">
			                                                <td valign="middle"><a href="#" id="viewexperience-1">PT. Delta Dimensi Datalisis</a></td>
			                                                <td valign="middle">
			                                                    <span class="muted">4 Mei 1998</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">7 Maret 2005</span>
			                                                </td>
			                                            </tr>
			                                            <tr id="experiencedetail-1" style="display:none">
			                                            	<td class="detail" colspan="3">
			                                            		<div class="row">
			                                            			<form action="#" method="enctype">
												                  	<div class="col-md-12">
												                  		<h4>ID : #1</h4>
												                  		<div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Company</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="company" id="company" type="text"  class="form-control" placeholder="company" value="PT. Delta Dimensi Datalisis" disabled="disabled">
													                      </div>
													                    </div>
												                  		<div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Position</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="position" id="position" type="text"  class="form-control" placeholder="Position" value="Analyst Programmer" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Start Date</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="start_date" id="start_date" type="text"  class="form-control" placeholder="Start Date" value="4 Mei 1998" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">End Date</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="end_date" id="end_date" type="text"  class="form-control" placeholder="End Date" value="7 Maret 2005" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Street</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="street" id="street" type="text"  class="form-control" placeholder="street" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Line of Business</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="lineofbusiness" id="lineofbusiness" type="text"  class="form-control" placeholder="Line of Business" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Resignation Reason</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="resignation_reason" id="resignation_reason" type="text"  class="form-control" placeholder="Resignation Reason" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Last Salary</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="last_salary" id="last_salary" type="text"  class="form-control" placeholder="Last Salary" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    
												                  	</div>
												                  </form>
												                  </div>
			                                            	</td>
			                                            </tr>
			                                        </tbody>
			                                    </table>
			                            </div>
			                        </div>
			                    </div>
	                		</div>
		                </form>
		              </div>

		              <!-- tabsk -->
		              <div class="tab-pane" id="tabsk">
		                <form class="form-no-horizontal-spacing" id="form-condensed">
		                	<div class="row">
				                <div class="col-md-12">
			                        <div class="grid simple ">
			                            <div class="grid-body no-border grid-custom">
			                                  <h4>Surat Keputusan</h4>
			                                    <table class="table no-more-tables table-hover">
			                                        <thead>
			                                            <tr>
			                                                <th width="20%">SK Date</th>
			                                                <th width="15%">Nomor SK</th>
			                                                <th width="15%">Position</th>
			                                                <th width="10%">Departement</th>
			                                                <th width="10%">Tanggal Efektif</th>
			                                                <th width="10%">Tempat</th>
			                                                <th width="10%">Penandatangan</th>
			                                                <th width="10%">Posisi Penandatangan</th>
			                                            </tr>
			                                        </thead>
			                                        <tbody>
			                                            <tr class="itemsk" id="1">
			                                                <td valign="middle"><a href="#" id="viewsk-1">1 Januari 1970</a></td>
			                                                <td valign="middle">
			                                                    <span class="muted">001</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                            </tr>
			                                            <tr id="skdetail-1" style="display:none">
			                                            	<td class="detail" colspan="8">
			                                            		<div class="row">
			                                            			<form action="#" method="enctype">
												                  	<div class="col-md-12">
												                  		<h4>ID : #1</h4>
												                  		<div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">SK Date</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="sk_date" id="sk_date" type="text"  class="form-control" placeholder="sk_date" value="1 Januari 1970" disabled="disabled">
													                      </div>
													                    </div>
												                  		<div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Nomor SK</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="nomor_sk" id="nomor_sk" type="text"  class="form-control" placeholder="nomor SK" value="Analyst Programmer" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Position</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="position" id="position" type="text"  class="form-control" placeholder="Position" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Departement</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="departement" id="departement" type="text"  class="form-control" placeholder="Departement" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Tanggal Efektif</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="tanggal_efektif" id="tanggal_efektif" type="text"  class="form-control" placeholder="Tanggal Efektif" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Tempat</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="tempat" id="tempat" type="text"  class="form-control" placeholder="penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Penandatangan</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="penandatangan" id="penandatangan" type="text"  class="form-control" placeholder="Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Posisi Penandatangan</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    
												                  	</div>
												                  </form>
												                  </div>
			                                            	</td>
			                                            </tr>
			                                        </tbody>
			                                    </table>
			                            </div>
			                        </div>
			                    </div>
	                		</div>
		                </form>
		              </div>

		              <!-- tabsertijah -->
		              <div class="tab-pane" id="tabsertijah">
		            	<form class="form-no-horizontal-spacing" id="form-condensed">
		                	<div class="row">
				                <div class="col-md-12">
			                        <div class="grid simple ">
			                            <div class="grid-body no-border grid-custom">
			                                  <h4>Serah Terima Ijazah</h4>
			                                    <table class="table no-more-tables table-hover">
			                                        <thead>
			                                            <tr>
			                                                <th width="10%">Employee</th>
			                                                <th width="5%">No Identitas</th>
			                                                <th width="10%">Ijazah Name</th>
			                                                <th width="5%">Ijazah No</th>
			                                                <th width="10%">Tempat/tanggal dikeluarkan</th>
			                                                <th width="10%">Dikeluarkan oleh</th>
			                                            </tr>
			                                        </thead>
			                                        <tbody>
			                                            <tr class="itemsertijah" id="1">
			                                                <td valign="middle"><a href="#" id="viewsertijah-1">Mauro Icardi</a></td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                            </tr>
			                                            <tr id="sertijahdetail-1" style="display:none">
			                                            	<td class="detail" colspan="12">
			                                            		<div class="row">
			                                            			<form action="#" method="enctype">
												                  	<div class="col-md-12">
												                  		<h4>ID : #1</h4>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Tempat/tanggal diterbitkan</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="penandatangan" id="penandatangan" type="text"  class="form-control" placeholder="Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Date</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Bagian</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Sebagai</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Description</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Acknowledge by</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    
												                  	</div>
												                  </form>
												                  </div>
			                                            	</td>
			                                            </tr>
			                                        </tbody>
			                                    </table>
			                            </div>
			                        </div>
			                    </div>
	                		</div>
		                </form> 
		              </div>

		              <!-- tabjabatan -->
		              <div class="tab-pane" id="tabjabatan">
		            	<form class="form-no-horizontal-spacing" id="form-condensed">
		                	<div class="row">
				                <div class="col-md-12">
			                        <div class="grid simple ">
			                            <div class="grid-body no-border grid-custom">
			                                  <h4>Riwayat Jabatan</h4>
			                                    <table class="table no-more-tables table-hover">
			                                        <thead>
			                                            <tr>
			                                                <th width="10%">Name</th>
			                                                <th width="10%">Organization Unit</th>
			                                                <th width="10%">Position Description</th>
			                                                <th width="10%">Empl Group</th>
			                                                <th width="10%">Grade</th>
			                                                <th width="10%">Branch ID</th>
			                                                <th width="10%">Personnel Action ID</th>
			                                                <th width="10%">Tanggal SK</th>
			                                            </tr>
			                                        </thead>
			                                        <tbody>
			                                            <tr class="itemjabatan" id="1">
			                                                <td valign="middle"><a href="#" id="viewjabatan-1">Mauro Icardi</a></td>
			                                                <td valign="middle">
			                                                    <span class="muted">MIS Manager</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">Manager EDP Pusat</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">5031300</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">G08</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                            </tr>
			                                            <tr id="jabatandetail-1" style="display:none">
			                                            	<td class="detail" colspan="8">
			                                            		<div class="row">
			                                            			<form action="#" method="enctype">
												                  	<div class="col-md-12">
												                  		<h4>ID : #1</h4>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Name</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="penandatangan" id="penandatangan" type="text"  class="form-control" placeholder="Penandatangan" value="Mauro Icardi" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Organization Unit</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="MIS Manager" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Position Description</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="Manager EDP Pusat" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Empl Group</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="5031300" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Grade</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="G08" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">branch ID</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Personnel Action ID</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">tanggal SK</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    
												                  	</div>
												                  </form>
												                  </div>
			                                            	</td>
			                                            </tr>
			                                        </tbody>
			                                    </table>
			                            </div>
			                        </div>
			                    </div>
	                		</div>
		                </form> 
		              </div>

		              <!-- tabaward -->
		              <div class="tab-pane" id="tabaward">
		                <form class="form-no-horizontal-spacing" id="form-condensed">
		                	<div class="row">
				                <div class="col-md-12">
			                        <div class="grid simple ">
			                            <div class="grid-body no-border grid-custom">
			                                  <h4>Award / Warning</h4>
			                                    <table class="table no-more-tables table-hover">
			                                        <thead>
			                                            <tr>
			                                                <th width="15%">Award/Warning Type</th>
			                                                <th width="15%">Award/Warning ID</th>
			                                                <th width="15%">Description</th>
			                                                <th width="15%">Approved Date</th>
			                                                <th width="15%">SK Number</th>
			                                                <th width="10%">From Date</th>
			                                                <th width="10%">To Date</th>
			                                            </tr>
			                                        </thead>
			                                        <tbody>
			                                            <tr class="itemaward" id="1">
			                                                <td valign="middle"><a href="#" id="viewaward-1">-</a></td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">-</span>
			                                                </td>
			                                            </tr>
			                                            <tr id="awarddetail-1" style="display:none">
			                                            	<td class="detail" colspan="7">
			                                            		<div class="row">
			                                            			<form action="#" method="enctype">
												                  	<div class="col-md-12">
												                  		<h4>ID : #1</h4>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Award/Warning Type</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="penandatangan" id="penandatangan" type="text"  class="form-control" placeholder="Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Award/Warning ID</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Description</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Approved Date</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">SK Number</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">From Date</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">To Date</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="-" disabled="disabled">
													                      </div>
													                    </div>
													                    
												                  	</div>
												                  </form>
												                  </div>
			                                            	</td>
			                                            </tr>
			                                        </tbody>
			                                    </table>
			                            </div>
			                        </div>
			                    </div>
	                		</div>
		                </form> 
		              </div>

		               <!-- tabikatandinas -->
		              <div class="tab-pane" id="tabikatandinas">
		                <form class="form-no-horizontal-spacing" id="form-condensed">
		                	<div class="row">
				                <div class="col-md-12">
			                        <div class="grid simple ">
			                            <div class="grid-body no-border grid-custom">
			                                  <h4>Ikatan Dinas</h4>
			                                    <table class="table no-more-tables table-hover">
			                                        <thead>
			                                            <tr>
			                                                <th width="15%">ID</th>
			                                                <th width="15%">Type</th>
			                                                <th width="15%">Employee</th>
			                                                <th width="15%">Description</th>
			                                                <th width="15%">To Date</th>
			                                                <th width="15%">From Date</th>
			                                                <th width="10%">Amount</th>
			                                            </tr>
			                                        </thead>
			                                        <tbody>
			                                            <tr class="itemikatandinas" id="1">
			                                                <td valign="middle"><a href="#" id="viewikatandinas-1">IK_000171</a></td>
			                                                <td valign="middle">
			                                                    <span class="muted">TRN</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">Mauro Icardi</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">High Performance Manager</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">16 Oktober 2013</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">17 Oktober 2013</span>
			                                                </td>
			                                                <td valign="middle">
			                                                    <span class="muted">5,500,000</span>
			                                                </td>
			                                            </tr>
			                                            <tr id="ikatandinasdetail-1" style="display:none">
			                                            	<td class="detail" colspan="6">
			                                            		<div class="row">
			                                            			<form action="#" method="enctype">
												                  	<div class="col-md-12">
												                  		<h4>ID : #1</h4>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">ID</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="penandatangan" id="penandatangan" type="text"  class="form-control" placeholder="Penandatangan" value="IK_000171" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Type</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="TRN" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Employee</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value=">Mauro Icardi" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Description</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="High Performance Manager" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">To Date</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="16 Oktober 2013" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">From Date</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="17 Oktober 2013" disabled="disabled">
													                      </div>
													                    </div>
													                    <div class="row form-row">
													                      <div class="col-md-2">
													                        <label class="form-label text-right">Amount</label>
													                      </div>
													                      <div class="col-md-10">
													                        <input name="posisi_penandatangan" id="posisi_penandatangan" type="text"  class="form-control" placeholder="Posisi Penandatangan" value="5,500,000" disabled="disabled">
													                      </div>
													                    </div>
													                    
												                  	</div>
												                  </form>
												                  </div>
			                                            	</td>
			                                            </tr>
			                                        </tbody>
			                                    </table>
			                            </div>
			                        </div>
			                    </div>
	                		</div>
		                </form> 
		              </div>

		            </div>
		          </div>
		        </div>
					
				</div>
			</div> 
			</div>  
		<!-- END PAGE --> 
		</div>
	</div>