@extends('layouts.master')
@section('title','Email Dosen [Sent]')

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
                                <div class="email-left-box"><a href="{{ route('compose.dosen') }}" class="btn btn-primary btn-block">Compose</a>
                                    <div class="mail-list mt-4">
                                        <a href="{{ route('inbox.dosen') }}" class="list-group-item border-0 p-r-0"><i class="fa fa-inbox font-18 align-middle mr-2"></i> <b>Inbox</b> <span class="badge badge-primary badge-sm float-right m-t-5">{{ session('totalnotif') }}</span> </a>
                                        <a href="{{ route('sent.dosen') }}" class="list-group-item border-0 p-r-0"><i class="fa fa-paper-plane font-18 align-middle mr-2"></i>Sent <span class="badge badge-primary badge-sm float-right m-t-5">{{ session('totalnotifsent') }}</span> </a>  
                                        <!-- <a href="#" class="list-group-item border-0 p-r-0"><i class="fa fa-star-o font-18 align-middle mr-2"></i>Important <span class="badge badge-danger badge-sm float-right m-t-5">47</span> </a>
                                        <a href="#" class="list-group-item border-0 p-r-0"><i class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>Draft</a> -->
                                        <a href="{{ route('inbox.dosen') }}" class="list-group-item border-0 p-r-0"><i class="fa fa-trash font-18 align-middle mr-2"></i>Trash</a>
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
                                        @foreach($sent as $snt)
                                        <div class="message">
                                            <a href="email-read.html">
                                                <div class="col-mail col-mail-1">
                                                    <div class="email-checkbox">
                                                        <input type="checkbox" id="chk2">
                                                        <label class="toggle" for="chk2"></label>
                                                    </div>
                                                    <!-- <span class="star-toggle ti-star"></span> -->
                                                </div>
                                                <div class="col-mail col-mail-2">
                                                    <a href="{{ route('read.dosen', ['flag'=>'sent','kodemail'=>encrypt($snt->id)] ) }}">
                                                        <div class="subject">{{ $snt->subject }}</div>
                                                        <div class="date">{{ date('d/m/Y', strtotime($snt->created_at)) }}</div>
                                                    </a>
                                                </div>
                                            </a>
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