<x-layouts::master>
    <div class="p-6 lg:p-8 space-y-8">
        {{-- Encabezado --}}
        <div>
            <h2 class="text-2xl font-bold text-[#1A1A1A]">Bienvenido al Sistema</h2>
            <p class="text-gray-600">Gestión de inventario y ventas - Zacatelco</p>
        </div>

        {{-- Tarjetas de Indicadores --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    {{-- Tarjeta de Ventas --}}
    <div class="bg-white p-6 rounded-3xl shadow-lg border-l-4 border-green-500">
        <p class="text-gray-500 text-sm font-bold uppercase">Ventas de Hoy</p>
        <h3 class="text-3xl font-black">{{ $ventasHoy }}</h3>
    </div>

    {{-- Tarjeta de Ganancias --}}
    <div class="bg-white p-6 rounded-3xl shadow-lg border-l-4 border-[#D4AF37]">
        <p class="text-gray-500 text-sm font-bold uppercase">Ingreso del Día</p>
        <h3 class="text-3xl font-black text-[#D4AF37]">${{ number_format($gananciaHoy, 2) }}</h3>
    </div>

    {{-- Tarjeta de Alerta --}}
    <div class="bg-white p-6 rounded-3xl shadow-lg border-l-4 border-red-500">
        <p class="text-gray-500 text-sm font-bold uppercase">Stock Crítico</p>
        <h3 class="text-3xl font-black text-red-600">{{ $productosBajos }} piezas</h3>
    </div>
</div>

        {{-- Panel de Acciones Rápidas --}}
        <div class="bg-white p-8 rounded-3xl shadow-xl border border-[#D4AF37]/20">
            <h3 class="text-center font-bold text-lg mb-6 uppercase tracking-wider">¿Qué deseas gestionar?</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                <a href="{{ route('inventory.create') }}" class="flex flex-col items-center justify-center p-6 bg-[#FDF2D0]/40 rounded-2xl hover:bg-[#FDF2D0] transition-all group border border-transparent hover:border-[#D4AF37]">
                    <span class="text-4xl mb-3 group-hover:scale-110 transition-transform">📦</span>
                    <span class="font-bold text-sm uppercase">Inventario</span>
                </a>

                <a href="{{ route('ventas.buscar') }}" class="flex flex-col items-center justify-center p-6 bg-[#FDF2D0]/40 rounded-2xl hover:bg-[#FDF2D0] transition-all group border border-transparent hover:border-[#D4AF37]">
                    <span class="text-4xl mb-3 group-hover:scale-110 transition-transform">💰</span>
                    <span class="font-bold text-sm uppercase">Nueva Venta</span>
                </a>

                 @if(auth()->user()->rol === 'maestro')
                <a href="{{ route('usuarios.index') }}" class="flex flex-col items-center justify-center p-6 bg-[#FDF2D0] rounded-2xl hover:bg-[#FDF2D0]/80 transition-all group border border-[#D4AF37]/20 shadow-sm">
                    <span class="text-4xl mb-3 group-hover:scale-110 transition-transform">👥</span>
                    <span class="font-bold text-sm uppercase text-[#1A1A1A]">Empleados</span>
                </a>
                @endif
            </div>
        </div>
    <div class="mt-8 bg-white p-6 rounded-3xl shadow-xl border border-[#D4AF37]/20">
    <h3 class="text-lg font-bold text-[#1A1A1A] mb-4 uppercase">Ventas de la Semana</h3>
    <div class="h-64" wire:ignore> 
        <canvas id="ventasChart"></canvas>
    </div>
</div>

<script>
    function renderizarGrafica() {
        console.log("Intentando renderizar gráfica...");
        
        const canvas = document.getElementById('ventasChart');
        if (!canvas) return;

        // Verificamos si la librería Chart existe antes de usarla
        if (typeof Chart === 'undefined') {
            console.error("Error: Chart.js no está cargado aún.");
            return;
        }

        const chartExistente = Chart.getChart(canvas);
        if (chartExistente) {
            chartExistente.destroy();
        }

        new Chart(canvas, {
            type: 'line',
            data: {
                labels: {!! json_encode($ventasSemanales->pluck('fecha')) !!},
                datasets: [{
                    label: 'Ventas Totales',
                    data: {!! json_encode($ventasSemanales->pluck('total')) !!},
                    borderColor: '#D4AF37',
                    backgroundColor: 'rgba(212, 175, 55, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true },
                    x: { grid: { display: false } }
                }
            }
        });
        console.log("¡Gráfica lista!");
    }

    // Escuchamos el evento de navegación de Livewire
    document.addEventListener('livewire:navigated', renderizarGrafica);
    
    // Ejecución inicial
    renderizarGrafica();
</script>
</x-layouts::master>