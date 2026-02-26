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

    <div class="p-6 lg:p-8">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-[#1A1A1A] uppercase tracking-wider">💰 Reporte Financiero</h2>
            <p class="text-gray-500">Corte de caja del día: <?php echo e(date('d/m/Y')); ?></p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-[#f8f4f4] p-8 rounded-3xl shadow-xl border-b-4 border-[#D4AF37]">
                <p class="text-[#D4AF37] text-xs font-bold uppercase mb-2">Venta Total del Día</p>
                <h3 class="text-4xl font-bold text-white font-mono">$<?php echo e(number_format($ingresosHoy, 2)); ?></h3>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-100 flex flex-col justify-center">
                <p class="text-gray-400 text-xs font-bold uppercase mb-4">Métodos de Pago</p>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $metodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-600 font-bold italic"><?php echo e($m->mpago); ?>:</span>
                        <span class="text-lg font-mono font-bold text-gray-800">$<?php echo e(number_format($m->total, 2)); ?></span>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>

        
        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="p-4 border-b border-gray-50 bg-gray-50/50">
                <h4 class="font-bold text-gray-700">Detalle de Operaciones</h4>
            </div>
            <table class="w-full text-left">
                <thead class="bg-white text-gray-400 text-[10px] uppercase font-bold">
                    <tr>
                        <th class="p-4">Hora</th>
                        <th class="p-4">Cliente</th>
                        <th class="p-4">Producto</th>
                        <th class="p-4 text-center">Cant.</th>
                        <th class="p-4">Pago</th>
                        <th class="p-4 text-right">Subtotal</th>
                        <th class="p-4 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $detalleVentas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr class="text-sm hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-400"><?php echo e(\Carbon\Carbon::parse($v->created_at)->format('H:i')); ?></td>
                        <td class="p-4 font-bold"><?php echo e($v->cliente); ?></td>
                        <td class="p-4"><?php echo e($v->producto); ?></td>
                        <td class="p-4 text-center"><?php echo e($v->Cantidad); ?></td>
                        <td class="p-4">
                            <span class="px-2 py-1 rounded-md text-[10px] font-bold <?php echo e($v->mpago == 'Efectivo' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700'); ?>">
                                <?php echo e(strtoupper($v->mpago)); ?>

                            </span>
                        </td>
                        <td class="p-4 text-right font-bold font-mono text-[#D4AF37]">$<?php echo e(number_format($v->subtotal, 2)); ?></td>

                        <td class="p-4 text-center">
                            <a href="<?php echo e(route('ticket.generar', ['fecha' => $v->Fecha, 'idcliente' => $v->idcliente, 'momento' => $v->created_at])); ?>"    
                               target="_blank" 
                               title="Imprimir Ticket"
                               class="inline-flex items-center justify-center p-2 bg-gray-100 text-gray-600 rounded-lg hover:bg-[#D4AF37] hover:text-white transition-all shadow-sm">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                               </svg>
                            </a>
                        </td>

                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-400 italic">No hay ventas registradas hoy.</td>
                    </tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1a7ecdc5bab41c522bd30c83b1a73cf0)): ?>
<?php $attributes = $__attributesOriginal1a7ecdc5bab41c522bd30c83b1a73cf0; ?>
<?php unset($__attributesOriginal1a7ecdc5bab41c522bd30c83b1a73cf0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1a7ecdc5bab41c522bd30c83b1a73cf0)): ?>
<?php $component = $__componentOriginal1a7ecdc5bab41c522bd30c83b1a73cf0; ?>
<?php unset($__componentOriginal1a7ecdc5bab41c522bd30c83b1a73cf0); ?>
<?php endif; ?><?php /**PATH D:\laragon\www\gestion-bisuteria\resources\views/reportes/ventas_diarias.blade.php ENDPATH**/ ?>