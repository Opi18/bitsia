@extends('pemilik/layouts/main')

@section('title','SIA | Laporan Buku Besar')

@section('content-header', 'Laporan Buku Besar')

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
            <h3 class="text-primary text-uppercase"><strong>BUKU BESAR | PERIODE {{$date->format('d F Y')}}</strong></h3>
            <h5>Jl Halmahera No 47 A Denpasar , Bali Indonesia</h5>
            <h5>Telp. : (+62)-3614748222, Email : cloud.balitekno@gmail.com</h5>
          </div>
          <div class="col-md-12">
            <hr style="border-top: 4px solid grey; margin-top: 35px">
          </div>
        </div>

        <div class="card-body text-center">
          <div class="row">
            <div class="card-body text-center"style="margin-top: -5%">
              <div class="col-sm-12 table-responsive">
                <div class="card-header">
                </div>
                @foreach($akun->get()->groupBy('daftar_akuns_id') as $a)
                <div class="mt-3"><p class="card-title"><b>{{$a->first()->Daftar_akun->nama_akun}}</b></p></div>
                <div class="mt-3 float-right"><p class="card-title"><b>{{$a->first()->Daftar_akun->kode_akun}}</b></p></div>
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline collapsed" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th colspan="2">Tanggal</th>
                      <th rowspan="2">Akun/Keterangan</th>
                      <th rowspan="2">Debet</th>
                      <th rowspan="2">Kredit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $totalDabet=0; $totalKredit=0; ?>
                    @foreach($akun->get() as $aa)
                    @if($aa->daftar_akuns_id == $a->first()->daftar_akuns_id)
                    <tr>
                      <td>{{date('F', strtotime($periode))}}</td>
                      <td>{{date('d', strtotime($aa->tgl_bb))}}</td>
                      <td>{{$aa->keterangan_bb}}</td>
                      @if($aa->debet_bb != null)
                      <td>{{number_format($aa->debet_bb)}}</td>
                      <?php $totalDabet=$aa->debet_bb+$totalDabet; ?>
                      @else
                      <td>-</td>
                      @endif
                      @if($aa->kredit_bb != null)
                      <td>{{number_format($aa->kredit_bb)}}</td>
                      <?php $totalKredit=$aa->kredit_bb+$totalKredit; ?>
                      @else
                      <td>-</td>
                      @endif
                    </tr>
                    @endif
                    @endforeach
                    <tr>
                      <th colspan="3">Total</th>
                      @if($totalDabet == null)
                      <th>-</th>
                      @else
                      <th>{{number_format($totalDabet)}}</th>
                      @endif
                      @if($totalKredit == null)
                      <th>-</th>
                      @else
                      <th>{{number_format($totalKredit)}}</th>
                      @endif
                    </tr>
                    <tr>
                      <th colspan="3">Saldo Debet/Kredit</th>
                      @if($totalDabet>$totalKredit)
                      <th>{{number_format($totalDabet-$totalKredit)}}</th>
                      <th></th>
                      @else
                      <th></th>
                      <th>{{number_format($totalKredit-$totalDabet)}}</th>
                      @endif
                    </tr>
                  </tbody>
                </table>
                @endforeach
              </div>            
            </div>
          </div>
        </div>
      </section>


      @endsection