<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bisutería Zacatelco</title>

    {{-- Carga de estilos y scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* FUERZA BRUTA: El fondo crema debe estar aquí */
        body { background-color: #FDF2D0 !important; margin: 0; padding: 0; }
        
        /* Sidebar blanco con borde dorado */
        ui-sidebar, [data-flux-sidebar] { 
            background-color: #ffffff !important; 
            border-right: 2px solid #D4AF37 !important; 
        }

        /* Texto negro para legibilidad */
        span, p, h2, h3, label { color: #1A1A1A !important; }
        
        /* Íconos negros */
        svg { stroke: #1A1A1A !important; }

        .text-red-600, .text-red-600 span {
            color: #dc2626 !important; /* Rojo intenso para el logout */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="min-h-screen antialiased">
    {{-- Aquí llamamos al sidebar que envuelve al contenido --}}
    <x-layouts::app.sidebar>
        {{ $slot }}
    </x-layouts::app.sidebar>

    @fluxScripts
</body>
</html>