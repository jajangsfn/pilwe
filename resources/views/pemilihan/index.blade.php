
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
                <div class="card">  
                    <div class="card-header">
                        Form Pemilihan
                    </div>          
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <label>Nama Pemilih</label>
                            </div>
                            <div class="col-4">
                                <select name="pemilih" class="form-control select2" id="pemilih">
                                    <option value="">Pilih Nama</option>
                                </select>
                            </div>
                        </div>
                        <!-- box -->
                        <div class="row mt-3">
                            <div class="col-2">
                                <label>Bilik Suara</label>
                            </div>
                            <div class="col-4">
                                <select name="bilik_suara" class="form-control select2" id="bilik_suara">
                                    <option value="">Pilih Bilik Suara</option>
                                    <?php
                                    foreach($bilik as $key => $row) { ?>
                                        <option value="<?=$row->id?>"><?=$row->bilik_suara?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-2"></div>
                            <div class="col-4">
                                <button type="button" name="tempatkan" class="btn btn-block btn-info" onclick="tempatkan()">Tempatkan</button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- box bilik suara -->
        <div class="row mt-3">
            <!-- <div class="col-12"> -->
                <?php
                foreach($bilik as $key => $row) { ?>
                    <div class="col-4 col-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <label>Bilik <?=$row->bilik_suara?> </label>
                                </div>
                            </div>
                            <div class="card-body bilik" id="id_bilik_<?=$row->id?>">

                            </div>
                        </div>
                    </div>
                <?php }
                ?>
            <!-- </div> -->
        </div>

    </div>
    </div>
</div>
<!-- loading -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="loading_page" style="background:rgba(255,255,255,0.5)">
  <div class="modal-dialog modal-md" role="document" style="background:rgba(255,255,255,0.5)">
    <div class="modal-content text-center" style="background:rgba(255,255,255,0.5)">
      <img src="{{ asset('img/loading.gif') }}" width="500px">
    </div>
  </div>
</div>
<!-- end loading -->

<!-- Footer -->
@include('admin/footer')