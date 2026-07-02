@extends('layouts.app')

@section('content')
    <div class="app-container">
        <!-- Back Button & Heading -->
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('syiar.index') }}" class="btn btn-light rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); text-decoration: none;">
                <span style="font-size: 1.2rem; line-height: 1; color: #2d3748;">&larr;</span>
            </a>
            <div>
                <h1 class="h3 fw-bold mb-1" style="color: #2b5c3f;">Mulai Syiar</h1>
                <p class="text-muted mb-0" style="font-size: 0.9rem;">Pilih produk yang akan dipromosikan</p>
            </div>
        </div>

        <!-- Product Cards Stack -->
        <div class="d-flex flex-column gap-3">
            @forelse($products as $product)
                <a href="{{ url('/syiar/situations/' . $product->slug) }}" class="text-decoration-none text-dark">
                    <div class="card border-0 shadow-sm rounded-4 p-4 position-relative overflow-hidden product-promotion-card" style="background: #ffffff; transition: all 0.2s ease;">
                        <h2 class="h5 fw-bold mb-2 text-dark" style="font-size: 1.1rem; color: #1a202c !important;">{{ $product->name }}</h2>
                        
                        @if($product->description)
                            <p class="text-muted small mb-0" style="font-size: 0.85rem; line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $product->description }}
                            </p>
                        @else
                            <p class="text-muted small mb-0 italic" style="font-size: 0.85rem;">No description available.</p>
                        @endif

                        <div class="mt-3">
                            <button class="btn btn-primary w-100 fw-semibold" style="background-color: #2b5c3f; border-color: #2b5c3f; border-radius: 12px;">
                                Pilih
                            </button>
                        </div>
                    </div>
                </a>
            @empty
                <div class="text-center py-5">
                    <div class="fs-4 mb-2">📦</div>
                    <div class="text-muted fw-bold">Belum ada produk aktif</div>
                    <p class="text-muted small">Hubungi admin untuk mendaftarkan dan mengaktifkan produk promosi.</p>
                </div>
            @endforelse
        </div>

        <!-- Footer -->
        <footer class="mt-5 text-center">
            <p class="text-muted small">Powered by SyiarOS</p>
        </footer>
    </div>

    <!-- Hover styles for promotion card -->
    <style>
        .product-promotion-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06) !important;
            border-left: 4px solid #2b5c3f !important;
            padding-left: calc(1.5rem - 4px) !important;
        }
    </style>
@endsection
