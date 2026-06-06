@extends('layouts.app')

@section('content')
    <div class="panel-header bg-success-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    <h5 class="text-white op-7 mb-2">Selamat Datang di SIMPEL, Sistem Manajemen Persuratan
                        Elektronik - Pegadaian Kantor Wilayah Pekanbaru</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="page-inner mt--5">
        <div class="row row-card-no-pd">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-primary card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-envelope-open"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Surat Masuk</p>
                                    <h4 class="card-title">{{ number_format($totalSuratMasuk) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Surat Keluar</p>
                                    <h4 class="card-title">{{ number_format($totalSuratKeluar) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-success card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-sticky-note"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Memo</p>
                                    <h4 class="card-title">{{ number_format($totalMemo) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-secondary card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Laporan</p>
                                    <h4 class="card-title">{{ number_format($totalLaporan) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Distribusi Arsip
                        </div>
                    </div>

                    <div class="card-body">
                        <canvas id="arsipChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Aktivitas Bulan Ini
                        </div>
                    </div>

                    <div class="card-body">
                        <canvas id="aktivitasChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            var arsipChart = document.getElementById('arsipChart').getContext('2d');

            new Chart(arsipChart, {
                type: 'pie',
                data: {
                    labels: [
                        'Surat Masuk',
                        'Surat Keluar',
                        'Memo'
                    ],
                    datasets: [{
                        data: [
                            {{ $totalSuratMasuk }},
                            {{ $totalSuratKeluar }},
                            {{ $totalMemo }}
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            var aktivitasChart = document.getElementById('aktivitasChart').getContext('2d');

            new Chart(aktivitasChart, {
                type: 'bar',
                data: {
                    labels: [
                        'Surat Masuk',
                        'Surat Keluar',
                        'Memo'
                    ],
                    datasets: [{
                        label: 'Bulan Ini',
                        data: [
                            {{ $suratMasukBulanIni }},
                            {{ $suratKeluarBulanIni }},
                            {{ $memoBulanIni }}
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                precision: 0
                            }
                        }]
                    }
                }
            });
        </script>
    @endpush
@endsection
