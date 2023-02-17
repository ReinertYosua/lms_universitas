@extends('layouts.master')
@section('title','Matakuliah')

@section('content')
<div class="container-fluid mt-3">
        <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('list.courses') }}">Matakuliah</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Materi Matakuliah</a></li>
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
                                        <h4 class="card-title">Detail Materi {{ $mk[0]->kode_matakuliah." - ".$mk[0]->nama_matakuliah}}</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ route('addmateri.course', encrypt($mk[0]->id)) }}" class="btn mb-1 btn-primary">Tambah Detail Materi <span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
                                        
                                    </div>
                                </div>
                                <!--  -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Sesion</th>
                                                <th>Materi</th>
                                                <th>Jenis Materi</th>
                                                <th>Deskripsi</th>
                                                <th>Referensi</th>
                                                <th>Tingkat Kesulitan</th>
                                                <th>File Materi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($materimk as $mmk)
                                            <tr>
                                                <td>{{ $mmk->session }}</td>
                                                <td>{{ $mmk->materi }}</td>
                                                <td>{{ $mmk->jenis_materi }}</td>
                                                <td>{{ $mmk->deskripsi }}</td>
                                                <td>{{ $mmk->referensi }}</td>
                                                <td>{{ $mmk->tingkat_kesulitan }}</td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>General</td><td><a href="{{ route('downloadmateri.course', $mmk->file_materi) }}">{{ $mmk->file_materi }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Active</td><td><a href="{{ route('downloadmateri.course', $mmk->file_active) }}">{{ $mmk->file_active }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Reflective</td><td><a href="{{ route('downloadmateri.course', $mmk->file_reflective) }}">{{ $mmk->file_reflective }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sensing</td><td><a href="{{ route('downloadmateri.course', $mmk->file_sensing) }}">{{ $mmk->file_sensing }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Intuitive</td><td><a href="{{ route('downloadmateri.course', $mmk->file_intuitive) }}">{{ $mmk->file_intuitive }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Visual</td><td><a href="{{ route('downloadmateri.course', $mmk->file_visual) }}">{{ $mmk->file_visual }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Verbal</td><td><a href="{{ route('downloadmateri.course', $mmk->file_verbal) }}">{{ $mmk->file_verbal }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sequential</td><td><a href="{{ route('downloadmateri.course', $mmk->file_sequential) }}">{{ $mmk->file_sequential }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Global</td><td><a href="{{ route('downloadmateri.course', $mmk->file_global) }}">{{ $mmk->file_global }}</a></td>
                                                        </tr>
                                                    </table>
                                                    
                                                </td>
                                                <td>
                                                    
                                                    <a href="{{ route('editmateri.course', ['idmkdet'=>encrypt($mmk->id), 'idmk'=>encrypt($mk[0]->id)])}}" class=" btn btn-info" data-toggle="tooltip" data-placement="top" data-original-title="Edit Matakuliah"><i class="fa fa-edit"></i></a>
                                                    <form class="my-1"
                                                    action="{{ route('deletemateri.course', ['idmmk'=>encrypt($mmk->id), 'idmk'=>encrypt($mk[0]->id)]) }}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus Materi {{ $mmk->materi }} ?')">
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
                                                <th>Sesion</th>
                                                <th>Materi</th>
                                                <th>Jenis Materi</th>
                                                <th>Deskripsi</th>
                                                <th>Referensi</th>
                                                <th>Tingkat Kesulitan</th>
                                                <th>Link Materi</th>
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