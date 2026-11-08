@extends('layouts.admin')

@section('title', 'Form Data Akademik')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $academicData ?? '' ? 'Edit' : 'Tambah' }} Data Akademik</h3>
    </div>

    <form action="{{ $academicData ?? '' ? route('academic-data.update', $academicData) : route('academic-data.store') }}" method="POST">
        @csrf
        @if($academicData ?? '')
            @method('PUT')
        @endif

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                               value="{{ old('nama', $academicData->nama ?? '') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>NIM</label>
                        <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror"
                               value="{{ old('nim', $academicData->nim ?? '') }}" required>
                        @error('nim')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Prodi</label>
                        <input type="text" name="prodi" class="form-control @error('prodi') is-invalid @enderror"
                               value="{{ old('prodi', $academicData->prodi ?? '') }}" required>
                        @error('prodi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Fakultas</label>
                        <input type="text" name="fakultas" class="form-control @error('fakultas') is-invalid @enderror"
                               value="{{ old('fakultas', $academicData->fakultas ?? '') }}" required>
                        @error('fakultas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label>Angkatan</label>
                        <input type="number" name="angkatan" class="form-control @error('angkatan') is-invalid @enderror"
                               value="{{ old('angkatan', $academicData->angkatan ?? '') }}" min="2000" max="2030" required>
                        @error('angkatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $academicData->email ?? '') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3">{{ old('alamat', $academicData->alamat ?? '') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label>IPK</label>
                        <input type="number" step="0.01" min="0" max="4" name="ipk" class="form-control @error('ipk') is-invalid @enderror"
                               value="{{ old('ipk', $academicData->ipk ?? '') }}">
                        @error('ipk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('academic-data.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection