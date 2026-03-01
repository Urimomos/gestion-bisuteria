<x-layouts::master>
    <div class="p-4 md:p-8 max-w-4xl mx-auto">
        <div class="mb-8 text-center md:text-left">
            <h2 class="text-2xl font-bold text-[#1A1A1A]">Editar Pieza</h2>
            <p class="text-[#D4AF37] font-bold italic">{{ $producto->nombre }}</p>
        </div>

        <form action="{{ route('productos.update', $producto->idproducto) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="bg-white p-6 md:p-8 rounded-3xl shadow-xl border border-[#D4AF37]/20">
                {{-- PREVISUALIZACIÓN DE IMAGEN ACTUAL --}}
                <div class="mb-8 flex flex-col items-center md:flex-row md:gap-6 border-b border-gray-100 pb-6">
                    <div class="shrink-0 mb-4 md:mb-0">
                        @if($producto->imagen)
                            <img src="{{ asset('storage/' . $producto->imagen) }}" class="size-32 rounded-3xl object-cover border-2 border-[#D4AF37]/20 shadow-md">
                        @else
                            <div class="size-32 bg-gray-50 rounded-3xl flex items-center justify-center text-4xl border-2 border-dashed border-gray-200">🖼️</div>
                        @endif
                    </div>
                    <div class="text-center md:text-left">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-2">Cambiar Foto</label>
                        <input type="file" name="imagen" class="text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-bold file:bg-[#1A1A1A] file:text-[#FDF2D0] cursor-pointer">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-6">
                    {{-- Nombre --}}
                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Nombre de la pieza</label>
                        <input type="text" name="nombre" 
                        oninput="this.value = this.value.replace(/[0-9]/g, '')"
                        value="{{ $producto->nombre }}" 
                               class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]" required>
                    </div>

                    {{-- Categoría --}}
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Categoría</label>
                        <input type="text" name="categoria" 
                        oninput="this.value = this.value.replace(/[0-9]/g, '')"
                        value="{{ $producto->categoria }} " 
                               placeholder="Ej. Pulseras" class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]">
                    </div>

                    {{-- Ubicación --}}
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Ubicación</label>
                        <input type="text" name="ubicacion" value="{{ $producto->ubicacion }}" 
                               placeholder="Ej. Vitrina A" class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]">
                    </div>

                    {{-- Stock --}}
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Stock Actual</label>
                        <input type="number" min="0" oninput="if(this.value < 0) this.value = 0;"
                               name="inventario" value="{{ $producto->inventario }}" 
                               class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]" required>
                    </div>

                    {{-- Precio de Venta --}}
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Precio de Venta</label>
                        <div class="relative">
                            <span class="absolute left-4 top-4 text-[#D4AF37] font-bold">$</span>
                            <input type="number" min="0" oninput="if(this.value < 0) this.value = 0;" step="0.01" 
                                   name="preventa" value="{{ $producto->preventa }}" 
                                   class="w-full pl-8 bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm font-bold focus:ring-[#D4AF37]" required>
                        </div>
                    </div>
                </div>

                {{-- Botones --}}
                <div class="mt-10 flex flex-col-reverse md:flex-row gap-4">
                    <a href="{{ route('inventory.index') }}" 
                       class="w-full md:flex-1 px-6 py-4 border border-gray-200 rounded-2xl text-gray-500 font-bold hover:bg-gray-50 transition text-center text-sm">
                        CANCELAR
                    </a>
                    <button type="submit" 
                            class="w-full md:flex-[2] bg-[#D4AF37] text-white py-4 rounded-2xl font-bold shadow-xl hover:bg-[#B8962E] transition-all uppercase text-sm tracking-widest">
                        GUARDAR CAMBIOS
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layouts::master>