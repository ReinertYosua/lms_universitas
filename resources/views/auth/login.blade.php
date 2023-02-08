@extends('auth.headerauth.masterauth')
@section('titleauth','Login')
@section('contenauth')
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            @include("partial.successalert")
                            @include('partial.dangeralert')
                            <div class="card-body pt-5">
                            <img class="rounded mx-auto d-block" src="{{asset('images')}}/logo-utama.png" alt="">
        
                                <form method="post" action="{{ url('login/proses') }}" class="mt-5 mb-5 login-input">
                                    @csrf
                                    <div class="form-group">
                                        <input autofocus type="email" class="form-control 
                                        @error('email')
                                            is-invalid
                                        @enderror
                                        " placeholder="Email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group">
                                        <input type="password" class="form-control
                                        @error('password')
                                            is-invalid
                                        @enderror
                                        " placeholder="Password" name="password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                   
                                    <button class="btn login-form__btn submit w-100">Sign In</button>
                                </form>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6 text-center">
                                        <a href="/registrationdosen" class="btn mb-1 btn-outline-info">Sign Up as Lecturer</a>
                                        </div>
                                        <div class="col-6 text-center">
                                            <a href="/registrationmahasiswa" class="btn mb-1 btn-outline-info">Sign Up as Student</a>
                                        
                                        </div>
                                    </div>
                                </div>
                                <!-- <p class="mt-5 login-form__footer">Dont have account? <a href="/register" class="text-primary">Sign Up as Lecturer</a></p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    

  