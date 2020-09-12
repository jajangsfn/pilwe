
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
          <div class="col-4"></div>
          <div class="col-4">
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
            <form method="post" action="/bilik/update" class="card">
            {{ csrf_field() }}
              <input type="hidden" name="id" value="<?=$bilik->id?>">
              <div class="card-header">
                Form Edit Bilik Suara
              </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                          <label>Bilik Suara</label>
                        </div>
                        <div class="col-8">
                          <input type="text" name="bilik" class="form-control" required placeholder="Nama Bilik Suara" autocomplete="off" value="<?=$bilik->bilik_suara?>"/>
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
                            Update
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