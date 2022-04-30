<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Nasabah</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="proses_simpan_nasabah.php" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">No. Identitas</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="notas" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tgl. Lahir</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="tgl" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-10">
                        <select name="jk" class="form-control" required="required">
                          <option value="" selected="selected">-Jenis Kelamin-</option>
                          <option value="Laki-laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tgl. Masuk</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="tgp" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="alt" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">No. Telepon</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="notel" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-10">
                        <select name="status" class="form-control" required="required">
                          <option value="" selected="selected">-Status-</option>
                          <option value="Sudah Menikah">Sudah Menikah</option>
                          <option value="Belum Menikah">Belum Menikah</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Pekerjaan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="pekerjaan" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Container Fluid-->