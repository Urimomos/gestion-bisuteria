<x-layouts::master>
    <div class="p-6 lg:p-8 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold text-[#1A1A1A] mb-8">Editar Producto: {{ $producto->nombre }}</h2>

        <form action="{{ route('productos.update', $producto->idproducto) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT') {{-- Requerido para actualizaciones en Laravel --}}
            
            <div class="bg-white p-8 rounded-3xl shadow-lg border border-[#D4AF37]/20">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label class="block text-sm font-bold mb-2 uppercase">Nombre de la Pieza</label>
                        <input type="text" name="nombre" value="{{ $producto->nombre }}" class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3">
                    </div>

                    <div>
                        <label class="block text-sm font-bold mb-2 uppercase text-red-600">Stock Actual (Inventario)</label>
                        <input type="number" name="inventario" value="{{ $producto->inventario }}" class="w-full bg-red-50 border-red-200 rounded-xl p-3 font-bold">
                    </div>

                    <div>
                        <label class="block text-sm font-bold mb-2 uppercase">Precio de Venta (Preventa)</label>
                        <input type="number" step="0.01" name="preventa" value="{{ $producto->preventa }}" class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3">
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <button type="submit" class="bg-[#1A1A1A] text-[#FDF2D0] px-10 py-3 rounded-full font-bold shadow-lg hover:scale-105 transition-all">
                        ACTUALIZAR Y REGISTRAR CAMBIO
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layouts::master>