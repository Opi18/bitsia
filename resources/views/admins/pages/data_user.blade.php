@extends('admins/layouts/main')

@section('title','SIA | Data User')

@section('content-header', 'Data User')

@section('content')

<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data User</h3>
          </div>

          <div class="card-body">
            <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal_tambah_data_user">
              <i class="fa fa-plus"></i><span></span>
            </button>

            <div class="row text-center">
              <div class="modal fade modal-success" id="modal_tambah_data_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body text-left">
                      <form method="post" action="/data_user/tambah">
                        {{csrf_field()}}

                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input required="" name="nama" type="text" class="form-control" id="nama">
                        </div>

                        <div class="form-group">
                          <label for="status">Status</label>
                          <select name="status" class="form-control">
                            <option>Pilih</option>
                            <option>Accounting</option>
                            <option>Pemilik</option>
                          </select>
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

            <table id="example1" class="table table-bordered table-striped myTable dtr-inline collapsed text-center" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Status</th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user as $i => $p)
                <tr class="odd">
                  <td>{{$i+1}}</td>
                  <td>{{$p -> nama}}</td>
                  <td>{{$p -> username}}</td>
                  <td>{{$p -> status}}</td>
                  <td>
                    <button type="button" class="btn btn" data-toggle="modal" data-target="#myModalUbahDataUser{{$p -> id}}">
                      <i class="fa fa-pen"></i><span></span>
                    </button>
                  </td>
                </tr>

                <!-- Modal -->
                <div class="modal" id="myModalUbahDataUser{{$p -> id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body text-left">
                        <form method="post" action="/data_user/ubah/{{$p -> id}}">
                          {{csrf_field()}}
                          <div class="form-group">
                            <label for="nama">Nama</label>
                            <input required="" name="nama" type="text" class="form-control" id="nama" value="{{$p -> nama}}">
                          </div>

                          <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" value="{{$p -> status}}">
                              <option>Pilih</option>
                              <option>Accounting</option>
                              <option>Pemilik</option>
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
</div>
</section>

@endsection