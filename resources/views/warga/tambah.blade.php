
<!-- Navbar -->
@include('admin/header')
<!-- end Navbar -->
<!-- sidebar -->
@include('admin/sidebar')
<!-- end sidebar -->
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        @yield('content')

        <div class="row">
          <div class="col-12">
          @if (Session::has('success'))
               <div class="alert alert-success">
                  {{ session('success') }}
               </div>
          @endif

          @if (Session::has('failed'))
               <div class="alert alert-danger">
                  {{ session('failed')}}
               </div>
          @endif
            <form method="post" action="/warga/simpan" enctype="multipart/form-data" class="card">
            {{ csrf_field() }}
              <div class="card-header">
                Form Tambah Warga
              </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="row">
                        <div class="col-3">
                          <label>Nama</label>
                        </div>
                        <div class="col-8">
                          <input type="text" name="nama" class="form-control" required placeholder="Nama Warga" autocomplete="off"/>
                        </div>
                      </div>
                      
                      <div class="row mt-3">
                        <div class="col-3">
                          <label>NIK</label>
                        </div>
                        <div class="col-8">
                          <input type="number" name="nik" class="form-control" minlength="16" maxlength="16" required placeholder="NIK/KTP Warga" autocomplete="off"/>
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-3">
                          <label>Tempat Lahir</label>
                        </div>
                        <div class="col-8">
                          <input type="text" name="tempat_lahir" class="form-control" required placeholder="Tempat Lahir" autocomplete="off"/>
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-3">
                          <label>Tanggal Lahir</label>
                        </div>
                        <div class="col-8">
                          <input type="date" name="tanggal_lahir" class="form-control" required placeholder="Tanggal Lahir" autocomplete="off"/>
                        </div>
                      </div>

                    </div>

                    <div class="col-6">
                      <div class="row">
                        <div class="col-3">
                          <label>Jenis Kelamin</label>
                        </div>
                        <div class="col-8">
                          <input type="radio" name="jenkel" value="L" checked> Laki - laki
                          <input type="radio" name="jenkel" value="P"> Perempuan
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-3">
                           <label>RT</label>
                        </div>
                        <div class="col-8">
                          <select name="rt" class="form-control" required >
                            <option value="">Pilih RT</option>
                            <?php
                              foreach($rt as $key => $row) { ?>
                                <option value="<?=$row->id?>"><?=$row->rt?></option>
                              <?php }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-3">
                           <label>Pendidikan</label>
                        </div>
                        <div class="col-8">
                          <select name="pendidikan" class="form-control" required>
                            <option value="">Pilih Pendidikan</option>
                            <?php
                              foreach($pendidikan as $key => $row) { ?>
                                <option value="<?=$row->id?>"><?=$row->nama?></option>
                              <?php }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-3">
                          <label>Foto</label>
                        </div>
                        <div class="col-8">
                          <input type="file" name="foto" class="form-control" placeholder="Foto" autocomplete="off"/>
                        </div>
                      </div>                      
                    </div>
                  </div>
                </div>
                <!-- end card-body -->

                <!-- card-footer -->
                  <div class="card-footer">
                    <div class="text-center">
                        <div class="btn-group">
                          <button type="reset" class="btn btn-danger">
                            Clear
                          </button>

                          <button type="submit" class="btn btn-success">
                            Simpan
                          </button>
                      </div>
                  </div>
                </div>
              </div>
              <!-- end card-footer -->
            </form>
        </div>
      </div>

    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>

<!-- Footer -->
@include('admin/footer')