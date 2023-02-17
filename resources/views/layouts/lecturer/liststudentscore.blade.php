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
            @include('partial.dangeralert')
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Input Nilai {{ $mhsscore[0]->kode_matakuliah." - ".$mhsscore[0]->nama_matakuliah }}</h4>
                                <span class="text-danger">Untuk input/mengubah nilai mahasiswa secara individual dapat ceklist Checkbox yang ada disebelah kanan field input nilai</span>
                                </br></br>
                                <div class="form-validation">
                                
                                    <form class="form-validate" action="{{ route('submit.score') }}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="kategori">Kategori Nilai untuk semua mahasiswa <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="hidden" name="periode" value="{{ encrypt( $periode ) }}">
                                                <input type="hidden" name="kode_mk" value="{{ encrypt( $mhsscore[0]->kode_matakuliah ) }}">
                                                <select class="form-control" id="kategori" name="kategori" required>
                                                    <option value="">Silahkan Pilih</option>
                                                    @foreach($session as $s)
                                                    <option value="{{ $s->session }}" {{ old('kategori') == $s->session ?'selected': ''}}>Sesi {{ $s->session }}</option>
                                                    @endforeach
                                                    <option value="UTS" {{ old('kategori') == 'UTS' ?'selected': ''}}>UTS</option>
                                                    <option value="UAS" {{ old('kategori') == 'UAS' ?'selected': ''}}>UAS</option>
                                                </select>
                                            </div>
                                        </div>

                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Mahasiswa</th>
                                                <th>Score</th>
                                                <th>
                                                    <div class="input-group-text">
                                                        <input type="checkbox" name="active" id="active" onclick="checkAll()">&nbsp;&nbsp;Pilih semua 
                                                    </th>
                                            </tr>
                                            </thead>
                                            @foreach($mhsscore as $mhssc)
                                            <tr>
                                                <td><label class="col-form-label" for="{{ $mhssc->nim }}">{{ $mhssc->nim." - ".$mhssc->namadepan." ".$mhssc->namabelakang }}</td>
                                                <td><input type="number" value="0" class="form-control" id="fscore_{{ $mhssc->nim }}" name="fscore_{{ $mhssc->nim }}" placeholder="Masukkan Nilai" disabled></td>
                                                
                                                <td>
                                                    <div class="input-group-text">
                                                        <input type="checkbox" name="chkScore[]" id="chkScore" value="{{ $mhssc->nim }}" onclick="checkmhs()"></td>
                                                    </div>
                                            </tr>
                                            @endforeach
                                        </table>
                                        <!-- <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="{{ $mhssc->nim }}">{{ $mhssc->nim." - ".$mhssc->namadepan." ".$mhssc->namabelakang }}
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" value="0" class="form-control" id="fscore_{{ $mhssc->nim }}" name="fscore_{{ $mhssc->nim }}" placeholder="Masukkan Nilai">
                                            </div>
                                            <div class="col-lg-2">
                                                <input type="checkbox" class="@error('active') is-invalid @enderror" name="active" id="" value="Y">&nbsp;&nbsp;Set ubah
                                            </div>
                                        </div> -->
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
<!-- datatables -->
    <!-- <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script> -->
@endsection