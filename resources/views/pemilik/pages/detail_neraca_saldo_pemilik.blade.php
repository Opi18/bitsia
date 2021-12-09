@extends('pemilik/layouts/main')

@section('title','SIA | Laporan Neraca Saldo')

@section('content-header', 'Laporan Neraca Saldo')

@section('content')

<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
          </div>
          <div class="card-body">
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
                <h3 class="text-primary text-uppercase"><strong>NERACA SALDO | PERIODE {{$date->format('d F Y')}}</strong></h3>
                <h5>Jl Halmahera No 47 A Denpasar , Bali Indonesia</h5>
                <h5>Telp. : (+62)-3614748222, Email : cloud.balitekno@gmail.com</h5>
              </div>
              <div class="col-md-12">
                <hr style="border-top: 4px solid grey; margin-top: 35px">
              </div>
            </div>

            <div class="row text-center"style="margin-top: 2%">
              <table id="example1" class="table table-bordered table-striped dataTable dtr-inline collapsed" role="grid" aria-describedby="example1_info">
                <thead>
                  <tr role="row">
                    <th>No Akun</th>
                    <th>Nama Akun</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $jumlahNSDebet=0; $jumlahNSKredit=0; ?>
                  @foreach($transaksi as $ns)
                  <tr class="odd">
                    <td>{{$ns->Daftar_akun->kode_akun}}</td>
                    <td>{{$ns->Daftar_akun->nama_akun}}</td>
                    <td>Rp. {{number_format($ns->debet_ns)}}</td>
                    <td>Rp. {{number_format($ns->kredit_ns)}}</td>
                    <?php $jumlahNSDebet=$jumlahNSDebet+$ns->debet_ns; $jumlahNSKredit=$jumlahNSKredit+$ns->kredit_ns; ?>
                  </tr>
                  @endforeach
                  <tr>
                    <th colspan="2">Jumlah</th>
                    <th>Rp. {{number_format($jumlahNSDebet)}}</th>
                    <th>Rp. {{number_format($jumlahNSKredit)}}</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>
@endsection