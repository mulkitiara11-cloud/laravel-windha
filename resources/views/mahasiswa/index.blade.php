@extends('layouts.app')

@section('content')
<div class="top-bar-sage">
    <h1>Data Mahasiswa</h1>
    <p>Total Mahasiswa terdaftar: <strong>{{ $mahasiswas->count() }}</strong></p>
</div>

<div class="content-container">
    <div class="card">
        <div class="card-header">
            Daftar Semua Mahasiswa
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Filter -->
            <form method="GET" action="{{ route('mahasiswa.index') }}" class="mb-4">
                <div class="row g-3 align-items-center">
                    <div class="col-md-4">
                        <select name="program_studi" class="form-select" onchange="this.form.submit()">
                            <option value="">Semua Program Studi</option>
                            @foreach($programStudiList as $ps)
                                <option value="{{ $ps->program_studi }}" {{ request('program_studi') == $ps->program_studi ? 'selected' : '' }}>
                                    {{ ucwords($ps->program_studi) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @if(request('program_studi'))
                    <div class="col-md-2 col-6">
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary w-100 py-2" style="font-size: 0.8rem;">Reset Filter</a>
                    </div>
                    @endif
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Program Studi</th>
                            <th>Semester</th>
                            <th width="140" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mahasiswas as $index => $mahasiswa)
                            <tr>
                                <td class="fw-bold">{{ $index + 1 }}</td>
                                <td class="fw-bold" style="color: var(--colors-ink);">{{ $mahasiswa->nim }}</td>
                                <td class="fw-bold" style="color: var(--colors-ink);">{{ $mahasiswa->nama }}</td>
                                <td>{{ $mahasiswa->email ?? '-' }}</td>
                                <td class="text-capitalize">{{ $mahasiswa->program_studi }}</td>
                                <td class="fw-bold">{{ $mahasiswa->semester }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" 
                                           class="btn btn-sm btn-warning" title="Edit Data">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" 
                                              method="POST" 
                                              style="display: inline;"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus Data">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <i class="bi bi-inbox" style="font-size: 3rem; color: var(--colors-mute); opacity: 0.5;"></i>
                                    <p class="mt-3 mb-0" style="color: var(--colors-body); font-weight: 600;">
                                        @if(request('program_studi'))
                                            Tidak ada mahasiswa di program studi "{{ ucwords(request('program_studi')) }}"
                                        @else
                                            Belum ada data mahasiswa
                                        @endif
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
