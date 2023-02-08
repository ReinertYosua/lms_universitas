@extends('auth.headerauth.masterauth')
@section('titleauth','Registration Mahasiswa')
@section('contenauth')
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                    
                                    <a class="text-center" href="/"> <h4>Registrasi Mahasiswa</h4></a>
                                @include('partial.dangeralert')
                                <form class="mt-5 mb-5 login-input" action="{{ route('regismhs.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" placeholder="NIM" value="{{ old('nim') }}">
                                        @error('nim')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control @error('jurusan') is-invalid @enderror" aria-label="Default select example" name="jurusan">
                                            <option selected value="">Pilih Jurusan</option>
                                            @foreach($jurusan as $jr)
                                            <option value="{{ $jr->id }}"  >{{ $jr->jurusan }}</option>
                                            @endforeach
                                        </select>
                                        @error('jurusan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control @error('namadepan') is-invalid @enderror" name="namadepan" value="{{ old('namadepan') }}" placeholder="Nama Depan" >
                                                @error('namadepan')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control @error('namabelakang') is-invalid @enderror" name="namabelakang" value="{{ old('namabelakang') }}" placeholder="Nama Belakang" >
                                                @error('namabelakang')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" >
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('tempatlahir') is-invalid @enderror" name="tempatlahir" value="{{ old('tempatlahir') }}" placeholder="Tempat Lahir" >
                                        @error('tempatlahir')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control @error('tanggallahir') is-invalid @enderror" name="tanggallahir" value="{{ old('tanggallahir') }}" placeholder="Tanggal Lahir" >
                                        @error('tanggallahir')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="radio-inline mr-3">Jenis Kelamin</label> <br/>
                                            <input type="radio" name="jeniskelamin" value="L" {{ old('jeniskelamin')=='L' ? 'checked': '' }}> Laki-Laki
                                            <input type="radio" name="jeniskelamin" value="P" {{ old('jeniskelamin')=='P' ? 'checked': '' }}> Perempuan
                                            @error('jeniskelamin')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    <div class="form-group">
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="" cols="30" rows="10" placeholder="Alamat" >{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Profil</label>
                                        <input type="file" class="form-control @error('imageprofil') is-invalid @enderror" name="imageprofil" placeholder="Upload Foto Profil" >
                                        @error('imageprofil')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('nomortelepon') is-invalid @enderror" name="nomortelepon" value="{{ old('nomortelepon') }}" placeholder="Nomor Telepon" >
                                        @error('nomortelepon')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('universitas_asal') is-invalid @enderror" name="universitas_asal" value="{{ old('universitas_asal') }}" placeholder="Universitas/Perguruan Tinggi asal" >
                                        @error('universitas_asal')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('fakultas') is-invalid @enderror" name="fakultas" value="{{ old('fakultas') }}" placeholder="Fakultas" >
                                        @error('fakultas')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('program_studi') is-invalid @enderror" name="program_studi" value="{{ old('program_studi') }}" placeholder="Program Studi" >
                                        @error('program_studi')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Foto ID Card</label>
                                        <input type="file" class="form-control @error('fotoidcard') is-invalid @enderror" name="fotoidcard" placeholder="Upload Foto ID Card" >
                                        @error('fotoidcard')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Surat Pengantar</label>
                                        <input type="file" class="form-control @error('suratpengantar') is-invalid @enderror" name="suratpengantar" placeholder="Upload Surat Pengantar" >
                                        @error('suratpengantar')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control @error('katasandi') is-invalid @enderror" name="katasandi" value="{{ old('katasandi') }}" placeholder="Kata Sandi" >
                                        @error('katasandi')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control @error('katasandikonfirmasi') is-invalid @enderror" name="katasandikonfirmasi" value="{{ old('katasandikonfirmasi') }}" placeholder="Konfirmasi Kata Sandi" >
                                        @error('katasandikonfirmasi')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <input type="submit" value="Sign in" class="btn login-form__btn submit w-100">
                                    <!-- <button class="btn login-form__btn submit w-100">Sign in</button> -->
                                </form>
                                    <p class="mt-5 login-form__footer">Have account <a href="/login" class="text-primary">Log in </a> now</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

  @endsection