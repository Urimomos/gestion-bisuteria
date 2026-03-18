<x-layouts::master>
    <div class="p-4 md:p-8 max-w-2xl mx-auto">
        <div class="mb-8 text-center md:text-left">
            <h2 class="text-2xl font-bold text-[#1A1A1A] tracking-tight">Nuevo Registro de Cliente</h2>
            <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Directorio Bisutería Zacatelco</p>
        </div>

        <form action="{{ route('clientes.store') }}" method="POST" class="bg-white p-6 md:p-8 rounded-[2.5rem] shadow-xl border border-[#D4AF37]/20">
            @csrf
            <div class="space-y-5">
                {{-- Nombre --}}
                <div>
                    <label class="block text-[10px] font-bold text-[#D4AF37] uppercase mb-2 ml-1 tracking-widest">Nombre(s) *</label>
                    <input type="text" name="nombre" 
                           class="w-full bg-[#FDF2D0]/20 border-gray-100 rounded-2xl p-4 text-sm focus:ring-[#D4AF37] focus:border-[#D4AF37]" 
                           placeholder="Ej. Ana María" 
                           oninput="this.value = this.value.replace(/[0-9]/g, '')" required>
                </div>

             
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[10px] font-bold text-[#D4AF37] uppercase mb-2 ml-1 tracking-widest">Apellido Paterno</label>
                        <input type="text" name="AP" 
                               class="w-full bg-[#FDF2D0]/20 border-gray-100 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]" 
                               oninput="this.value = this.value.replace(/[0-9]/g, '')" placeholder="Ej. García">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-[#D4AF37] uppercase mb-2 ml-1 tracking-widest">Apellido Materno</label>
                        <input type="text" name="AM" 
                               class="w-full bg-[#FDF2D0]/20 border-gray-100 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]" 
                               oninput="this.value = this.value.replace(/[0-9]/g, '')" placeholder="Ej. López">
                    </div>
                </div>

                {{-- Teléfono --}}
                <div>
                    <label class="block text-[10px] font-bold text-[#D4AF37] uppercase mb-2 ml-1 tracking-widest">Teléfono de Contacto</label>
                    <input type="text" name="telefono" 
                           class="w-full bg-[#FDF2D0]/20 border-gray-100 rounded-2xl p-4 text-sm font-mono focus:ring-[#D4AF37]" 
                           placeholder="246 123 4567">
                </div>

                {{-- Correo --}}
                <div>
                    <label class="block text-[10px] font-bold text-[#D4AF37] uppercase mb-2 ml-1 tracking-widest">Correo Electrónico</label>
                    <input type="email" name="email" 
                           class="w-full bg-[#FDF2D0]/20 border-gray-100 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]" 
                           placeholder="cliente@ejemplo.com">
                </div>
            </div>

            {{-- Botones --}}
            <div class="mt-10 flex flex-col-reverse md:flex-row gap-4">
                <a href="{{ route('clientes.index') }}" 
                   class="w-full md:flex-1 py-4 bg-gray-50 text-gray-400 rounded-2xl font-bold hover:bg-gray-100 transition-all text-center text-xs uppercase tracking-widest">
                    CANCELAR
                </a>
                <button type="submit" 
                        class="w-full md:flex-[2] bg-[#1A1A1A] text-[#FDF2D0] py-4 rounded-2xl font-bold shadow-xl hover:bg-black transition-all uppercase text-xs tracking-widest border border-black">
                    REGISTRAR CLIENTE
                </button>
            </div>
        </form>
    </div>
</x-layouts::master>