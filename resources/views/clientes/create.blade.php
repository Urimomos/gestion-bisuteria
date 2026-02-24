<x-layouts::master>
    <div class="p-6 lg:p-8 max-w-2xl mx-auto">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-[#1A1A1A]">Nuevo Registro de Cliente</h2>
            <p class="text-gray-600">Completa los datos para dar de alta en el sistema.</p>
        </div>

        <form action="{{ route('clientes.store') }}" method="POST" class="bg-white p-8 rounded-3xl shadow-xl border border-[#D4AF37]/20">
            @csrf
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Nombre(s) *</label>
                    <input type="text" name="nombre" class="w-full border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37]" placeholder="Ej. Ana María" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Apellido Paterno</label>
                        <input type="text" name="AP" class="w-full border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37]" placeholder="Ej. García">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Apellido Materno</label>
                        <input type="text" name="AM" class="w-full border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37]" placeholder="Ej. López">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Teléfono de Contacto</label>
                    <input type="text" name="telefono" class="w-full border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37]" placeholder="246 123 4567">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Correo Electrónico</label>
                    <input type="email" name="email" class="w-full border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37]" placeholder="cliente@ejemplo.com">
                </div>
            </div>

            <div class="mt-10 flex gap-4">
                <button type="submit" class="flex-1 bg-[#1A1A1A] text-[#FDF2D0] py-4 rounded-xl font-bold shadow-lg hover:bg-black transition-all">
                    REGISTRAR CLIENTE
                </button>
                <a href="{{ route('clientes.index') }}" class="px-8 py-4 bg-gray-100 text-gray-500 rounded-xl font-bold hover:bg-gray-200 transition-all text-center">
                    CANCELAR
                </a>
            </div>
        </form>
    </div>
</x-layouts::master>