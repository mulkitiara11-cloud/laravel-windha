@extends('layouts.app')

@section('content')
<div class="top-bar-sage">
    <h1>Dashboard</h1>
    <p>Selamat datang kembali, <strong>{{ Auth::user()->name }}</strong>.</p>
</div>

<div class="content-container">
    <!-- Statistics Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="stat-card blue">
                <h6>Total Mahasiswa</h6>
                <h2>{{ $totalMahasiswa }}</h2>
            </div>
        </div>
        <div class="col-md-6">
            <div class="stat-card green">
                <h6>Total Jurusan</h6>
                <h2>{{ $totalJurusan }}</h2>
            </div>
        </div>
    </div>

    <!-- Mahasiswa per Jurusan -->
    @if($jurusanStats->count() > 0)
    <div class="row mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Mahasiswa per Program Studi
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @foreach($jurusanStats as $stat)
                        <div class="col-md-4">
                            <div class="stats-breakdown">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1 fw-bold text-capitalize" style="font-size: 0.95rem; color: var(--colors-ink); letter-spacing: -0.2px;">{{ $stat->program_studi }}</h6>
                                        <small style="color: var(--colors-body); font-size: 0.78rem; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">Program Studi</small>
                                    </div>
                                    <h3 class="mb-0 fw-bold" style="color: var(--colors-primary); font-size: 1.75rem; letter-spacing: -0.5px;">{{ $stat->total }}</h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Mahasiswa Terbaru -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Mahasiswa Terbaru
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($mahasiswaTerbaru as $mhs)
                                <tr>
                                    <td><strong style="color: var(--colors-ink); font-weight: 700;">{{ $mhs->nama }}</strong></td>
                                    <td class="text-capitalize" style="color: var(--colors-body); font-weight: 500;">{{ $mhs->program_studi }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="text-center py-5">
                                        <i class="bi bi-inbox" style="font-size: 3rem; color: var(--colors-mute); opacity: 0.5;"></i>
                                        <p class="mt-3 mb-0" style="color: var(--colors-body); font-weight: 600;">Belum ada data mahasiswa</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
