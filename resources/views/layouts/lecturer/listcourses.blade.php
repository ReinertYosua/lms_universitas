@extends('layouts.master')
@section('title','Matakuliah')

@section('content')
<div class="container-fluid mt-3">
        <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('list.courses') }}">Matakuliah</a></li>
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
                                        <h4 class="card-title">Matakuliah</h4>
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
                                                <th>Jurusan</th>
                                                <th>Deskripsi</th>
                                                <th>Active</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($matkul as $mk)
                                            <tr>
                                                <td>{{ $mk->kode_matakuliah }}</td>
                                                <td>{{ $mk->nama_matakuliah }}</td>
                                                <td>{{ $mk->sks }}</td>
                                                <td>{{ $mk->jurusan }}</td>
                                                <td>{{ $mk->deskripsi }}</td>
                                                <td>{{ $mk->active }}</td>
                                                <td>
                                                    <a href="{{ route('detail.materi', encrypt($mk->id))}}" class=" btn btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Tambah Materi Matakuliah"><i class="fa fa-list"></i></a>
                                                    <a href="{{ route('edit.course', encrypt($mk->id))}}" class=" btn btn-info" data-toggle="tooltip" data-placement="top" data-original-title="Edit Matakuliah"><i class="fa fa-edit"></i></a>
                                                    <form class="my-1"
                                                    action="{{ route('delete.course', $mk->id) }}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus Matakuliah {{ $mk->nama_matakuliah }} ?')">
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
                                                <th>Jurusan</th>
                                                <th>Deskripsi</th>
                                                <th>Active</th>
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
<!-- datatables -->
    <!-- <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script> -->
@endsection