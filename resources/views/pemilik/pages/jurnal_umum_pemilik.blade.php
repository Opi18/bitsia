@extends('pemilik/layouts/main')

@section('title','SIA | Laporan Jurnal Umum')

@section('content-header', 'Laporan Jurnal Umum')

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
                @foreach($ju as $ju)
                <tr class="odd">
                  <td><a href="/detail_jurnal_umum_pemilik/{{$ju->first()->periode_ju}}" class="btn btn-primary btn-sm" type="submit">Detail</a></td>
                  <td>{{$ju->first()->periode_ju}}</td>
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