@extends('layouts.master')
@section('title','Informasi Gaya Belajar')

@section('content')

<div class="container-fluid mt-3">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                   
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center">Informasi untuk dosen (rekomendasi) tentang Teknik Pengajaran sesuai gaya Belajar</h3>
                                </br>
                                <div class="row"  >
                                    <!-- <canvas id="radarChart" width="500" height="250"></canvas> -->
                                    <div class="col-12" style="display:flex; justify-content:center; align-items:center">
                                        <table class="table">
                                            <tr>
                                                <td class="font-weight-bold">Sensing</td>
                                                <td>Kegiatan mengajar lebih menekankan penyampaian penekanan informasi atau konten yang bersifat konkrit – faktual</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Intuitive</td>
                                                <td>Kegiatan mengajar lebih menekankan penyampaian penekanan informasi atau konten yang bersifat abstrak – koseptual, teoretis, imajiner dan bervariasi.</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Visual</td>
                                                <td>Kegiatan mengajar lebih diutamakan pada penekanan presentasi visual: video, gambar, demonstrasi, bagan, grafik</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Verbal</td>
                                                <td>Kegiatan mengajar lebih diutamakan pada penekanan presentasi verbal – ceramah, bacaan, diskusi.</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Active</td>
                                                <td>Kegiatan mengajar perlu mendorong dan memfasilitasi partisipasi mahasiswa untuk aktif – berbicara, bergerak dan berefleksi.</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Reflective</td>
                                                <td>Kegiatan mengajar perlu mendorong dan memfasilitasi partisipasi mahasiswa untuk refleksi – menonton, mendengarkan (pasif) tetapi tetap hidup. Gunakan aplikasi tambahan untuk membawa suasana kelas tetap hidup dan menarik: mentimeter.com, kahoot.com</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Sequential</td>
                                                <td>Teknik mengajar dilakukan dengan menyajikan informasi dalam perspektif berurutan.</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Global</td>
                                                <td>Teknik mengajar dilakukan dengan menyajikan informasi dalam perspektif global.</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
 </div>
 
@endsection
