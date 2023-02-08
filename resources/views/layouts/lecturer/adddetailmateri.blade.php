@extends('layouts.master')
@section('title','Materi Matakuliah')

@section('content')
<div class="container-fluid mt-3">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('list.courses') }}">Matakuliah</a></li>
                <li class="breadcrumb-item"><a href="{{ route('detail.materi', encrypt($mk[0]->id))}}">Materi Matakuliah</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Materi Matakuliah</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Materi Matakuliah {{ $mk[0]->kode_matakuliah." - ".$mk[0]->nama_matakuliah}}</h4>
                        <div class="form-validation">
                        
                            <form class="form-valide" action="{{ route('createdetail.course') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="session">Season <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="hidden" name="id_mtk" value="{{ encrypt($mk[0]->id) }}">
                                        <input type="number" value="{{ old('session') }}" class="form-control @error('season') is-invalid @enderror" id="session" name="session" placeholder="Masukkan session">
                                        @error('session')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="materi">Materi <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ old('materi') }}" class="form-control @error('materi') is-invalid @enderror" id="sks" name="materi" placeholder="Masukkan nama materi..">
                                    @error('materi')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="jenis_materi">Jenis Materi <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="jenis_materi" name="jenis_materi">
                                            <option value="">Silahkan Pilih</option>
                                            <option value="Multimedia">Multimedia</option>
                                            <option value="PPT">Presentasi</option>
                                            <option value="PDF">PDF</option>
                                            <option value="Book">Buku</option>
                                            <option value="Diktat">Diktat</option>
                                            <option value="Doc">Dokumen Word</option>
                                            <option value="Xls">Dokumen Excel</option>
                                            <option value="Text">Dokumen Teks</option>
                                            <option value="Tugas">Tugas</option>
                                            <option value="Project">Project</option>
                                            <option value="Diskusi">Diskusi</option>
                                            <option value="Referensi">Referensi</option>
                                        </select>
                                    @error('jenis_materi')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="deskripsi">Deskripsi <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5" placeholder="Masukkan deskripsi matakuliah">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="referensi">Referensi <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control @error('referensi') is-invalid @enderror" id="referensi" name="referensi" rows="5" placeholder="Masukkan referensi">{{ old('referensi') }}</textarea>
                                    @error('referensi')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="filemateri">File Materi <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                    <input type="file" accept=".ppt,.pptx,.pdf" class="form-control @error('filemateri') is-invalid @enderror" name="filemateri" placeholder="Upload File Materi" >
                                    @error('filemateri')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- #/ container -->
@endsection