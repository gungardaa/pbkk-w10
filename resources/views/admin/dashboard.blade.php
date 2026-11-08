@extends('layouts.admin')

@section('title', auth()->user()->hasRole('admin') ? 'Admin Dashboard' : 'Staf Dashboard')

@section('content')
<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Pengguna</span>
                <span class="info-box-number">{{ $totalUsers }}</span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-database"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Data Akademik</span>
                <span class="info-box-number">{{ $totalAcademicData }}</span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-tag"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Peran</span>
                <span class="info-box-number">{{ $totalRoles }}</span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-key"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Hak Akses</span>
                <span class="info-box-number">{{ $totalPermissions }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Quick actions -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Aksi Cepat</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('academic-data.create') }}" class="btn btn-primary btn-block">
                            <i class="fas fa-plus"></i> Tambah Data Akademik
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('academic-data.index') }}" class="btn btn-success btn-block">
                            <i class="fas fa-list"></i> Lihat Semua Data
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('home') }}" class="btn btn-secondary btn-block">
                            <i class="fas fa-home"></i> Halaman Utama
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- User Role Info -->
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Informasi Peran Anda</h3>
            </div>
            <div class="card-body">
                <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><strong>Peran:</strong> 
                    @foreach(auth()->user()->getRoleNames() as $role)
                        <span class="badge bg-primary">{{ $role }}</span>
                    @endforeach
                </p>
                <p><strong>Hak Akses:</strong>
                    @foreach(auth()->user()->getAllPermissions() as $permission)
                        <span class="badge bg-success">{{ $permission->name }}</span>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</div>
@endsection