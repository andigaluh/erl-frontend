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
              <h4>Form Rekomendasi <span class="semi-bold">Karyawan Keluar</span></h4>
            </div>
            <div class="grid-body no-border">
              <form class="form-no-horizontal-spacing" id=""> 
                <div class="row column-seperation">
                  <div class="col-md-12">    
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Nama</label>
                      </div>
                      <div class="col-md-4">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Nama" value="Mauro Icard" disabled="disabled">
                      </div>
                      <div class="col-md-2">
                        <label class="form-label text-right">NIK</label>
                      </div>
                      <div class="col-md-4">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="NIK" value="P9999" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Jabatan</label>
                      </div>
                      <div class="col-md-4">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Jabatan" value="IT Support" disabled="disabled">
                      </div>
                      <div class="col-md-2">
                        <label class="form-label text-right">Tgl Masuk Kerja</label>
                      </div>
                      <div class="col-md-4">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Jabatan" value="10-10-2000" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-2">
                        <label class="form-label text-right">Wilayah</label>
                      </div>
                      <div class="col-md-4">
                        <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Wilayah" value="">
                      </div>
                      <div class="col-md-2">
                        <label class="form-label text-right">Tgl Keluar</label>
                      </div>
                      <div class="col-md-4">
                        <div class="input-append success date">
                          <input type="text" class="form-control" id="sandbox-advance">
                          <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span>
                        </div> 
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <h4>Inventaris yang harus diserahkan</h4>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <table class="table no-more-tables">
                          <tr>
                            <th>No</th>
                            <th>Item</th>
                            <th>Ketersediaan</th>
                            <th>Keterangan</th>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td>Baju Seragam</td>
                            <td>
                              <div class="radio">
                                <input id="seragam_ada" type="radio" name="seragam" value="ada" >
                                <label for="seragam_ada">Ada</label>
                                <input id="seragam_tidak" type="radio" name="seragam" value="tidak">
                                <label for="seragam_tidak">Tidak</label>
                              </div>
                            </td>
                            <td><input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="" value=""></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>ID Card</td>
                            <td>
                              <div class="radio">
                                <input id="id_card_ada" type="radio" name="id_card" value="ada" >
                                <label for="id_card_ada">Ada</label>
                                <input id="id_card_tidak" type="radio" name="id_card" value="tidak">
                                <label for="id_card_tidak">Tidak</label>
                              </div>
                            </td>
                            <td><input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="" value=""></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Sepeda motor / mobil</td>
                            <td>
                              <div class="radio">
                                <input id="kendaraan_ada" type="radio" name="kendaraan" value="ada" >
                                <label for="kendaraan_ada">Ada</label>
                                <input id="kendaraan_tidak" type="radio" name="kendaraan" value="tidak">
                                <label for="kendaraan_tidak">Tidak</label>
                              </div>
                            </td>
                            <td><input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="" value=""></td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>STNK motor / mobil</td>
                            <td>
                              <div class="radio">
                                <input id="stnk_ada" type="radio" name="stnk" value="ada" >
                                <label for="stnk_ada">Ada</label>
                                <input id="stnk_tidak" type="radio" name="stnk" value="tidak">
                                <label for="stnk_tidak">Tidak</label>
                              </div>
                            </td>
                            <td><input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="" value=""></td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>HP/Laptop/Ipad</td>
                            <td>
                              <div class="radio">
                                <input id="hp_ada" type="radio" name="hp" value="ada" >
                                <label for="hp_ada">Ada</label>
                                <input id="hp_tidak" type="radio" name="hp" value="tidak">
                                <label for="hp_tidak">Tidak</label>
                              </div>
                            </td>
                            <td><input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="" value=""></td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td>Laporan serah terima</td>
                            <td>
                              <div class="radio">
                                <input id="laporan_ada" type="radio" name="laporan" value="ada" >
                                <label for="laporan_ada">Ada</label>
                                <input id="laporan_tidak" type="radio" name="laporan" value="tidak">
                                <label for="laporan_tidak">Tidak</label>
                              </div>
                            </td>
                            <td><input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="" value=""></td>
                          </tr>
                          <tr>
                            <td>7</td>
                            <td>Rekonsiliasi Saldo</td>
                            <td>
                              <div class="radio">
                                <input id="saldo_ada" type="radio" name="saldo" value="ada" >
                                <label for="saldo_ada">Ada</label>
                                <input id="saldo_tidak" type="radio" name="saldo" value="tidak">
                                <label for="saldo_tidak">Tidak</label>
                              </div>
                            </td>
                            <td><input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="" value=""></td>
                          </tr>
                          <tr>
                            <td>8</td>
                            <td>Pinjaman Koperasi</td>
                            <td>
                              <div class="radio">
                                <input id="koperasi_ada" type="radio" name="koperasi" value="ada" >
                                <label for="koperasi_ada">Ada</label>
                                <input id="koperasi_tidak" type="radio" name="koperasi" value="tidak">
                                <label for="koperasi_tidak">Tidak</label>
                              </div>
                            </td>
                            <td><input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="" value=""></td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>Pinjaman buku perpustakaan</td>
                            <td>
                              <div class="radio">
                                <input id="buku_ada" type="radio" name="buku" value="ada" >
                                <label for="buku_ada">Ada</label>
                                <input id="buku_tidak" type="radio" name="buku" value="tidak">
                                <label for="buku_tidak">Tidak</label>
                              </div>
                            </td>
                            <td><input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="" value=""></td>
                          </tr>
                          <tr>
                            <td>10</td>
                            <td>Ikatan dinas</td>
                            <td>
                              <div class="radio">
                                <input id="ikatan_ada" type="radio" name="ikatan" value="ada" >
                                <label for="ikatan_ada">Ada</label>
                                <input id="ikatan_tidak" type="radio" name="ikatan" value="tidak">
                                <label for="ikatan_tidak">Tidak</label>
                              </div>
                            </td>
                            <td><input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="" value=""></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                      <div class="row form-row">
                        <div class="col-md-12">
                          <h4>Kami rekomendasikan kepada karyawan tersebut</h4>
                        </div>
                      </div>
                      <div class="row form-row">
                      <div class="col-md-12">
                        <table class="table no-more-tables">
                          <tr>
                            <td>1</td>
                            <td>Diberikan Uang Pesangon</td>
                            <td>
                              <div class="radio">
                                <input id="pesangon_ada" type="radio" name="pesangon" value="ada" >
                                <label for="pesangon_ada">Ada</label>
                                <input id="pesangon_tidak" type="radio" name="pesangon" value="tidak">
                                <label for="pesangon_tidak">Tidak</label>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Diberikan uang pengganti hak</td>
                            <td>
                              <div class="radio">
                                <input id="uang_ganti_ada" type="radio" name="uang_ganti" value="ada" >
                                <label for="uang_ganti_ada">Ada</label>
                                <input id="uang_ganti_tidak" type="radio" name="uang_ganti" value="tidak">
                                <label for="uang_ganti_tidak">Tidak</label>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Diberikan uang jasa</td>
                            <td>
                              <div class="radio">
                                <input id="uang_jasa_ada" type="radio" name="uang_jasa" value="ada" >
                                <label for="uang_jasa_ada">Ada</label>
                                <input id="uang_jasa_tidak" type="radio" name="uang_jasa" value="tidak">
                                <label for="uang_jasa_tidak">Tidak</label>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>Diberikan surat keterangan kerja</td>
                            <td>
                              <div class="radio">
                                <input id="skkerja_ada" type="radio" name="skkerja" value="ada" >
                                <label for="skkerja_ada">Ada</label>
                                <input id="skkerja_tidak" type="radio" name="skkerja" value="tidak">
                                <label for="skkerja_tidak">Tidak</label>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>Diberikan ijazah asli ybs</td>
                            <td>
                              <div class="radio">
                                <input id="ijazah_ada" type="radio" name="ijazah" value="ada" >
                                <label for="ijazah_ada">Ada</label>
                                <input id="ijazah_tidak" type="radio" name="ijazah" value="tidak">
                                <label for="ijazah_tidak">Tidak</label>
                              </div>
                            </td>
                          </tr>
                        </table>
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