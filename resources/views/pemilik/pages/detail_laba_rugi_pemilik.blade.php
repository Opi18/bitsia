@extends('pemilik/layouts/main')

@section('title','SIA | Laporan Laba Rugi')

@section('content-header', 'Laporan Laba Rugi')

@section('content')

<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
          </div>
          <div class="card-body">
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
                <h3 class="text-primary text-uppercase"><strong>LABA RUGI | PERIODE {{$date->format('d F Y')}}</h3></strong> 
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
                    <div class="row">
                      <div class="col-md-12"><strong>PENDAPATAN</strong></div>
                    </div><br>
                    <div class="row justify-content-center">
                      <div class="col-md-5"><p>Pendapatan Kotor</p></div>
                      <div class="col-md-4"></div>
                      <div class="col-md-3"><p>Rp. {{number_format($GetPendapatanKotor)}}</p></div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-5"><p>PPN</p></div>
                      <div class="col-md-4"></div>
                      <div class="col-md-3"><p>Rp. {{number_format($GetPPN)}}</p></div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-5"></div>
                      <div class="col-md-4"></div>
                      <div class="col-md-2"><hr style="border-top: 2px solid grey; margin-top: 1px"></div>
                      <div class="col-md-1">+</div>
                    </div>                    
                    <div class="row justify-content-center">
                      <div class="col-md-5"></div>
                      <div class="col-md-3"><strong>Pendapatan Bersih</strong></div>
                      <div class="col-md-2"><strong>Rp. {{number_format($GetPendapatanBersih)}}</strong></div>
                    </div><br><br>
                    <div class="row">
                      <div class="col-md-12"><strong>BEBAN</strong></div>
                    </div><br>
                    <div class="row justify-content-center">
                      <div class="col-md-5"><p>Beban Listrik& Air</p></div>
                      <div class="col-md-3"><p>Rp. {{number_format($GetBebanListrikAir)}}</p></div>
                      <div class="col-md-4"></div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-5"><p>Beban Gaji</p></div>
                      <div class="col-md-3"><p>Rp. {{number_format($GetBebanGaji)}}</p></div>
                      <div class="col-md-4"></div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-5"><p>Beban Telepon</p></div>
                      <div class="col-md-3"><p>Rp. {{number_format($GetBebanTelepon)}}</p></div>
                      <div class="col-md-4"></div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-5"><p>Pajak PPh Pasal 21</p></div>
                      <div class="col-md-3"><p>Rp. {{number_format($GetPPH21)}}</p></div>
                      <div class="col-md-4"></div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-5"></div>
                      <div class="col-md-2"><hr style="border-top: 2px solid grey; margin-top: 1px"></div>
                      <div class="col-md-5">+</div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-5"></div>
                      <div class="col-md-3"><strong>Rp. {{number_format($GetTotalBeban)}}</strong></div>
                      <div class="col-md-4"></div>
                    </div><br>
                    <div class="row justify-content-center">
                      <div class="col-md-5"></div>
                      <div class="col-md-3"><strong>Laba Kotor</strong></div>
                      <div class="col-md-2"><strong>Rp. {{number_format($GetLabaKotor)}}</strong></div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-5"></div>
                      <div class="col-md-4"></div>
                      <div class="col-md-2"><hr style="border-top: 2px solid grey; margin-top: 1px"></div>
                      <div class="col-md-1">-</div>
                    </div>              
                    <div class="row justify-content-center">
                      <div class="col-md-5"><p>Pajak PPh Pasal 25</p></div>
                      <div class="col-md-3"><p>Rp. {{number_format($GetPPH25)}}</p></div>
                      <div class="col-md-4"></div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-5"></div>
                      <div class="col-md-3"><strong>Laba Bersih</strong></div>
                      <div class="col-md-2"><strong>Rp. {{number_format($GetLabaBersih)}}</strong></div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-5"></div>
                      <div class="col-md-4"></div>
                      <div class="col-md-2"><hr style="border-top: 2px solid grey; margin-top: 1px"></div>
                      <div class="col-md-1"></div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-5"></div>
                      <div class="col-md-4"></div>
                      <div class="col-md-2"><hr style="border-top: 2px solid grey; margin-top: -15px"></div>
                      <div class="col-md-1"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          @endsection