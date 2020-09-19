
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
                                    <th width="1" class="text-center">No</th>
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Tempat lahir</th>
                                    <th class="text-center">Tanggal Lahir</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">RT</th>
                                    <th class="text-center">Foto</th>
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
                                        <td><?=$row->jenis_kelamin == "L" ? "Laki - laki" : "Perempuan"?></td>
                                        <td><?=$row->rt?></td>
                                        <td>
                                            <?php
                                            if ($row->foto && file_exists("attachments/" . $row->foto)) { ?>
                                                <img src="{{ URL::to('/') }}/attachments/{{ $row->foto }}" width="80"/>
                                            <?php }
                                            ?>
                                        </td>
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