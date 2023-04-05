@extends('layouts.master')
@section('title','Create Thread Matakuliah')

@section('content')
<div class="container-fluid mt-3">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('forum.mahasiswa') }}">Forum</a></li>
                <li class="breadcrumb-item"><a href="{{ route('forumcourse.mahasiswa',['trkodemtk'=> encrypt($kodemk), 'periode'=>encrypt($periode)]) }}">Matakuliah</a></li>
                <li class="breadcrumb-item"><a href="#">Create Thread</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $kodemk." - ".$namamk." - ". $periode}}</h4>

                        <h6 class="card-title">Create Thread Materi {{ $materi }}</h6>
                        <div class="media mt-3">
                            <img class="mr-3 circle-rounded circle-rounded" src="{{asset('storage')}}/foto/dosen/66666666.jpeg" width="50" height="50" alt="Generic placeholder image">
                            <div class="media-body">
                                <div class="d-sm-flex justify-content-between mb-2">
                                    <h5 class="mb-sm-0">Reinert Yosua Rumagit <small class="text-muted ml-3">about 3 days ago</small></h5>
                                    <div class="media-reply__link">
                                        <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-thumbs-up"></i></button>
                                        <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-thumbs-down"></i></button>
                                        <button class="btn btn-transparent p-0 ml-3 font-weight-bold">Reply</button>
                                    </div>
                                </div>
                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                            </div>
                        </div>
                        <form action="{{ route('forumcourse.mahasiswa',['trkodemtk'=> encrypt($kodemk), 'periode'=>encrypt($periode)]) }}" class="form-profile">
                            <div class="form-group">
                                <textarea class="form-control" name="textarea" id="textarea" cols="30" rows="2" placeholder="Reply a new message"></textarea>
                            </div>
                            <div class="d-flex align-items-center">
                                <ul class="mb-0 form-profile__icons">
                                    <li class="d-inline-block">
                                        <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-user"></i></button>
                                    </li>
                                    <li class="d-inline-block">
                                        <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-paper-plane"></i></button>
                                    </li>
                                    <li class="d-inline-block">
                                        <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-camera"></i></button>
                                    </li>
                                    <li class="d-inline-block">
                                        <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-smile"></i></button>
                                    </li>
                                </ul>
                                <button class="btn btn-primary px-3 ml-4">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                            <div class="card-body">
                                <div class="media media-reply">
                                    <img class="mr-3 circle-rounded" src="{{asset('storage')}}/foto/mahasiswa/2440018822.jpg" width="50" height="50" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <div class="d-sm-flex justify-content-between mb-2">
                                            <h5 class="mb-sm-0">Janice Visakha <small class="text-muted ml-3">about 3 days ago</small></h5>
                                            <div class="media-reply__link">
                                                <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-thumbs-up"></i></button>
                                                <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-thumbs-down"></i></button>
                                                <button class="btn btn-transparent text-dark font-weight-bold p-0 ml-2">Reply</button>
                                            </div>
                                        </div>
                                        
                                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                        <!-- <ul>
                                            <li class="d-inline-block"><img class="rounded" width="60" height="60" src="images/blog/2.jpg" alt=""></li>
                                            <li class="d-inline-block"><img class="rounded" width="60" height="60" src="images/blog/3.jpg" alt=""></li>
                                            <li class="d-inline-block"><img class="rounded" width="60" height="60" src="images/blog/4.jpg" alt=""></li>
                                            <li class="d-inline-block"><img class="rounded" width="60" height="60" src="images/blog/1.jpg" alt=""></li>
                                        </ul> -->

                                        <div class="media mt-3">
                                            <img class="mr-3 circle-rounded circle-rounded" src="{{asset('storage')}}/foto/dosen/66666666.jpeg" width="50" height="50" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <div class="d-sm-flex justify-content-between mb-2">
                                                    <h5 class="mb-sm-0">Reinert Yosua Rumagit <small class="text-muted ml-3">about 3 days ago</small></h5>
                                                    <div class="media-reply__link">
                                                        <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-thumbs-up"></i></button>
                                                        <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-thumbs-down"></i></button>
                                                        <button class="btn btn-transparent p-0 ml-3 font-weight-bold">Reply</button>
                                                    </div>
                                                </div>
                                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="media media-reply">
                                <img class="mr-3 circle-rounded" src="{{asset('storage')}}/foto/mahasiswa/2440067622.jpg" width="50" height="50" alt="Generic placeholder image">
                                <div class="media-body">
                                    <div class="d-sm-flex justify-content-between mb-2">
                                        <h5 class="mb-sm-0">Samson Ndruru <small class="text-muted ml-3">about 3 days ago</small></h5>
                                        <div class="media-reply__link">
                                            <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-thumbs-up"></i></button>
                                            <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-thumbs-down"></i></button>
                                            <button class="btn btn-transparent p-0 ml-3 font-weight-bold">Reply</button>
                                        </div>
                                    </div>
                                    
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                </div>
                            </div>

                            <div class="media media-reply">
                                <img class="mr-3 circle-rounded" src="{{asset('storage')}}/foto/mahasiswa/2440082762.jpg" width="50" height="50" alt="Generic placeholder image">
                                <div class="media-body">
                                    <div class="d-sm-flex justify-content-between mb-2">
                                        <h5 class="mb-sm-0">Andreas Werner <small class="text-muted ml-3">about 3 days ago</small></h5>
                                        <div class="media-reply__link">
                                            <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-thumbs-up"></i></button>
                                            <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-thumbs-down"></i></button>
                                            <button class="btn btn-transparent p-0 ml-3 font-weight-bold">Reply</button>
                                        </div>
                                    </div>
                                    
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>
<script>
 
   </script>
@endsection