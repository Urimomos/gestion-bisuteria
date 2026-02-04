<x-layouts::master>
    <div class="p-6 lg:p-8">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-[#1A1A1A]">Historial de Movimientos</h2>
            <p class="text-gray-600">Registro detallado de altas, bajas y cambios en el inventario.</p>
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-[#D4AF37]/20 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-[#1A1A1A] text-[#FDF2D0]">
                    <tr>
                        <th class="p-4 text-xs font-bold uppercase">Fecha y Hora</th>
                        <th class="p-4 text-xs font-bold uppercase">Usuario</th>
                        <th class="p-4 text-xs font-bold uppercase">Producto</th>
                        <th class="p-4 text-xs font-bold uppercase">Acción</th>
                        <th class="p-4 text-xs font-bold uppercase text-center">Cambio de Stock</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($movimientos as $mov)
                    <tr class="hover:bg-gray-50">
                        <td class="p-4 text-sm text-gray-600">
                            {{ \Carbon\Carbon::parse($mov->created_at)->format('d/m/Y H:i') }}
                        </td>
                        <td class="p-4 font-bold text-gray-800">{{ $mov->usuario_nombre }}</td>
                        <td class="p-4 text-gray-700">{{ $mov->producto_nombre ?? '--- (Pieza Eliminada) ---' }}</td>
                        <td class="p-4">
                            @php
                                $color = match($mov->accion) {
                                    'Agregar' => 'bg-green-100 text-green-700',
                                    'Actualizar' => 'bg-blue-100 text-blue-700',
                                    'Eliminar' => 'bg-red-100 text-red-700',
                                    default => 'bg-gray-100 text-gray-700'
                                };
                            @endphp
                            <span class="{{ $color }} px-3 py-1 rounded-full text-xs font-bold">
                                {{ $mov->accion }}
                            </span>
                        </td>
                        <td class="p-4 text-center text-sm font-mono">
                            <span class="text-gray-400">{{ $mov->cantidad_anterior }}</span> 
                            <span class="mx-2">➜</span> 
                            <span class="font-bold text-[#D4AF37]">{{ $mov->cantidad_nueva }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts::master>