<!-- Begin Page Content -->
@extends('Layout.AdminLayout')

@section('main')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        
    </div>



    <!-- Content Row -->
    <div class="row">

        <div class="mb-4 w-100 p-3">
            <div class="card shadow mb-4"> 
                <div class="card-body">
                    <div class="text-center">
                            <h1>Selamat Datang di Website Penyimpanan berkas</h1> <br><br>
                            <p>Web ini digunakan sebagai tempat untuk menyimpan berkas-berkas</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

@push('addon-script')
    <!-- Page level plugins -->
    <script src="{{URL::asset('/Frontend/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{URL::asset('/Frontend/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{URL::asset('/Frontend/js/demo/chart-pie-demo.js')}}"></script>
@endpush