@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg border-0 text-center" style="border-radius: 20px;">
                <div class="card-body p-5">
                    <div class="mb-4">
                        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-check fa-3x"></i>
                        </div>
                    </div>
                    
                    <h2 class="fw-bold">Data Berhasil Dikirim!</h2>
                    <p class="text-muted">Terima kasih, data Anda telah tersimpan dengan aman di sistem kami.</p>

                    <div class="bg-light p-4 rounded-3 mb-4 border-dashed" style="border: 2px dashed #dee2e6;">
                        <span class="text-uppercase small fw-bold text-muted">Nomor Referensi Kunjungan:</span>
                        <h1 class="text-danger fw-bold mb-0">{{ $kunjungan->nomor_kunjungan }}</h1>
                        <small class="text-muted italic">*Simpan nomor ini untuk verifikasi</small>
                    </div>

                    <div class="text-start mb-4">
                        <h6 class="fw-bold border-bottom pb-2 mb-3"><i class="fas fa-file-alt me-2"></i>Detail Kunjungan</h6>
                        <div class="row mb-2">
                            <div class="col-4 text-muted small">WAKTU</div>
                            <div class="col-8 fw-bold small">{{ $kunjungan->hari_kunjungan }}, {{ \Carbon\Carbon::parse($kunjungan->tanggal)->format('d F Y') }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-muted small">NAMA PENGUNJUNG</div>
                            <div class="col-8 fw-bold small">{{ $kunjungan->pengunjung->nama_lengkap }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-muted small">IDENTITAS (NIM/NIP)</div>
                            <div class="col-8 fw-bold small">{{ $kunjungan->pengunjung->identitas_no }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-muted small">PROGRAM STUDI</div>
                            <div class="col-8 fw-bold small">{{ $kunjungan->pengunjung->asal_instansi }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-muted small">KEPERLUAN</div>
                            <div class="col-8 fw-bold small">{{ $kunjungan->keperluan }}</div>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ route('guest.survey', $kunjungan->id) }}" class="btn btn-primary btn-lg shadow fw-bold" style="border-radius: 12px;">
                            <i class="fas fa-poll-h me-2"></i>Isi Survey Kepuasan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; }
    .border-dashed { background-color: #f8f9fa !important; }
</style>
@endsection