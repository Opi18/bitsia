@extends('pemilik/layouts/main')

@section('title','SIA | Laporan Neraca Saldo')

@section('content-header', 'Laporan Neraca Saldo')

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
                @foreach($ns as $ns)
                <tr class="odd">
                  <td><a href="/detail_neraca_saldo_pemilik/{{$ns->first()->periode_ns}}" class="btn btn-primary btn-sm" type="submit">Detail</a></td>
                  <td>{{$ns->first()->periode_ns}}</td>
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