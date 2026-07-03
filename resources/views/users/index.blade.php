@extends('layouts.app')

@section('content')
<div class="top-bar-sage">
    <h1>Data User</h1>
    <p>Informasi seluruh pengguna yang telah terdaftar: <strong>{{ $users->count() }}</strong></p>
</div>

<div class="content-container">
    <div class="card">
        <div class="card-header">
            Daftar Seluruh Pengguna
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $user)
                            <tr>
                                <td class="fw-bold">{{ $index + 1 }}</td>
                                <td class="fw-bold" style="color: var(--colors-ink);">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-5">
                                    <i class="bi bi-inbox" style="font-size: 3rem; color: var(--colors-mute); opacity: 0.5;"></i>
                                    <p class="mt-3 mb-0" style="color: var(--colors-body); font-weight: 600;">Belum ada data user</p>
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
