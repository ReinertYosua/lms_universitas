@extends('layouts.master')
@section('title','List Penilaian Matakuliah')

@section('content')
<div class="container-fluid mt-3">
        <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('listcourse.score') }}">List Matakuliah Input Nilai</a></li>
                        
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
                                        <h4 class="card-title">List Penilaian Matakuliah Periode {{ $periode }} </h4>
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
                                            @foreach($matkulscore as $mk)
                                            <tr>
                                                <td>{{ $mk->kode_matakuliah }}</td>
                                                <td>{{ $mk->nama_matakuliah }}</td>
                                                <td>{{ $mk->sks }}</td>
                                                <td>
                                                    <a href="{{ route('input.score', ['kodemk'=>encrypt($mk->kode_matakuliah)])}}" class=" btn btn-info" data-toggle="tooltip" data-placement="top" data-original-title="Input & Edit Nilai"><i class="fa fa-edit"></i></a>
                                                    <a href="#" class="btn btn-success viewdetails" data-toggle="modal" data-placement="top" data-original-title="Lihat Nilai" data-target="#listNilaiMatkul" data-id="{{ encrypt($mk->kode_matakuliah) }}" data-periode="{{ $periode }}">Lihat Nilai</a>
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
                                    <div class="modal fade" id="listNilaiMatkul">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">List Nilai <span id="matkul"></span></h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="w-100 table" id="tblempinfo">
                                                    <thead>
                                                        <tr>
                                                            <th>NIM</th>
                                                            <th>Nama Mahasiswa</th>
                                                            <th>UTS</th>
                                                            <th>UAS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
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
             var url = "{{ route('detail.score',[':kodemk',':periode']) }}";
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



