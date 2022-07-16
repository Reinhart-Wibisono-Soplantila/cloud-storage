@extends('Layout.AdminLayout')

@section('main')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Berkas</h1>
    {{-- <div class="card shadow mb-4"> --}}
        <div class="container table-responsive">
            <table class=" table">
                <tr>
                    <th width="200px">Nama File</th>
                    <td>{{$datas->FileName}}</td>
                </tr>
                <tr>
                    <th width="200px">Jenis File</th>
                    <td>{{$datas ->FileType}}</td>
                </tr>
                <tr>
                    <th width="200px">Ukuran File</th>
                    <td>{{$datas->FileSize}}</td>
                </tr>
                <tr>
                    <th width="200px">Tanggal File di Upload</th>
                    <td>{{date("Y-m-d", strtotime($datas->created_at))}}</td>
                </tr>
                <tr>
                    <th width="200px">Jam File di Upload</th>
                    <td>{{date("H:i:s", strtotime($datas->created_at))}}</td>
                </tr>
            </table>
            <hr>
            <div class="form-group row">
                {{-- view button --}}
                <button class="btn btn-primary mx-2"><a style="color: white; text-decoration: none" href="{{url("/admin/detail/{$datas->FileName}")}}">Pratinjau</a></button>
                
                {{-- edit button --}}
                <button type="button" class="btn btn-primary mx2" data-toggle="modal" data-target="#exampleModalCenter">
                    Ganti Nama
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Ganti Nama</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            {{-- Modal Section --}}
                                <div class="modal-body">

                                    {{-- File Uploader --}}
                                    <div class="container-fluid">
                                        <div class="row">
                                            <form enctype="multipart/form-data" action="/admin/detail/{{$datas->FileName}}" method="POST" style="width: 100%">
                                            @method('PUT')
                                            @csrf
                                            <div class="fallback">
                                                <input class="@error('FileName') is-invalid @enderror" type="text" id="FileName" name="FileName" placeholder="Nama File">
                                                @error('FileName')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- download button --}}
                <button class="btn btn-primary mx-2"><a style="color: white; text-decoration: none" href="{{url("/admin/detail/{$datas->FileName}")}}">Download</a></button>
                
                {{-- delete button --}}
                <form action="/admin/penyimpanan/{{$datas->FileName}}" method="POST" class="mx-2">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus berkas ini?')">Hapus</button>
                </form>
            </div>
        </div>
    {{-- </div> --}}
</div>
@endsection

