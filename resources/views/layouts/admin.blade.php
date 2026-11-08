@extends('adminlte::page')

@section('css')
    {{-- AdminLTE v4 ships Bootstrap Icons by default; Font Awesome still used by views below --}}
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/js/all.min.js"></script>
@stop

@section('footer')
    <strong>Copyright &copy; 2026 Academic Portal</strong>
    <span class="float-end d-none d-sm-inline-block"><b>Version</b> 1.0.0</span>
@stop

@section('content_top_area')
    @if (session('success'))
        <div class="alert alert-success mb-0">{{ session('success') }}</div>
    @endif
@stop

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">@yield('title')</h1>
        <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
    </div>
@stop