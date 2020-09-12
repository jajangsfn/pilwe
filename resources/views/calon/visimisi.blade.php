
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
                        <div class="card-title">
                        Data Visi & Misi Calon : <?=$calon[0]->nama?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                @if (Session::has('success_visi'))
                <div class="alert alert-success">
                    {{ session('success_visi') }}
                </div>
                @endif

                @if (Session::has('failed_visi'))
                    <div class="alert alert-danger">
                        {{ session('failed_visi')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Form Visi
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/calon/simpan_visi">
                        {{ csrf_field() }}
                            <input type="hidden" name="id" value="<?=$calon[0]->id?>"/>
                           <div class="row">
                                <div class="col-2">
                                    <label> Visi</label>
                                </div>
                                <div class="col-10">
                                    <textarea name="visi" class="form-control" required placeholder="Silahkan isi visi"></textarea>
                                </div>
                           </div>
                           <div class="row mt-3">
                                <div class="col-2"></div>
                                <div class="col-10 text-center">
                                    <div class="btn-group">
                                        <button type="reset" name="reset" class="btn btn-danger">
                                            Clear
                                        </button>
                                        <button type="submit" name="submit" class="btn btn-success">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                           </div>
                        </form>
                        <hr/>
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-condensed mytable">
                                <thead>
                                    <tr>
                                        <th width="1">No</th>
                                        <th>Visi</th>
                                        <th width="1"></th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php
                                    foreach($visi as $key => $row) { ?>
                                        <tr>
                                            <td><?=$key+1?></td>
                                            <td><?=$row->visi?>
                                            <td>
                                                <a href="/calon/delete_visi/<?=$calon[0]->id?>/<?=$row->id?>" onclick="return confirm('Anda yakin?')">
                                                    <button type="buttton" name="delete" class="btn btn-danger btn-xs">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </a>
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
            <!-- misi -->
            <div class="col-6">
                @if (Session::has('success_misi'))
                <div class="alert alert-success">
                    {{ session('success_misi') }}
                </div>
                @endif

                @if (Session::has('failed_misi'))
                    <div class="alert alert-danger">
                        {{ session('failed_misi')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Form Misi
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/calon/simpan_misi">
                        {{ csrf_field() }}
                            <input type="hidden" name="id" value="<?=$calon[0]->id?>"/>
                           <div class="row">
                                <div class="col-2">
                                    <label> Misi</label>
                                </div>
                                <div class="col-10">
                                    <textarea name="misi" class="form-control" required placeholder="Silahkan isi misi"></textarea>
                                </div>
                           </div>
                           <div class="row mt-3">
                                <div class="col-2"></div>
                                <div class="col-10 text-center">
                                    <div class="btn-group">
                                        <button type="reset" name="reset" class="btn btn-danger">
                                            Clear
                                        </button>
                                        <button type="submit" name="submit" class="btn btn-success">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                           </div>
                        </form>
                        <hr/>
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-condensed mytable">
                                <thead>
                                    <tr>
                                        <th width="1">No</th>
                                        <th>Misi</th>
                                        <th width="1"></th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php
                                    foreach($misi as $key => $row) { ?>
                                        <tr>
                                            <td><?=$key+1?></td>
                                            <td><?=$row->misi?>
                                            <td>
                                                <a href="/calon/delete_misi/<?=$calon[0]->id?>/<?=$row->id?>" onclick="return confirm('Anda yakin?')">
                                                    <button type="buttton" name="delete" class="btn btn-danger btn-xs">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </a>
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