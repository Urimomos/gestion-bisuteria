<x-layouts::master>
    <div class="p-6 lg:p-8 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold text-[#1A1A1A] mb-8">Registrar Nueva Venta</h2>

        <form action="{{ route('ventas.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="bg-white p-8 rounded-3xl shadow-lg border border-[#D4AF37]/20">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    {{-- Seleccionar Producto --}}
                    <div class="col-span-2">
                        <label class="block text-sm font-bold mb-2 uppercase">Producto</label>
                        <select name="idproducto" class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3">
                            @foreach($productos as $prod)
                                <option value="{{ $prod->idproducto }}">{{ $prod->nombre }} (Stock: {{ $prod->inventario }})</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Cantidad --}}
                    <div>
                        <label class="block text-sm font-bold mb-2 uppercase">Cantidad</label>
                        <input type="number" name="cantidad" min="1" value="1" class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3">
                    </div>

                    {{-- Método de Pago --}}
                    <div>
                        <label class="block text-sm font-bold mb-2 uppercase">Método de Pago</label>
                        <select name="mpago" class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3">
                            <option value="Efectivo">💵 Efectivo</option>
                            <option value="Tarjeta">💳 Tarjeta</option>
                        </select>
                    </div>

                    {{-- Por ahora cliente genérico o lista --}}
                    <input type="hidden" name="idcliente" value="1"> 
                </div>

                <div class="mt-8">
                    <button type="submit" class="w-full bg-[#1A1A1A] text-[#FDF2D0] py-4 rounded-full font-bold text-lg shadow-xl hover:bg-black transition-all">
                        COMPLETAR VENTA
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layouts::master>