<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Biblioteca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
        }
        .sidebar {
            background-color: #343a40;
            color: #fff;
            min-height: 100vh;
        }
        .sidebar a {
            color: #ffffff;
            display: block;
            margin: 10px 0;
            text-decoration: none;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                width: 200px;
                left: -200px;
                top: 0;
                bottom: 0;
                padding: 20px;
                transition: all 0.3s;
                z-index: 1000;
            }
            .sidebar.active {
                left: 0;
            }
            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }
            .overlay.active {
                display: block;
            }
        }
    </style>
</head>
<body class="d-flex flex-column flex-md-row">

    {{-- Sidebar --}}
    <div class="sidebar d-none d-md-block p-3">
        <h4>📚 Biblioteca</h4>
    </div>

    {{-- Responsive Sidebar Toggle --}}
    <div class="d-md-none p-2 bg-dark text-white d-flex justify-content-between align-items-center">
        <button class="btn btn-light btn-sm" id="toggleSidebar">☰ Menú</button>
        <span>Mi Biblioteca</span>
    </div>

    {{-- Sidebar móvil y overlay --}}
    <div class="sidebar p-3 d-md-none" id="mobileSidebar">
        <h4>📚 Biblioteca</h4>
    </div>
    <div class="overlay" id="overlay"></div>

    {{-- Contenido principal --}}
    <div class="main flex-grow-1 p-3">
        @yield('content')
    </div>

    {{-- JS para el sidebar en móvil --}}
    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('mobileSidebar');
        const overlay = document.getElementById('overlay');

        toggleBtn?.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        });

        overlay?.addEventListener('click', () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });
    </script>
</body>
</html>
