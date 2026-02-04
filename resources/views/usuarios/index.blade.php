<x-layouts::master>
    <div class="p-6 lg:p-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-bold text-[#1A1A1A]">Gestión de Equipo</h2>
                <p class="text-gray-600">Administra los accesos y roles de tus empleados.</p>
            </div>
        </div>

        <style>
    .form-maestro {
        background-color: #1A1A1A !important;
        color: #FDF2D0 !important;
    }
    .form-maestro label {
        color: #D1D5DB !important; /* Gris claro para los labels */
    }
    .form-maestro input, .form-maestro select {
        color: white !important;
        background-color: rgba(255, 255, 255, 0.05) !important;
    }
    .form-maestro option {
        color: black !important;
    }
</style>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Formulario de Registro --}}
            <div class="form-maestro p-8 rounded-3xl shadow-xl h-fit border border-[#D4AF37]/20">
                <h3 class="font-bold uppercase mb-6 tracking-widest text-center" style="color: #FDF2D0 !important; border-bottom: 1px solid rgba(212, 175, 55, 0.2); padding-bottom: 10px;">Nuevo Registro</h3>
                <form action="{{ route('usuarios.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Nombre Completo</label>
                        <input type="text" name="name" required class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white focus:ring-[#D4AF37]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Correo Electrónico</label>
                        <input type="email" name="email" required class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Contraseña Provisional</label>
                        <input type="password" name="password" required class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Asignar Rol</label>
                        <select name="rol" class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white">
                            <option value="empleado" class="text-black">Empleado (Ventas/Inventario)</option>
                            <option value="maestro" class="text-black">Maestro (Administrador)</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-[#D4AF37] text-white py-3 rounded-xl font-bold mt-4 hover:bg-[#B8962E] transition-all">
                        REGISTRAR ACCESO
                    </button>
                </form>
            </div>

            {{-- Tabla de Usuarios --}}
            <div class="lg:col-span-2 bg-white rounded-3xl shadow-xl border border-[#D4AF37]/20 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="p-4 text-xs font-bold uppercase text-gray-400">Usuario</th>
                            <th class="p-4 text-xs font-bold uppercase text-gray-400">Rol</th>
                            <th class="p-4 text-xs font-bold uppercase text-gray-400 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($usuarios as $user)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-4">
                                <div class="flex items-center space-x-3">
                                    <div class="size-10 bg-[#D4AF37] text-white rounded-full flex items-center justify-center font-bold text-sm">
                                        {{ $user->initials() }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-800">{{ $user->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                @if($user->rol === 'maestro')
                                    <span class="bg-[#FDF2D0] text-[#B8962E] px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter border border-[#D4AF37]/30">
                                        👑 Maestro
                                    </span>
                                @else
                                    <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter">
                                        👤 Empleado
                                    </span>
                                @endif
                            </td>
                            <td class="p-4 text-center">
                                @if($user->id !== auth()->id())
                                <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Retirar acceso a este usuario?');">
                                    @csrf @method('DELETE')
                                    <button class="text-red-400 hover:text-red-600">
                                        <flux:icon.trash variant="mini" />
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts::master>