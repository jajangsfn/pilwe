
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
                            <h5>Data System</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="/system/update/">
                            {{ csrf_field() }}
                                
                                <input type="hidden" name="id" value="<?=$system[0]->id?>"/>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Sistem" autocomplete="off" value="<?=$system[0]->system_name?>"/>
                                </div>
                                <div class="form-group">
                                    <label>Versi Aplikasi</label>
                                    <input type="text" name="versi" class="form-control" placeholder="Versi Sistem" autocomplete="off" value="<?=$system[0]->version?>"/>
                                </div>
                                <div class="form-group">
                                    <label>Demo</label>
                                    <select name="demo" class="form-control">
                                        <?php
                                        if ($system[0]->demo == 0) { ?>
                                            <option value="0" selected>Tidak</option>
                                            <option value="1">Ya</option>
                                        <?php 
                                        }else{ ?>
                                            <option value="0">Tidak</option>
                                            <option value="1" selected>Ya</option>
                                        <?php }?>                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Limit Perhitungan (per data)</label>
                                    <input type="number" name="counting" class="form-control" min="1" placeholder="Limit Perhitungan" autocomplete="off" value="<?=$system[0]->limit_counting?>"/>
                                </div>
                                <div class="form-group">
                                    <label>Waktu Quick Count (dalam detik)</label>
                                    <input type="number" name="quick" class="form-control" placeholder="Limit Quick Count" autocomplete="off" value="<?=$system[0]->limit_quick_count?>"/>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Footer -->
@include('admin/footer')