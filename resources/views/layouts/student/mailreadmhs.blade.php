@extends('layouts.master')
@section('title','Email Mahasiswa [Read]')

@section('content')
<div class="container-fluid mt-3">
        <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"><a href="">Email</a></li>
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
                                <div class="email-left-box"><a href="{{ route('compose.mahasiswa') }}" class="btn btn-primary btn-block">Compose</a>
                                    <div class="mail-list mt-4">
                                        <a href="{{ route('inbox.mahasiswa') }}" class="list-group-item border-0 p-r-0"><i class="fa fa-inbox font-18 align-middle mr-2"></i> <b>Inbox</b> <span class="badge badge-primary badge-sm float-right m-t-5">{{ session('totalnotif') }}</span> </a>
                                        <a href="{{ route('sent.mahasiswa') }}" class="list-group-item border-0 p-r-0"><i class="fa fa-paper-plane font-18 align-middle mr-2"></i>Sent <span class="badge badge-primary badge-sm float-right m-t-5">{{ session('totalnotifsent') }}</span> </a>  
                                        <!-- <a href="#" class="list-group-item border-0 p-r-0"><i class="fa fa-star-o font-18 align-middle mr-2"></i>Important <span class="badge badge-danger badge-sm float-right m-t-5">47</span> </a>
                                        <a href="#" class="list-group-item border-0 p-r-0"><i class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>Draft</a> -->
                                        <a href="{{ route('inbox.mahasiswa') }}" class="list-group-item border-0 p-r-0"><i class="fa fa-trash font-18 align-middle mr-2"></i>Trash</a>
                                    </div>
                                    <!-- <h5 class="mt-5 m-b-10">Categories</h5>
                                    <div class="list-group mail-list"><a href="#" class="list-group-item border-0"><span class="fa fa-briefcase f-s-14 mr-2"></span>Work</a>  <a href="#" class="list-group-item border-0"><span class="fa fa-sellsy f-s-14 mr-2"></span>Private</a>  <a href="#"
                                        class="list-group-item border-0"><span class="fa fa-ticket f-s-14 mr-2"></span>Support</a>  <a href="#" class="list-group-item border-0"><span class="fa fa-tags f-s-14 mr-2"></span>Social</a>
                                    </div> -->
                                </div>
                                <div class="email-right-box">
                                    <div role="toolbar" class="toolbar">
                                        <div class="btn-group">
                                            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-dark dropdown-toggle" type="button">More <span class="caret m-l-5"></span>
                                            </button>
                                            <div class="dropdown-menu"><span class="dropdown-header">More Option :</span>  <a href="javascript: void(0);" class="dropdown-item">Mark as Unread</a>  <a href="javascript: void(0);" class="dropdown-item">Add to Tasks</a>  <a href="javascript: void(0);"
                                                class="dropdown-item">Add Star</a>  <a href="javascript: void(0);" class="dropdown-item">Mute</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="email-list m-t-15">
                                        @foreach($read as $gr)
                                        <div class="read-content">
                                            <div class="media pt-5">
                                                @if($flag == 'inbox')
                                                    <img height="100px" width="100px" class="mr-3 rounded-circle" src="{{asset('storage')}}/foto/dosen/{{ $gr->fotodsn }}">
                                                @else
                                                    <img height="100px" width="100px" class="mr-3 rounded-circle" src="{{asset('storage')}}/foto/mahasiswa/{{ $gr->fotomhs }}">
                                                @endif
                                                <div class="media-body">
                                                    @if($flag == 'inbox')
                                                        <h5 class="m-b-3">{{ $gr->namadsn }}</h5>
                                                    @else
                                                        <h5 class="m-b-3">{{ $gr->namadepan." ".$gr->namabelakang }}</h5>
                                                    @endif
                                                    
                                                    <p class="m-b-2">{{ date('d/m/Y', strtotime($gr->created_at)) }}</p>
                                                </div>
                                                
                                            </div>
                                            <hr>
                                            <div class="media mb-4 mt-1">
                                                <div class="media-body"><span class="float-right">&nbsp;</span>
                                                    <h4 class="m-0 text-primary">{{ $gr->subject }}</h4><small class="text-muted">To:Me</small>
                                                </div>
                                            </div>
                                            {!! $gr->body !!}
                                            <hr>
                                            <!-- <h6 class="p-t-15"><i class="fa fa-download mb-2"></i> Attachments <span>(3)</span></h6>
                                            <div class="row m-b-30">
                                                <div class="col-auto"><a href="#" class="text-muted">My-Photo.png</a>
                                                </div>
                                                <div class="col-auto"><a href="#" class="text-muted">My-File.docx</a>
                                                </div>
                                                <div class="col-auto"><a href="#" class="text-muted">My-Resume.pdf</a>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group p-t-15">
                                                <textarea class="w-100 p-20 l-border-1" name="" id="" cols="30" rows="5" placeholder="It's really an amazing.I want to know more about it..!"></textarea>
                                            </div> -->
                                        </div>
                                        @endforeach
                                    </div>
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