@extends('admins/layouts/main')

@section('title','SIA | Laporan Perubahan Modal')

@section('content-header', 'Laporan Perubahan Modal')

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
                @foreach($pm as $lk)
                <tr class="odd">
                  <td><a href="/detail_perubahan_modal/{{$lk->first()->periode_lk}}" class="btn btn-primary btn-sm" type="submit">Detail</a></td>
                  <td>{{$lk->first()->periode_lk}}</td>
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