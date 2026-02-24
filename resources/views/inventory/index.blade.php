<x-layouts::master>
    <div class="p-6 lg:p-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-bold text-[#1A1A1A]">Catálogo de Inventario</h2>
                <p class="text-gray-600">Gestión de piezas y existencias disponibles.</p>
            </div>
            <a href="{{ route('inventory.create') }}" class="bg-[#D4AF37] text-white px-6 py-3 rounded-full font-bold shadow-md hover:bg-[#B8962E] transition-all">
                + NUEVA PIEZA
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-[#D4AF37]/20 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-[#FDF2D0]/50 border-b border-[#D4AF37]/20">
                    <tr>
                        <th class="p-4 text-xs font-bold uppercase tracking-widest">Imagen</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-widest">Producto</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-widest">Categoría</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-widest text-center">Stock</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-widest text-right">Costo</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-widest text-right">Precio</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-widest text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($productos as $producto)
                    <tr class="hover:bg-[#FDF2D0]/10 transition-colors">
                        <td class="p-4">
                            @if($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" class="size-12 rounded-lg object-cover border border-gray-200">
                            @else
                                <div class="size-12 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">🖼️</div>
                            @endif
                        </td>
                        <td class="p-4">
                            <div class="font-bold text-[#1A1A1A]">{{ $producto->nombre }}</div>
                            <div class="text-[10px] text-gray-400 uppercase italic">📍 {{ $producto->ubicacion ?? 'Sin ubicación' }}</div>
                        </td>
                        <td class="p-4">
                            <span class="text-sm text-gray-600 bg-gray-100 px-2 py-1 rounded-md">
                                {{ $producto->categoria ?? 'General' }}
                            </span>
                        </td>
                        <td class="p-4 text-center">
                            @if($producto->inventario <= 5)
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold">⚠️ {{ $producto->inventario }}</span>
                            @else
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">{{ $producto->inventario }}</span>
                            @endif
                        </td>
                        <td class="p-4 text-right text-gray-500 font-mono text-sm">${{ number_format($producto->precompra, 2) }}</td>
                        <td class="p-4 text-right font-bold text-[#D4AF37] font-mono">${{ number_format($producto->preventa, 2) }}</td>
                        <td class="p-4 text-center space-x-2">
                            <a href="{{ route('productos.edit', $producto->idproducto) }}" class="text-blue-600 hover:scale-125 transition-transform inline-block">✏️</a>
                            <form action="{{ route('productos.destroy', $producto->idproducto) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar esta pieza?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:scale-125 transition-transform">
                                    🗑️
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            @if($productos->isEmpty())
                <div class="p-12 text-center text-gray-400">
                    <p class="text-lg">No hay productos registrados aún.</p>
                </div>
            @endif
        </div>
    </div>
</x-layouts::master>