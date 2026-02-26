<x-layouts::master>
    <div class="p-6 lg:p-8 max-w-4xl mx-auto">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-[#1A1A1A]">Registro de Nuevo Producto</h2>
        </div>

        {{-- Mostrar errores si algo falla en la validación --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="bg-white p-8 rounded-3xl shadow-lg border border-[#D4AF37]/20">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    {{-- Nombre --}}
                    <div class="col-span-2">
                        <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Nombre de la Pieza</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" oninput="this.value = this.value.replace(/[0-9]/g, '')" class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37] focus:border-[#D4AF37]" placeholder="Ej. Collar de Perlas con Dije Dorado">
                    </div>

                    <div>
                       <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Categoría</label>
                       <input type="text" name="categoria" placeholder="Ej. Pulseras, Collares" oninput="this.value = this.value.replace(/[0-9]/g, '')"
                              class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37] focus:border-[#D4AF37]">
                   </div>
                   <div>
                       <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Ubicación en Tienda</label>
                       <input type="text" name="ubicacion" placeholder="Ej. Vitrina Principal, Estante 2" 
                              class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37] focus:border-[#D4AF37]">
                   </div>

                    {{-- Precompra (Costo) --}}
                    <div>
                        <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Costo (Precompra)</label>
                        <input type="number"
                        min="0" 
                        step="0.01" 
                        name="precompra" 
                        oninput="if(this.value < 0) this.value = 0;"
                        value="{{ old('precompra') }}" 
                        class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3" 
                        placeholder="0.00">
                    </div>

                    {{-- Preventa (Precio) --}}
                    <div>
                        <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Precio (Preventa)</label>
                        <input type="number" 
                        min="0"
                        oninput="if(this.value < 0) this.value = 0;"
                        step="0.01" 
                        name="preventa" 
                        value="{{ old('preventa') }}" 
                        class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3" 
                        placeholder="0.00">
                    </div>

                    {{-- Inventario (Stock) --}}
                    <div>
                        <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Stock Inicial (Inventario)</label>
                        <input type="number" 
                        min="0"
                        oninput="if(this.value < 0) this.value = 0;"
                        name="inventario" 
                        value="{{ old('inventario') }}" 
                        class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3" 
                        placeholder="0">
                    </div>

                    {{-- Imagen --}}
                    <div>
                        <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Foto del Producto</label>
                        <input type="file" name="imagen" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#1A1A1A] file:text-[#FDF2D0] hover:file:bg-black">
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('inventory.index') }}" class="px-6 py-3 text-gray-500 font-bold hover:text-gray-700 transition-colors">CANCELAR</a>
                    <button type="submit" class="bg-[#D4AF37] text-white px-10 py-3 rounded-full font-bold shadow-lg hover:bg-[#B8962E] transition-all transform hover:scale-105">
                        GUARDAR PRODUCTO
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layouts::master>