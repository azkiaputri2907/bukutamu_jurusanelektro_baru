<div class="list-group list-group-flush">
    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action bg-transparent">
        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
    </a>
    <a href="#" class="list-group-item list-group-item-action bg-transparent">
        <i class="fas fa-users me-2"></i>Data Pengunjung
    </a>
    <a href="#" class="list-group-item list-group-item-action bg-transparent">
        <i class="fas fa-book me-2"></i>Data Kunjungan
    </a>
    <a href="#" class="list-group-item list-group-item-action bg-transparent">
        <i class="fas fa-poll me-2"></i>Data Survey
    </a>

    {{-- Hanya muncul untuk Admin --}}
    @can('admin-only')
    <div class="px-3 mt-4 mb-1 text-muted small fw-bold">MASTER SETTINGS</div>
    <a href="#" class="list-group-item list-group-item-action bg-transparent text-primary">
        <i class="fas fa-user-shield me-2"></i>Data User
    </a>
    <a href="#" class="list-group-item list-group-item-action bg-transparent text-primary">
        <i class="fas fa-database me-2"></i>Master Pertanyaan
    </a>
    @endcan

    <a href="{{ route('guest.landing') }}" class="list-group-item list-group-item-action bg-transparent text-danger mt-5">
        <i class="fas fa-sign-out-alt me-2"></i>Logout
    </a>
</div>