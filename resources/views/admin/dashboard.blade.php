@extends('layouts.app')

@section('content')
<div class="container-fluid text-dark">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card border-start border-primary border-4 shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="small fw-bold text-primary text-uppercase mb-1">Total Pengunjung</div>
                    <div class="h3 mb-0 fw-bold text-gray-800">{{ $stats['total_tamu'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-start border-success border-4 shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="small fw-bold text-success text-uppercase mb-1">Tamu Hari Ini</div>
                    <div class="h3 mb-0 fw-bold text-gray-800">{{ $stats['tamu_hari_ini'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-start border-warning border-4 shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="small fw-bold text-warning text-uppercase mb-1">Rata-rata Kepuasan</div>
                    <div class="h3 mb-0 fw-bold text-gray-800">{{ number_format($stats['rata_rata_puas'], 1) }} / 5.0</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white fw-bold">Tren Kunjungan 7 Hari Terakhir</div>
                <div class="card-body">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-5 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white fw-bold">Skor per Aspek Survey</div>
                <div class="card-body">
                    <canvas id="radarChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // 1. Line Chart
    new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: {
            labels: [@foreach($grafik as $g) "{{ $g->tanggal }}", @endforeach],
            datasets: [{
                label: 'Jumlah Kunjungan',
                data: [@foreach($grafik as $g) {{ $g->jumlah }}, @endforeach],
                borderColor: '#3498db',
                tension: 0.3,
                fill: true,
                backgroundColor: 'rgba(52, 152, 219, 0.1)'
            }]
        },
        options: { scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } } }
    });

    // 2. Radar Chart
    new Chart(document.getElementById('radarChart'), {
        type: 'radar',
        data: {
            labels: ['P1', 'P2', 'P3', 'P4', 'P5'],
            datasets: [{
                label: 'Skor Rata-rata',
                data: [{{ $avg_aspek->p1 ?? 0 }}, {{ $avg_aspek->p2 ?? 0 }}, {{ $avg_aspek->p3 ?? 0 }}, {{ $avg_aspek->p4 ?? 0 }}, {{ $avg_aspek->p5 ?? 0 }}],
                backgroundColor: 'rgba(231, 76, 60, 0.2)',
                borderColor: '#e74c3c',
                pointBackgroundColor: '#e74c3c'
            }]
        },
        options: { scales: { r: { suggestMin: 0, suggestMax: 5 } } }
    });
</script>
@endsection