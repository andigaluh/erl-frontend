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
              <h4>Form Permintaan <span class="semi-bold">SDM Baru</span></h4>
            </div>
            <div class="grid-body no-border">
              <form class="form-no-horizontal-spacing" id=""> 
                <div class="row column-seperation">
                  <div class="col-md-12">    
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Unit Bisnis</label>
                      </div>
                      <div class="col-md-4">
                        <select id="unitbisnis" class="form-custom1 select2">
                          <option value="0">None</option>
                          <option value="1">Cab. Jakarta</option>
                          <option value="2">Cab. Bandung</option>
                          <option value="3">Cab. Surabaya</option>
                          <option value="4">Cab. Semarang</option>
                          <option value="5">Head Office</option>
                        </select>
                      </div>
                      <div class="col-md-2">
                        <label class="form-label text-right">Departement</label>
                      </div>
                      <div class="col-md-4">
                        <select id="departement" class="form-custom1 select2">
                          <option value="0">None</option>
                          <option value="1">Departement 1</option>
                          <option value="2">Departement 2</option>
                          <option value="3">Departement 3</option>
                          <option value="4">Departement 4</option>
                          <option value="5">Departement 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Bagian</label>
                      </div>
                      <div class="col-md-4">
                        <select id="bagian" class="form-custom1 select2">
                          <option value="0">None</option>
                          <option value="1">Bagian 1</option>
                          <option value="2">Bagian 2</option>
                          <option value="3">Bagian 3</option>
                          <option value="4">Bagian 4</option>
                          <option value="5">Bagian 5</option>
                        </select>
                      </div>
                      <div class="col-md-2">
                        <label class="form-label text-right">Jabatan</label>
                      </div>
                      <div class="col-md-4">
                        <select id="jabatan" class="form-custom1 select2">
                          <option value="0">None</option>
                          <option value="1">Jabatan 1</option>
                          <option value="2">Jabatan 2</option>
                          <option value="3">Jabatan 3</option>
                          <option value="4">Jabatan 4</option>
                          <option value="5">Jabatan 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Jml yang dibutuhkan</label>
                      </div>
                      <div class="col-md-4">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Jml" value="">
                      </div>
                      <div class="col-md-2">
                        <label class="form-label text-right">Status</label>
                      </div>
                      <div class="col-md-4">
                        <select id="jabatan" class="form-custom1 select2">
                          <option value="0">Harian</option>
                          <option value="1">Kontrak</option>
                          <option value="2">OJT</option>
                          <option value="3">Tetap</option>
                        </select>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Urgensi (Kebutuhan)</label>
                      </div>
                      <div class="col-md-10">
                        <select id="jabatan" class="form-custom1 select2">
                          <option value="0"> < 15 hari</option>
                          <option value="1"> 15 - 30 hari</option>
                          <option value="2"> > 30 hari</option>
                        </select>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-4">
                        <h4><strong>Kualifikasi :</strong></h4>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Jenis Kelamin</label>
                      </div>
                      <div class="col-md-1">
                        <div class="checkbox check-primary checkbox-circle" >
                          <input id="jnskelamin1" type="checkbox" value="1" >
                          <label for="jnskelamin1">Pria</label>
                        </div>
                      </div>
                      <div class="col-md-1">
                        <div class="checkbox check-primary checkbox-circle" >
                          <input id="jnskelamin2" type="checkbox" value="2" >
                          <label for="jnskelamin2">Wanita</label>
                        </div>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Pendidikan</label>
                      </div>
                      <div class="col-md-1">
                        <div class="checkbox check-primary checkbox-circle" >
                          <input id="pendidikan1" type="checkbox" value="1" >
                          <label for="pendidikan1">SMA</label>
                        </div>
                      </div>
                      <div class="col-md-1">
                        <div class="checkbox check-primary checkbox-circle" >
                          <input id="pendidikan2" type="checkbox" value="2" >
                          <label for="pendidikan2">D-3</label>
                        </div>
                      </div>
                      <div class="col-md-1">
                        <div class="checkbox check-primary checkbox-circle" >
                          <input id="pendidikan3" type="checkbox" value="3" >
                          <label for="pendidikan3">S-1</label>
                        </div>
                      </div>
                      <div class="col-md-1">
                        <div class="checkbox check-primary checkbox-circle" >
                          <input id="pendidikan4" type="checkbox" value="4" >
                          <label for="pendidikan4">S-2</label>
                        </div>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Jurusan</label>
                      </div>
                      <div class="col-md-2">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Jurusan" value="">
                      </div>
                      <div class="col-md-2">
                        <label class="form-label text-right">IPK</label>
                      </div>
                      <div class="col-md-2">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="IPK" value="">
                      </div>
                      <div class="col-md-2">
                        <label class="form-label text-right">Toefl</label>
                      </div>
                      <div class="col-md-2">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Toefl" value="">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-4">
                        <h4><strong>Kemampuan Teknis :</strong></h4>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Komputer</label>
                      </div>
                      <div class="col-md-10">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Komputer" value="">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Komunikasi</label>
                      </div>
                      <div class="col-md-10">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Komunikasi" value="">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Grafika</label>
                      </div>
                      <div class="col-md-10">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Grafika" value="">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Desain/Setting</label>
                      </div>
                      <div class="col-md-10">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Desain/Setting" value="">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Brevet</label>
                      </div>
                      <div class="col-md-10">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="brevet" value="">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Lain-lain</label>
                      </div>
                      <div class="col-md-10">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Lain-lain" value="">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Portfolio</label>
                      </div>
                      <div class="col-md-10">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Portfolio" value="">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Pengalaman</label>
                      </div>
                      <div class="col-md-2">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Bidang" value="">
                      </div>
                      <div class="col-md-2">
                        <label class="form-label text-right">selama</label>
                      </div>
                      <div class="col-md-1">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="" value=""> 
                      </div>
                      <div class="col-md-1">
                        <label class="form-label text-right">Tahun</label>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Job Desc</label>
                      </div>
                      <div class="col-md-10">
                        <textarea id="text-editor" placeholder="Enter text ..." class="form-control" rows="10"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="pull-right">
                    <button class="btn btn-danger btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
                    <a href="form_absent.html"><button class="btn btn-white btn-cons" type="button">Cancel</button></a>
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