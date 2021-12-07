@extends('admins/layouts/main')

@section('title','SIA | Laporan Riwayat Pembatalan Transaksi')

@section('content-header', 'Laporan Riwayat Pembatalan Transaksi')

@section('content')

<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form method="post" action="/riwayat_pembatalan">
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

                <button class="btn btn-primary btn-sm" type="submit">Submit
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection