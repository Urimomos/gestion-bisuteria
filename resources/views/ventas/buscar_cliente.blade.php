<x-layouts::master>
    <div class="p-4 md:p-8 max-w-4xl mx-auto">
        
        {{-- Alertas --}}
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-2xl shadow-sm text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-5 md:p-8 rounded-3xl shadow-xl border border-[#D4AF37]/20">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-2 text-center md:text-left">
                <h3 class="text-lg md:text-xl font-bold uppercase text-[#1A1A1A] tracking-tight">Iniciar Venta</h3>
                <a href="{{ route('clientes.create') }}" class="text-[10px] font-bold text-[#D4AF37] hover:underline uppercase tracking-widest">+ REGISTRAR NUEVO CLIENTE</a>
            </div>
            
            {{-- BOTÓN VENTA RÁPIDA --}}
            <div class="mb-8">
                <a href="{{ route('ventas.create', ['idcliente' => 1]) }}" 
                   class="flex flex-col md:flex-row items-center justify-center gap-2 w-full bg-[#D4AF37] text-white p-5 rounded-2xl font-bold shadow-lg hover:bg-[#B8962E] transition-all group">
                    <span class="tracking-widest uppercase text-xs md:text-sm text-center">Venta Público General</span>
                </a>
            </div>

            {{-- Línea divisoria --}}
            <div class="relative flex py-6 items-center">
                <div class="flex-grow border-t border-gray-100"></div>
                <span class="flex-shrink mx-4 text-gray-400 text-[10px] uppercase font-bold tracking-tighter">O buscar cliente</span>
                <div class="flex-grow border-t border-gray-100"></div>
            </div>

            {{-- BUSCADOR --}}
            <form action="{{ route('ventas.buscar') }}" method="GET" class="mb-8">
                <div class="flex flex-col md:flex-row gap-3">
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Nombre del cliente..." 
                           class="flex-1 bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm focus:ring-[#D4AF37] focus:border-[#D4AF37]">
                    <button type="submit" class="w-full md:w-auto bg-[#1A1A1A] text-[#FDF2D0] px-10 py-4 rounded-2xl font-bold hover:bg-black transition text-sm">
                        BUSCAR
                    </button>
                </div>
            </form>

            {{-- LISTADO DE RESULTADOS --}}
            <div class="space-y-3 max-h-[450px] overflow-y-auto pr-1">
                @forelse($clientes as $c)
                    <div class="flex flex-col sm:flex-row justify-between items-center p-5 border border-gray-50 hover:border-[#D4AF37]/40 hover:bg-[#FDF2D0]/10 rounded-2xl transition-all group gap-4 text-center sm:text-left">
                        <div class="w-full sm:w-auto">
                            <p class="font-bold text-[#1A1A1A] text-sm group-hover:text-black">{{ $c->nombre }} {{ $c->AP }} {{ $c->AM }}</p>
                            <p class="text-[10px] text-gray-400 italic mt-1">{{ $c->telefono ?? 'Sin teléfono' }} | {{ $c->email ?? 'Sin correo' }}</p>
                        </div>
                        
                        <a href="{{ route('ventas.create', ['idcliente' => $c->idcliente]) }}" 
                           class="w-full sm:w-auto bg-[#1A1A1A]/5 text-[#1A1A1A] border border-[#1A1A1A]/10 px-8 py-3 rounded-xl text-[10px] font-black hover:bg-[#D4AF37] hover:text-white hover:border-[#D4AF37] transition-all uppercase tracking-widest text-center">
                             SELECCIONAR
                        </a>
                    </div>
                @empty
                    <div class="text-center py-12 bg-gray-50/50 rounded-3xl border border-dashed border-gray-200">
                        <p class="text-gray-400 text-xs italic">No se encontraron clientes registrado.</p>
                        <a href="{{ route('clientes.create') }}" class="mt-4 inline-block text-[#D4AF37] text-[10px] font-bold underline uppercase tracking-widest">Crear cuenta nueva</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Script para apertura automática del ticket --}}
    @if(session('imprimir_ticket'))
        <script>
            const urlTicket = "{{ session('imprimir_ticket') }}";
            const nuevaVentana = window.open(urlTicket, '_blank');
            if(!nuevaVentana || nuevaVentana.closed || typeof nuevaVentana.closed=='undefined') { 
                alert('El ticket se bloqueó. Por favor, permite las ventanas emergentes.');
            }
        </script>
    @endif
</x-layouts::master>