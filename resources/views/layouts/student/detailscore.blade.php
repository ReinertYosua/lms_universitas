@extends('layouts.master')
@section('title','List Nilai')

@section('content')
<div class="container-fluid mt-3">
        <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('listcoursescore.mahasiswa') }}">List Matakuliah</a></li>
                        <li class="breadcrumb-item active"><a href="#">Detail Score</a></li>
                        
                    </ol>
                </div>
            </div>
            <!-- row -->
            @include("partial.successalert")
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="card-title">Detail Nilai Matakuliah {{ $detailscorefeedback[0]->kode_matakuliah." - ".$detailscorefeedback[0]->nama_matakuliah }} </h4>
                                    </div>
                                </div>
                                <!--  -->
                                <!-- <div class="table-responsive"> -->
                                    <table class="table table-striped table-bordered" id="">
                                        <thead>
                                            <tr>
                                                <th class="w-25">Sesi</th>
                                                <th class="w-25">Nilai</th>
                                                <th class="w-50">Feedback</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <tr>
                                                <td>1</td>
                                                <td>{{ $detailscorefeedback[0]->nilaisesi1 }}</td>
                                                <td>{{ $detailscorefeedback[0]->feedbacksesi1 }}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>{{ $detailscorefeedback[0]->nilaisesi2 }}</td>
                                                <td>{{ $detailscorefeedback[0]->feedbacksesi2 }}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>{{ $detailscorefeedback[0]->nilaisesi3 }}</td>
                                                <td>{{ $detailscorefeedback[0]->feedbacksesi3 }}</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>{{ $detailscorefeedback[0]->nilaisesi4 }}</td>
                                                <td>{{ $detailscorefeedback[0]->feedbacksesi4 }}</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>{{ $detailscorefeedback[0]->nilaisesi5 }}</td>
                                                <td>{{ $detailscorefeedback[0]->feedbacksesi5 }}</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>{{ $detailscorefeedback[0]->nilaisesi6 }}</td>
                                                <td>{{ $detailscorefeedback[0]->feedbacksesi6 }}</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>{{ $detailscorefeedback[0]->nilaisesi7 }}</td>
                                                <td>{{ $detailscorefeedback[0]->feedbacksesi7 }}</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>{{ $detailscorefeedback[0]->nilaisesi8 }}</td>
                                                <td>{{ $detailscorefeedback[0]->feedbacksesi8 }}</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>{{ $detailscorefeedback[0]->nilaisesi9 }}</td>
                                                <td>{{ $detailscorefeedback[0]->feedbacksesi9 }}</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>{{ $detailscorefeedback[0]->nilaisesi10 }}</td>
                                                <td>{{ $detailscorefeedback[0]->feedbacksesi10 }}</td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>{{ $detailscorefeedback[0]->nilaisesi11 }}</td>
                                                <td>{{ $detailscorefeedback[0]->feedbacksesi11 }}</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>{{ $detailscorefeedback[0]->nilaisesi12 }}</td>
                                                <td>{{ $detailscorefeedback[0]->feedbacksesi12 }}</td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td>{{ $detailscorefeedback[0]->nilaisesi13 }}</td>
                                                <td>{{ $detailscorefeedback[0]->feedbacksesi13 }}</td>
                                            </tr>
                                            <tr>
                                                <td>UTS</td>
                                                <td>{{ $detailscorefeedback[0]->nilaisesiUTS }}</td>
                                                <td>{{ $detailscorefeedback[0]->feedbacksesiUTS }}</td>
                                            </tr>
                                            <tr>
                                                <td>UAS</td>
                                                <td>{{ $detailscorefeedback[0]->nilaisesiUAS }}</td>
                                                <td>{{ $detailscorefeedback[0]->feedbacksesiUAS }}</td>
                                            </tr>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sesi</th>
                                                <th>Nilai</th>
                                                <th>Feedback</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

@endsection



