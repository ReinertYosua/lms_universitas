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
                                    <div class="col-6">
                                        <h4 class="card-title">List Penilaian Matakuliah Periode {{ $periode }} </h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ route('add.courses') }}" class="btn mb-1 btn-primary">Tambah Matakuliah <span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
                                        
                                    </div>
                                </div>
                                <!--  -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Kode Matakuliah</th>
                                                <th>Nama Matakuliah</th>
                                                <th>SKS</th>
                                                <th>Score</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($matkulscore as $mk)
                                            <tr>
                                                <td>{{ $mk->kode_matakuliah }}</td>
                                                <td>{{ $mk->nama_matakuliah }}</td>
                                                <td>{{ $mk->sks }}</td>
                                                <td>
                                                    <a href="{{ route('input.score', ['kodemk'=>encrypt($mk->kode_matakuliah)])}}" class=" btn btn-info" data-toggle="tooltip" data-placement="top" data-original-title="Input Nilai"><i class="fa fa-edit"></i></a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
<!-- datatables -->
    <!-- <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script> -->
@endsection