@extends('layout.AdminLayout')

@section('main')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Ubah Akun</h1>
    {{-- <div class="card shadow mb-4"> --}}
     {{-- Create Account --}}
        <div class="container-fluid">
            <div class="row">
                <form action="/admin/akun/{{$datas->username}}" method="POST" enctype="multipart/form-data" style="width: 100%">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name"
                            placeholder="Masukkan Nama"  value="{{old('name', $datas->name)}}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" id="username" name="username"
                            placeholder="Masukkan Username" value="{{old('username', $datas->username)}}" required autofocus>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email"
                            placeholder="Masukkan Email" value="{{old('email', $datas->email)}}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password"
                            placeholder="Masukkan Password" value="{{old('password')}}" required autofocus>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>
                    {{-- <hr> --}}
            </div>
        </div>

    
    <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        <button type="submit" class="btn btn-primary">Ubah</button>
    </div>
    </form>
    {{-- </div> --}}
</div>
@endsection

