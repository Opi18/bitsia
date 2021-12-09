@extends('pemilik/layouts/main')

@section('title','SIA | Laporan Jurnal Umum')

@section('content-header', 'Laporan Jurnal Umum')

@section('content')

<section class="content">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row no-print" style="padding-right: : 90%; margin-bottom: 2%">
          <a onclick="return window.print();" target="blank" class="btn btn-primary btn-md" > <i class="fa fa-print"></i><span></span> </a>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-2">
            <img width="160px" style="border: 3px solid grey; border-radius: 50%" src="{{asset('lte/dist/img/bit-bg-w.png') }}" alt="User Image">
          </div>

          <div class="col-md-7 text-center">
            <?php $date = new DateTime($periode) ?>
            <h2 class="text-danger"><strong>PT. BALI INTERNASIONAL TEKNOLOGI</strong></h2>
            <h3 class="text-primary text-uppercase"><strong>JURNAL UMUM | PERIODE {{$date->format('d F Y')}}</strong></h3>
            <h5>Jl Halmahera No 47 A Denpasar , Bali Indonesia</h5>
            <h5>Telp. : (+62)-3614748222, Email : cloud.balitekno@gmail.com</h5>
          </div>
          <div class="col-md-12">
            <hr style="border-top: 4px solid grey; margin-top: 35px">
          </div>
        </div>

        <div class="card-body text-center">
          <div style="margin-top: 80px;" class="row">
            <div class="card-body text-center"style="margin-top: -9%">
              <div class="col-sm-12 table-responsive">
                <div class="card-header">
                </div>

                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline collapsed" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th colspan="2">Tanggal</th>
                      <th rowspan="2">Akun/Keterangan</th>
                      <th rowspan="2">Ref</th>
                      <th rowspan="2">Debet</th>
                      <th rowspan="2">Kredit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="odd">
                      <td rowspan="{{$jtransaksi}}">{{date('F', strtotime($periode))}}</td>
                      @foreach($transaksi as $t)
                      <td>{{date('d', strtotime($t->tgl_ju))}}</td>
                      <td class="<?php if ($t->debet_ju == null){
                        echo "text-right" ;} else{ echo "text-left"; }
                        ?>">{{$t->Daftar_akun->nama_akun}}</td>
                        <td></td>
                        <td>{{$t->debet_ju}}</td>
                        <td>{{$t->kredit_ju}}</td>
                      </tr>
                      @endforeach
                      <tr>
                        <th colspan="4">Total</th>
                        <th>{{$t->sum('debet_ju')}}</th>
                        <th>{{$t->sum('kredit_ju')}}</th>
                      </tr>
                    </thead>
                  </table>
                  <br><br><br>
                  <div class='row text-center mt-5 float-right'>
                    Denpasar, {{$date->format('d F Y')}}
                    <br><br><br><br><br><br>
                    Romie Ganter <br>
                    President Directur 
                  </div>
                </div>            
              </div>
            </div>
          </div>
        </section>


        @endsection