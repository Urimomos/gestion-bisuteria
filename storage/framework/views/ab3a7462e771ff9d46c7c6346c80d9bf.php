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

    <div class="p-4 md:p-8">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-[#1A1A1A]">Historial de Movimientos</h2>
                <p class="text-sm text-gray-600">Registro de altas, bajas y cambios en el inventario.</p>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->rol === 'maestro'): ?>
                <form action="<?php echo e(route('historial.vaciar')); ?>" method="POST" onsubmit="return confirm('¿Vaciar todo el historial?');" class="w-full md:w-auto">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="w-full md:w-auto bg-red-600 text-white px-6 py-3 rounded-2xl text-xs font-bold shadow-md hover:bg-red-700 transition uppercase tracking-widest">
                        🗑️ Vaciar Historial
                    </button>
                </form>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div class="hidden lg:block bg-white rounded-3xl shadow-xl border border-[#D4AF37]/20 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-[#1A1A1A] text-[#FDF2D0]">
                    <tr>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest">Fecha y Hora</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest">Usuario</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest">Producto</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest">Acción</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-center">Cambio Stock</th>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->rol === 'maestro'): ?>
                            <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-right">Acciones</th>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $movimientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-xs text-gray-500 font-mono">
                            <?php echo e(\Carbon\Carbon::parse($mov->created_at)->format('d/m/Y H:i')); ?>

                        </td>
                        <td class="p-4 font-bold text-sm text-gray-800"><?php echo e($mov->usuario_nombre); ?></td>
                        <td class="p-4 text-sm text-gray-700"><?php echo e($mov->producto_nombre ?? '--- (Pieza Eliminada) ---'); ?></td>
                        <td class="p-4">
                            <?php
                                $color = match($mov->accion) {
                                    'Agrego', 'aumento' => 'bg-green-100 text-green-700',
                                    'Actualizo' => 'bg-blue-100 text-blue-700',
                                    'Elimino', 'disminucion' => 'bg-red-100 text-red-700',
                                    default => 'bg-gray-100 text-gray-700'
                                };
                            ?>
                            <span class="<?php echo e($color); ?> px-3 py-1 rounded-full text-[10px] font-bold uppercase">
                                <?php echo e($mov->accion); ?>

                            </span>
                        </td>
                        <td class="p-4 text-center text-xs font-mono">
                            <span class="text-gray-400"><?php echo e($mov->cantidad_anterior); ?></span> 
                            <span class="mx-2">➜</span> 
                            <span class="font-bold text-[#D4AF37]"><?php echo e($mov->cantidad_nueva); ?></span>
                        </td>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->rol === 'maestro'): ?>
                        <td class="p-4 text-right">
                            <form action="<?php echo e(route('historial.destruir', $mov->idedita)); ?>" method="POST" onsubmit="return confirm('¿Borrar este registro?');">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-400 hover:text-red-600 p-2 hover:bg-red-50 rounded-lg transition">
                                    <?php if (isset($component)) { $__componentOriginalca0d7d887f05c1393a9d98702b6659ea = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalca0d7d887f05c1393a9d98702b6659ea = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.trash','data' => ['variant' => 'micro']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon.trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'micro']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalca0d7d887f05c1393a9d98702b6659ea)): ?>
<?php $attributes = $__attributesOriginalca0d7d887f05c1393a9d98702b6659ea; ?>
<?php unset($__attributesOriginalca0d7d887f05c1393a9d98702b6659ea); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalca0d7d887f05c1393a9d98702b6659ea)): ?>
<?php $component = $__componentOriginalca0d7d887f05c1393a9d98702b6659ea; ?>
<?php unset($__componentOriginalca0d7d887f05c1393a9d98702b6659ea); ?>
<?php endif; ?>
                                </button>
                            </form>
                        </td>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <div class="lg:hidden space-y-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $movimientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <div class="bg-white p-5 rounded-3xl shadow-md border border-[#D4AF37]/10 space-y-3">
                <div class="flex justify-between items-start">
                    <span class="text-[10px] font-mono text-gray-400">
                        <?php echo e(\Carbon\Carbon::parse($mov->created_at)->format('d/m/Y H:i')); ?>

                    </span>
                    <?php
                        $color = match($mov->accion) {
                            'Agrego', 'aumento' => 'bg-green-100 text-green-700',
                            'Actualizo' => 'bg-blue-100 text-blue-700',
                            'Elimino', 'disminucion' => 'bg-red-100 text-red-700',
                            default => 'bg-gray-100 text-gray-700'
                        };
                    ?>
                    <span class="<?php echo e($color); ?> px-2 py-1 rounded-md text-[9px] font-black uppercase">
                        <?php echo e($mov->accion); ?>

                    </span>
                </div>

                <div>
                    <p class="text-[10px] text-gray-400 uppercase font-bold tracking-tighter">Producto</p>
                    <p class="font-bold text-[#1A1A1A] text-sm"><?php echo e($mov->producto_nombre ?? '--- (Pieza Eliminada) ---'); ?></p>
                </div>

                <div class="flex justify-between items-end border-t border-gray-50 pt-3">
                    <div>
                        <p class="text-[10px] text-gray-400 uppercase font-bold tracking-tighter">Usuario</p>
                        <p class="text-xs font-medium text-gray-700"><?php echo e($mov->usuario_nombre); ?></p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] text-gray-400 uppercase font-bold tracking-tighter">Stock</p>
                        <p class="font-mono text-xs italic">
                            <?php echo e($mov->cantidad_anterior); ?> ➜ <span class="font-bold text-[#D4AF37]"><?php echo e($mov->cantidad_nueva); ?></span>
                        </p>
                    </div>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->rol === 'maestro'): ?>
                <div class="pt-2 flex justify-end">
                    <form action="<?php echo e(route('historial.destruir', $mov->idedita)); ?>" method="POST" onsubmit="return confirm('¿Borrar registro?');">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="text-red-500 text-xs font-bold px-3 py-1 rounded-lg bg-red-50 uppercase tracking-widest">
                            Eliminar Registro
                        </button>
                    </form>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <div class="p-10 text-center bg-white rounded-3xl border border-dashed border-gray-200">
                <p class="text-sm text-gray-400 italic">No hay movimientos registrados.</p>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
<?php endif; ?><?php /**PATH D:\laragon\www\gestion-bisuteria\resources\views/reports/index.blade.php ENDPATH**/ ?>