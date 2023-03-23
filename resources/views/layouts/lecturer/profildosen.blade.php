@extends('layouts.master')
@section('title','Profile Lecturer')

@section('content')
<div class="container-fluid mt-3">
        <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"><a href="">Profil</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            @include("partial.successalert")
            
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row" >
                                    <div class="col-lg-5">
                                        <h2>Profil Dosen</h2>
                                    </div>
                                    <div class="col-lg-2">
                                        <img heigh="150px" width="150px" class="d-flex justify-content-center align-items-center rounded-circle mr-3" src="{{asset('storage')}}/foto/dosen/{{ $dsn[0]->fotodsn }}" alt="">
                                    </div>
                                    <div class="col-lg-5">

                                    </div>
                                </div>
                                <hr>
                                <div class="form-validation">
                                    <form class="form-valide" action="{{ route('submitprofile.dosen') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-nidn">NIDN 
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" value="{{ old('nidn') ?? $dsn[0]->nidn }}" class="form-control" id="val-nidn" name="nidn" placeholder="" readonly>
                                                @error('nidn')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Nama Dosen 
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" value="{{ old('nama') ?? $dsn[0]->namadsn }}" class="form-control" id="val-nama" name="nama" placeholder="Silahkan masukkan nama anda">
                                                @error('nama')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Tanggal Lahir 
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" value="{{ old('tgllahir') ?? $dsn[0]->tgllahirdsn }}" class="form-control" id="val-tgllahir" name="tgllahir" placeholder="Masukkan Tanggal Lahir">
                                                @error('tgllahir')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-tempatlahir">Tempat Lahir 
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" value="{{ old('tempatlahir') ?? $dsn[0]->tempatlahirdsn }}" class="form-control" id="val-tempatlahir" name="tempatlahir" placeholder="Enter a username..">
                                                @error('tempatlahir')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-jeniskelamin">Jenis Kelamin 
                                            </label>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" value="L" name="jeniskelamin" {{ (old('jeniskelamin') ?? $dsn[0]->genderdsn) == 'L' ? 'checked': '' }} > Laki-Laki</label>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" value="P" name="jeniskelamin" {{ (old('jeniskelamin') ?? $dsn[0]->genderdsn) == 'P' ? 'checked': '' }}> Perempuan</label>
                                                </div>
                                                @error('jeniskelamin')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-alamat">Alamat 
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat">{{ old('alamat') ?? $dsn[0]->alamatdsn }}</textarea>
                                                @error('alamat')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-foto">Foto profil 
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="file" class="form-control" id="val-foto" name="foto" placeholder="Your valid email..">
                                                @error('foto')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-tlp">No Telepon 
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" value="{{ old('tlp') ?? $dsn[0]->notlpdsn }}" class="form-control" id="val-tlp" name="tlp" placeholder="Masukkan nomor telepon anda">
                                                @error('tlp')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Email 
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" value="{{ old('email') ?? $dsn[0]->email }}" class="form-control" id="val-email" name="email" placeholder="Masukkan email anda">
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="val-password" name="password" placeholder="Choose a safe one..">
                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Confirm Password <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="val-confirm-password" name="confirm_password" placeholder="..and confirm it!">
                                                @error('confirm_password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <input type="submit" class="btn btn-primary">
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
<!-- datatables -->
    <!-- <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script> -->
@endsection