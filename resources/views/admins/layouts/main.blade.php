<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BIT | SIA</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('lte/')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte/')}}/dist/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('lte/plugins/datatables/jquery.dataTables.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    @include('admins/layouts/header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admins/layouts/sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h5>Halaman @yield('content-header')</h5>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <!--               <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                <!-- <li class="breadcrumb-item active">Add Text</li> -->
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      @yield('content')

      <!-- Default box -->

      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  @include('admins/layouts/footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- overlayScrollbars -->
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
<!-- datatables -->
<script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>

<script type="text/javascript">
  $(document).ready( function () {
    $('.myTable').DataTable();


       // pembatalan transaksi
       $('.batal-trx').click(function()
       {
        var id_pemasukan=$(this).attr('id-pemasukan');
        swal({
          title: "Yakin membatalkan transaksi ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location="/data_pemasukan/batal_trx/"+id_pemasukan;
            swal("Transaksi dibatalkan", {
              icon: "success",
            });
          } else {
            swal({
              title: "Anda hampir membatalkan transaksi, jangan Ragu!",
              icon: "warning",
            });
          }
        });
      });
    // end pembatalan transaksi

  } );
  $('#daftar_akun').on('change', function() {
    if (this.value == 6 || this.value == 7 || this.value == 9) {
      $('.pembayaran').show();
    }else{
      $('.pembayaran').hide();
    }
  });

  $('#da_pemasukan').on('change', function() {
    if (this.value == 2) {
      $('.dp').show();
    }else{
      $('.dp').hide();
    }
  });
</script>
<!-- garafik -->
<!-- <script src="lte/dist/js/pages/dashboard3.js"></script> -->
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('lte/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('lte/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('lte/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('lte/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
@include('sweetalert::alert')
</body>
</html>
