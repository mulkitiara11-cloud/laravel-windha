@extends('layouts.app')

@section('content')
<div class="top-bar-sage">
    <h1>Edit Data Mahasiswa</h1>
    <p>Form untuk mengubah data mahasiswa yang telah terdaftar</p>
</div>

<div class="content-container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Form Edit Mahasiswa
                </div>
                <div class="card-body">
                    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nim" class="form-label">NIM <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('nim') is-invalid @enderror" 
                                   id="nim" 
                                   name="nim" 
                                   value="{{ old('nim', $mahasiswa->nim) }}" 
                                   required>
                            @error('nim')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('nama') is-invalid @enderror" 
                                   id="nama" 
                                   name="nama" 
                                   value="{{ old('nama', $mahasiswa->nama) }}" 
                                   required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', $mahasiswa->email) }}"
                                   placeholder="contoh@email.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="program_studi" class="form-label">Program Studi <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('program_studi') is-invalid @enderror" 
                                   id="program_studi" 
                                   name="program_studi" 
                                   value="{{ old('program_studi', $mahasiswa->program_studi) }}" 
                                   required>
                            @error('program_studi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="semester" class="form-label">Semester <span class="text-danger">*</span></label>
                            <select class="form-select @error('semester') is-invalid @enderror" 
                                    id="semester" 
                                    name="semester" 
                                    required>
                                <option value="">Pilih Semester</option>
                                @for($i = 1; $i <= 14; $i++)
                                    <option value="{{ $i }}" {{ old('semester', $mahasiswa->semester) == $i ? 'selected' : '' }}>
                                        Semester {{ $i }}
                                    </option>
                                @endfor
                            </select>
                            @error('semester')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-3 mt-5">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save-fill me-2"></i> Update Data
                            </button>
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-warning">
                                <i class="bi bi-arrow-left me-2"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
