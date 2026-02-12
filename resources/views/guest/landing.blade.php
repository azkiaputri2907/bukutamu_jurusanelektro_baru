@extends('layouts.app')

@section('content')
<style>
    /* Hero Section Custom */
    .hero-gradient {
        background: linear-gradient(135deg, #003366 0%, #00509d 100%);
        color: white;
        padding: 100px 0;
        margin-top: -24px; /* Menghapus gap dengan navbar */
    }
    .org-card {
        border: none;
        border-top: 5px solid #ffc107;
        transition: transform 0.3s;
    }
    .org-card:hover {
        transform: translateY(-10px);
    }
    .step-icon {
        width: 60px;
        height: 60px;
        line-height: 60px;
        background: #003366;
        color: white;
        border-radius: 50%;
        display: inline-block;
        margin-bottom: 15px;
    }
</style>

<div class="hero-gradient mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="display-4 fw-bold mb-3">Selamat Datang di Jurusan Teknik Elektro</h1>
                <p class="lead mb-4">Sistem Buku Tamu Digital Politeknik Negeri Banjarmasin. Silakan catat kunjungan Anda untuk mendukung peningkatan kualitas pelayanan kami.</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('guest.form') }}" class="btn btn-warning btn-lg px-4 fw-bold shadow">
                        <i class="fas fa-pen-nib me-2"></i>Isi Buku Tamu
                    </a>
                    <a href="#struktur" class="btn btn-outline-light btn-lg px-4">Struktur Organisasi</a>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block text-center">
                <i class="fas fa-user-check fa-10x opacity-25"></i>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row mb-5 text-center">
        <div class="col-md-10 mx-auto">
            <h2 class="fw-bold">Pelayanan Terintegrasi</h2>
            <p class="text-muted">Jurusan Teknik Elektro POLIBAN berkomitmen untuk mencetak tenaga profesional dibidang Kelistrikan dan Informatika melalui transparansi pelayanan administrasi dan akademik.</p>
        </div>
    </div>

    <section id="struktur" class="mb-5 py-4">
        <div class="text-center mb-5">
            <h3 class="fw-bold border-bottom d-inline-block pb-2">Struktur Organisasi</h3>
        </div>
        
        <div class="row justify-content-center mb-4 text-center">
            <div class="col-md-4">
                <div class="card org-card shadow-sm p-3">
                    <div class="card-body">
                        <i class="fas fa-user-tie fa-3x mb-3 text-primary"></i>
                        <h5 class="fw-bold mb-1">Ketua Jurusan</h5>
                        <p class="text-muted mb-0">H. Fulan, M.T.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center g-4 text-center">
            <div class="col-md-4">
                <div class="card org-card shadow-sm p-3">
                    <div class="card-body">
                        <i class="fas fa-user-edit fa-3x mb-3 text-primary"></i>
                        <h5 class="fw-bold mb-1">Sekretaris Jurusan</h5>
                        <p class="text-muted mb-0">Hj. Fulana, M.Kom</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card org-card shadow-sm p-3">
                    <div class="card-body">
                        <i class="fas fa-users-cog fa-3x mb-3 text-primary"></i>
                        <h5 class="fw-bold mb-1">Koordinator Prodi</h5>
                        <p class="text-muted mb-0">Seluruh Ketua Program Studi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="row text-center g-4">
            <div class="col-md-4">
                <div class="step-icon"><i class="fas fa-id-card"></i></div>
                <h5>1. Isi Identitas</h5>
                <p class="small text-muted">Input NIM/NIP/NIK. Data akan muncul otomatis jika sudah pernah berkunjung.</p>
            </div>
            <div class="col-md-4">
                <div class="step-icon"><i class="fas fa-clipboard-check"></i></div>
                <h5>2. Catat Kunjungan</h5>
                <p class="small text-muted">Nomor kunjungan otomatis (C0-YYYYMMDD-XXX) dan isi keperluan Anda.</p>
            </div>
            <div class="col-md-4">
                <div class="step-icon"><i class="fas fa-star"></i></div>
                <h5>3. Survei Kepuasan</h5>
                <p class="small text-muted">Berikan penilaian terhadap aspek pelayanan, petugas, dan sarana kami.</p>
            </div>
        </div>
    </section>
</div>

<footer class="bg-dark text-white py-4 mt-5">
    <div class="container text-center">
        <p class="mb-1">&copy; 2026 Jurusan Teknik Elektro Politeknik Negeri Banjarmasin</p>
        <small class="text-muted">Jl. Brigjen H. Hasan Basri, Banjarmasin, Kalimantan Selatan</small>
    </div>
</footer>
@endsection