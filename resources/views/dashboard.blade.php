<x-layouts::master>
    <div class="p-4 md:p-8 space-y-8">
        {{-- Encabezado --}}
        <div class="text-center md:text-left">
            <h2 class="text-2xl font-bold text-[#1A1A1A]">Bienvenido al Sistema</h2>
            <p class="text-gray-600">Gestión de inventario y ventas - Zacatelco</p>
        </div>

        {{-- Tarjetas de Indicadores --}}
     
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Tarjeta de Ventas --}}
            <div class="bg-white p-6 rounded-3xl shadow-lg border-l-4 border-green-500 transition-transform hover:scale-[1.02]">
                <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">Ventas de Hoy</p>
                <h3 class="text-3xl font-black">{{ $ventasHoy }}</h3>
            </div>

            {{-- Tarjeta de Ganancias --}}
            <div class="bg-white p-6 rounded-3xl shadow-lg border-l-4 border-[#D4AF37] transition-transform hover:scale-[1.02]">
                <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">Ingreso del Día</p>
                <h3 class="text-3xl font-black text-[#D4AF37]">${{ number_format($gananciaHoy, 2) }}</h3>
            </div>

            
            <div class="bg-white p-6 rounded-3xl shadow-lg border-l-4 border-red-500 transition-transform hover:scale-[1.02] sm:col-span-2 lg:col-span-1">
                <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">Stock Crítico</p>
                <h3 class="text-3xl font-black text-red-600">{{ $productosBajos }} <span class="text-lg font-normal">piezas</span></h3>
            </div>
        </div>

      
        <div class="bg-white p-6 md:p-8 rounded-3xl shadow-xl border border-[#D4AF37]/20">
            <h3 class="text-center font-bold text-sm mb-8 uppercase tracking-[0.2em] text-gray-400">Acciones Rápidas</h3>
            
          
            <div class="grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 gap-4 md:gap-8">
                <a href="{{ route('inventory.create') }}" class="flex flex-col items-center justify-center p-6 bg-[#FDF2D0]/30 rounded-2xl hover:bg-[#FDF2D0] transition-all group border border-transparent hover:border-[#D4AF37] text-center">
                    <span class="text-4xl mb-3 group-hover:scale-110 transition-transform">📦</span>
                    <span class="font-bold text-xs uppercase tracking-tight">Inventario</span>
                </a>

                <a href="{{ route('ventas.buscar') }}" class="flex flex-col items-center justify-center p-6 bg-[#FDF2D0]/30 rounded-2xl hover:bg-[#FDF2D0] transition-all group border border-transparent hover:border-[#D4AF37] text-center">
                    <span class="text-4xl mb-3 group-hover:scale-110 transition-transform">💰</span>
                    <span class="font-bold text-xs uppercase tracking-tight">Nueva Venta</span>
                </a>

                @if(auth()->user()->rol === 'maestro')
                <a href="{{ route('usuarios.index') }}" class="flex flex-col items-center justify-center p-6 bg-[#FDF2D0]/80 rounded-2xl hover:bg-[#FDF2D0] transition-all group border border-[#D4AF37]/20 shadow-sm text-center xs:col-span-2 md:col-span-1">
                    <span class="text-4xl mb-3 group-hover:scale-110 transition-transform">👥</span>
                    <span class="font-bold text-xs uppercase tracking-tight">Empleados</span>
                </a>
                @endif
            </div>
        </div>

        
        <div class="bg-white p-6 rounded-3xl shadow-xl border border-[#D4AF37]/20">
            <h3 class="text-lg font-bold text-[#1A1A1A] mb-4 uppercase tracking-tight">Rendimiento Semanal</h3>
            
            <div class="h-48 md:h-72" wire:ignore> 
                <canvas id="ventasChart"></canvas>
            </div>
        </div>
    </div>

  
    <script>
        function renderizarGrafica() {
            const canvas = document.getElementById('ventasChart');
            if (!canvas || typeof Chart === 'undefined') return;

            const chartExistente = Chart.getChart(canvas);
            if (chartExistente) { chartExistente.destroy(); }

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
                        tension: 0.4,
                        pointBackgroundColor: '#1A1A1A',
                        pointRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { 
                            beginAtZero: true,
                            ticks: { font: { size: 10 } }
                        },
                        x: { 
                            grid: { display: false },
                            ticks: { font: { size: 10 } }
                        }
                    }
                }
            });
        }
        document.addEventListener('livewire:navigated', renderizarGrafica);
        renderizarGrafica();
    </script>
</x-layouts::master>