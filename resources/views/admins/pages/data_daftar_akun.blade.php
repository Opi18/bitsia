@extends('admins/layouts/main')

@section('title','SIA | Data Daftar Akun')

@section('content-header', 'Data Daftar Akun')

@section('content')

<section class="content">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Daftar Akun</h3>
      </div>
      <div class="card-body text-center">
        <div class="row">

          <div class="card-body text-center">
            <div class="col-sm-12">
              <button class="btn btn-primary btn-md" style="margin-right: 100%;" style ="margin-top: 2%" data-toggle="modal" data-target="#modal_tambah_data_admin">
                <i class="fa fa-plus"></i><span></span>
              </button>
              <div class="modal fade modal-success" id="modal_tambah_data_admin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Daftar Akun</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-left">
                      <form method="post" action="/data_daftar_akun/tambah">
                        {{csrf_field()}}

                        <div class="form-group">
                          <label for="kode_akun">Kode Akun</label>
                          <input required="" name="kode_akun" type="number" class="form-control" id="kode_akun">
                        </div>

                        <div class="form-group">
                          <label for="nama_akun">Nama Akun</label>
                          <input required="" name="nama_akun" type="text" class="form-control" id="nama_akun">
                        </div>

                        <div class="form-group">
                          <label for="tipe_akun">Tipe Akun</label>
                          <select name="tipe_akun" class="form-control">
                            <option>Pilih</option>
                            <option>Harta/Aset</option>
                            <option>Kewajiban</option>
                            <option>Modal/Ekuitas</option>
                            <option>Pendapatan</option>
                            <option>Beban</option>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>

                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_tambah_data_daftar_akun">Tambah
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <table id="example1" class="table table-bordered table-striped myTable dtr-inline collapsed" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th>Kode Akun</th>
                  <th>Nama Akun</th>
                  <th>Tipe Akun</th>
                  <th>Aksi </th>
                </tr>
              </thead>
              <tbody>
                <tr class="odd">
                  @foreach ($daftar_akun as $p)
                  <td>{{$p -> kode_akun}}</td>
                  <td>{{$p -> nama_akun}}</td>
                  <td>{{$p -> tipe_akun}}</td>
                  <td>
                    <button type="button" class="btn btn" data-toggle="modal" data-target="#myModalUbahDaftarAkun{{$p -> id}}">
                      <i class="fa fa-pen"></i><span></span>
                    </button>
                  </td>
                </tr>

                <div class="modal" id="myModalUbahDaftarAkun{{$p -> id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Daftar Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body text-left">
                        <form method="post" action="/data_daftar_akun/ubah/{{$p -> id}}">
                          {{csrf_field()}}
                          <div class="form-group">
                            <label for="kode_akun">Kode Akun</label>
                            <input required="" name="kode_akun" type="number" class="form-control" id="kode_akun" value="{{$p -> kode_akun}}">
                          </div>

                          <div class="form-group">
                            <label for="nama_akun">Nama Akun</label>
                            <input required="" name="nama_akun" type="text" class="form-control" id="nama_akun" value="{{$p -> nama_akun}}">
                          </div>

                          <div class="form-group">
                            <label for="tipe_akun">Tipe Akun</label>
                            <select name="tipe_akun" class="form-control" value="{{$p -> tipe_akun}}">
                              <option>Pilih</option>
                              <option>Harta/Aset</option>
                              <option>Kewajiban</option>
                              <option>Modal/Ekuitas</option>
                              <option>Pendapatan</option>
                              <option>Beban</option>
                            </select>
                          </div>

                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
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