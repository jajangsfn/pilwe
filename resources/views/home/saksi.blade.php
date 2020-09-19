
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
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Data Saksi 
                        </div>
                        <div class="card-tools">
                            <a href="/saksi/tambah" class="btn btn-success">
                                <i class="fas fa-plus"></i> Saksi
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed table-striped mytable">
                                <thead>
                                    <tr>
                                        <th width="1">No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Calon</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($saksi as $key => $row) { ?>
                                        <tr>
                                            <td class="text-center"><?=$key+1?></td>
                                            <td><?=$row->nik?></td>
                                            <td><?=$row->nama_saksi?></td>
                                            <td><?=$row->nama_calon?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="/saksi/delete/<?=$row->id?>" onclick="return confirm('Anda yakin?')">
                                                        <button type="button" class="btn btn-danger btn-sm" title="Delete">
                                                            <i class="fas fa-trash text-light"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>

<!-- Footer -->
@include('admin/footer')