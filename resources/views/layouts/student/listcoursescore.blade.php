@extends('layouts.master')
@section('title','List Matakuliah')

@section('content')
<div class="container-fluid mt-3">
        <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('listcoursescore.mahasiswa') }}">List Matakuliah</a></li>
                        
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
                                        <h4 class="card-title">List Matakuliah Periode {{ $periode }} </h4>
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
                                            @foreach($transaksi as $mk)
                                            <tr>
                                                <td>{{ $mk->kode_matakuliah }}</td>
                                                <td>{{ $mk->nama_matakuliah }}</td>
                                                <td>{{ $mk->sks }}</td>
                                                <td>
                                                    <a href="{{ route('detailscore.mahasiswa', ['kodemk'=>encrypt($mk->kode_matakuliah),'periode'=>encrypt($periode)])}}" class=" btn btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Input & Edit Nilai"><i class="fa fa-info-circle"></i>&nbsp;Lihat Nilai</a>
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

@endsection



