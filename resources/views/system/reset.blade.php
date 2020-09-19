
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
                    <div class="card">
                        <div class="card-header">
                            <h5>Reset System</h5>
                        </div>
                        <div class="card-body">
                            <a href="/system/truncate/1">
                                <button type="button" class="btn btn-danger btn-block" 
                                    title="Tombol untuk menghapus semua data pemilih" 
                                    onclick="return confirm('Anda yakin ingin menghapus semua data pemilih?')">
                                    Hapus Semua Data Pemilih
                                </button>
                            </a>
                            <a href="/system/truncate/2">
                                <button type="button" class="btn btn-danger btn-block mt-3" 
                                    title="Tombol untuk menghapus semua status perhitungan quick count"  
                                    onclick="return confirm('Anda yakin ingin menghapus status semua data pemilih?')">
                                    Hapus Status Perhitungan
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
@include('admin/footer')