@extends('layouts.app')

@section('content')
<div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('{{ asset('front/images/bg_2.jpg') }}');"></div>
    <div class="contents order-2 order-md-1">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6">
                    <div class="form-block">
                        <div class="text-center mb-5">
                            <h3>Login</strong></h3>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group first">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Your Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Your Password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="submit" value="Log In" class="btn btn-block btn-primary">
                      <br> <br>
                            <div class="d-sm-flex mb-5 align-items-center">                               
                                    <span class="caption"> <a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password</a></span>                               
                                 
                             
                                <span class="ml-auto">
                                    <a href="{{ route('register') }}" class="">Sign up Account</a>
                                </span>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
