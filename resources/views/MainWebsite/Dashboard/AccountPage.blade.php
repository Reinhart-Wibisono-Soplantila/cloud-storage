@extends('Layout.AdminLayout')

@section('main')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Pengaturan Akun</h1>
            {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                For more information about DataTables, please visit the <a target="_blank"
                    href="https://datatables.net">official DataTables documentation</a>.</p> --}}
    
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mt-4 mx-auto" data-toggle="modal" data-target="#exampleModalCenter">
                    Buat Akun
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Buat Akun</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            {{-- Modal Section --}}
                                <div class="modal-body">

                                    {{-- Create Account --}}
                                    <div class="container-fluid">
                                        <div class="row">
                                            <form action="/admin/akun" method="POST" enctype="multipart/form-data" style="width: 100%">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name"
                                                        placeholder="Masukkan Nama" value="{{old('name')}}" required autofocus>
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" id="username" name="username"
                                                        placeholder="Masukkan Username" value="{{old('username')}}" required autofocus>
                                                        @error('username')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email"
                                                        placeholder="Masukkan Email" value="{{old('email')}}" required autofocus>
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

                                </div>
                                <div class="modal-footer">
                                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                    <button type="submit" class="btn btn-primary">Buat</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal dibuat</th>
                                    <th>Tanggal diubah</th>
                                    <th>Ubah</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal dibuat</th>
                                    <th>Tanggal diubah</th>
                                    <th>Ubah</th>
                                    <th>Hapus</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($datas as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{!!Str::limit($data->name, 50, '...')!!}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{date("Y-m-d", strtotime($data->created_at))}}</td>
                                        <td>{{date("Y-m-d", strtotime($data->updated_at))}}</td>
                                        <td>
                                            <div class="text-center">
                                                <button class="btn btn-primary">
                                                    <a style="color: white; text-decoration: none" href="{{url("/admin/akun/{$data->username}/edit")}}">Ubah</a>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <form action="/admin/akun/{{$data->username}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus berkas ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
        </div>
        <!-- /.container-fluid -->
@endsection

@push('addon-style')
    <!-- Custom styles for this page -->
    <link href="{{URL::asset('Frontend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@push('addon-script')
        <!-- Page level plugins -->
        <script src="{{URL::asset('/Frontend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{URL::asset('/Frontend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        
        <!-- Page level custom scripts -->
        <script src="{{URL::asset('/Frontend/js/demo/datatables-demo.js')}}"></script>
@endpush