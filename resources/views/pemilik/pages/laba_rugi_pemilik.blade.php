@extends('pemilik/layouts/main')

@section('title','SIA | Laporan Laba Rugi')

@section('content-header', 'Laporan Laba Rugi')

@section('content')

<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline collapsed text-center" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th>Aksi</th>
                  <th>Periode</th>
                </tr>
              </thead>
              <tbody>
                @foreach($lr as $lr)
                <tr class="odd">
                  <td><a href="/detail_laba_rugi_pemilik/{{$lr->first()->periode_lk}}" class="btn btn-primary btn-sm" type="submit">Detail</a></td>
                  <td>{{$lr->first()->periode_lk}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>            
        </div>
      </div>
    </div>
  </section>
  @endsection