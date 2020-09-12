 <!-- Main Footer -->
 <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Tarumanegara
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?=date('Y')?> <a href="#">Jajang Sofian</a>.</strong> All rights reserved.
  </footer>
  <!-- end footer -->
 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<!-- datatable -->
<script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- select2 -->
<script src="{{ asset('lte/plugins/select2/js/select2.min.js') }}"></script>
<!-- pemilihan -->
<script src="{{ asset('js/pemilihan.js') }}"></script>
<!-- sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- pusher for notify -->
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<!-- toaster notify -->
<script src="{{ asset('lte/plugins/toastr/toastr.min.js') }}"></script>

<script>
    $(function () {
      $(".mytable").DataTable();
      $(".select2").select2();
    });
</script>
</body>
</html>