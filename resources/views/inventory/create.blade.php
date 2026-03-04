<x-layouts::master>
    {{-- Ajustamos el padding para móvil (p-4) y quitamos el max-w fijo para que fluya mejor --}}
    <div class="p-4 md:p-8 max-w-4xl mx-auto">
        <div class="mb-8 text-center md:text-left">
            <h2 class="text-2xl font-bold text-[#1A1A1A]">Registro de Nuevo Producto</h2>
            <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Inventario Zacatelco</p>
        </div>

        {{-- Errores de validación --}}
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-2xl mb-6 shadow-sm">
                <p class="font-bold text-sm mb-2 italic">⚠️ Por favor corrige lo siguiente:</p>
                <ul class="list-disc list-inside text-xs space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="bg-white p-6 md:p-8 rounded-3xl shadow-xl border border-[#D4AF37]/20">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-6">
                    
                    {{-- Nombre (Ocupa todo el ancho siempre) --}}
                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Nombre de la Pieza</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" 
                               class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 focus:ring-[#D4AF37] focus:border-[#D4AF37] text-sm" 
                               placeholder="Ej. Collar de Perlas con Dije">
                    </div>

                    {{-- Categoría --}}
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Categoría</label>
                        <input type="text" name="categoria" placeholder="Ej. Pulseras" 
                               class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]">
                    </div>

                    {{-- Ubicación --}}
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Ubicación</label>
                        <input type="text" name="ubicacion" placeholder="Ej. Vitrina A" 
                               class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]">
                    </div>

                    {{-- Precompra --}}
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Costo (Compra)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-4 text-gray-400">$</span>
                            <input type="number" min="0" step="0.01" name="precompra" 
                                   oninput="if(this.value < 0) this.value = 0;"
                                   value="{{ old('precompra') }}" 
                                   class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 pl-8 text-sm focus:ring-[#D4AF37]" placeholder="0.00">
                        </div>
                    </div>

                    {{-- Preventa --}}
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Precio (Venta)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-4 text-[#D4AF37] font-bold">$</span>
                            <input type="number" min="0" step="0.01" name="preventa" 
                                   oninput="if(this.value < 0) this.value = 0;"
                                   value="{{ old('preventa') }}" 
                                   class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 pl-8 text-sm font-bold text-[#1A1A1A] focus:ring-[#D4AF37]" placeholder="0.00">
                        </div>
                    </div>

                    {{-- Stock --}}
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Stock Inicial</label>
                        <input type="number" min="0" name="inventario" value="{{ old('inventario') }}" 
                               oninput="if(this.value < 0) this.value = 0;"
                               class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]" placeholder="0">
                    </div>

                    {{-- Imagen --}}
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Foto</label>
                        <input type="file" name="imagen" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-bold file:bg-[#1A1A1A] file:text-[#FDF2D0] hover:file:bg-black cursor-pointer">
                    </div>
                </div>

                {{-- Botones: En móvil se apilan, en PC van lado a lado --}}
                <div class="mt-10 flex flex-col-reverse md:flex-row justify-end gap-4">
                    <a href="{{ route('inventory.index') }}" 
                       class="w-full md:w-auto px-8 py-4 text-center text-gray-400 font-bold hover:text-gray-600 transition-colors text-sm">
                        CANCELAR
                    </a>
                    <button type="submit" 
                            class="w-full md:w-auto bg-[#D4AF37] text-white px-10 py-4 rounded-2xl font-bold shadow-xl hover:bg-[#B8962E] transition-all uppercase text-sm tracking-widest">
                        GUARDAR PRODUCTO
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layouts::master>