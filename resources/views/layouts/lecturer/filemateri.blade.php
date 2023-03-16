@extends('layouts.master')
@section('title','Materi Matakuliah')

@section('content')
<div class="container-fluid mt-3">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('list.courses') }}">Matakuliah</a></li>
                <li class="breadcrumb-item"><a href="{{ route('detail.materi', encrypt($mk[0]->id))}}">Materi Matakuliah</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">File Materi Matakuliah</a></li>
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
                        <h4 class="card-title">File Materi Matakuliah {{ $mk[0]->kode_matakuliah." - ".$mk[0]->nama_matakuliah}}, Sesi {{ $mmk[0]->session }} </h4>
                        <div class="form-validation">
                        
                            <form class="form-valide" action="{{ route('prosesfile.materi') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="materi">Nama Materi <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="hidden" name="id_mtk" value="{{ encrypt($mk[0]->id) }}">
                                        <input type="hidden" name="id_mmk" value="{{ encrypt($mmk[0]->id) }}">
                                        <input type="text" value="{{ old('materi')}}" class="form-control @error('materi') is-invalid @enderror" id="sks" name="materi" placeholder="Masukkan nama materi..">
                                    @error('materi')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="jenis_materi">Jenis Materi <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="jenis_materi" name="jenis_materi">
                                            <option value="">Silahkan Pilih</option>
                                            <option value="Multimedia" {{old('jenis_materi') =='Multimedia'?'selected': ''}}>Multimedia</option>
                                            <option value="PPT" {{old('jenis_materi') =='PPT'?'selected': ''}}>Presentasi</option>
                                            <option value="PDF" {{old('jenis_materi') =='PDF'?'selected': ''}}>PDF</option>
                                            <option value="Buku" {{old('jenis_materi') =='Buku'?'selected': ''}}>Buku</option>
                                            <option value="Diktat" {{old('jenis_materi') =='Diktat'?'selected': ''}}>Diktat</option>
                                            <option value="Dokumen" {{old('jenis_materi') =='Dokumen'?'selected': ''}}>Dokumen Word</option>
                                            <option value="Excel" {{old('jenis_materi') =='Excel'?'selected': ''}}>Dokumen Excel</option>
                                            <option value="Teks" {{old('jenis_materi') =='Teks'?'selected': ''}}>Dokumen Teks</option>
                                            <option value="Tugas" {{old('jenis_materi') =='Tugas'?'selected': ''}}>Tugas</option>
                                            <option value="Proyek" {{old('jenis_materi') =='Proyek'?'selected': ''}}>Project</option>
                                            <option value="Diskusi" {{old('jenis_materi') =='Diskusi'?'selected': ''}}>Diskusi</option>
                                            <option value="Referensi" {{old('jenis_materi') =='Referensi'?'selected': ''}}>Referensi</option>
                                        </select>
                                    @error('jenis_materi')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="gaya_belajar">Gaya Belajar <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="gaya_belajar" name="gaya_belajar">
                                            <option value="">Silahkan Pilih</option>
                                            <option value="General" {{old('gaya_belajar') =='General'?'selected': ''}}>General</option>
                                            <option value="Active" {{old('gaya_belajar') =='Active'?'selected': ''}}>Active</option>
                                            <option value="Reflective" {{old('gaya_belajar') =='Reflective'?'selected': ''}}>Reflective</option>
                                            <option value="Sensing" {{old('gaya_belajar') =='Sensing'?'selected': ''}}>Sensing</option>
                                            <option value="Intuitive" {{old('gaya_belajar') =='Intuitive'?'selected': ''}}>Intuitive</option>
                                            <option value="Visual" {{old('gaya_belajar') =='Visual'?'selected': ''}}>Visual</option>
                                            <option value="Verbal" {{old('gaya_belajar') =='Verbal'?'selected': ''}}>Verbal</option>
                                            <option value="Sequential" {{old('gaya_belajar') =='Sequential'?'selected': ''}}>Sequential</option>
                                            <option value="Global" {{old('gaya_belajar') =='Global'?'selected': ''}}>Global</option>
                                        </select>
                                    @error('gaya_belajar')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="filemateri">File Materi <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                    <input type="file" class="form-control-file @error('filemateri') is-invalid @enderror" name="filemateri" placeholder="Upload File Materi" >
                                    @error('filemateri')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Nama Materi</th>
                                            <th>Jenis Materi</th>
                                            <th>Gaya Belajar</th>
                                            <th>Download Material</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($fm as $fma)
                                        <tr>
                                            <td>{{ $fma->nama_materi }}</td>
                                            <td>{{ $fma->jenis_materi }}</td>
                                            <td>{{ $fma->gaya_belajar }}</td>
                                            <td><a href="{{ route('downloadmateridosen.course', $fma->file_materi) }}">{{ $fma->file_materi }}</a></td>
                                            <td>
                                                
                                                <form class="my-1"
                                                action="{{ route('deletefile.materi', encrypt($fm[0]->id)) }}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus File Materi {{ $fma->nama_materi }} ?')">
                                                @csrf
                                                @method('delete')
                                                <div class="d-grid">
                                                    <button type="submit" class=" btn btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Hapus Matakuliah"><i class="fa fa-trash"></i></button>
                                                </div>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Materi</th>
                                            <th>Jenis Materi</th>
                                            <th>Gaya Belajar</th>
                                            <th>Download Material</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- #/ container -->
@endsection