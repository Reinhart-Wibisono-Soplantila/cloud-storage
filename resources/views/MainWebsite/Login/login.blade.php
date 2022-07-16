@extends('Layout.LoginLayout')

@section('main')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        @if (session()->has('LoginError'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{session('LoginError')}}
                                </div>
                            @endif
                        <div class="row">
                            
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Log In</h1>
                                    </div>
                                    <form class="user" action="/" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user @error('username') is-invalid" @enderror name="username"
                                                id="username" aria-describedby="emailHelp"
                                                placeholder="Masukkan Username" autofocus required>
                                        </div>
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user  @error('password') is-invalid" @enderror" name="password"
                                                id="password" placeholder="Masukkan Password" autofocus required>
                                        </div>
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                        {{-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> --}}
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        {{-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> --}}
                                        <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection