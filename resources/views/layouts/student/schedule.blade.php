@extends('layouts.master')
@section('title','Matakuliah')

@section('content')
<div class="container-fluid mt-3">
    <!-- <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('list.courses') }}">Matakuliah</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Jadwal Kuliah</a></li>
            </ol>
        </div>
    </div> -->
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-transparent">
                    <div class="card-body ">
                        <h4 class="card-title">Matakuliah Saya</h4>
                        <div class="form-group">
                            <select name="runperiod" class="form-control form-control-sm">
                                <option value="" >Pilih Periode Berjalan</option>
                                @foreach($listperiode as $lp)
                                <option val="{{ $lp->kode_periode }}" {{($periode)==$lp->kode_periode?'selected': ''}}>{{ $lp->kode_periode }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($transaksi as $tr)
            <div class="col-lg-3 col-sm-6">
                <a href="{{ route('detailschedule.course',['trkodemtk'=> encrypt($tr->kode_matakuliah), 'periode'=>encrypt($tr->periode)]) }}">
                <div class="card gradient-{{$loop->iteration}}">
                    <div class="card-body">
                        <h3 class="card-title text-white">{{$tr->kode_matakuliah." - ".$tr->nama_matakuliah}}</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $tr->sks }} SKS</h2>
                            <p class="text-white mb-0">{{ $tr->periode }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-book"></i></span>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
            <!-- #/ container -->
@endsection