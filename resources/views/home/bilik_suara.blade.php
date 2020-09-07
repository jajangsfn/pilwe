
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
                    Data Bilik Suara
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-condensed table-striped mytable">
                            <thead>
                                <tr>
                                    <th width="1">No</th>
                                    <th>Bilik Suara</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($bilik as $key => $row) { ?>
                                    <tr>
                                        <td class="text-center"><?=$key+1?></td>
                                        <td><?=$row->bilik_suara?></td>
                                        <td width="1">
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