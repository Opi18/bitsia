@extends('pemilik/layouts/main')

@section('title','SIA | Laporan Neraca')

@section('content-header', 'Laporan Neraca')

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
                <h3 class="text-primary text-uppercase"><strong>NERACA | PERIODE {{$date->format('d F Y')}}</h3></strong> 
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
                      <div class="col-md-6"><strong>AKTIVA</strong></div>
                      <div class="col-md-1"><strong>PASIVA</strong></div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-3"><p>Kas</p></div>
                      <div class="col-md-3"><p>Rp. {{number_format($GetKasThisPeriode)}}</p></div>
                      <div class="col-md-3"><p>Utang Usaha</p></div>
                      <div class="col-md-2"><p>Rp. {{number_format($GetUtangUsahaThisPeriode)}}</p></div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-3"><p>Bank</p></div>
                      <div class="col-md-3"><p>Rp. {{number_format($GetBankThisPeriode)}}</p></div>
                      <div class="col-md-3"><p>Modal Akhir</p></div>
                      <div class="col-md-2"><p>Rp. {{number_format($GetModalAkhirThisPeriode)}}</p></div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-3"><p>Piutang</p></div>
                      <div class="col-md-3"><p>Rp. {{number_format($GetPiutangThisPeriode)}}</p></div>
                      <div class="col-md-2"></div>
                      <div class="col-md-2"><hr style="border-top: 2px solid grey; margin-top: 1px"></div>
                      <div class="col-md-1"><p>+</p></div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-3"><p>Peralatan</p></div>
                      <div class="col-md-6"><p>Rp. {{number_format($GetPeralatanThisPeriode)}}</p></div>
                      <div class="col-md-2"><strong>Rp. {{number_format($GetPasiva)}}</strong></div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-3"></div>
                      <div class="col-md-2"><hr style="border-top: 2px solid grey; margin-top: 1px"></div>
                      <div class="col-md-1"><p>+</p></div>
                      <div class="col-md-2"></div>
                      <div class="col-md-2"><hr style="border-top: 2px solid grey; margin-top: -15px"></div>
                      <div class="col-md-1"></div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-3"></div>
                      <div class="col-md-2"><strong>Rp.{{number_format($GetActiva)}}</strong></div>
                      <div class="col-md-1"></div>
                      <div class="col-md-2"></div>
                      <div class="col-md-2"><hr style="border-top: 2px solid grey; margin-top: -53px"></div>
                      <div class="col-md-1"></div>
                    </div><br>
                    <div class="row justify-content-center">
                      <div class="col-md-3"></div>
                      <div class="col-md-2"><hr style="border-top: 2px solid grey; margin-top: -15px"></div>
                      <div class="col-md-4"></div>
                      <div class="col-md-2"></div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-3"></div>
                      <div class="col-md-2"><hr style="border-top: 2px solid grey; margin-top: -15px"></div>
                      <div class="col-md-4"></div>
                      <div class="col-md-2"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection