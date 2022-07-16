<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>
    @include('Includes.Dashboard.style')
    @stack('addon-style')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('Includes.Dashboard.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('Includes.Dashboard.topbar')
                @yield('main')
            </div>
            @include('Includes.Dashboard.footer')
        </div>
    </div>
    @include('Includes.Dashboard.feature')
    @include('Includes.Dashboard.script')
    @stack('addon-script')
</body>

</html>