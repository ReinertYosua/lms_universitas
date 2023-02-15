@extends('layouts.master')
@section('title','List Mahasiswa Input Nilai')

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
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Input Nilai Akhir {{ $mhsscore[0]->kode_matakuliah." - ".$mhsscore[0]->nama_matakuliah }}</h4>
                                <div class="form-validation">
                                
                                    <form class="form-valide" action="{{ route('create.course') }}" method="post">
                                        @csrf
                                        @foreach($mhsscore as $mhssc)
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="matakuliah">{{ $mhssc->nim." - ".$mhssc->namadepan." ".$mhssc->namabelakang }} <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" value="{{ old('matakuliah') }}" class="form-control @error('matakuliah') is-invalid @enderror" id="matakuliah" name="matakuliah" placeholder="Masukkan Nilai Akhir">
                                                @error('matakuliah')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        @endforeach
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
<!-- datatables -->
    <!-- <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script> -->
@endsection