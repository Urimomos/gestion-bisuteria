<x-layouts::master>
    <div class="p-4 md:p-8">
        {{-- Encabezado --}}
        <div class="mb-8 text-center md:text-left">
            <h2 class="text-2xl font-bold text-[#1A1A1A]">Gestión de Equipo</h2>
            <p class="text-sm text-gray-600">Administra los accesos y roles de tus empleados.</p>
        </div>

        <style>
            .form-maestro {
                background-color: #1A1A1A !important;
                color: #FDF2D0 !important;
            }
            .form-maestro label {
                color: #D1D5DB !important;
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
            <div class="form-maestro p-6 md:p-8 rounded-[2.5rem] shadow-xl h-fit border border-[#D4AF37]/20">
                <h3 class="font-black uppercase mb-6 tracking-[0.2em] text-center text-sm" style="color: #FDF2D0 !important; border-bottom: 1px solid rgba(212, 175, 55, 0.2); padding-bottom: 10px;">
                    Nuevo Registro
                </h3>
                <form action="{{ route('usuarios.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-[10px] font-bold uppercase mb-2 tracking-widest">Nombre Completo</label>
                        <input type="text" name="name" required oninput="this.value = this.value.replace(/[0-9]/g, '')" 
                               class="w-full border-white/10 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold uppercase mb-2 tracking-widest">Correo Electrónico</label>
                        <input type="email" name="email" required 
                               class="w-full border-white/10 rounded-2xl p-4 text-sm">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold uppercase mb-2 tracking-widest">Contraseña</label>
                        <input type="password" name="password" required 
                               class="w-full border-white/10 rounded-2xl p-4 text-sm">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold uppercase mb-2 tracking-widest">Asignar Rol</label>
                        <select name="rol" class="w-full border-white/10 rounded-2xl p-4 text-sm cursor-pointer">
                            <option value="empleado" class="text-black  ">👤 Empleado (Ventas)</option>
                            <option value="maestro" class="text-black">👑 Maestro (Admin)</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-[#D4AF37] text-white py-4 rounded-2xl font-black mt-4 hover:bg-[#B8962E] transition-all shadow-lg uppercase text-xs tracking-[0.1em]">
                        Registrar Acceso
                    </button>
                </form>
            </div>

            {{-- Listado de Usuarios --}}
            <div class="lg:col-span-2 space-y-4">
                {{-- VISTA ESCRITORIO (Tabla) --}}
                <div class="hidden md:block bg-white rounded-[2.5rem] shadow-xl border border-[#D4AF37]/20 overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th class="p-5 text-[10px] font-bold uppercase text-gray-400 tracking-widest">Usuario</th>
                                <th class="p-5 text-[10px] font-bold uppercase text-gray-400 tracking-widest">Rol</th>
                                <th class="p-5 text-[10px] font-bold uppercase text-gray-400 tracking-widest text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($usuarios as $user)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-5">
                                    <div class="flex items-center space-x-4">
                                        <div class="size-10 bg-[#1A1A1A] text-[#FDF2D0] rounded-full flex items-center justify-center font-black text-xs border border-[#D4AF37]/30">
                                            {{ $user->initials() }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-[#1A1A1A] text-sm">{{ $user->name }}</p>
                                            <p class="text-[10px] text-gray-500 font-mono">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-5">
                                    @if($user->rol === 'maestro')
                                        <span class="bg-[#a8a2a2] text-[#D4AF37] px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-tighter border border-[#D4AF37]/50">
                                            👑 Maestro
                                        </span>
                                    @else
                                        <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-tighter">
                                            👤 Empleado
                                        </span>
                                    @endif
                                </td>
                                <td class="p-5 text-center">
                                    @if($user->id !== auth()->id())
                                    <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Retirar acceso?');">
                                        @csrf @method('DELETE')
                                        <button class="text-red-400 hover:text-red-600 transition-transform hover:scale-125">
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

                {{-- VISTA MÓVIL (Cards) --}}
                <div class="md:hidden space-y-4">
                    @foreach($usuarios as $user)
                    <div class="bg-white p-5 rounded-[2rem] shadow-md border border-[#D4AF37]/10 flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <div class="size-12 bg-[#1A1A1A] text-[#D4AF37] rounded-full flex items-center justify-center font-black text-sm border border-[#D4AF37]/30">
                                {{ $user->initials() }}
                            </div>
                            <div>
                                <p class="font-black text-[#1A1A1A] text-sm leading-tight">{{ $user->name }}</p>
                                <div class="mt-1">
                                    @if($user->rol === 'maestro')
                                        <span class="text-[#D4AF37] text-[8px] font-black uppercase italic">👑 Maestro</span>
                                    @else
                                        <span class="text-gray-400 text-[8px] font-black uppercase">👤 Empleado</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if($user->id !== auth()->id())
                        <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Retirar acceso?');">
                            @csrf @method('DELETE')
                            <button class="text-red-500 bg-red-50 p-3 rounded-2xl active:bg-red-100">
                                <flux:icon.trash variant="mini" />
                            </button>
                        </form>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layouts::master>