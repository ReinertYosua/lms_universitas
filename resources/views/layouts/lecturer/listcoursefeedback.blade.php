@extends('layouts.master')
@section('title','List Feedback Matakuliah')

@section('content')
<div class="container-fluid mt-3">
        <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('listcourse.feedback') }}">List Matakuliah Feedback</a></li>
                        
                    </ol>
                </div>
            </div>
            <!-- row -->
            @include("partial.successalert")
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="card-title">List Feedback Matakuliah Periode {{ $periode }} </h4>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration" id="empTable">
                                        <thead>
                                            <tr>
                                                <th>Kode Matakuliah</th>
                                                <th>Nama Matakuliah</th>
                                                <th>SKS</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($matkulfeedback as $mk)
                                            <tr>
                                                <td>{{ $mk->kode_matakuliah }}</td>
                                                <td>{{ $mk->nama_matakuliah }}</td>
                                                <td>{{ $mk->sks }}</td>
                                                <td>
                                                    <a href="{{ route('input.feedback', ['kodemk'=>encrypt($mk->kode_matakuliah)])}}" class=" btn btn-info" data-toggle="tooltip" data-placement="top" data-original-title="Input & Edit Feedback"><i class="fa fa-edit"></i></a>
                                                    <a href="#" class="btn btn-success viewdetails" data-toggle="modal" data-placement="top" data-original-title="Lihat Feedback" data-target="#listNilaiMatkul" data-id="{{ encrypt($mk->kode_matakuliah) }}" data-periode="{{ $periode }}">Lihat Feedback</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Kode Matakuliah</th>
                                                <th>Nama Matakuliah</th>
                                                <th>SKS</th>
                                                <th>Score</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="bootstrap-modal">
                                    <!-- Button trigger modal 
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Launch demo modal</button>
                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-lg" id="listNilaiMatkul">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">List Feedback <span id="matkul"></span></h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table class="table" id="tblempinfo">
                                                            <thead>
                                                                <tr>
                                                                    <th>NIM</th>
                                                                    <th>Nama Mahasiswa</th>
                                                                    <th>Sesi 1</th>
                                                                    <th>Sesi 2</th>
                                                                    <th>Sesi 3</th>
                                                                    <th>Sesi 4</th>
                                                                    <th>Sesi 5</th>
                                                                    <th>Sesi 6</th>
                                                                    <th>Sesi 7</th>
                                                                    <th>Sesi 8</th>
                                                                    <th>Sesi 9</th>
                                                                    <th>Sesi 10</th>
                                                                    <th>Sesi 11</th>
                                                                    <th>Sesi 12</th>
                                                                    <th>Sesi 13</th>
                                                                    <th>Sesi UTS</th>
                                                                    <th>Sesi UAS</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        $('#empTable').on('click','.viewdetails',function(){
          var kodemk = $(this).attr('data-id');
          var periode = $(this).attr('data-periode');
          //alert(periode);
          if(kodemk!=""){

             // AJAX request
             var url = "{{ route('detail.feedback',[':kodemk',':periode']) }}";
             url = url.replace(':kodemk', kodemk).replace(':periode', periode);
             
             // Empty modal data
             $('#tblempinfo tbody').empty();

             $.ajax({
                 url: url,
                 dataType: 'json',
                 success: function(response){

                     // Add employee details
                     $('#tblempinfo tbody').html(response.html);

                     // Display Modal
                     $('#listNilaiMatkul').modal('show'); 
                 }
             });
          }
      });

   });
   </script>
@endsection



