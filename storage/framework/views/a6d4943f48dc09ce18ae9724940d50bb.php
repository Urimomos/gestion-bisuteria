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

    <div class="p-4 md:p-8 max-w-4xl mx-auto">
        
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-2xl shadow-sm text-sm">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="bg-white p-5 md:p-8 rounded-3xl shadow-xl border border-[#D4AF37]/20">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-2 text-center md:text-left">
                <h3 class="text-lg md:text-xl font-bold uppercase text-[#1A1A1A] tracking-tight">Iniciar Venta</h3>
                <a href="<?php echo e(route('clientes.create')); ?>" class="text-[10px] font-bold text-[#D4AF37] hover:underline uppercase tracking-widest">+ REGISTRAR NUEVO CLIENTE</a>
            </div>
            
            
            <div class="mb-8">
                <a href="<?php echo e(route('ventas.create', ['idcliente' => 1])); ?>" 
                   class="flex flex-col md:flex-row items-center justify-center gap-2 w-full bg-[#D4AF37] text-white p-5 rounded-2xl font-bold shadow-lg hover:bg-[#B8962E] transition-all group">
                    <span class="tracking-widest uppercase text-xs md:text-sm text-center">Venta Público General</span>
                </a>
            </div>

            
            <div class="relative flex py-6 items-center">
                <div class="flex-grow border-t border-gray-100"></div>
                <span class="flex-shrink mx-4 text-gray-400 text-[10px] uppercase font-bold tracking-tighter">O buscar cliente</span>
                <div class="flex-grow border-t border-gray-100"></div>
            </div>

            
            <form action="<?php echo e(route('ventas.buscar')); ?>" method="GET" class="mb-8">
                <div class="flex flex-col md:flex-row gap-3">
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" 
                           placeholder="Nombre del cliente..." 
                           class="flex-1 bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm focus:ring-[#D4AF37] focus:border-[#D4AF37]">
                    <button type="submit" class="w-full md:w-auto bg-[#1A1A1A] text-[#FDF2D0] px-10 py-4 rounded-2xl font-bold hover:bg-black transition text-sm">
                        BUSCAR
                    </button>
                </div>
            </form>

            
            <div class="space-y-3 max-h-[450px] overflow-y-auto pr-1">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <div class="flex flex-col sm:flex-row justify-between items-center p-5 border border-gray-50 hover:border-[#D4AF37]/40 hover:bg-[#FDF2D0]/10 rounded-2xl transition-all group gap-4 text-center sm:text-left">
                        <div class="w-full sm:w-auto">
                            <p class="font-bold text-[#1A1A1A] text-sm group-hover:text-black"><?php echo e($c->nombre); ?> <?php echo e($c->AP); ?> <?php echo e($c->AM); ?></p>
                            <p class="text-[10px] text-gray-400 italic mt-1"><?php echo e($c->telefono ?? 'Sin teléfono'); ?> | <?php echo e($c->email ?? 'Sin correo'); ?></p>
                        </div>
                        
                        <a href="<?php echo e(route('ventas.create', ['idcliente' => $c->idcliente])); ?>" 
                           class="w-full sm:w-auto bg-[#1A1A1A]/5 text-[#1A1A1A] border border-[#1A1A1A]/10 px-8 py-3 rounded-xl text-[10px] font-black hover:bg-[#D4AF37] hover:text-white hover:border-[#D4AF37] transition-all uppercase tracking-widest text-center">
                             SELECCIONAR
                        </a>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <div class="text-center py-12 bg-gray-50/50 rounded-3xl border border-dashed border-gray-200">
                        <p class="text-gray-400 text-xs italic">No se encontraron clientes registrado.</p>
                        <a href="<?php echo e(route('clientes.create')); ?>" class="mt-4 inline-block text-[#D4AF37] text-[10px] font-bold underline uppercase tracking-widest">Crear cuenta nueva</a>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('imprimir_ticket')): ?>
        <script>
            const urlTicket = "<?php echo e(session('imprimir_ticket')); ?>";
            const nuevaVentana = window.open(urlTicket, '_blank');
            if(!nuevaVentana || nuevaVentana.closed || typeof nuevaVentana.closed=='undefined') { 
                alert('El ticket se bloqueó. Por favor, permite las ventanas emergentes.');
            }
        </script>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1a7ecdc5bab41c522bd30c83b1a73cf0)): ?>
<?php $attributes = $__attributesOriginal1a7ecdc5bab41c522bd30c83b1a73cf0; ?>
<?php unset($__attributesOriginal1a7ecdc5bab41c522bd30c83b1a73cf0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1a7ecdc5bab41c522bd30c83b1a73cf0)): ?>
<?php $component = $__componentOriginal1a7ecdc5bab41c522bd30c83b1a73cf0; ?>
<?php unset($__componentOriginal1a7ecdc5bab41c522bd30c83b1a73cf0); ?>
<?php endif; ?><?php /**PATH D:\laragon\www\gestion-bisuteria\resources\views/ventas/buscar_cliente.blade.php ENDPATH**/ ?>