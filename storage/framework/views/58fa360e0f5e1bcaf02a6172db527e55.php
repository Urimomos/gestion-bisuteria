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

    <div class="p-6 lg:p-8 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold text-[#1A1A1A] mb-8">Registrar Nueva Venta</h2>

        <form action="<?php echo e(route('ventas.store')); ?>" method="POST" class="space-y-6">
            <?php echo csrf_field(); ?>
            <div class="bg-white p-8 rounded-3xl shadow-lg border border-[#D4AF37]/20">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    
                    <div class="col-span-2">
                        <label class="block text-sm font-bold mb-2 uppercase">Producto</label>
                        <select name="idproducto" class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <option value="<?php echo e($prod->idproducto); ?>"><?php echo e($prod->nombre); ?> (Stock: <?php echo e($prod->inventario); ?>)</option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </select>
                    </div>

                    
                    <div>
                        <label class="block text-sm font-bold mb-2 uppercase">Cantidad</label>
                        <input type="number" name="cantidad" min="1" value="1" class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3">
                    </div>

                    
                    <div>
                        <label class="block text-sm font-bold mb-2 uppercase">Método de Pago</label>
                        <select name="mpago" class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3">
                            <option value="Efectivo">💵 Efectivo</option>
                            <option value="Tarjeta">💳 Tarjeta</option>
                        </select>
                    </div>

                    
                    <input type="hidden" name="idcliente" value="1"> 
                </div>

                <div class="mt-8">
                    <button type="submit" class="w-full bg-[#1A1A1A] text-[#FDF2D0] py-4 rounded-full font-bold text-lg shadow-xl hover:bg-black transition-all">
                        COMPLETAR VENTA
                    </button>
                </div>
            </div>
        </form>
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
<?php endif; ?><?php /**PATH C:\laragon\www\gestion-bisuteria\resources\views/ventas/create.blade.php ENDPATH**/ ?>