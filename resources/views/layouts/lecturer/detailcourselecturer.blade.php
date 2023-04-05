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
                        <h4 class="card-title">Detail Matakuliah {{ $matkul[0]->kode_matakuliah." - ".$matkul[0]->nama_matakuliah }}</h4>


                        <!-- scroller -->
                        <div class="w-100 pt-3">
                            <div class="scroller scroller-left float-left mt-2"><i class="fa fa-chevron-left"></i></div>
                            <div class="scroller scroller-right float-right mt-2"><i class="fa fa-chevron-right"></i></div>
                            <div class="wrapper-nav">
                                <nav class="nav nav-tabs list mt-2" id="myTab" role="tablist">
                                    @foreach($detailjadwal as $dt)
                                    <a class="nav-item nav-link {{($loop->iteration==$lastsessionscore)?'active':''}} detailsession" data-toggle="tab" href="#tab{{$loop->iteration}}" role="tab" aria-controls="public" aria-expanded="true" data-id="{{ encrypt($matkul[0]->kode_matakuliah) }}" data-periode="{{ $periode }}" data-sesi="{{ $dt->session }}" data-materi="{{$dt->id}}">Session {{ $dt->session }}</a>
                                    <input type="hidden" id="kodemk" value="{{ encrypt($matkul[0]->kode_matakuliah) }}">
                                    <input type="hidden" id="periode" value="{{ $periode }}">
                                    <input type="hidden" id="session" value="{{ $lastsessionscore }}">
                                    <input type="hidden" id="materi" value="{{ $lastmateri }}">
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
                                            {{ $dt->tingkat_kesulitan }}
                                        </div>
                                        <div class="col-lg-5 bg-light">
                                            <div class="table-responsive">
                                                <table class="table" id="tblfileinfo">
                                                <thead>
                                                    <tr>
                                                        <th>Gaya Belajar</th>
                                                        <th>Material</th>
                                                        <th>Tipe</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    </br>
                                    </br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="tblempinfo">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NIM</th>
                                                            <th>Nama Mahasiswa</th>
                                                            <th>Nilai Sesi {{ $dt->session }}</th>
                                                            <th>Topic Mastery</th>
                                                            <th>Affection</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
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
        var materi = $("#materi").val();
        //alert(materi);
        //alert(session+"-"+materi);
        if(kodemk!=""){

            // AJAX request
            var url = "{{ route('detaillecturer.score',[':kodemk',':periode',':session']) }}";
            url = url.replace(':kodemk', kodemk).replace(':periode', periode).replace(':session', session);
            
            var urla = "{{ route('detaillecturer.materi', [':kodemk',':idmateri'] ) }}";
            urla = urla.replace(':kodemk', kodemk).replace(':idmateri', materi);
            //alert(urla);
            // Empty modal data
            $('#tblempinfo tbody').empty();

            $.ajax({
                url: url,
                dataType: 'json',
                success: function(response){

                    // Add employee details
                    $('#tblempinfo tbody').html(response.html);

                }
            });

            $.ajax({
                url: urla,
                dataType: 'json',
                success: function(response) {
                    $('#tblfileinfo tbody').html(response.html);
                },
                error: function(xhr, status, error) {
                    console.error('Request failed:', error);
                }
            });
        }

   });
   $('#myTab').on('click','.detailsession',function(){
          var kodemk = $(this).attr('data-id');
          var periode = $(this).attr('data-periode');
          var session = $(this).attr('data-sesi');
          var materi = $(this).attr('data-materi');
          //alert(session+"-"+materi);
          if(kodemk!=""){

             // AJAX request
             var url = "{{ route('detaillecturer.score',[':kodemk',':periode',':session']) }}";
             url = url.replace(':kodemk', kodemk).replace(':periode', periode).replace(':session', session);
             
             var urla = "{{ route('detaillecturer.materi', [':kodemk',':idmateri'] ) }}";
             urla = urla.replace(':kodemk', kodemk).replace(':idmateri', materi);

             // Empty modal data
             $('#tblempinfo tbody').empty();

             $.ajax({
                 url: url,
                 dataType: 'json',
                 success: function(response){

                     // Add employee details
                     $('#tblempinfo tbody').html(response.html);

                    
                 }
            });

            $.ajax({
                url: urla,
                dataType: 'json',
                success: function(response) {
                    $('#tblfileinfo tbody').html(response.html);
                },
                error: function(xhr, status, error) {
                    console.error('Request failed:', error);
                }
            });

          }
      });
   </script>
@endsection