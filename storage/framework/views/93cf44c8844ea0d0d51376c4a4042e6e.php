<?php if (isset($component)) { $__componentOriginal1a7ecdc5bab41c522bd30c83b1a73cf0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1a7ecdc5bab41c522bd30c83b1a73cf0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'f4ac99e09542ff494432bc959d4fee61::master','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts::master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="p-6 lg:p-8 space-y-8">
        
        <div>
            <h2 class="text-2xl font-bold text-[#1A1A1A]">Bienvenido al Sistema</h2>
            <p class="text-gray-600">Gestión de inventario y ventas - Zacatelco</p>
        </div>

        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    
    <div class="bg-white p-6 rounded-3xl shadow-lg border-l-4 border-green-500">
        <p class="text-gray-500 text-sm font-bold uppercase">Ventas de Hoy</p>
        <h3 class="text-3xl font-black"><?php echo e($ventasHoy); ?></h3>
    </div>

    
    <div class="bg-white p-6 rounded-3xl shadow-lg border-l-4 border-[#D4AF37]">
        <p class="text-gray-500 text-sm font-bold uppercase">Ingreso del Día</p>
        <h3 class="text-3xl font-black text-[#D4AF37]">$<?php echo e(number_format($gananciaHoy, 2)); ?></h3>
    </div>

    
    <div class="bg-white p-6 rounded-3xl shadow-lg border-l-4 border-red-500">
        <p class="text-gray-500 text-sm font-bold uppercase">Stock Crítico</p>
        <h3 class="text-3xl font-black text-red-600"><?php echo e($productosBajos); ?> piezas</h3>
    </div>
</div>

        
        <div class="bg-white p-8 rounded-3xl shadow-xl border border-[#D4AF37]/20">
            <h3 class="text-center font-bold text-lg mb-6 uppercase tracking-wider">Actividades</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                <a href="<?php echo e(route('inventory.create')); ?>" class="flex flex-col items-center justify-center p-6 bg-[#FDF2D0]/40 rounded-2xl hover:bg-[#FDF2D0] transition-all group border border-transparent hover:border-[#D4AF37]">
                    <span class="text-4xl mb-3 group-hover:scale-110 transition-transform">📦</span>
                    <span class="font-bold text-sm uppercase">Inventario</span>
                </a>

                <a href="<?php echo e(route('ventas.buscar')); ?>" class="flex flex-col items-center justify-center p-6 bg-[#FDF2D0]/40 rounded-2xl hover:bg-[#FDF2D0] transition-all group border border-transparent hover:border-[#D4AF37]">
                    <span class="text-4xl mb-3 group-hover:scale-110 transition-transform">💰</span>
                    <span class="font-bold text-sm uppercase">Nueva Venta</span>
                </a>

                 <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->rol === 'maestro'): ?>
                <a href="<?php echo e(route('usuarios.index')); ?>" class="flex flex-col items-center justify-center p-6 bg-[#FDF2D0] rounded-2xl hover:bg-[#FDF2D0]/80 transition-all group border border-[#D4AF37]/20 shadow-sm">
                    <span class="text-4xl mb-3 group-hover:scale-110 transition-transform">👥</span>
                    <span class="font-bold text-sm uppercase text-[#1A1A1A]">Empleados</span>
                </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                labels: <?php echo json_encode($ventasSemanales->pluck('fecha')); ?>,
                datasets: [{
                    label: 'Ventas Totales',
                    data: <?php echo json_encode($ventasSemanales->pluck('total')); ?>,
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1a7ecdc5bab41c522bd30c83b1a73cf0)): ?>
<?php $attributes = $__attributesOriginal1a7ecdc5bab41c522bd30c83b1a73cf0; ?>
<?php unset($__attributesOriginal1a7ecdc5bab41c522bd30c83b1a73cf0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1a7ecdc5bab41c522bd30c83b1a73cf0)): ?>
<?php $component = $__componentOriginal1a7ecdc5bab41c522bd30c83b1a73cf0; ?>
<?php unset($__componentOriginal1a7ecdc5bab41c522bd30c83b1a73cf0); ?>
<?php endif; ?><?php /**PATH D:\laragon\www\gestion-bisuteria\resources\views/dashboard.blade.php ENDPATH**/ ?>