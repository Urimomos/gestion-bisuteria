<x-layouts::auth>
    
    <style>
        
        [data-flux-control], 
        [data-flux-label], 
        [data-flux-heading], 
        [data-flux-text],
        label, span, p, h2 {
            color: #1A1A1A !important;
        }

       
        [data-flux-input] {
            background-color: #ffffff !important;
            border: 2px solid #D4AF37 !important;
            border-radius: 0.75rem !important; 
            box-shadow: none !important;
        }

       
        [data-flux-input] input {
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            color: #1A1A1A !important;
            outline: none !important;
        }

      
        button[type="submit"] {
            background-color: #1A1A1A !important;
            border: none !important;
            transition: all 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #000000 !important;
            transform: translateY(-1px);
        }
        
        button[type="submit"] span {
            color: #ffffff !important;
        }

               a, [data-flux-link] {
            color: #D4AF37 !important;
            font-weight: 700 !important;
            text-decoration: none !important;
        }
    </style>

    <div class="flex flex-col gap-6 bg-[#FDF2D0]/50 p-8 rounded-3xl border border-[#D4AF37]/20 shadow-xl">
        
        <div class="flex flex-col items-center gap-4">
            <x-app-logo-icon class="w-48 h-auto" />
            <div class="text-center">
                <h2 class="text-2xl font-extrabold text-[#1A1A1A]">Acceso al Sistema</h2>
            </div>
        </div>

        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
            @csrf

            <flux:input
                label="{{ __('Correo Electrónico') }}"
                name="email"
                type="email"
                :value="old('email')"
                required
                autofocus
                placeholder="usuario@zacatelco.com"
            />

            <div class="relative">
                <flux:input
                    label="{{ __('Contraseña') }}"
                    name="password"
                    type="password"
                    autocomplete="current-password"
                    :placeholder="__('••••••••')"
                    required
                    viewable
                />
            </div>

            <flux:checkbox name="remember" :label="__('Recordarme')" :checked="old('remember')" />

            <div class="flex items-center justify-end">
                <flux:button type="submit" class="w-full bg-[#1A1A1A] hover:bg-black py-3 rounded-xl transition-all">
                    <span class="text-white font-bold">{{ __('ENTRAR') }}</span>
                </flux:button>
            </div>
        </form>

    </div>
</x-layouts::auth>