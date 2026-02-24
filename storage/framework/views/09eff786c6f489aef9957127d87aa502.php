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
        
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
            <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-xl">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="bg-white p-8 rounded-3xl shadow-xl border border-[#D4AF37]/20">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold uppercase text-[#1A1A1A]">Seleccionar Cliente para Venta</h3>
                
                <a href="<?php echo e(route('clientes.create')); ?>" class="text-xs font-bold text-[#D4AF37] hover:underline">+ REGISTRAR NUEVO</a>
            </div>
            
            <form action="<?php echo e(route('ventas.buscar')); ?>" method="GET" class="mb-8">
                <div class="flex gap-2">
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" 
                           placeholder="Buscar por nombre o apellidos..." 
                           class="flex-1 bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-xl p-4 focus:ring-[#D4AF37] focus:border-[#D4AF37]">
                    <button type="submit" class="bg-[#1A1A1A] text-[#FDF2D0] px-8 rounded-xl font-bold hover:bg-black transition">
                        BUSCAR
                    </button>
                </div>
            </form>

            <div class="space-y-3 max-h-[500px] overflow-y-auto pr-2">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <div class="flex justify-between items-center p-4 border border-gray-100 hover:border-[#D4AF37]/50 hover:bg-[#FDF2D0]/10 rounded-2xl transition-all group">
                        <div>
                            <p class="font-bold text-gray-800 group-hover:text-[#1A1A1A]"><?php echo e($c->nombre); ?> <?php echo e($c->AP); ?> <?php echo e($c->AM); ?></p>
                            <p class="text-xs text-gray-500 italic"><?php echo e($c->telefono ?? 'Sin teléfono'); ?> | <?php echo e($c->email ?? 'Sin correo'); ?></p>
                        </div>
                        
                        <a href="<?php echo e(route('ventas.create', ['idcliente' => $c->idcliente])); ?>" 
                           class="bg-[#D4AF37] text-white px-6 py-2 rounded-xl text-sm font-bold hover:bg-[#B8962E] shadow-sm transition">
                             SELECCIONAR
                        </a>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <div class="text-center py-10">
                        <p class="text-gray-400 italic">No se encontraron clientes con ese nombre.</p>
                        <a href="<?php echo e(route('clientes.create')); ?>" class="mt-4 inline-block text-[#D4AF37] font-bold underline">Registrar cliente nuevo aquí</a>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
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
<?php endif; ?><?php /**PATH C:\laragon\www\gestion-bisuteria\resources\views/ventas/buscar_cliente.blade.php ENDPATH**/ ?>