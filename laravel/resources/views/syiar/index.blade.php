@extends('layouts.app')

@section('content')
    <div class="app-container">
        <!-- Heading -->
        <header class="mb-5 text-center">
            <h1 class="fw-bold mb-2" style="color: #2b5c3f;">Assalamu'alaikum</h1>
            <p class="text-muted">Apa yang ingin Anda lakukan hari ini?</p>
        </header>

        <!-- Action Cards Grid -->
        <div class="row g-3">
            <div class="col-6">
                <a href="{{ route('syiar.start') }}" class="action-card p-3">
                    <div class="card-icon">🚀</div>
                    <div class="card-title">Mulai Syiar</div>
                    <div class="card-text">Sebarkan materi kebaikan</div>
                </a>
            </div>
            <div class="col-6">
                <a href="#" class="action-card p-3">
                    <div class="card-icon">📚</div>
                    <div class="card-title">Semua Konten</div>
                    <div class="card-text">Lihat seluruh materi</div>
                </a>
            </div>
            <div class="col-6">
                <a href="#" class="action-card p-3">
                    <div class="card-icon">❤️</div>
                    <div class="card-title">Favorit Saya</div>
                    <div class="card-text">Konten tersimpan Anda</div>
                </a>
            </div>
            <div class="col-6">
                <a href="#" class="action-card p-3">
                    <div class="card-icon">🔍</div>
                    <div class="card-title">Cari Konten</div>
                    <div class="card-text">Temukan materi syiar</div>
                </a>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-5 text-center">
            <p class="text-muted small">Powered by SyiarOS</p>
        </footer>
    </div>
@endsection
