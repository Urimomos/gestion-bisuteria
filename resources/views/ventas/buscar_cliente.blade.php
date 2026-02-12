<x-layouts::master>
    <div class="p-6 lg:p-8 max-w-5xl mx-auto">
        
        {{-- Alertas de Error/Éxito --}}
        @if ($errors->any() || session('success'))
            <div class="mb-4">
                @if($errors->any())
                    <div class="p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-xl mb-2">
                        <ul class="list-disc ml-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('success'))
                    <div class="p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-xl">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            {{-- SECCIÓN A: BUSCAR CLIENTE --}}
            <div class="bg-white p-8 rounded-3xl shadow-lg border border-[#D4AF37]/20">
                <h3 class="text-xl font-bold mb-4 uppercase text-[#1A1A1A]">1. Buscar Cliente</h3>
                
                <form action="{{ route('ventas.buscar') }}" method="GET" class="mb-6">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Escribe nombre o apellido..." 
                           class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3 mb-2 focus:ring-[#D4AF37] focus:border-[#D4AF37]">
                    <button type="submit" class="w-full bg-[#D4AF37] text-white py-2 rounded-xl font-bold hover:bg-[#B8962E] transition">BUSCAR</button>
                </form>

                <div class="space-y-3 max-h-96 overflow-y-auto pr-2">
                    @forelse($clientes as $c)
                        <div class="flex justify-between items-center p-3 border-b border-gray-100 hover:bg-gray-50 rounded-lg transition">
                            <div class="flex-1">
                                <p class="font-bold text-gray-800">{{ $c->nombre }} {{ $c->AP }}</p>
                                <p class="text-xs text-gray-500">{{ $c->telefono ?? 'Sin teléfono' }}</p>
                            </div>
                            
                            <div class="flex items-center gap-2">
                                {{-- BOTÓN VENDER --}}
                                <a href="{{ route('ventas.create', ['idcliente' => $c->idcliente]) }}" 
                                   class="bg-[#1A1A1A] text-[#FDF2D0] px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-black transition">
                                     VENDER
                                </a>

                                {{-- BOTÓN EDITAR --}}
                                <flux:modal.trigger name="edit-cliente-{{ $c->idcliente }}">
                                    <button class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-md transition" title="Editar">
                                        <flux:icon.pencil-square variant="micro" />
                                    </button>
                                </flux:modal.trigger>

                                {{-- BOTÓN BORRAR (Solo Maestro) --}}
                                @if(auth()->user()->rol === 'maestro')
                                    <form action="{{ route('clientes.destroy', $c->idcliente) }}" method="POST" onsubmit="return confirm('¿Eliminar este cliente?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-red-500 hover:bg-red-50 rounded-md transition" title="Eliminar">
                                            <flux:icon.trash variant="micro" />
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>

                        {{-- MODAL DE EDICIÓN PARA CADA CLIENTE --}}
                        <flux:modal name="edit-cliente-{{ $c->idcliente }}" class="md:w-96">
                            <div class="space-y-6">
                                <div>
                                    <flux:heading size="lg">Editar Cliente</flux:heading>
                                    <flux:subheading>Actualiza la información de {{ $c->nombre }}</flux:subheading>
                                </div>

                                <form action="{{ route('clientes.update', $c->idcliente) }}" method="POST" class="space-y-4">
                                    @csrf
                                    @method('PUT')
                                    
                                    <flux:input label="Nombre(s)" name="nombre" value="{{ $c->nombre }}" 
                                                oninput="this.value = this.value.replace(/[0-9]/g, '')" required />
                                    
                                    <div class="grid grid-cols-2 gap-2">
                                        <flux:input label="Ap. Paterno" name="AP" value="{{ $c->AP }}" oninput="this.value = this.value.replace(/[0-9]/g, '')" />
                                        <flux:input label="Ap. Materno" name="AM" value="{{ $c->AM }}" oninput="this.value = this.value.replace(/[0-9]/g, '')" />
                                    </div>

                                    <flux:input label="Teléfono" name="telefono" value="{{ $c->telefono }}" />
                                    <flux:input label="Correo" name="email" value="{{ $c->email }}" />

                                    <div class="flex gap-2 justify-end mt-4">
                                        <flux:modal.close>
                                            <flux:button variant="ghost">Cancelar</flux:button>
                                        </flux:modal.close>
                                        <flux:button type="submit" variant="primary" class="bg-[#D4AF37]">Guardar Cambios</flux:button>
                                    </div>
                                </form>
                            </div>
                        </flux:modal>

                    @empty
                        <p class="text-center text-gray-400 py-4 italic">No se encontraron clientes.</p>
                    @endforelse
                </div>
            </div>

            {{-- SECCIÓN B: REGISTRO RÁPIDO --}}
            <div class="bg-[#1A1A1A] p-8 rounded-3xl shadow-lg text-[#FDF2D0]">
                <h3 class="text-xl font-bold mb-4 uppercase" style="color: #FDF2D0 !important; border-bottom: 1px solid rgba(212, 175, 55, 0.2); padding-bottom: 10px;">2. Nuevo Cliente</h3>
                
                <form action="{{ route('clientes.registrarRapido') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <div>
                        <label class="uppercase font-bold" style="color: #FDF2D0 !important;">Nombre(s)</label>
                        <input type="text" name="nombre" placeholder="Solo letras" 
                               oninput="this.value = this.value.replace(/[0-9]/g, '')"
                               pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$"
                               class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white focus:border-[#D4AF37]" required>
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="uppercase font-bold" style="color: #FDF2D0 !important;">Apellido P.</label>
                            <input type="text" name="ap" oninput="this.value = this.value.replace(/[0-9]/g, '')"
                                   class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white focus:border-[#D4AF37]">
                        </div>
                        <div>
                            <label class="uppercase font-bold" style="color: #FDF2D0 !important;">Apellido M.</label>
                            <input type="text" name="am" oninput="this.value = this.value.replace(/[0-9]/g, '')"
                                   class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white focus:border-[#D4AF37]">
                        </div>
                    </div>

                    <div>
                        <label class="uppercase font-bold" style="color: #FDF2D0 !important;">Teléfono</label>
                        <input type="text" name="telefono" placeholder="Ej. 2461234567" 
                               class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white focus:border-[#D4AF37]">
                    </div>

                    <div>
                        <label class="uppercase font-bold" style="color: #FDF2D0 !important;">Correo electrónico</label>
                        <input type="email" name="email" placeholder="cliente@correo.com" 
                               class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white focus:border-[#D4AF37]">
                    </div>
                    
                    <button type="submit" class="w-full bg-[#D4AF37] text-white py-3 rounded-xl font-bold mt-4 hover:bg-[#B8962E] transition shadow-lg">
                        REGISTRAR Y VENDER
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-layouts::master>