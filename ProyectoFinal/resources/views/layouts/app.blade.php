<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Mi Aplicación')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

    <!-- Estilo usado para las datatables -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }
        .dark-mode .navbar {
            background-color: #1f1f1f !important;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Botón de modo oscuro -->
    <div class="container mt-2 text-end">
        <button id="darkModeToggle" class="btn btn-outline-dark">
            <i class="fas fa-moon"></i> <span id="toggleText">Modo Oscuro</span>
        </button>
    </div>

    <!-- Contenido Principal -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Libreria JQuery para poder usar las datatables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Libreria que hace interactivas las datatables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- Scripts adicionales -->
    @stack('scripts')

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggleButton = document.getElementById("darkModeToggle");
            const body = document.body;
            const toggleText = document.getElementById("toggleText");

            function updateButtonText() {
                if (body.classList.contains("dark-mode")) {
                    toggleText.textContent = "Modo Claro";
                    toggleButton.innerHTML = '<i class="fas fa-sun"></i>';
                } else {
                    toggleText.textContent = "Modo Oscuro";
                    toggleButton.innerHTML = '<i class="fas fa-moon"></i>';
                }
            }

            if (localStorage.getItem("dark-mode") === "enabled") {
                body.classList.add("dark-mode");
            }
            updateButtonText();

            toggleButton.addEventListener("click", function () {
                body.classList.toggle("dark-mode");
                if (body.classList.contains("dark-mode")) {
                    localStorage.setItem("dark-mode", "enabled");
                } else {
                    localStorage.setItem("dark-mode", "disabled");
                }
                updateButtonText();
            });
        });
    </script>
</body>
</html>
