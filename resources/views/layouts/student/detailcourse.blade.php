@extends('layouts.master')
@section('title','Detail Jadwal Matakuliah')

@section('content')
<div class="container-fluid mt-3">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('schedule.course') }}">Matakuliah</a></li>
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
                                    <a class="nav-item nav-link {{($loop->iteration==$lastsessionscore)?'active':''}} detailsession" data-toggle="tab" href="#tab{{$loop->iteration}}" role="tab" aria-controls="public" aria-expanded="true" data-id="{{ encrypt($matkul[0]->kode_matakuliah) }}" data-periode="{{ $periode }}" data-sesi="{{ $dt->session }}">Session {{ $dt->session }}</a>
                                    <input type="hidden" id="kodemk" value="{{ encrypt($matkul[0]->kode_matakuliah) }}">
                                    <input type="hidden" id="periode" value="{{ $periode }}">
                                    <input type="hidden" id="session" value="{{ $lastsessionscore }}">
                                    <!-- <a class="nav-item nav-link" href="#tab2" role="tab" data-toggle="tab">Tab 2</a> -->
                                    @endforeach
                                    <!-- <a class="nav-item nav-link" href="#tab2" role="tab" data-toggle="tab">Session 14</a> -->
                                </nav>
                            </div>
                            <div class="tab-content p-3" id="myTabContent">
                                @foreach($detailjadwal as $dt)
                                <div role="tabpanel" class="tab-pane fade {{($loop->iteration==$lastsessionscore)?'active':''}} show mt-2" id="tab{{$loop->iteration}}" aria-labelledby="public-tab" aria-expanded="true">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <h4>{{ $dt->materi }}</h4>
                                            </br></br>
                                            <h5>Deskripsi</h5>
                                            <p>{{ $dt->deskripsi }}</p>
                                            </br></br>
                                            <h5>Referensi</h5>
                                            {{ $dt->referensi }}
                                            </br></br>
                                            <h5>Tingkat Kesulitan</h5>
                                            <span class="text-capitalize">{{ $dt->tingkat_kesulitan }}</span>
                                        </div>
                                        <div class="col-lg-5 bg-light">
                                            <div class="card card-widget" id="widgetscore">
                                                <div>

                                                </div>
                                                <!-- <div class="card-body gradient-9">
                                                    <div class="media">
                                                        <span class="card-widget__icon"><i class="fa fa-arrow-down"></i></span>
                                                        <div class="media-body">
                                                            <h2 class="card-widget__title">520</h2>
                                                            <h5 class="card-widget__subtitle">All Properties</h5>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th>Gaya Belajar</th>
                                                    <th>Material</th>
                                                    </tr>
                                                </thead>
                                                    <tr>
                                                        <td>General</td><td><a href="{{ route('downloadmateri.course', $dt->file_materi) }}">{{ $dt->file_materi }}</a></td>
                                                    </tr>
                                                    @if($gabel=="Active")
                                                    <tr>
                                                        <td>Active</td><td><a href="{{ route('downloadmateri.course', $dt->file_active) }}">{{ $dt->file_active }}</a></td>
                                                    </tr>
                                                    @endif
                                                    @if($gabel=="Reflective")
                                                    <tr>
                                                        <td>Reflective</td><td><a href="{{ route('downloadmateri.course', $dt->file_reflective) }}">{{ $dt->file_reflective }}</a></td>
                                                    </tr>
                                                    @endif
                                                    @if($gabel=="Sensing")
                                                    <tr>
                                                        <td>Sensing</td><td><a href="{{ route('downloadmateri.course', $dt->file_sensing) }}">{{ $dt->file_sensing }}</a></td>
                                                    </tr>
                                                    @endif
                                                    @if($gabel=="Intuitive")
                                                    <tr>
                                                        <td>Intuitive</td><td><a href="{{ route('downloadmateri.course', $dt->file_intuitive) }}">{{ $dt->file_intuitive }}</a></td>
                                                    </tr>
                                                    @endif
                                                    @if($gabel=="Visual")
                                                    <tr>
                                                        <td>Visual</td><td><a href="{{ route('downloadmateri.course', $dt->file_visual) }}">{{ $dt->file_visual }}</a></td>
                                                    </tr>
                                                    @endif
                                                    @if($gabel=="Visual")
                                                    <tr>
                                                        <td>Verbal</td><td><a href="{{ route('downloadmateri.course', $dt->file_verbal) }}">{{ $dt->file_verbal }}</a></td>
                                                    </tr>
                                                    @endif
                                                    @if($gabel=="Sequential")
                                                    <tr>
                                                        <td>Sequential</td><td><a href="{{ route('downloadmateri.course', $dt->file_sequential) }}">{{ $dt->file_sequential }}</a></td>
                                                    </tr>
                                                    @endif
                                                    @if($gabel=="Global")
                                                    <tr>
                                                        <td>Global</td><td><a href="{{ route('downloadmateri.course', $dt->file_global) }}">{{ $dt->file_global }}</a></td>
                                                    </tr>
                                                    @endif
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- scroller -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// var jq = jQuery.noConflict(true);
//$(".viewdetails").hide()
$(document).ready(function(){
    var kodemk = $("#kodemk").val();
    var periode = $("#periode").val();
    var session = $("#session").val();
    //alert(kodemk+"-"+periode+"-"+session);
    if(kodemk!=""){

        // AJAX request
        var url = "{{ route('detailstudent.score',[':kodemk',':periode',':session']) }}";
        url = url.replace(':kodemk', kodemk).replace(':periode', periode).replace(':session', session);
        
        // Empty modal data
        $('#widgetscore div').empty();

        $.ajax({
            url: url,
            dataType: 'json',
            success: function(response){

                // Add employee details
                $('#widgetscore div').html(response.html);

               
            }
        });
    }

});
$('#myTab').on('click','.detailsession',function(){
        var kodemk = $(this).attr('data-id');
        var periode = $(this).attr('data-periode');
        var session = $(this).attr('data-sesi');
        //alert(kodemk+"-"+periode+"-"+session);
        if(kodemk!=""){

            // AJAX request
            var url = "{{ route('detailstudent.score',[':kodemk',':periode',':session']) }}";
            url = url.replace(':kodemk', kodemk).replace(':periode', periode).replace(':session', session);
            
            // Empty modal data
            $('#widgetscore div').empty();

            $.ajax({
                url: url,
                dataType: 'json',
                success: function(response){
                    // Add employee details
                    $('#widgetscore div').html(response.html);

                }
            });
        }
    });
</script>
@endsection