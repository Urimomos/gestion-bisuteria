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
                <h2 class="text-2xl font-bold text-[#1A1A1A]">Catálogo de Inventario</h2>
                <p class="text-sm text-gray-600">Gestión de piezas y existencias disponibles.</p>
            </div>
            <a href="<?php echo e(route('inventory.create')); ?>" class="w-full md:w-auto text-center bg-[#D4AF37] text-white px-6 py-3 rounded-full font-bold shadow-md hover:bg-[#B8962E] transition-all uppercase text-sm tracking-widest">
                + NUEVA PIEZA
            </a>
        </div>

        
        <div class="hidden md:block bg-white rounded-3xl shadow-xl border border-[#D4AF37]/20 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-[#FDF2D0]/50 border-b border-[#D4AF37]/20">
                    <tr>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">Imagen</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">Producto</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">Categoría</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-gray-400 text-center">Stock</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-gray-400 text-right">Costo</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-gray-400 text-right">Precio</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-gray-400 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr class="hover:bg-[#FDF2D0]/10 transition-colors">
                        <td class="p-4">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($producto->imagen): ?>
                                <img src="<?php echo e(asset('storage/' . $producto->imagen)); ?>" class="size-12 rounded-lg object-cover border border-gray-200">
                            <?php else: ?>
                                <div class="size-12 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 text-xs">🖼️</div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>
                        <td class="p-4">
                            <div class="font-bold text-[#1A1A1A] text-sm"><?php echo e($producto->nombre); ?></div>
                            <div class="text-[10px] text-gray-400 uppercase italic">📍 <?php echo e($producto->ubicacion ?? 'Sin ubicación'); ?></div>
                        </td>
                        <td class="p-4">
                            <span class="text-[10px] font-bold text-gray-500 bg-gray-100 px-2 py-1 rounded-md uppercase">
                                <?php echo e($producto->categoria ?? 'General'); ?>

                            </span>
                        </td>
                        <td class="p-4 text-center">
                            <span class="px-3 py-1 rounded-full text-xs font-bold <?php echo e($producto->inventario <= 5 ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700'); ?>">
                                <?php echo e($producto->inventario <= 5 ? '⚠️ ' : ''); ?><?php echo e($producto->inventario); ?>

                            </span>
                        </td>
                        <td class="p-4 text-right text-gray-500 font-mono text-xs">$<?php echo e(number_format($producto->precompra, 2)); ?></td>
                        <td class="p-4 text-right font-bold text-[#D4AF37] font-mono text-sm">$<?php echo e(number_format($producto->preventa, 2)); ?></td>
                        <td class="p-4 text-center space-x-3">
                            <a href="<?php echo e(route('productos.edit', $producto->idproducto)); ?>" class="text-blue-600 hover:scale-125 transition-transform inline-block">✏️</a>
                            <form action="<?php echo e(route('productos.destroy', $producto->idproducto)); ?>" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro?');">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600 hover:scale-125 transition-transform">🗑️</button>
                            </form>
                        </td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <div class="md:hidden space-y-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <div class="bg-white p-4 rounded-3xl shadow-md border border-[#D4AF37]/10 flex gap-4 items-center">
                
                <div class="flex-shrink-0">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($producto->imagen): ?>
                        <img src="<?php echo e(asset('storage/' . $producto->imagen)); ?>" class="size-20 rounded-2xl object-cover border border-gray-100">
                    <?php else: ?>
                        <div class="size-20 bg-gray-50 rounded-2xl flex items-center justify-center text-2xl border border-dashed border-gray-200">🖼️</div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-start">
                        <h4 class="font-bold text-[#1A1A1A] truncate"><?php echo e($producto->nombre); ?></h4>
                        <span class="font-mono font-bold text-[#D4AF37]">$<?php echo e(number_format($producto->preventa, 2)); ?></span>
                    </div>
                    <p class="text-[10px] text-gray-400 uppercase mb-2"><?php echo e($producto->categoria ?? 'General'); ?></p>
                    
                    <div class="flex justify-between items-center mt-2">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold <?php echo e($producto->inventario <= 5 ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700'); ?>">
                            Stock: <?php echo e($producto->inventario); ?>

                        </span>
                        
                        <div class="flex gap-4">
                            <a href="<?php echo e(route('productos.edit', $producto->idproducto)); ?>" class="text-lg">✏️</a>
                            <form action="<?php echo e(route('productos.destroy', $producto->idproducto)); ?>" method="POST" onsubmit="return confirm('¿Eliminar pieza?');">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-lg">🗑️</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($productos->isEmpty()): ?>
            <div class="p-12 text-center text-gray-400 bg-white rounded-3xl border border-dashed border-gray-200 mt-4">
                <p class="text-sm italic font-medium uppercase tracking-widest">No hay piezas en el catálogo</p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
<?php endif; ?><?php /**PATH D:\laragon\www\gestion-bisuteria\resources\views/inventory/index.blade.php ENDPATH**/ ?>