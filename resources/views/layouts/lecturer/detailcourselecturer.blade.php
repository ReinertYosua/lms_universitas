@extends('layouts.master')
@section('title','Detail Jadwal Matakuliah')

@section('content')
<div class="container-fluid mt-3">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('schedulelec.course') }}">Matakuliah</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Jadwal Matakuliah</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Jadwal Matakuliah {{ $matkul[0]->kode_matakuliah." - ".$matkul[0]->nama_matakuliah }}</h4>
                        
                        <!-- <ul class="nav nav-pills mb-3">
                            @foreach($detailjadwal as $dt)
                            <li class="nav-item"><a href="#navpills-{{$loop->iteration}}" class="nav-link {{($loop->iteration==1)?'active':''}}" data-toggle="tab" aria-expanded="false">Session {{ $dt->session }}</a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="tab-content br-n pn">
                            @foreach($detailjadwal as $dt)
                            <div id="navpills-{{$loop->iteration}}" class="tab-pane {{($loop->iteration==1)?'active':''}}">
                                <div class="row align-items-center">
                                    <div class="col-sm-6 col-md-4 col-xl-2">
                                        <img src="images/big/card-4.png" alt="" class="img-fluid thumbnail m-r-15">
                                    </div>
                                    <div class="col-sm-6 col-md-8 col-xl-10">
                                        {{ $dt->materi }}
                                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p>
                                        <p>Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid.</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div> -->


                        <!-- scroller -->
                        <div class="w-100 pt-3">
                            <div class="scroller scroller-left float-left mt-2"><i class="fa fa-chevron-left"></i></div>
                            <div class="scroller scroller-right float-right mt-2"><i class="fa fa-chevron-right"></i></div>
                            <div class="wrapper-nav">
                                <nav class="nav nav-tabs list mt-2" id="myTab" role="tablist">
                                    @foreach($detailjadwal as $dt)
                                    <a class="nav-item nav-link {{($loop->iteration==1)?'active':''}}" data-toggle="tab" href="#tab{{$loop->iteration}}" role="tab" aria-controls="public" aria-expanded="true">Session {{ $dt->session }}</a>
                                    <!-- <a class="nav-item nav-link" href="#tab2" role="tab" data-toggle="tab">Tab 2</a> -->
                                    @endforeach
                                    <!-- <a class="nav-item nav-link" href="#tab2" role="tab" data-toggle="tab">Session 14</a> -->
                                </nav>
                            </div>
                            <div class="tab-content p-3" id="myTabContent">
                                @foreach($detailjadwal as $dt)
                                <div role="tabpanel" class="tab-pane fade {{($loop->iteration==1)?'active':''}} show mt-2" id="tab{{$loop->iteration}}" aria-labelledby="public-tab" aria-expanded="true">
                                    {{ $dt->materi }}
                                    </br></br>
                                    {{ $dt->deskripsi }}
                                    </br></br>
                                    {{ $dt->referensi }}
                                </div>
                                <!-- <div class="tab-pane fade mt-2" id="tab2" role="tabpanel" aria-labelledby="group-dropdown2-tab" aria-expanded="false">
                                    This is the content of Tab 2...
                                </div> -->
                                @endforeach
                                <!-- <div class="tab-pane fade mt-2" id="tab2" role="tabpanel" aria-labelledby="group-dropdown2-tab" aria-expanded="false">
                                    This is the content of Tab 2...
                                </div> -->

                            </div>
                        </div>
                        <!-- scroller -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- #/ container -->
@endsection