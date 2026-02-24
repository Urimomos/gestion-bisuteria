<x-layouts::master>
    <div class="p-6 lg:p-8 max-w-4xl mx-auto">
        
        {{-- Alertas --}}
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-8 rounded-3xl shadow-xl border border-[#D4AF37]/20">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold uppercase text-[#1A1A1A]">Seleccionar Cliente para Venta</h3>
                {{-- Botón opcional por si olvidaron registrarlo antes --}}
                <a href="{{ route('clientes.create') }}" class="text-xs font-bold text-[#D4AF37] hover:underline">+ REGISTRAR NUEVO</a>
            </div>
            
            <form action="{{ route('ventas.buscar') }}" method="GET" class="mb-8">
                <div class="flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Buscar por nombre o apellidos..." 
                           class="flex-1 bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-xl p-4 focus:ring-[#D4AF37] focus:border-[#D4AF37]">
                    <button type="submit" class="bg-[#1A1A1A] text-[#FDF2D0] px-8 rounded-xl font-bold hover:bg-black transition">
                        BUSCAR
                    </button>
                </div>
            </form>

            <div class="space-y-3 max-h-[500px] overflow-y-auto pr-2">
                @forelse($clientes as $c)
                    <div class="flex justify-between items-center p-4 border border-gray-100 hover:border-[#D4AF37]/50 hover:bg-[#FDF2D0]/10 rounded-2xl transition-all group">
                        <div>
                            <p class="font-bold text-gray-800 group-hover:text-[#1A1A1A]">{{ $c->nombre }} {{ $c->AP }} {{ $c->AM }}</p>
                            <p class="text-xs text-gray-500 italic">{{ $c->telefono ?? 'Sin teléfono' }} | {{ $c->email ?? 'Sin correo' }}</p>
                        </div>
                        
                        <a href="{{ route('ventas.create', ['idcliente' => $c->idcliente]) }}" 
                           class="bg-[#D4AF37] text-white px-6 py-2 rounded-xl text-sm font-bold hover:bg-[#B8962E] shadow-sm transition">
                             SELECCIONAR
                        </a>
                    </div>
                @empty
                    <div class="text-center py-10">
                        <p class="text-gray-400 italic">No se encontraron clientes con ese nombre.</p>
                        <a href="{{ route('clientes.create') }}" class="mt-4 inline-block text-[#D4AF37] font-bold underline">Registrar cliente nuevo aquí</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts::master>