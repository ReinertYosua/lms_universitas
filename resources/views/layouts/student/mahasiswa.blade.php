@extends('layouts.master')
@section('title','Beranda Mahasiswa')

@section('content')

<div class="container-fluid mt-3">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                    @auth
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><h5>Selamat Datang, {{ Auth::user()->name }} </h5></a></li>
                    @endauth
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
                                    <div class="col-12" style="height:100vh; width:67vw; display:flex; justify-content:center; align-items:center">
                                        <canvas id="myChart" ></canvas>
                                    </div>
                                </div>

                               <div class="row">
                                    <div class="col-12">
                                        <table class="table">
                                                <tr>
                                                    <td>Gaya Belajar</td>
                                                    <td>Score</td>
                                                </tr>
                                                @if($scorejwb->v_active>0)
                                                <tr>
                                                    <td>Active</td>
                                                    <td>{{ $scorejwb->v_active }}</td>
                                                </tr>
                                                @endif
                                                @if($scorejwb->v_reflective>0)
                                                <tr>
                                                    <td>Reflective</td>
                                                    <td>{{ $scorejwb->v_reflective }}</td>
                                                </tr>
                                                @endif
                                                @if($scorejwb->v_sensing>0)
                                                <tr>
                                                    <td>Sensing</td>
                                                    <td>{{ $scorejwb->v_sensing }}</td>
                                                </tr>
                                                @endif
                                                @if($scorejwb->v_intuitive>0)
                                                <tr>
                                                    <td>Intuitive</td>
                                                    <td>{{ $scorejwb->v_intuitive }}</td>
                                                </tr>
                                                @endif
                                                @if($scorejwb->v_visual>0)
                                                <tr>
                                                    <td>Visual</td>
                                                    <td>{{ $scorejwb->v_visual }}</td>
                                                </tr>
                                                @endif
                                                @if($scorejwb->v_verbal>0)
                                                <tr>
                                                    <td>Verbal</td>
                                                    <td>{{ $scorejwb->v_verbal }}</td>
                                                </tr>
                                                @endif
                                                @if($scorejwb->v_sequential>0)
                                                <tr>
                                                    <td>Sequential</td>
                                                    <td>{{ $scorejwb->v_sequential }}</td>
                                                </tr>
                                                @endif
                                                @if($scorejwb->v_global>0)
                                                <tr>
                                                    <td>Global</td>
                                                    <td>{{ $scorejwb->v_global }}</td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td><b>Dominan : {{ $scorejwb->dominan }}</b></td>
                                                    <td><b>Level : {{ $scorejwb->level }}</b></td>
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
            <!-- #/ container -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
<script type="text/javascript">
    let ds={{ Js::from($sc) }};
    console.log(ds);
  const data = {
            labels: [
                'Active',
                'Reflective',
                'Sensing',
                'Intuitive',
                'Visual',
                'Verbal',
                'Sequential',
                'Global'
            ],
            datasets: [
                {
                    label: 'Gaya Belajar',
                    data: ds,
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    pointBackgroundColor: 'rgb(54, 162, 235)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(54, 162, 235)'
                    // backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    // borderColor: 'rgb(255, 99, 132)',
                    // pointBackgroundColor: 'rgb(255, 99, 132)',
                    // pointBorderColor: '#fff',
                    // pointHoverBackgroundColor: '#fff',
                    // pointHoverBorderColor: 'rgb(255, 99, 132)'
                }, 
                // {
                //     label: 'My Second Dataset',
                //     data: [28, 48, 40, 19, 96, 27, 100],
                //     fill: true,
                //     backgroundColor: 'rgba(54, 162, 235, 0.2)',
                //     borderColor: 'rgb(54, 162, 235)',
                //     pointBackgroundColor: 'rgb(54, 162, 235)',
                //     pointBorderColor: '#fff',
                //     pointHoverBackgroundColor: '#fff',
                //     pointHoverBorderColor: 'rgb(54, 162, 235)'
                // }
            ]
            };

            const config = {
            type: 'radar',
            data: data,
            options: {
                elements: {
                    line: {
                        borderWidth: 3
                    }
                },
                scale: {
                    min: 0,
                    max: 11,
                    stepSize:1
                },
            },
            };

        const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
</script>
@endsection
