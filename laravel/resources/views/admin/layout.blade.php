<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - SyiarOS</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #2b5c3f;
            --primary-dark: #1f422d;
            --primary-light: #e8f0eb;
            --sidebar-width: 260px;
            --top-navbar-height: 60px;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: #f4f6f8;
            color: #2d3748;
            min-height: 100vh;
        }

        /* Top Navbar */
        .admin-navbar {
            height: var(--top-navbar-height);
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            z-index: 1030;
        }

        /* Sidebar */
        .admin-sidebar {
            width: var(--sidebar-width);
            background-color: #ffffff;
            border-right: 1px solid #e2e8f0;
            position: fixed;
            top: var(--top-navbar-height);
            bottom: 0;
            left: 0;
            z-index: 1020;
            transition: all 0.3s ease;
            overflow-y: auto;
        }

        /* Main Content wrapper */
        .admin-wrapper {
            margin-left: var(--sidebar-width);
            padding-top: var(--top-navbar-height);
            transition: all 0.3s ease;
            min-height: 100vh;
        }

        /* Sidebar menu items */
        .sidebar-heading {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #a0aec0;
            font-weight: 700;
            padding: 24px 20px 8px;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: #4a5568;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            border-radius: 8px;
            margin: 2px 12px;
        }

        .nav-link-custom i {
            font-size: 1.2rem;
            margin-right: 12px;
            color: #718096;
            transition: all 0.2s ease;
        }

        .nav-link-custom:hover {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }

        .nav-link-custom:hover i {
            color: var(--primary-color);
        }

        .nav-link-custom.active {
            background-color: var(--primary-color);
            color: #ffffff;
        }

        .nav-link-custom.active i {
            color: #ffffff;
        }

        /* Responsive styling */
        @media (max-width: 991.98px) {
            .admin-sidebar {
                margin-left: calc(-1 * var(--sidebar-width));
            }
            .admin-sidebar.show {
                margin-left: 0;
            }
            .admin-wrapper {
                margin-left: 0;
            }
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.4);
                z-index: 1010;
            }
            .sidebar-overlay.show {
                display: block;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar Overlay for mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg admin-navbar fixed-top px-3">
        <div class="container-fluid p-0">
            <!-- Sidebar toggle for mobile -->
            <button class="btn btn-light d-lg-none me-2" id="sidebarToggleBtn" type="button">
                <i class="bi bi-list fs-4"></i>
            </button>

            <!-- Brand Logo -->
            <a class="navbar-brand fw-bold d-flex align-items-center" href="#" style="color: var(--primary-color); font-size: 1.4rem;">
                <span class="me-2">🕌</span> SyiarOS
            </a>

            <!-- Right user profile menu -->
            <div class="ms-auto d-flex align-items-center">
                <div class="dropdown">
                    <a class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="bg-secondary rounded-circle text-white d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px; font-weight: 600;">
                            A
                        </div>
                        <span class="d-none d-sm-inline fw-semibold" style="font-size: 0.95rem;">Admin Syiar</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profil</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Pengaturan</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i> Keluar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Left Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="py-3">
            <nav class="nav flex-column">
                <!-- Dashboard link -->
                <a href="#" class="nav-link-custom {{ request()->routeIs('products.*') || request()->routeIs('journeys.*') || request()->routeIs('situations.*') ? '' : 'active' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>

                <!-- Master Data Section -->
                <div class="sidebar-heading">Master Data</div>
                <a href="{{ route('products.index') }}" class="nav-link-custom {{ request()->routeIs('products.*') ? 'active' : '' }}">
                    <i class="bi bi-box-seam"></i> Products
                </a>
                <a href="{{ route('journeys.index') }}" class="nav-link-custom {{ request()->routeIs('journeys.*') ? 'active' : '' }}">
                    <i class="bi bi-signpost-split"></i> Journeys
                </a>
                <a href="{{ route('situations.index') }}" class="nav-link-custom {{ request()->routeIs('situations.*') ? 'active' : '' }}">
                    <i class="bi bi-patch-question"></i> Situations
                </a>
                <a href="#" class="nav-link-custom">
                    <i class="bi bi-journal-bookmark"></i> Playbooks
                </a>
                <a href="#" class="nav-link-custom">
                    <i class="bi bi-file-earmark-richtext"></i> Assets
                </a>
                <a href="#" class="nav-link-custom">
                    <i class="bi bi-tags"></i> Categories
                </a>
                <a href="#" class="nav-link-custom">
                    <i class="bi bi-hash"></i> Tags
                </a>

                <!-- System Section -->
                <div class="sidebar-heading">System</div>
                <a href="#" class="nav-link-custom">
                    <i class="bi bi-gear"></i> Settings
                </a>
            </nav>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="admin-wrapper">
        <div class="container-fluid p-4">
            
            <!-- Flash Message Area -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-left: 4px solid #1f422d !important;">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-left: 4px solid #842029 !important;">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-left: 4px solid #842029 !important;">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Page Title Header -->
            <x-page-header :title="$__env->yieldContent('page-title', 'Dashboard')">
                @yield('page-actions')
            </x-page-header>

            <!-- Page Dynamic Content -->
            @yield('content')

        </div>
    </main>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Responsive Sidebar Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('adminSidebar');
            const toggleBtn = document.getElementById('sidebarToggleBtn');
            const overlay = document.getElementById('sidebarOverlay');

            if(toggleBtn) {
                toggleBtn.addEventListener('click', function () {
                    sidebar.classList.toggle('show');
                    overlay.classList.toggle('show');
                });
            }

            if(overlay) {
                overlay.addEventListener('click', function () {
                    sidebar.classList.remove('show');
                    overlay.classList.remove('show');
                });
            }
        });
    </script>
</body>
</html>
