@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-5">
            <div class="text-center mb-4">
                <i class="fas fa-user-shield fa-4x text-primary mb-3"></i>
                <h3 class="fw-bold">Login Internal</h3>
                <p class="text-muted">Khusus Admin & Ketua Jurusan Teknik Elektro</p>
            </div>
            
            <div class="card border-0 shadow-lg p-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                            </div>
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg shadow">
                                Sign In <i class="fas fa-sign-in-alt ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ url('/') }}" class="text-decoration-none text-muted"><i class="fas fa-arrow-left me-1"></i> Kembali ke Halaman Utama</a>
            </div>
        </div>
    </div>
</div>
@endsection