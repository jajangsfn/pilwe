<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Pilwe</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- datatble -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

  <!-- select2 -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.css') }}">

  <!-- custom -->
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="hold-transition container h-100">
    <div class="row mt-5 w-100">
        <div class="col-lg-12 text-right">
            <div class="card card-info">
                <div class="card-header">
                    <!-- <div class="card-title"> -->
                        <label id="nama_pemilih"></label>
                    <!-- </div> -->
                    <input type="hidden" name="bilik" id="bilik" value="<?=$bilik?>"/>
                    <input type="hidden" name="id_pemilihan" id="id_pemilihan"/>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 h-100 justify-content-center align-self-center w-100 landing_page_calon" id="landing_page_calon"></div> 
</body>
<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<!-- sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<!-- toaster notify -->
<script src="{{ asset('lte/plugins/toastr/toastr.min.js') }}"></script>
<!-- realtime vote -->
<script src="{{ asset('js/realtime.js') }}"></script>
</body>
</html>