@extends('backend.layout.app')

@section('title', 'Orders Manager')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('content')
    
@endsection