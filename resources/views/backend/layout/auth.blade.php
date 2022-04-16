<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cargo | @yield('title')</title>   
        <link rel="icon" type="image/x-icon" href="{{asset('/')}}backend/assets/img/favicon.png"> 
        @toastr_css    

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('/')}}backend/assets/css/adminlte.min.css">  
        
        <style>
            .form-control.is-invalid, .was-validated .form-control:invalid{
                background:none
            }
        </style>
    </head>
    <body class="hold-transition login-page">
        @yield('content')

        <!-- jQuery -->
        <script src="{{asset('/')}}backend/assets/plugin/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('/')}}backend/assets/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('/')}}backend/assets/js/adminlte.min.js"></script>
        @toastr_js
        @toastr_render
    </body>
</html>
