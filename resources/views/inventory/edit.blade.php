<x-layouts::master>
    <div class="p-6 lg:p-8 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-[#1A1A1A]">Editar Pieza: {{ $producto->nombre }}</h2>

        <form action="{{ route('productos.update', $producto->idproducto) }}" method="POST" class="bg-white p-8 rounded-3xl shadow-lg border border-[#D4AF37]/20">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Nombre --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Nombre de la pieza</label>
                    <input type="text" name="nombre" value="{{ $producto->nombre }}" class="w-full border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37]" required>
                </div>

                {{-- NUEVO: Categoría --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Categoría</label>
                    <input type="text" name="categoria" value="{{ $producto->categoria }}" placeholder="Ej. Pulseras" class="w-full border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37]">
                </div>

                {{-- NUEVO: Ubicación --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Ubicación</label>
                    <input type="text" name="ubicacion" value="{{ $producto->ubicacion }}" placeholder="Ej. Vitrina A" class="w-full border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37]">
                </div>

                {{-- Stock --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Stock Actual</label>
                    <input type="number" name="inventario" value="{{ $producto->inventario }}" class="w-full border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37]" required>
                </div>

                {{-- Precio de Venta --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Precio de Venta</label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-gray-400">$</span>
                        <input type="number" step="0.01" name="preventa" value="{{ $producto->preventa }}" class="w-full pl-8 border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37]" required>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex gap-4">
                <button type="submit" class="flex-1 bg-[#D4AF37] text-white py-3 rounded-xl font-bold shadow-md hover:bg-[#B8962E] transition">
                    GUARDAR CAMBIOS
                </button>
                <a href="{{ route('inventory.index') }}" class="px-6 py-3 border border-gray-300 rounded-xl text-gray-600 font-bold hover:bg-gray-50 transition">
                    CANCELAR
                </a>
            </div>
        </form>
    </div>
</x-layouts::master>