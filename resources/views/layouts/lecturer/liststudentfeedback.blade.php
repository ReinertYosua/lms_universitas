@extends('layouts.master')
@section('title','List Mahasiswa Input Feedback')

@section('content')
<div class="container-fluid mt-3">
        <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('listcourse.feedback') }}">List Matakuliah Feedback</a></li>
                        <li class="breadcrumb-item active"><a href="#">Input Feedback</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            @include("partial.successalert")
            @include('partial.dangeralert')
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Input Feedback {{ $mhsscore[0]->kode_matakuliah." - ".$mhsscore[0]->nama_matakuliah }}</h4>
                                <span class="text-danger">Untuk input/mengubah feedback mahasiswa secara individual dapat ceklist Checkbox yang ada disebelah kanan field input feedback</span>
                                </br></br>
                                <div class="form-validation">
                                
                                    <form class="form-validate" action="{{ route('submit.feedback') }}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="kategori">Kategori Feedback untuk mahasiswa <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                
                                                <select class="form-control" id="kategori" name="kategori" required>
                                                    <option value="">Silahkan Pilih</option>
                                                    @foreach($session as $s)
                                                    <option data-id="{{ encrypt($mhsscore[0]->kode_matakuliah) }}" data-periode="{{ $periode }}" data-sesi="{{ $s->session }}" value="{{ $s->session }}" {{ old('kategori') == $s->session ?'selected': ''}}>Sesi {{ $s->session }}</option>
                                                    @endforeach
                                                    <option data-id="{{ encrypt($mhsscore[0]->kode_matakuliah) }}" data-periode="{{ $periode }}" data-sesi="UTS" value="UTS" {{ old('kategori') == 'UTS' ?'selected': ''}}>UTS</option>
                                                    <option data-id="{{ encrypt($mhsscore[0]->kode_matakuliah) }}" data-periode="{{ $periode }}" data-sesi="UAS" value="UAS" {{ old('kategori') == 'UAS' ?'selected': ''}}>UAS</option>
                                                </select>
                                            </div>
                                        </div>

                                        <table class="table" id="givefeedback">
                                            <thead>
                                            <tr>
                                                <th>Mahasiswa</th>
                                                <th>Nilai</th>
                                                <th>Topic Mastery</th>
                                                <th>Feedback</th>
                                                <th>
                                                    <div class="input-group-text text-center">
                                                        <input class="text-center" type="checkbox" name="active" id="active" onclick="checkAll()">&nbsp;&nbsp;Pilih Semua
                                                    </div> 
                                                    </th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
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
<script type="text/javascript">  
            function checkAll(){  
                var e=document.getElementById('active');
                var ele=document.getElementsByName('chkScore[]');  
                if(e.checked){
                    //document.getElementById('fscore').disabled=false; 
                    for(var i=0; i<ele.length; i++){  
                        //if(ele[i].type=='checkbox')  
                            ele[i].checked=true;
                            document.getElementById('fscore_'+ele[i].value).disabled=false; 
                    }  
                    
                }else{
                    for(var i=0; i<ele.length; i++){  
                        //if(ele[i].type=='checkbox')  
                            ele[i].checked=false; 
                            document.getElementById('fscore_'+ele[i].value).disabled=true;  
                    } 
                    
                }
              
            }  
            function checkmhs(){
                //var ele=document.getElementsByName('chkScore[]');
                var checkboxes = document.getElementsByName('chkScore[]');
                var vals = "";
                for (var i=0, n=checkboxes.length;i<n;i++) 
                {
                    if (checkboxes[i].checked) 
                    {
                        vals += ","+checkboxes[i].value;
                        document.getElementById('fscore_'+checkboxes[i].value).disabled=false;
                    }else{
                        document.getElementById('fscore_'+checkboxes[i].value).disabled=true;
                    }
                    
                }
                //if (vals) vals = vals.substring(1);
            }
            
</script>  
<script>
            $('#kategori').on('change', function(){
                var selectedOption = $(this).find('option:selected');
                var kodemk = selectedOption.attr('data-id');
                var periode = selectedOption.attr('data-periode');
                var session = selectedOption.val();
                //alert(kodemk+"@@@"+periode+"@@@"+session);
                if(kodemk!=""){

                    // AJAX request
                    var url = "{{ route('detaillecturer.feedback',[':kodemk',':periode',':session']) }}";
                    url = url.replace(':kodemk', kodemk).replace(':periode', periode).replace(':session', session);
                    
                    // Empty modal data
                    $('#givefeedback tbody').empty();

                    $.ajax({
                        url: url,
                        dataType: 'json',
                        success: function(response){

                            // Add employee details
                            $('#givefeedback tbody').html(response.html);

                            
                        }
                    });
                }
            });
</script>
<!-- datatables -->
    <!-- <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script> -->
@endsection