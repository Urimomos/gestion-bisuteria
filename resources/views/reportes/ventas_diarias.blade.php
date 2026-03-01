<x-layouts::master>
    <div class="p-4 md:p-8 max-w-6xl mx-auto">
        {{-- Encabezado Adaptable --}}
        <div class="mb-8 text-center md:text-left">
            <h2 class="text-2xl font-black text-[#1A1A1A] uppercase tracking-tighter italic">💰 Reporte de Ventas</h2>
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">
                Corte de caja: {{ date('d/m/Y') }}
            </p>
        </div>

        {{-- Grid de Indicadores --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            {{-- Venta Total --}}
            <div class="bg-[#fcf9f9] p-8 rounded-[2.5rem] shadow-2xl border-b-8 border-[#D4AF37] relative overflow-hidden group">
                <div class="relative z-10">
                    <p class="text-[#D4AF37] text-[10px] font-black uppercase tracking-[0.2em] mb-2">Venta Total del Día</p>
                    <h3 class="text-5xl font-black text-white font-mono tracking-tighter animate-pulse">
                        <span class="text-2xl font-normal text-[#D4AF37]/50">$</span>{{ number_format($ingresosHoy, 2) }}
                    </h3>
                </div>
            </div>

            {{-- Métodos de Pago --}}
            <div class="bg-white p-6 md:p-8 rounded-[2.5rem] shadow-xl border border-[#D4AF37]/10 flex flex-col justify-center">
                <p class="text-gray-400 text-[10px] font-black uppercase tracking-widest mb-6 border-b border-gray-50 pb-2">Distribución de Cobro</p>
                <div class="space-y-4">
                    @foreach($metodos as $m)
                        <div class="flex justify-between items-end group">
                            <span class="text-gray-500 font-bold text-sm italic group-hover:text-[#D4AF37] transition-colors">
                                {{ $m->mpago == 'Efectivo' ? '💵' : '💳' }} {{ $m->mpago }}:
                            </span>
                            <span class="text-xl font-black font-mono text-[#1A1A1A] border-b-2 border-transparent group-hover:border-[#D4AF37] transition-all">
                                ${{ number_format($m->total, 2) }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Listado de Operaciones --}}
        <div class="space-y-4">
            <div class="flex items-center gap-4 mb-4">
                <h4 class="font-black text-[#1A1A1A] uppercase text-xs tracking-widest">Detalle de Operaciones</h4>
                <div class="flex-1 h-[1px] bg-gray-200"></div>
            </div>

            {{-- VISTA ESCRITORIO (Tabla) --}}
            <div class="hidden lg:block bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-gray-400 text-[9px] uppercase font-black tracking-widest">
                        <tr>
                            <th class="p-5">Hora</th>
                            <th class="p-5">Cliente</th>
                            <th class="p-5 text-center">Cant.</th>
                            <th class="p-5">Pago</th>
                            <th class="p-5 text-right">Subtotal</th>
                            <th class="p-5 text-center">Ticket</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($detalleVentas as $v)
                        <tr class="text-sm hover:bg-[#FDF2D0]/10 transition-colors">
                            <td class="p-5 text-gray-400 font-mono text-xs">{{ \Carbon\Carbon::parse($v->created_at)->format('H:i') }}</td>
                            <td class="p-5">
                                <p class="font-bold text-[#1A1A1A]">{{ $v->cliente }}</p>
                                <p class="text-[10px] text-gray-400 italic">{{ $v->producto }}</p>
                            </td>
                            <td class="p-5 text-center font-bold text-gray-500">{{ $v->Cantidad }}</td>
                            <td class="p-5">
                                <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase {{ $v->mpago == 'Efectivo' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                                    {{ $v->mpago }}
                                </span>
                            </td>
                            <td class="p-5 text-right font-black font-mono text-[#1A1A1A]">${{ number_format($v->subtotal, 2) }}</td>
                            <td class="p-5 text-center">
                                <a href="{{ route('ticket.generar', ['fecha' => $v->Fecha, 'idcliente' => $v->idcliente, 'momento' => $v->created_at]) }}"    
                                   target="_blank" 
                                   class="inline-flex p-3 bg-gray-50 text-gray-400 rounded-2xl hover:bg-[#c99d9d] hover:text-[#FDF2D0] transition-all shadow-sm">
                                   <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                   </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- VISTA MÓVIL (Cards tipo Ticket) --}}
            <div class="lg:hidden space-y-4">
                @forelse($detalleVentas as $v)
                <div class="bg-white p-5 rounded-[2rem] shadow-md border border-gray-100 flex flex-col gap-3 relative overflow-hidden">
                    <div class="flex justify-between items-start">
                        <span class="text-[10px] font-mono text-gray-300">{{ \Carbon\Carbon::parse($v->created_at)->format('H:i') }} hrs</span>
                        <span class="px-2 py-1 rounded-lg text-[8px] font-black uppercase {{ $v->mpago == 'Efectivo' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                            {{ $v->mpago }}
                        </span>
                    </div>
                    
                    <div>
                        <p class="font-black text-[#1A1A1A] uppercase text-sm leading-tight">{{ $v->cliente }}</p>
                        <p class="text-[10px] text-gray-400 italic">{{ $v->Cantidad }}x {{ $v->producto }}</p>
                    </div>

                    <div class="flex justify-between items-center pt-3 border-t border-gray-50">
                        <p class="text-xl font-black font-mono text-[#D4AF37] tracking-tighter">${{ number_format($v->subtotal, 2) }}</p>
                        <a href="{{ route('ticket.generar', ['fecha' => $v->Fecha, 'idcliente' => $v->idcliente, 'momento' => $v->created_at]) }}" 
                           target="_blank"
                           class="bg-[#1A1A1A] text-[#FDF2D0] px-4 py-2 rounded-xl text-[10px] font-bold uppercase tracking-widest">
                            Reimprimir
                        </a>
                    </div>
                </div>
                @empty
                <div class="p-12 text-center bg-white rounded-[2rem] border-2 border-dashed border-gray-100">
                    <p class="text-sm text-gray-400 italic">Sin movimientos financieros hoy.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts::master>