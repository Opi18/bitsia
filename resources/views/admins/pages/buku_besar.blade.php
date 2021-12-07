@extends('admins/layouts/main')

@section('title','SIA | Laporan Buku Besar')

@section('content-header', 'Laporan Buku Besar')

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
                @foreach($bb as $bb)
                <tr class="odd">
                  <td><a href="/detail_buku_besar/{{$bb->first()->periode_bb}}" class="btn btn-primary btn-sm" type="submit">Detail</a></td>
                  <td>{{$bb->first()->periode_bb}}</td>
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