@extends('layouts.admin')

@section('title', 'Data Akademik')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Data Akademik</h3>
        <a href="{{ route('academic-data.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>
    <div class="card-body">
        <!-- Search Form -->
        <form action="{{ route('academic-data.index') }}" method="GET" class="row g-3 mb-3">
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama, NIM, atau prodi..." value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-3">
                <select name="fakultas" class="form-select">
                    <option value="">Fakultas</option>
                    @foreach($fakultasOptions as $key => $value)
                        <option value="{{ $key }}" {{ request('fakultas') == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="prodi" class="form-select">
                    <option value="">Prodi</option>
                    @foreach($prodiOptions as $key => $value)
                        <option value="{{ $key }}" {{ request('prodi') == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-filter"></i> Filter
                </button>
            </div>
        </form>

        <!-- Tabel Data -->
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Prodi</th>
                        <th>Fakultas</th>
                        <th>Angkatan</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($academicData as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->nim }}</td>
                            <td>{{ $data->prodi }}</td>
                            <td>{{ $data->fakultas }}</td>
                            <td>{{ $data->angkatan }}</td>
                            <td>{{ $data->email }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('academic-data.show', $data->id) }}" class="btn btn-outline-primary" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @can('edit data')
                                        <a href="{{ route('academic-data.edit', $data->id) }}" class="btn btn-outline-success" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('delete data')
                                        <form action="{{ route('academic-data.destroy', $data->id) }}" method="POST" style="display:inline"
                                              onsubmit="return confirm('Yakin menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        {{ $academicData->links() }}
    </div>
</div>
@endsection