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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Materi Matakuliah</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Materi Matakuliah {{ $mk[0]->kode_matakuliah." - ".$mk[0]->nama_matakuliah}}</h4>
                        <div class="form-validation">
                        
                            <form class="form-valide" action="{{ route('updatedetail.course') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="session">Session <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="hidden" name="id_mtk" value="{{ encrypt($mk[0]->id) }}">
                                        <input type="hidden" name="id_mmk" value="{{ encrypt($mmk[0]->id) }}">
                                        <input type="number" value="{{ old('session') ?? $mmk[0]->session}}" class="form-control @error('season') is-invalid @enderror" id="session" name="session" placeholder="Masukkan session">
                                        @error('session')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="materi">Materi <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ old('materi') ?? $mmk[0]->materi }}" class="form-control @error('materi') is-invalid @enderror" id="sks" name="materi" placeholder="Masukkan nama materi..">
                                    @error('materi')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="deskripsi">Deskripsi <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5" placeholder="Masukkan deskripsi matakuliah">{{ old('deskripsi') ?? $mmk[0]->deskripsi }}</textarea>
                                    @error('deskripsi')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="referensi">Referensi <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control @error('referensi') is-invalid @enderror" id="referensi" name="referensi" rows="5" placeholder="Masukkan referensi">{{ old('referensi') ?? $mmk[0]->referensi }}</textarea>
                                    @error('referensi')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="kesulitan">Tingkat Kesulitan <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="kesulitan" name="kesulitan">
                                            <option value="">Silahkan Pilih</option>
                                            <option value="hign"{{(old('kesulitan') ?? $mmk[0]->tingkat_kesulitan)=='high'?'selected': ''}}>Sulit</option>
                                            <option value="medium" {{(old('kesulitan') ?? $mmk[0]->tingkat_kesulitan)=='medium'?'selected': ''}}>Sedang</option>
                                            <option value="low" {{(old('kesulitan') ?? $mmk[0]->tingkat_kesulitan)=='low'?'selected': ''}}>Mudah</option>
                                            
                                        </select>
                                    @error('kesulitan')
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