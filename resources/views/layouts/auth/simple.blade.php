<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> {{-- Eliminamos la clase 'dark' para que el fondo crema se vea claro --}}
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-[#FDF2D0] antialiased font-sans text-zinc-900"> {{-- Fondo crema exacto de tu logo --}}
        <div class="flex min-h-screen flex-col items-center justify-center p-6">
            <div class="flex w-full max-w-sm flex-col gap-2">
                
                {{-- Contenedor principal (Tarjeta blanca) --}}
                <div class="w-full max-w-sm bg-white p-8 rounded-3xl shadow-2xl border-t-8 border-[#D4AF37] text-zinc-900">
                    {{ $slot }}
                </div>

                {{-- Pie de página sutil --}}
                <p class="text-center text-xs text-[#1A1A1A]/50 mt-4 uppercase tracking-widest">
                    &copy; {{ date('Y') }} {{ config('app.name') }}
                </p>
            </div>
        </div>
        @fluxScripts
    </body>
</html>