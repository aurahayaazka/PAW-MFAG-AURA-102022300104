@extends('app')

@section('title', 'Dashboard Mahasiswa')

@section('content')
    <div class="row justify-content-center mt-5 mt-lg-7">
        <div class="col-xl-10">
            <div class="bg-white rounded-4 shadow p-5 d-flex flex-column flex-lg-row align-items-center">
                <!-- Icon -->
                <div class="bg-grey rounded-circle d-flex align-items-center justify-content-center me-lg-5 mb-4 mb-lg-0 shadow" style="width: 200px; height: 200px; overflow: hidden;">
                    <!-- ==================4================== -->
                    <!-- Tampilkan logo profil -->
                    <img src="{{ asset('images/logo-ead.png') }}" alt="Logo EAD" style="max-width: 80%; max-height: 80%;">
                </div>
                <!-- Text Content -->
                <div class="text-center text-lg-start">
                    <!-- ==================5================== -->
                    <!-- Tampilkan salam dan nama -->
                    <h1 class="fw-bold display-5 mb-2">{{ $salam }}, <span class="text-primary">{{ $nama }}</span>!</h1>
                    <p class="lead text-muted mb-4">Selamat datang di dashboard mahasiswa {{ $nama }}</p>

                    <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-lg-start gap-4 fs-5 text-muted">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-clock me-2 text-primary"></i>
                            <!-- ==================6================== -->
                            <!-- Tampilkan Waktu -->
                            <span>Waktu akses: <strong class="text-dark">{{ $jam }} WIB</strong></span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-calendar-event me-2 text-primary"></i>
                            <!-- ==================7================== -->
                            <!-- Tampilkan Tanggal -->
                            <span>Tanggal akses: <strong class="text-dark">{{ $tanggal }}</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
