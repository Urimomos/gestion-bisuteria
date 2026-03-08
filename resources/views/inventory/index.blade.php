<x-layouts::master>
    <div class="p-4 md:p-8">
        {{-- Encabezado Adaptable --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-[#1A1A1A]">Catálogo de Inventario</h2>
                <p class="text-sm text-gray-600">Gestión de piezas y existencias disponibles.</p>
            </div>
            <a href="{{ route('inventory.create') }}" class="w-full md:w-auto text-center bg-[#D4AF37] text-white px-6 py-3 rounded-full font-bold shadow-md hover:bg-[#B8962E] transition-all uppercase text-sm tracking-widest">
                + NUEVA PIEZA
            </a>
        </div>

        <div class="mb-6">
            <form action="{{ route('inventory.index') }}" method="GET" class="flex gap-2 max-w-md">
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Buscar por nombre o categoría..." 
                       class="flex-1 bg-white border-[#D4AF37]/30 rounded-2xl p-3 text-sm focus:ring-[#D4AF37]">
                <button type="submit" class="bg-[#1A1A1A] text-[#FDF2D0] px-6 rounded-2xl font-bold hover:bg-black transition text-xs">
                    BUSCAR
                </button>
            </form>
        </div>

        {{-- VISTA PARA ESCRITORIO (Se oculta en móvil) --}}
        <div class="hidden md:block bg-white rounded-3xl shadow-xl border border-[#D4AF37]/20 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-[#FDF2D0]/50 border-b border-[#D4AF37]/20">
                    <tr>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">Imagen</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">Producto</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">Categoría</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-gray-400 text-center">Stock</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-gray-400 text-right">Costo</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-gray-400 text-right">Precio</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-gray-400 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($productos as $producto)
                    <tr class="hover:bg-[#FDF2D0]/10 transition-colors">
                        <td class="p-4">
                            @if($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" class="size-20 rounded-lg object-cover border border-gray-200">
                            @else
                                <div class="size-12 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 text-xs">🖼️</div>
                            @endif
                        </td>
                        <td class="p-4">
                            <div class="font-bold text-[#1A1A1A] text-sm">{{ $producto->nombre }}</div>
                            <div class="text-[10px] text-gray-400 uppercase italic">📍 {{ $producto->ubicacion ?? 'Sin ubicación' }}</div>
                        </td>
                        <td class="p-4">
                            <span class="text-[10px] font-bold text-gray-500 bg-gray-100 px-2 py-1 rounded-md uppercase">
                                {{ $producto->categoria ?? 'General' }}
                            </span>
                        </td>
                        <td class="p-4 text-center">
                            <span class="px-3 py-1 rounded-full text-xs font-bold {{ $producto->inventario <= 5 ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                                {{ $producto->inventario <= 5 ? '⚠️ ' : '' }}{{ $producto->inventario }}
                            </span>
                        </td>
                        <td class="p-4 text-right text-gray-500 font-mono text-xs">${{ number_format($producto->precompra, 2) }}</td>
                        <td class="p-4 text-right font-bold text-[#D4AF37] font-mono text-sm">${{ number_format($producto->preventa, 2) }}</td>
                        <td class="p-4 text-center space-x-3">
                            <a href="{{ route('productos.edit', $producto->idproducto) }}" class="text-blue-600 hover:scale-125 transition-transform inline-block">✏️</a>
                            <form action="{{ route('productos.destroy', $producto->idproducto) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:scale-125 transition-transform">🗑️</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- VISTA PARA MÓVIL (Tarjetas) --}}
        <div class="md:hidden space-y-4">
            @foreach($productos as $producto)
            <div class="bg-white p-4 rounded-3xl shadow-md border border-[#D4AF37]/10 flex gap-4 items-center">
                {{-- Miniatura --}}
                <div class="flex-shrink-0">
                    @if($producto->imagen)
                        <img src="{{ asset('storage/' . $producto->imagen) }}" class="size-20 rounded-2xl object-cover border border-gray-100">
                    @else
                        <div class="size-20 bg-gray-50 rounded-2xl flex items-center justify-center text-2xl border border-dashed border-gray-200">🖼️</div>
                    @endif
                </div>

                {{-- Info --}}
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-start">
                        <h4 class="font-bold text-[#1A1A1A] truncate">{{ $producto->nombre }}</h4>
                        <span class="font-mono font-bold text-[#D4AF37]">${{ number_format($producto->preventa, 2) }}</span>
                    </div>
                    <p class="text-[10px] text-gray-400 uppercase mb-2">{{ $producto->categoria ?? 'General' }}</p>
                    
                    <div class="flex justify-between items-center mt-2">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold {{ $producto->inventario <= 5 ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                            Stock: {{ $producto->inventario }}
                        </span>
                        
                        <div class="flex gap-4">
                            <a href="{{ route('productos.edit', $producto->idproducto) }}" class="text-lg">✏️</a>
                            <form action="{{ route('productos.destroy', $producto->idproducto) }}" method="POST" onsubmit="return confirm('¿Eliminar pieza?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-lg">🗑️</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($productos->isEmpty())
            <div class="p-12 text-center text-gray-400 bg-white rounded-3xl border border-dashed border-gray-200 mt-4">
                <p class="text-sm italic font-medium uppercase tracking-widest">No hay piezas en el catálogo</p>
            </div>
        @endif
    </div>

    <div class="mt-8">
            {{ $productos->links() }}
        </div>

        @if($productos->isEmpty())
            <div class="p-12 text-center text-gray-400 bg-white rounded-3xl border border-dashed border-gray-200 mt-4">
                <p class="text-sm italic font-medium uppercase tracking-widest">No se encontraron piezas</p>
            </div>
        @endif
    </div>
</x-layouts::master>