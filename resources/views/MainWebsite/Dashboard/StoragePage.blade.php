@extends('Layout.AdminLayout')

@section('main')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Penyimpanan Berkas</h1>
            {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                For more information about DataTables, please visit the <a target="_blank"
                    href="https://datatables.net">official DataTables documentation</a>.</p> --}}
    
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mt-4 mx-auto" data-toggle="modal" data-target="#exampleModalCenter">
                    Upload Berkas
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Upload Berkas</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            {{-- Modal Section --}}
                            <div class="modal-body">

                                {{-- File Uploader --}}
                                <div class="container-fluid">
                                    <div class="row">
                                        <form action="/admin/penyimpanan" method="POST" enctype="multipart/form-data" style="width: 100%">
                                            @csrf
                                            <div class="fallback">
                                                <input name="File" type="file" id="File" />
                                            </div>
                                        
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                <button type="submit" class="btn btn-primary">Upload</button>
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
                                    <th>Nama File</th>
                                    <th>Jenis File</th>
                                    <th>Ukuran File</th>
                                    <th>Tanggal Upload</th>
                                    <th>Jam</th>
                                    <th>Detail</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama File</th>
                                    <th>Jenis File</th>
                                    <th>Ukuran File</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Detail</th>
                                    <th>Hapus</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($datas as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{!!Str::limit($data->FileName, 50, '...')!!}</td>
                                        <td>{{$data->FileType}}</td>
                                        <td>{{$data->FileSize}}</td>
                                        <td>{{date("Y-m-d", strtotime($data->created_at))}}</td>
                                        <td>{{date("H:i:s", strtotime($data->created_at))}}</td>
                                        <td>
                                            <button class="btn btn-primary">
                                                <a style="color: white; text-decoration: none" href="{{url("/admin/penyimpanan/{$data->FileName}")}}">Detail</a>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <form action="/admin/penyimpanan/{{$data->FileName}}" method="POST">
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