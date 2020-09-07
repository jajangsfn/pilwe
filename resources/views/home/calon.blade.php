
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
            <div class="card col-12">
                <div class="card-header">
                    Data Calon Ketua RW 004
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
                                foreach($calon as $key => $row) { ?>
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
                                                <button type="button" class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="fas fa-pen text-light"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fas fa-trash text-light"></i>
                                                </button>
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
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>

<!-- Footer -->
@include('admin/footer')