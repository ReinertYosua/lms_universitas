@extends('layouts.master')
@section('title','Daftar Matakuliah')

@section('content')
@if($periode=="")
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('enroll.course') }}">Daftar Matakuliah</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Tidak ada matakuliah dibuka pada periode ini</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container-fluid mt-3">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('enroll.course') }}">Daftar Matakuliah</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            @include("partial.successalert")
            @include('partial.dangeralert')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h4 class="card-title">Daftar Matakuliah yang dibuka pada Semester {{ $periode }} </h4>
                                    </div>
                                    <div class="col-4 text-right">
                                        <!-- <a href="{{ route('add.courses') }}" class="btn mb-1 btn-primary">Tambah Matakuliah <span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
                                         -->
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
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($matkul as $mk)
                                            <tr>
                                                <td>{{ $mk->kode_matakuliah }}</td>
                                                <td>{{ $mk->nama_matakuliah }}</td>
                                                <td>{{ $mk->sks }}</td>
                                                <td>{{ $mk->deskripsi }}</td>
                                                <td>
                                                    <a href="{{ route('addtr.course', $mk->kode_matakuliah)}}" class=" btn btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Pilih Matakuliah"><i class="fa fa-plus"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Kode Matakuliah</th>
                                                <th>Nama Matakuliah</th>
                                                <th>SKS</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h4 class="card-title">Daftar Matakuliah yang dipilih pada Semester {{ $periode }} </h4>
                                    </div>
                                    <div class="col-4 text-right">
                                        <!-- <a href="{{ route('add.courses') }}" class="btn mb-1 btn-primary">Tambah Matakuliah <span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
                                         -->
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
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($transaksi as $tr)
                                            <tr>
                                                <td>{{ $tr->kode_matakuliah }}</td>
                                                <td>{{ $tr->nama_matakuliah }}</td>
                                                <td>{{ $tr->sks }}</td>
                                                <td>{{ $tr->deskripsi }}</td>
                                                <td>
                                                    <form class="my-1"
                                                        action="{{ route('deletetr.course', ['trid'=>$tr->id,'namamtk'=>$tr->nama_matakuliah]) }}" method="post" onsubmit="return confirm('Apakah anda yakin ingin membuang pilihan Matakuliah {{ $tr->nama_matakuliah }} ?')">
                                                        @csrf
                                                        @method('delete')
                                                        <div class="d-grid">
                                                            <button type="submit" class=" btn btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Hapus Matakuliah"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Kode Matakuliah</th>
                                                <th>Nama Matakuliah</th>
                                                <th>SKS</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
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
@endif

<!-- datatables -->
    <!-- <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script> -->
@endsection