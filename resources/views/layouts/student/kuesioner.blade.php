@extends('auth.headerauth.masterauth')
@section('titleauth','Kuesioner Gaya Belajar')
@section('contenauth')

<div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-8">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                    
                                    <a class="text-center" href="/"> <h4>Quiz Gaya Belajar</h4></a>
                                @include('partial.dangeralert')
                                <form class="mt-5 mb-5 login-input" action="{{ route('kuesioner.store') }}" method="post">
                                    @csrf
                                    <table class="table" border="1px solid black" width="100%">
                                        @foreach($quiz as $q)
                                        <tr>
                                            <td>{{ $q->id }}</td>
                                            <td>
                                                {{ $q->soal }} 
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input style="cursor: pointer;" class="form-check-input" type="radio" value="1" name="{{ $q->kode_kuis }}" id="{{ $q->pil1 }}" required>
                                                    <label style="cursor: pointer;" class="form-check-label" for="{{ $q->pil1 }}">
                                                        {{ $q->pil1 }}
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input style="cursor: pointer;" class="form-check-input" type="radio" value="0" name="{{ $q->kode_kuis }}" id="{{ $q->pil2 }}" required>
                                                    <label style="cursor: pointer;" class="form-check-label" for="{{ $q->pil2 }}">
                                                        {{ $q->pil2 }}
                                                    </label>
                                                </div>
                                            </td>
                                        
                                        </tr>
                                        @endforeach
                                    </table>
                                    <input type="submit" value="Submit" class="btn login-form__btn submit w-100">
                                    <!-- <button class="btn login-form__btn submit w-100">Sign in</button> -->
                                </form>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection