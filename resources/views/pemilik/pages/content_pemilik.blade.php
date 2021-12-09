@extends('pemilik/layouts/main')

@section('title','SIA | text')

@section('content-header', 'Add text')

@section('content')

<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <p class="card-title"><b>Hai Selamat Datang Opi Widia!</b></p>
          </div>
          <div class="card-body">
            <button class="btn btn-primary btn-md" >
              <i class="fa fa-plus"></i><span></span>
            </button>
            
            <table id="example1" class="table table-bordered table-striped myTable dtr-inline collapsed text-center" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th>No</th>
                  <th>Keterangan</th>
                  <th>Nominal</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                <tr class="odd">
                  <td></td>
                  <td>keterangan_transaksi</td>
                  <td>nominal_transaksi</td>
                  <td>tgl_transaksi</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection