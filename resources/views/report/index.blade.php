
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
                    <div class="card">
                        <div class="card-header">
                            <h4>Laporan</h4>
                        </div>
                        <div class="card-body">
                            <a href="/report/print/1" target="_blank">
                                <button class="btn btn-block btn-success mb-1">Data Warga</button>
                            </a>
                            <a href="/report/print/2" target="_blank">
                                <button class="btn btn-block btn-success mb-1">Data Calon</button>
                            </a>
                            <a href="/report/print/3" target="_blank">
                                <button class="btn btn-block btn-success mb-1">Data Hasil Pemilihan</button>
                            </a>
                            <a href="/report/print/4" target="_blank">
                                <button class="btn btn-block btn-success mb-1">Data RT</button>
                            </a>
                            <a href="/report/print/5" target="_blank">
                                <button class="btn btn-block btn-success mb-1">Data Bilik Suara</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
@include('admin/footer')