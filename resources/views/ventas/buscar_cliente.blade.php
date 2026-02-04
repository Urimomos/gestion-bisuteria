<x-layouts::master>
    <div class="p-6 lg:p-8 max-w-5xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            {{-- SECCIÓN A: BUSCAR CLIENTE --}}
            <div class="bg-white p-8 rounded-3xl shadow-lg border border-[#D4AF37]/20">
                <h3 class="text-xl font-bold mb-4 uppercase" >1. Buscar Cliente</h3>
                <form action="{{ route('ventas.cliente') }}" method="GET" class="mb-6">
                    <input type="text" name="search" placeholder="Escribe nombre o apellido..." 
                           class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3 mb-2">
                    <button type="submit" class="w-full bg-[#D4AF37] text-white py-2 rounded-xl font-bold">BUSCAR</button>
                </form>

                <div class="space-y-3">
                    @foreach($clientes as $c)
                        <div class="flex justify-between items-center p-3 border-b border-gray-100">
                            <div>
                                <p class="font-bold text-gray-800">{{ $c->nombre }} {{ $c->AP }}</p>
                                <p class="text-xs text-gray-500">{{ $c->email ?? 'Sin correo' }}</p>
                            </div>
                            <a href="{{ route('ventas.create', ['idcliente' => $c->idcliente]) }}" 
                               class="bg-[#1A1A1A] text-[#FDF2D0] px-4 py-1 rounded-lg text-sm font-bold">
                                VENDER
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- SECCIÓN B: REGISTRO RÁPIDO --}}
            <div class="bg-[#1A1A1A] p-8 rounded-3xl shadow-lg text-[#FDF2D0]">
                <h3 class="text-xl font-bold mb-4 uppercase" style="color: #FDF2D0 !important; border-bottom: 1px solid rgba(212, 175, 55, 0.2); padding-bottom: 10px;">2. Nuevo Cliente</h3>
                <form action="{{ route('clientes.rapido') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="text" name="nombre" placeholder="Nombre(s)" class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white" required>
                    <div class="grid grid-cols-2 gap-2">
                        <input type="text" name="ap" placeholder="Apellido P." class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white">
                        <input type="text" name="am" placeholder="Apellido M." class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white">
                    </div>
                    <input type="text" name="telefono" placeholder="Teléfono" class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white">
                    <input type="email" name="email" placeholder="Correo electrónico" class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white">
                    
                    <button type="submit" class="w-full bg-[#D4AF37] text-white py-3 rounded-xl font-bold mt-4">
                        REGISTRAR Y VENDER
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-layouts::master>