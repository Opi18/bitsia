@extends('admins/layouts/main')

@section('title','SIA | Laporan Riwayat Pembatalan Transaksi')

@section('content-header', 'Laporan Riwayat Pembatalan Transaksi')

@section('content')

<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row no-print" style="padding-right: : 90%; margin-bottom: 2%">
              <a onclick="return window.print();" target="blank" class="btn btn-primary btn-md" > <i class="fa fa-print"></i><span></span> </a>
              <button class="ml-2 btn btn-primary btn-md" data-toggle="modal" data-target="#modal_cari_data_pemasukan">
                <i class="fa fa-filter"></i><span></span>
              </button>
            </div>

            <div class="row text-center">
              <div class="modal fade modal-success" id="modal_cari_data_pemasukan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Cari Data Berdasarkan Periode</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-left">
                      <form method="post" action="/riwayat_pembatalan">
                        {{csrf_field()}}

                        <div class="form-group">
                          <label for="tgl_awal">Tanggal Awal</label>
                          <input required="" name="tgl_awal" type="date" class="form-control" id="tgl_awal">
                        </div>

                        <div class="form-group">
                          <label for="tgl_akhir">Tanggal Akhir</label>
                          <input required="" name="tgl_akhir" type="date" class="form-control" id="tgl_awal">
                        </div>

                        <div class="modal-footer">
                          <button class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>

                          <button class="btn btn-primary btn-sm" type="submit">Cari
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-12" >
             <p><h4><b><center>PT. BALI INTERNASIONAL TEKNOLOGI</center></b></h4></p>
             <p><center><h4><b>Riwayat Pembatalan Transaksi</b></h4></center></p>
             <p><h5><center><b>Periode {{$tgl_awal}} sampai {{$tgl_akhir}}</b></center></h5></p>
             <hr style="border: 1px solid black">
             <br><br>

             <div class="mt-3"><p class="card-title"><b>Data Pemasukan</b></p></div>
             <table id="example1" class="table table-bordered table-striped dtr-inline collapsed text-center" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th>No</th>
                  <th>Akun</th>
                  <th>Keterangan</th>
                  <th>Nominal</th>
                  <th>Tanggal</th>
                  <th>User</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_pemasukan as $i => $p)
                <tr class="odd">
                  <td>{{$i+1}}</td>
                  <td>{{$p -> Daftar_akun->nama_akun}}</td>
                  <td>{{$p -> keterangan_transaksi}}</td>
                  <td>{{$p -> nominal_transaksi}}</td>
                  <td>{{$p -> tgl_transaksi}}</td>
                  <td>{{$p -> Data_user->nama}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <div class="mt-3"><p class="card-title"><b>Data Pengeluaran</b></p></div>
            <table id="example1" class="table table-bordered table-striped dtr-inline collapsed text-center" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th>No</th>
                  <th>Akun</th>
                  <th>Keterangan</th>
                  <th>Nominal</th>
                  <th>Tanggal</th>
                  <th>User</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_pengeluaran as $i => $p)
                <tr class="odd">
                  <td>{{$i+1}}</td>
                  <td>{{$p -> Daftar_akun->nama_akun}}</td>
                  <td>{{$p -> keterangan_transaksi}}</td>
                  <td>{{$p -> nominal_transaksi}}</td>
                  <td>{{$p -> tgl_transaksi}}</td>
                  <td>{{$p -> Data_user->nama}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <div class="mt-3"><p class="card-title"><b>Data Hutang</b></p></div>
            <table id="example1" class="table table-bordered table-striped dtr-inline collapsed text-center" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th>No</th>
                  <th>Akun</th>
                  <th>Keterangan</th>
                  <th>Nominal</th>
                  <th>Tanggal</th>
                  <th>User</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_hutang as $i => $p)
                <tr class="odd">
                  <td>{{$i+1}}</td>
                  <td>{{$p -> Daftar_akun->nama_akun}}</td>
                  <td>{{$p -> keterangan_transaksi}}</td>
                  <td>{{$p -> nominal_transaksi}}</td>
                  <td>{{$p -> tgl_transaksi}}</td>
                  <td>{{$p -> Data_user->nama}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <div class="mt-3"><p class="card-title"><b>Data Piutang</b></p></div>
            <table id="example1" class="table table-bordered table-striped dtr-inline collapsed text-center" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th>No</th>
                  <th>Akun</th>
                  <th>Keterangan</th>
                  <th>Nominal</th>
                  <th>Tanggal</th>
                  <th>User</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_piutang as $i => $p)
                <tr class="odd">
                  <td>{{$i+1}}</td>
                  <td>{{$p -> Daftar_akun->nama_akun}}</td>
                  <td>{{$p -> keterangan_transaksi}}</td>
                  <td>{{$p -> nominal_transaksi}}</td>
                  <td>{{$p -> tgl_transaksi}}</td>
                  <td>{{$p -> Data_user->nama}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection