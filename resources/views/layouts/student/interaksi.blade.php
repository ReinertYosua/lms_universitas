@extends('layouts.master')
@section('title','Graph Interaksi')

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
                                <div class="row"  >
                                    <!-- <canvas id="radarChart" width="500" height="250"></canvas> -->
                                    <div class="col-12" style="display:flex; justify-content:center; align-items:center">
                                        <img src="{{asset('storage')}}/general/graph_interaksi.png" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
 </div>
 
@endsection
