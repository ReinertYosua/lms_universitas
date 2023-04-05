@extends('layouts.master')
@section('title','Email Dosen [Compose]')

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
                                    <div class="mail-list mt-4"><a href="{{ route('inbox.dosen') }}" class="list-group-item border-0 p-r-0"><i class="fa fa-inbox font-18 align-middle mr-2"></i> <b>Inbox</b> <span class="badge badge-primary badge-sm float-right m-t-5">{{ session('totalnotif') }}</span> </a>
                                        <a href="{{ route('sent.dosen') }}" class="list-group-item border-0 p-r-0"><i class="fa fa-paper-plane font-18 align-middle mr-2"></i>Sent <span class="badge badge-primary badge-sm float-right m-t-5">{{ session('totalnotifsent') }}</span></a>  
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
                                    <form action="{{ route('kirimemail.dosen') }}" method="post">
                                        <div class="compose-content mt-5">
                                            
                                                <div class="form-group">
                                                    <input type="text" value="{{ old('search') }}" id="search" name="search" class="typeahead form-control bg-transparent @error('search') is-invalid @enderror" placeholder=" To">
                                                    @error('search')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <input type="hidden" name="user_id" id="user_id">
                                                    <div id="mahasiswalist"></div>
                                                    @csrf
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="subject" class="form-control bg-transparent @error('subject') is-invalid @enderror" placeholder=" Subject">
                                                    @error('subject')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="ckeditor form-control @error('bodyemail') is-invalid @enderror" name="bodyemail" rows="15" placeholder="Enter text ..."></textarea>
                                                    @error('bodyemail')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            
                                            <!-- <h5 class="m-b-20"><i class="fa fa-paperclip m-r-5 f-s-18"></i> Attatchment</h5>
                                            <form action="#" class="dropzone">
                                                <div class="form-group">
                                                    <div class="fallback">
                                                        <input class="l-border-1" name="file" type="file" multiple="multiple">
                                                    </div>
                                                </div>
                                            </form> -->
                                        </div>
                                        <div class="text-left m-t-15">
                                            
                                            <button class="btn btn-primary m-b-30 m-t-15 f-s-14 p-l-20 p-r-20 m-r-10" type="submit"><i class="fa fa-paper-plane m-r-5"></i> Send</button>
                                            <!-- <button class="btn btn-dark m-b-30 m-t-15 f-s-14 p-l-20 p-r-20" type="button"><i class="ti-close m-r-5 f-s-12"></i> Discard</button> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
<script type="text/javascript">
     var path = "{{ route('autocomplete.dosen') }}";
  
    // $( "#search" ).autocomplete({
    //     source: function( request, response ) {
    //       $.ajax({
    //         url: path,
    //         type: 'GET',
    //         dataType: "json",
    //         data: {
    //            search: request.term
    //         },
    //         success: function( data ) {
    //            response( data );
    //            console.log(data); 
    //         }
    //       });
    //     },
    //     select: function (event, ui) {
    //        $('#search').val(ui.item.label);
    //        console.log(ui.item); 
    //        return false;
    //     }
    //   });

    $(document).ready(function(){
        $('#search').keyup(function(){
            var query = $(this).val();
            if(query!=''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url : path,
                    method : "POST",
                    data : {search :query, _token:_token},
                    success:function(data){
                        $('#mahasiswalist').fadeIn();
                        $('#mahasiswalist').html(data);
                    }
                });
            }else{
                $('#mahasiswalist').fadeOut();
            }
        });

        $("#mhs li a").on("click", function() {
                //var selectedValue = $(this).text();
                alert("selectedValue");
                //console.log(selectedValue);
            });

        $(document).on('click', '.listuser', function(e){
            e.preventDefault();
            $('#mahasiswalist').hide();
            var fullname = $(this).data('fullname');
            var id = $(this).data('id');
            var email = $(this).data('email');
            //window.location.href = "profile.php?user="+id+"&page=timeline";
            $('#search').val(fullname);
            $('#user_id').val(id);

        });
            
    });

    

  
</script>
<!-- datatables -->
    <!-- <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script> -->
@endsection