@extends('layouts.master')
@section('title','Matakuliah')

@section('content')
<div class="container-fluid mt-3">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('list.courses') }}">Matakuliah</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Matakuliah</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Matakuliah</h4>
                        <div class="form-validation">
                        
                            <form class="form-valide" action="{{ route('update.course',['idmtk'=>encrypt($mk[0]->id)] ) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="jurusan">Jurusan <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="jurusan" name="jurusan">
                                            @foreach($jurusan as $jur)
                                            <option value="{{ $jur->id }}" {{(old('jurusan') ?? $mk[0]->id_jurusan)==$jur->id?'selected': 'disabled'}}>{{ $jur->jurusan }}</option>
                                            @endforeach
                                        </select>
                                    @error('jurusan')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="matakuliah">Nama Matakuliah <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="hidden" name="kode_matakuliah" value="{{ $mk[0]->kode_matakuliah }}">
                                        <input type="text" value="{{ old('matakuliah') ?? $mk[0]->nama_matakuliah }}" class="form-control @error('matakuliah') is-invalid @enderror" id="matakuliah" name="matakuliah" placeholder="Masukkan Nama Matakuliah">
                                        @error('matakuliah')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="sks">SKS <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" value="{{ old('sks') ?? $mk[0]->sks }}" class="form-control @error('sks') is-invalid @enderror" id="sks" name="sks" placeholder="Masukkan jumlah SKS..">
                                    @error('sks')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="deskripsi">Deskripsi <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5" placeholder="Masukkan deskripsi matakuliah">{{ old('deskripsi') ?? $mk[0]->deskripsi }}</textarea>
                                    @error('deskripsi')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label"><a href="#">Active</a>  <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                <input type="checkbox" class="@error('active') is-invalid @enderror" name="active" id="" value="Y" {{  ($mk[0]->active == 'Y' ? 'checked' : '') }}>&nbsp;&nbsp;Set matakuliah aktif
                                                </div>
                                            <!-- <span class="form-control">Set matakuliah aktif</span> -->
                                        </div>
                                        @error('active')
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