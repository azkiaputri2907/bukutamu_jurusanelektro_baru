@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('guest.landing') }}">Home</a></li>
                    <li class="breadcrumb-item active">Isi Buku Tamu</li>
                </ol>
            </nav>

            <div class="card shadow-lg border-0">
                <div class="card-header bg-poliban text-white py-3">
                    <h5 class="mb-0"><i class="fas fa-edit me-2"></i> Form Buku Tamu Digital</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('guest.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold text-muted small">Nomor Kunjungan (Auto)</label>
                                <input type="text" class="form-control bg-light" value="C0-{{ date('Ymd') }}-XXX" readonly>
                                <small class="text-info">*Dihasilkan otomatis setelah simpan</small>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold text-muted small">Waktu Kunjungan</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-calendar-day"></i></span>
                                    <input type="text" class="form-control bg-light" 
                                           value="{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}" 
                                           readonly>
                                </div>
                            </div>

                            <hr class="my-3">

                            <div class="col-md-12 mb-3">
                                <label class="fw-bold">NIM / NIP / NIK</label>
                                <div class="input-group">
                                    <span class="input-group-text text-primary"><i class="fas fa-id-card"></i></span>
                                    <input type="text" name="identitas_no" id="identitas_no" 
                                           class="form-control form-control-lg" 
                                           placeholder="Masukkan nomor identitas..." required>
                                    <button class="btn btn-primary px-4 fw-bold" type="button" id="btnCek">
                                        <i class="fas fa-search me-1"></i> CEK DATA
                                    </button>
                                </div>
                                <small class="text-muted">Gunakan tombol <strong>CEK DATA</strong> untuk memuat profil otomatis.</small>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="fw-bold">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Isi nama lengkap..." required>
                            </div>

<div class="col-md-12 mb-3">
    <label class="fw-bold">Program Studi / Instansi Asal</label>
    <select name="asal_instansi" id="asal_instansi" class="form-select" required>
        <option value="" selected disabled>-- Pilih Program Studi --</option>
        <option value="D3 Teknik Listrik">D3 Teknik Listrik</option>
        <option value="D3 Teknik Elektronika">D3 Teknik Elektronika</option>
        <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
        <option value="D4 Teknologi Rekayasa Otomasi">D4 Teknologi Rekayasa Otomasi</option>
        <option value="D4 Sistem Informasi Kota Cerdas">D4 Sistem Informasi Kota Cerdas</option>
        <option value="D4 Teknologi Rekayasa Pembangkit Energi">D4 Teknologi Rekayasa Pembangkit Energi</option>
        <option value="Lainnya / Instansi Luar">Lainnya / Instansi Luar</option>
    </select>
</div>
                            <div class="col-md-12 mb-3">
    <label class="fw-bold">Keperluan Kunjungan</label>
    <select name="keperluan" id="keperluan" class="form-select form-select-lg" required onchange="toggleKeperluanLainnya()">
        <option value="" selected disabled>-- Pilih Keperluan --</option>
        @foreach($keperluan_master as $k)
            <option value="{{ $k->keterangan }}">{{ $k->keterangan }}</option>
        @endforeach
        <option value="Lainnya">Lainnya (Sebutkan...)</option>
    </select>
</div>

<div class="col-md-12 mb-3" id="input_keperluan_lainnya" style="display: none;">
    <label class="fw-bold text-primary">Detail Keperluan Lainnya</label>
    <textarea name="keperluan_lainnya" id="keperluan_lainnya" class="form-control" rows="3" placeholder="Jelaskan keperluan Anda secara detail..."></textarea>
</div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-warning btn-lg fw-bold shadow-sm">
                                SIMPAN & LANJUT SURVEY <i class="fas fa-chevron-right ms-2"></i>
                            </button>
                            <a href="{{ route('guest.landing') }}" class="btn btn-link text-muted">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('btnCek').addEventListener('click', function() {
    let noId = document.getElementById('identitas_no').value;
    if(noId == "") {
        Swal.fire('Peringatan', 'Harap masukkan nomor identitas!', 'warning');
        return;
    }

    let btn = this;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
    btn.disabled = true;

    fetch(`{{ route('guest.check') }}?no_id=${noId}`)
        .then(response => response.json())
        .then(data => {
            btn.innerHTML = '<i class="fas fa-search me-1"></i> CEK DATA';
            btn.disabled = false;

            if(data) {
                document.getElementById('nama_lengkap').value = data.nama_lengkap;
                document.getElementById('asal_instansi').value = data.asal_instansi;
                Swal.fire('Berhasil!', 'Data ditemukan dan terisi otomatis.', 'success');
            } else {
                Swal.fire('Data Baru', 'Identitas tidak ditemukan. Silakan isi manual.', 'info');
            }
        });
});
</script>

<script>
function toggleKeperluanLainnya() {
    const selectKeperluan = document.getElementById('keperluan');
    const divLainnya = document.getElementById('input_keperluan_lainnya');
    const txtLainnya = document.getElementById('keperluan_lainnya');

    if (selectKeperluan.value === 'Lainnya') {
        divLainnya.style.display = 'block';
        txtLainnya.setAttribute('required', 'required');
        txtLainnya.focus();
    } else {
        divLainnya.style.display = 'none';
        txtLainnya.removeAttribute('required');
        txtLainnya.value = '';
    }
}
</script>

@endsection