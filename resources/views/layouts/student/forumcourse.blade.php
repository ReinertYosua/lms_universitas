@extends('layouts.master')
@section('title','Forum Matakuliah')

@section('content')
<div class="container-fluid mt-3">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('forum.mahasiswa') }}">Forum</a></li>
                <li class="breadcrumb-item"><a href="#">Matakuliah</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Forum Matakuliah {{ $matkul[0]->kode_matakuliah." - ".$matkul[0]->nama_matakuliah }}</h4>


                        <!-- scroller -->
                        <div class="w-100 pt-3">
                            <div class="scroller scroller-left float-left mt-2"><i class="fa fa-chevron-left"></i></div>
                            <div class="scroller scroller-right float-right mt-2"><i class="fa fa-chevron-right"></i></div>
                            <div class="wrapper-nav">
                                <nav class="nav nav-tabs list mt-2" id="myTab" role="tablist">
                                    @foreach($detailjadwal as $dt)
                                    <a class="nav-item nav-link {{($loop->iteration==$lastsessionscore)?'active':''}} detailsession" data-toggle="tab" href="#tab{{$loop->iteration}}" role="tab" aria-controls="public" aria-expanded="true" data-id="{{ encrypt($matkul[0]->kode_matakuliah) }}" data-periode="{{ $periode }}" data-sesi="{{ $dt->session }}">Session {{ $dt->session }}</a>
                                    <input type="hidden" id="kodemk" value="{{ encrypt($matkul[0]->kode_matakuliah) }}">
                                    <input type="hidden" id="periode" value="{{ $periode }}">
                                    <input type="hidden" id="session" value="{{ $lastsessionscore }}">
                                    <input type="hidden" id="materi" value="{{ $dt->id }}">
                                    <!-- <a class="nav-item nav-link" href="#tab2" role="tab" data-toggle="tab">Tab 2</a> -->
                                    @endforeach
                                    <!-- <a class="nav-item nav-link" href="#tab2" role="tab" data-toggle="tab">Session 14</a> -->
                                </nav>
                            </div>
                            <div class="tab-content p-3" id="myTabContent">
                                @foreach($detailjadwal as $dt)
                                <div role="tabpanel" class="tab-pane fade {{($loop->iteration==$lastsessionscore)?'active':''}} show mt-2" id="tab{{$loop->iteration}}" aria-labelledby="public-tab" aria-expanded="true">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <h4>{{ $dt->materi }}</h4>
                                            </br>
                                            <a href="{{ route('createforum.mahasiswa', ['kodemk'=>encrypt($matkul[0]->kode_matakuliah), 'namamk'=>$matkul[0]->nama_matakuliah,'session'=>$dt->session,'materi'=>$dt->materi,'periode'=>$periode]) }}" class="btn mb-1 btn-primary">Create Thread</a>
                                        </div>
                                    </div>
                                    </br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered zero-configuration">
                                                    <!-- <thead>
                                                        <tr>
                                                            <th>Kode Matakuliah</th>
                                                            <th>Nama Matakuliah</th>
                                                            <th>SKS</th>
                                                            <th>Jurusan</th>
                                                            <th>Deskripsi</th>
                                                            <th>Total Sesi</th>
                                                            <th>Active</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead> -->
                                                    <tbody>
                                                        
                                                        <tr>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <a href="{{ route('createforum.mahasiswa', ['kodemk'=>encrypt($matkul[0]->kode_matakuliah), 'namamk'=>$matkul[0]->nama_matakuliah,'session'=>$dt->session,'materi'=>$dt->materi,'periode'=>$periode]) }}">
                                                                            <div class="media mt-3">
                                                                                <img class="mr-3 circle-rounded circle-rounded" src="{{asset('storage')}}/foto/dosen/66666666.jpeg" width="50" height="50" alt="Generic placeholder image">
                                                                                <div class="media-body">
                                                                                    <div class="d-sm-flex justify-content-between mb-2">
                                                                                        <h5 class="mb-sm-0">Reinert Yosua Rumagit <small class="text-muted ml-3">about 3 days ago</small></h5>
                                                                                        <div class="media-reply__link">
                                                                                            <!-- <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-thumbs-up"></i></button>
                                                                                            <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-thumbs-down"></i></button>
                                                                                            <button class="btn btn-transparent p-0 ml-3 font-weight-bold">Reply</button> -->
                                                                                        </div>
                                                                                    </div>
                                                                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- scroller -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
 
   </script>
@endsection