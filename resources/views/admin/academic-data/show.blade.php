@extends('layouts.admin')

@section('title', 'Detail Data Akademik')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Detail Data Akademik</h3>
    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">Nama</dt><dd class="col-sm-9">{{ $academicData->nama }}</dd>
            <dt class="col-sm-3">NIM</dt><dd class="col-sm-9">{{ $academicData->nim }}</dd>
            <dt class="col-sm-3">Prodi</dt><dd class="col-sm-9">{{ $academicData->prodi }}</dd>
            <dt class="col-sm-3">Fakultas</dt><dd class="col-sm-9">{{ $academicData->fakultas }}</dd>
            <dt class="col-sm-3">Angkatan</dt><dd class="col-sm-9">{{ $academicData->angkatan }}</dd>
            <dt class="col-sm-3">Email</dt><dd class="col-sm-9">{{ $academicData->email }}</dd>
            <dt class="col-sm-3">Alamat</dt><dd class="col-sm-9">{{ $academicData->alamat ?? '-' }}</dd>
            <dt class="col-sm-3">IPK</dt><dd class="col-sm-9">{{ $academicData->ipk ?? '-' }}</dd>
        </dl>
    </div>
</div>
@stop