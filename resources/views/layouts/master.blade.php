<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bisutería Zacatelco</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Fondo crema base */
        body { background-color: #FDF2D0 !important; margin: 0; padding: 0; }
        
        /* Sidebar: Forzamos el blanco y el borde dorado */
        [data-flux-sidebar] { 
            background-color: #ffffff !important; 
            border-right: 2px solid #D4AF37 !important;
            height: 100vh !important;
        }

        /* Color de texto global para legibilidad */
        span, p, h2, h3, h4, label { color: #1A1A1A !important; }
        svg { stroke: #1A1A1A !important; }
        .text-red-600, .text-red-600 span { color: #dc2626 !important; }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="min-h-screen antialiased bg-[#FDF2D0]">

    {{-- HEADER SOLO PARA MÓVIL --}}
    {{-- La clase 'lg:hidden' asegura que NADA de esto exista en PC --}}
    <flux:header class="lg:hidden bg-white border-b-2 border-[#D4AF37] flex items-center px-4 py-2">
        <flux:sidebar.toggle icon="bars-3" class="text-[#1A1A1A]" />
        <flux:spacer />
        <span class="font-bold text-[#D4AF37] uppercase tracking-widest italic">ZACATELCO</span>
    </flux:header>

    {{-- SIDEBAR --}}
    {{-- x-layouts::app.sidebar ya debería tener la lógica de Flux --}}
    <x-layouts::app.sidebar />

    {{-- CONTENIDO PRINCIPAL --}}
    {{-- 'flux:main' ajusta automáticamente el margen izquierdo en PC --}}
    <flux:main class="p-4 md:p-8">
        <div class="w-full">
            {{ $slot }}
        </div>
    </flux:main>

    @fluxScripts
</body>
</html>