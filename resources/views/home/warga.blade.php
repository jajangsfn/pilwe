
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
                        Data Warga RW 004 
                    </div>
                    <div class="card-tools">
                        <a href="/warga/tambah" class="btn btn-success">
                            <i class="fas fa-plus"></i> Warga
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
                                    <th>Tempat lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>RT</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($warga as $key => $row) { ?>
                                    <tr>
                                        <td class="text-center"><?=$key+1?></td>
                                        <td><?=$row->nik?></td>
                                        <td><?=$row->nama?></td>
                                        <td><?=$row->tempat_lahir?></td>
                                        <td><?=$row->tanggal_lahir?></td>
                                        <td><?=$row->pendidikan_terakhir?></td>
                                        <td><?=$row->rt?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="/warga/edit/<?=$row->id?>">
                                                    <button type="button" class="btn btn-warning btn-sm" title="Edit">
                                                        <i class="fas fa-pen text-light"></i>
                                                    </button>
                                                </a>
                                                <a href="/warga/delete/<?=$row->id?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
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