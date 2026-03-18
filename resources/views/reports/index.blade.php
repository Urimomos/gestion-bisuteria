<x-layouts::master>
    <div class="p-4 md:p-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-[#1A1A1A]">Historial de Movimientos</h2>
                <p class="text-sm text-gray-600">Registro de altas, bajas y cambios en el inventario.</p>
            </div>

            @if(auth()->user()->rol === 'maestro')
                <form action="{{ route('historial.vaciar') }}" method="POST" onsubmit="return confirm('¿Vaciar todo el historial?');" class="w-full md:w-auto">
                    @csrf
                    <button type="submit" class="w-full md:w-auto bg-red-600 text-white px-6 py-3 rounded-2xl text-xs font-bold shadow-md hover:bg-red-700 transition uppercase tracking-widest">
                        🗑️ Vaciar Historial
                    </button>
                </form>
            @endif
        </div>
        <div class="hidden lg:block bg-white rounded-3xl shadow-xl border border-[#D4AF37]/20 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-[#1A1A1A] text-[#FDF2D0]">
                    <tr>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest">Fecha y Hora</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest">Usuario</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest">Producto</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest">Acción</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-center">Cambio Stock</th>
                        @if(auth()->user()->rol === 'maestro')
                            <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-right">Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($movimientos as $mov)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-xs text-gray-500 font-mono">
                            {{ \Carbon\Carbon::parse($mov->created_at)->format('d/m/Y H:i') }}
                        </td>
                        <td class="p-4 font-bold text-sm text-gray-800">{{ $mov->usuario_nombre }}</td>
                        <td class="p-4 text-sm text-gray-700">{{ $mov->producto_nombre ?? '--- (Pieza Eliminada) ---' }}</td>
                        <td class="p-4">
                            @php
                                $color = match($mov->accion) {
                                    'Agrego', 'aumento' => 'bg-green-100 text-green-700',
                                    'Actualizo' => 'bg-blue-100 text-blue-700',
                                    'Elimino', 'disminucion' => 'bg-red-100 text-red-700',
                                    default => 'bg-gray-100 text-gray-700'
                                };
                            @endphp
                            <span class="{{ $color }} px-3 py-1 rounded-full text-[10px] font-bold uppercase">
                                {{ $mov->accion }}
                            </span>
                        </td>
                        <td class="p-4 text-center text-xs font-mono">
                            <span class="text-gray-400">{{ $mov->cantidad_anterior }}</span> 
                            <span class="mx-2">➜</span> 
                            <span class="font-bold text-[#D4AF37]">{{ $mov->cantidad_nueva }}</span>
                        </td>
                        @if(auth()->user()->rol === 'maestro')
                        <td class="p-4 text-right">
                            <form action="{{ route('historial.destruir', $mov->idedita) }}" method="POST" onsubmit="return confirm('¿Borrar este registro?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-600 p-2 hover:bg-red-50 rounded-lg transition">
                                    <flux:icon.trash variant="micro" />
                                </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="lg:hidden space-y-4">
            @forelse($movimientos as $mov)
            <div class="bg-white p-5 rounded-3xl shadow-md border border-[#D4AF37]/10 space-y-3">
                <div class="flex justify-between items-start">
                    <span class="text-[10px] font-mono text-gray-400">
                        {{ \Carbon\Carbon::parse($mov->created_at)->format('d/m/Y H:i') }}
                    </span>
                    @php
                        $color = match($mov->accion) {
                            'Agrego', 'aumento' => 'bg-green-100 text-green-700',
                            'Actualizo' => 'bg-blue-100 text-blue-700',
                            'Elimino', 'disminucion' => 'bg-red-100 text-red-700',
                            default => 'bg-gray-100 text-gray-700'
                        };
                    @endphp
                    <span class="{{ $color }} px-2 py-1 rounded-md text-[9px] font-black uppercase">
                        {{ $mov->accion }}
                    </span>
                </div>

                <div>
                    <p class="text-[10px] text-gray-400 uppercase font-bold tracking-tighter">Producto</p>
                    <p class="font-bold text-[#1A1A1A] text-sm">{{ $mov->producto_nombre ?? '--- (Pieza Eliminada) ---' }}</p>
                </div>

                <div class="flex justify-between items-end border-t border-gray-50 pt-3">
                    <div>
                        <p class="text-[10px] text-gray-400 uppercase font-bold tracking-tighter">Usuario</p>
                        <p class="text-xs font-medium text-gray-700">{{ $mov->usuario_nombre }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] text-gray-400 uppercase font-bold tracking-tighter">Stock</p>
                        <p class="font-mono text-xs italic">
                            {{ $mov->cantidad_anterior }} ➜ <span class="font-bold text-[#D4AF37]">{{ $mov->cantidad_nueva }}</span>
                        </p>
                    </div>
                </div>

                @if(auth()->user()->rol === 'maestro')
                <div class="pt-2 flex justify-end">
                    <form action="{{ route('historial.destruir', $mov->idedita) }}" method="POST" onsubmit="return confirm('¿Borrar registro?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 text-xs font-bold px-3 py-1 rounded-lg bg-red-50 uppercase tracking-widest">
                            Eliminar Registro
                        </button>
                    </form>
                </div>
                @endif
            </div>
            @empty
            <div class="p-10 text-center bg-white rounded-3xl border border-dashed border-gray-200">
                <p class="text-sm text-gray-400 italic">No hay movimientos registrados.</p>
            </div>
            @endforelse
        </div>
    </div>
</x-layouts::master>