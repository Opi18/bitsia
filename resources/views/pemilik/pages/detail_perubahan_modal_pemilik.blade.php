@extends('pemilik/layouts/main')

@section('title','SIA | Laporan Perubahan Modal')

@section('content-header', 'Laporan Perubahan Modal')

@section('content')

<section class="content">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row no-print" style="padding-right: : 90%; margin-bottom: 2%">
          <a onclick="return window.print();" target="blank" class="btn btn-primary btn-md" > <i class="fa fa-print"></i><span></span> </a>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-2">
            <img width="160px" style="border: 3px solid grey; border-radius: 50%" src="{{asset('lte/dist/img/bit-bg-w.png') }}" alt="User Image">
          </div>

          <div class="col-md-7 text-center">
            <h2 class="text-danger"><strong>PT. BALI INTERNASIONAL TEKNOLOGI</strong></h2>
            <?php $date = new DateTime($periode) ?>
            <h3 class="text-primary text-uppercase"><strong>PERUBAHAN MODAL | PERIODE {{$date->format('d F Y')}}</h3></strong> 
            <h5>Jl Halmahera No 47 A Denpasar , Bali Indonesia</h5>
            <h5>Telp. : (+62)-3614748222, Email : cloud.balitekno@gmail.com</h5>
          </div>
          <div class="col-md-12">
            <hr style="border-top: 4px solid grey; margin-top: 35px">
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="card-body"style="margin-top: -5%">
              <div class="col-sm-12 table-responsive">
                <div class="card-header">
                </div>
                <div class="row justify-content-center">
                  <div class="col-md-5"><p>Modal Awal</p></div>
                  <div class="col-md-3"><p>Rp. {{number_format($GetModalAwalThisPeriode)}}</p></div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-md-5"><p>Laba/Rugi</p></div>
                  <div class="col-md-3"><p>Rp. {{number_format($GetLRThisPeriode)}}</p></div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-md-5"></div>
                  <div class="col-md-2"><hr style="border-top: 2px solid grey; margin-top: 1px"></div>
                  <div class="col-md-1">+</div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-md-4"><strong>Kenaikan Modal</strong></div>
                  <div class="col-md-2"><strong>Rp. {{number_format($GetMA_LR)}}</strong></div>
                </div><<br>
                <div class="row justify-content-center">
                  <div class="col-md-5"><p>Prive</p></div>
                  <div class="col-md-3"><p>Rp. {{number_format($GetPriveThisPeriode)}}</p></div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-md-5"></div>
                  <div class="col-md-2"><hr style="border-top: 2px solid grey; margin-top: 1px"></div>
                  <div class="col-md-1">-</div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-md-4"><strong>Modal Akhir</strong></div>
                  <div class="col-md-2"><strong>Rp. {{number_format($GetModalAkhir)}}</strong></div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-md-5"></div>
                  <div class="col-md-2"><hr style="border-top: 2px solid grey; margin-top: 1px"></div>
                  <div class="col-md-1"></div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-md-5"></div>
                  <div class="col-md-2"><hr style="border-top: 2px solid grey; margin-top: -15px"></div>
                  <div class="col-md-1"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    @endsection