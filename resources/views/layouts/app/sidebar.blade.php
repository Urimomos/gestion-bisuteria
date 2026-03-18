<flux:sidebar sticky stashable class="bg-white">
    <flux:brand href="{{ route('dashboard') }}" name="Zacatelco" class="px-2">
        <div style="height: 150px; width: 280px; display: flex; align-items: center; justify-content: flex-start; overflow: visible;">
           <x-app-logo-icon class="w-48 h-auto" />
        </div>
    </flux:brand>
    <flux:navlist variant="outline">
        <flux:navlist.item icon="home" href="{{ route('dashboard') }}" wire:navigate>Panel Principal</flux:navlist.item>
        <flux:navlist.item icon="archive-box" href="{{ route('inventory.index') }}">Inventario</flux:navlist.item>
        <flux:navlist.item icon="clock" href="{{ route('reportes.index') }}" wire:navigate>Historial de Cambios</flux:navlist.item>
        <flux:navlist.item icon="currency-dollar" href="{{ route('ventas.buscar') }}">Ventas</flux:navlist.item>
        <flux:navlist.item icon="users" href="{{ route('clientes.index') }}">Clientes</flux:navlist.item>
        @if(auth()->user()->rol === 'maestro')
            <div class="mt-4 px-4">
                <p class="text-xs font-bold text-gray-400 uppercase mb-2">Administración</p>
                <flux:navlist.item icon="user-circle" href="{{ route('usuarios.index') }}">Empleados</flux:navlist.item>
                <flux:navlist.item icon="chart-bar" href="{{ route('reportes.ventas') }}">
                Reporte de Ventas</flux:navlist.item>
            </div>
        @endif
    </flux:navlist>

    

    <flux:navlist>
       {{-- <flux:navlist.item icon="cog" href="#">Configuración</flux:navlist.item> --}} 

        <form method="POST" action="{{ route('logout') }}" id="logout-form" class="hidden">
                @csrf
            </form>

            <flux:navlist.item 
                icon="chevron-right" 
                href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="text-red-600 hover:text-red-700 font-bold"
            >
                {{ __('Cerrar Sesión') }}
            </flux:navlist.item>

    </flux:navlist>
</flux:sidebar>

<flux:main>
    {{ $slot }} 
</flux:main>