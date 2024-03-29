@extends('admins/layouts/main')

@section('title','SIA | Data Pengeluaran')

@section('content-header', 'Data Pengeluaran')

@section('content')

<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <p class="card-title"><b>Data Pengeluaran</b></p>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal_tambah_data_pengeluaran">
                <i class="fa fa-plus"></i><span></span>
              </button>

              <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal_cari_data_pengeluaran">
                <i class="fa fa-filter"></i><span></span>
              </button>
            </div>

            <div class="row text-center">
              <div class="modal fade modal-success" id="modal_tambah_data_pengeluaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengeluaran</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-left">
                      <form method="post" action="/data_pengeluaran/tambah">
                        {{csrf_field()}}

                        <div class="form-group">
                          <label for="tgl_transaksi">Tanggal Pengeluaran</label>
                          <input required="" name="tgl_transaksi" type="date" class="form-control" id="tgl_transaksi ">
                        </div>

                        <div class="form-group">
                          <label for="daftar_akun">Nama Akun</label>
                          <select id="daftar_akun" name="daftar_akun" class="form-control">
                            @foreach($daftar_akun as $da)
                            @if($da->kode_akun == 111 OR $da->kode_akun == 112 OR $da->kode_akun == 312 OR ($da->kode_akun >= 511 AND $da->kode_akun != 514 AND $da->kode_akun != 515))
                            <option value="{{$da -> id}}">{{$da -> kode_akun}} | {{$da -> nama_akun}} | {{$da -> tipe_akun}}</option>
                            @endif
                            @endforeach
                          </select>
                        </div>

                        <div style="display: none;" class="form-group pembayaran">
                          <label for="pembayaran">Pembayaran</label>
                          <select name="pembayaran" class="form-control">
                            <option value="">Pilih</option>
                            @foreach($daftar_akun as $da)
                            @if($da->kode_akun == 111 OR $da->kode_akun == 112)
                            <option value="{{$da -> kode_akun}}">{{$da -> kode_akun}} | {{$da -> nama_akun}} | {{$da -> tipe_akun}}</option>
                            @endif
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="keterangan_transaksi">Keterangan</label>
                          <input required="" name="keterangan_transaksi" type="text" class="form-control" id="keterangan_transaksi">
                        </div>

                        <div class="form-group">
                          <label for="nominal_transaksi">Nominal</label>
                          <input required="" name="nominal_transaksi" type="number" min="0" class="form-control" id="nominal_transaksi ">
                        </div>
                      </div>


                      <div class="modal-footer">
                        <button class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>

                        <button class="btn btn-primary btn-sm" type="submit">Tambah
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="row text-center">
              <div class="modal fade modal-success" id="modal_cari_data_pengeluaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Cari Data Berdasarkan Periode</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-left">
                      <form method="post" action="/data_pengeluaran/cari">
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

            <div class="row text-center">
              <div class="modal fade modal-success" id="modal_cari_data_pengeluaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Cari Data Berdasarkan Periode</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-left">
                      <form method="post" action="/data_pengeluaran/cari">
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

                          <button class="btn btn-primary btn-sm" type="submit">Tambah
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <table id="example1" class="table table-bordered table-striped myTable dtr-inline collapsed text-center" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Akun</th>
                  <th>Keterangan</th>
                  <th>Nominal</th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <tr class="odd">
                  @foreach ($data_pengeluaran as $i => $p)
                  <td>{{$i+1}}</td>
                  <td>{{$p -> tgl_transaksi}}</td>
                  <td>{{$p -> Daftar_akun->nama_akun}}</td>
                  <td>{{$p -> keterangan_transaksi}}</td>
                  <td>{{number_format($p -> nominal_transaksi)}}</td>
                  <td>
                    <!-- <button type="button" class="btn btn" data-toggle="modal" data-target="#myModalUbahDataPengeluaran{{$p -> id}}">
                      <i class="fa fa-pen"></i><span></span>
                    </button> -->
                    <a id-pemasukan="{{$p->id}}" class="btn btn-sm batal-trx"><i class="fa fa-times"></i></a>
                  </td>
                </tr>

                <!-- Modal -->
                <div class="modal" id="myModalUbahDataPengeluaran{{$p -> id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Pengeluaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div> 
                      <!-- Modal body -->
                      <div class="modal-body text-left">
                        <form method="post" action="/data_pengeluaran/ubah/{{$p -> id}}">
                          {{csrf_field()}}

                          <div class="form-group">
                            <label for="tgl_transaksi">Tanggal Pengeluaran</label>
                            <input required="" name="tgl_transaksi" type="date" class="form-control" id="tgl_transaksi " value="{{$p -> tgl_transaksi}}">
                          </div>

                          <div class="form-group">
                            <label for="keterangan_transaksi">Keterangan</label>
                            <input required="" name="keterangan_transaksi" type="text" class="form-control" id="keterangan_transaksi" value="{{$p -> keterangan_transaksi}}">
                          </div>

                          <div class="form-group">
                            <label for="nominal_transaksi">Nominal_transaksi</label>
                            <input required="" name="nominal_transaksi" type="number" class="form-control" id="nominal_transaksi" value="{{$p -> nominal_transaksi}}">
                          </div>

                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection