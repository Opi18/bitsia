@extends('pemilik/layouts/main')

@section('title','SIA | Laporan Laba Rugi')

@section('content-header', 'Laporan Laba Rugi')

@section('content')

<section class="content">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="col-sm-12">
         <p><h4><b><center>PT. BALI INTERNASIONAL TEKNOLOGI</center></b></h4></p>
         <p><center><h4><b>Laba Rugi</b></h4></center></p>
         <p><h5><center><b>Periode 01/01/2021 sampai 31/01/2021</b></center></h5></p>
         <hr style="border: 1px solid black">
         <br><br>

         <div class="card-body text-center">
          <div class="row">
          </div>
        </div>

        <div class="card-body text-center">
          <div class="col-sm-12 table-responsive">  
            <div class="row no-print" style="margin-top: 2%; padding-left: 90%; margin-bottom: 2%">
              <a onclick="return window.print();" target="blank" class="btn btn-primary btn-sm" > Cetak </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    @endsection