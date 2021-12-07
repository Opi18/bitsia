@extends('pemilik/layouts/main')

@section('title','SIA | Data Transaksi')

@section('content-header', 'Data Transaksi')

@section('content')

<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <p class="card-title"><b>Generate Laporan Data Transaksi</b></p>
          </div>
          <div class="card-body">
            <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal_generate_data_transaksi">
              <i class="fa fa-download"> Generate Laporan</i><span></span>
            </button>
            <div class="row text-center">
              <div class="modal fade modal-success" id="modal_generate_data_transaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Generate Laporan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-left">
                      <form method="post" action="/data_transaksi/generate">
                        {{csrf_field()}}

                        <div class="form-group">
                          <label for="tgl_awal">Tanggal Awal</label>
                          <input required="" name="tgl_awal" type="date" class="form-control" id="tgl_awal">
                        </div>

                        <div class="form-group">
                          <label for="tgl_akhir">Tanggal Akhir</label>
                          <input required="" name="tgl_akhir" type="date" class="form-control" id="tgl_awal">
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>

                        <button class="btn btn-primary btn-sm" data-toggle="modal" >Generate
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-3"><p class="card-title"><b>Data Pemasukan</b></p></div>
            <table id="example1" class="table table-bordered table-striped myTable dtr-inline collapsed text-center" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th>No</th>
                  <th>Akun</th>
                  <th>Keterangan</th>
                  <th>Nominal</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_pemasukan as $i => $p)
                <tr class="odd">
                  <td>{{$i+1}}</td>
                  <td>{{$p -> Daftar_akun->nama_akun}}</td>
                  <td>{{$p -> keterangan_transaksi }}</td>
                  <td>{{$p -> nominal_transaksi }}</td>
                  <td>{{$p -> tgl_transaksi }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <div class="mt-3"><p class="card-title"><b>Data Pengeluaran</b></p></div>
            <table id="example1" class="table table-bordered table-striped myTable dtr-inline collapsed text-center" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th>No</th>
                  <th>Akun</th>
                  <th>Keterangan</th>
                  <th>Nominal</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_pengeluaran as $i => $p)
                <tr class="odd">
                  <td>{{$i+1}}</td>
                  <td>{{$p -> Daftar_akun->nama_akun}}</td>
                  <td>{{$p -> keterangan_transaksi }}</td>
                  <td>{{$p -> nominal_transaksi }}</td>
                  <td>{{$p -> tgl_transaksi }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <div class="mt-3"><p class="card-title"><b>Data Hutang</b></p></div>
            <table id="example1" class="table table-bordered table-striped myTable dtr-inline collapsed text-center" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th>No</th>
                  <th>Akun</th>
                  <th>Keterangan</th>
                  <th>Nominal</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_hutang as $i => $p)
                <tr class="odd">
                  <td>{{$i+1}}</td>
                  <td>{{$p -> Daftar_akun->nama_akun}}</td>
                  <td>{{$p -> keterangan_transaksi }}</td>
                  <td>{{$p -> nominal_transaksi }}</td>
                  <td>{{$p -> tgl_transaksi }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <div class="mt-3"><p class="card-title"><b>Data Piutang</b></p></div>
            <table id="example1" class="table table-bordered table-striped myTable dtr-inline collapsed text-center" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th>No</th>
                  <th>Akun</th>
                  <th>Keterangan</th>
                  <th>Nominal</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_piutang as $i => $p)
                <tr class="odd">
                  <td>{{$i+1}}</td>
                  <td>{{$p -> Daftar_akun->nama_akun}}</td>
                  <td>{{$p -> keterangan_transaksi }}</td>
                  <td>{{$p -> nominal_transaksi }}</td>
                  <td>{{$p -> tgl_transaksi }}</td>
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