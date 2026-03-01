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

    <div class="p-6 lg:p-8 max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-[#1A1A1A]">Punto de Venta</h2>
            <div class="text-right">
                <p class="text-xs text-gray-400 uppercase font-bold">Cliente Seleccionado</p>
                <p class="text-[#D4AF37] font-bold"><?php echo e($cliente->nombre); ?> <?php echo e($cliente->AP); ?></p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-3xl shadow-lg border border-[#D4AF37]/20">
                    <h3 class="text-sm font-bold mb-4 uppercase text-gray-700">1. Agregar a la lista</h3>
                    
                    <form action="<?php echo e(route('ventas.agregar')); ?>" method="POST" class="space-y-4">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="idcliente" value="<?php echo e($cliente->idcliente); ?>">
                        
                        <div>
                            <label class="block text-[10px] font-bold uppercase mb-1 text-gray-400">Pieza</label>
                            <select name="idproducto" class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/10 rounded-xl p-3 text-sm">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                    <option value="<?php echo e($prod->idproducto); ?>">
                                        <?php echo e($prod->nombre); ?> ($<?php echo e(number_format($prod->preventa, 2)); ?>)
                                    </option>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold uppercase mb-1 text-gray-400">Cantidad</label>
                            <input type="number" name="cantidad" min="1" value="1" 
                                   class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/10 rounded-xl p-3">
                        </div>

                        <button type="submit" class="w-full bg-[#D4AF37] text-white py-3 rounded-xl font-bold hover:bg-[#B8962E] transition-all shadow-md">
                            + AÑADIR PIEZA
                        </button>
                    </form>
                </div>
            </div>

            
            <div class="lg:col-span-2">
                <div class="bg-[#ffffff] rounded-3xl shadow-2xl overflow-hidden flex flex-col min-h-[450px]">
                    <div class="p-6 border-b border-white/10 flex justify-between items-center bg-white/5">
                        <h3 class="text-[#FDF2D0] font-bold uppercase tracking-widest text-sm">Resumen de Compra</h3>
                        <span class="bg-[#D4AF37] text-white text-[10px] px-2 py-1 rounded-md font-bold">TIENDA</span>
                    </div>

                    
                    <div class="flex-1 p-6 space-y-3 overflow-y-auto max-h-[300px]">
                        <?php $totalCuenta = 0; ?>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('carrito') && count(session('carrito')) > 0): ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = session('carrito'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indice => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <?php $totalCuenta += $item['subtotal']; ?>
                                <div class="flex justify-between items-center border-b border-white/5 pb-3 group">
                                    <div>
                                        <p class="text-white font-bold text-sm"><?php echo e($item['nombre']); ?></p>
                                        <p class="text-[10px] text-gray-500 italic"><?php echo e($item['cantidad']); ?> unidades x $<?php echo e(number_format($item['precio'], 2)); ?></p>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <span class="text-[#FDF2D0] font-mono font-bold text-sm">$<?php echo e(number_format($item['subtotal'], 2)); ?></span>
                                        <a href="<?php echo e(route('ventas.quitar', $indice)); ?>" class="text-red-500 hover:text-red-300 transition text-xs">✕</a>
                                    </div>
                                </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <?php else: ?>
                            <div class="h-full flex flex-col items-center justify-center text-gray-500 space-y-2">
                                <span class="text-4xl opacity-20">🛒</span>
                                <p class="italic text-sm">La lista de compra está vacía</p>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('carrito') && count(session('carrito')) > 0): ?>
                        <div class="p-8 bg-white/5 border-t border-white/10">
                            <form action="<?php echo e(route('ventas.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="idcliente" value="<?php echo e($cliente->idcliente); ?>">
                                
                                <div class="flex flex-col md:flex-row gap-6 items-center">
                                    <div class="w-full md:w-1/2">
                                        <label class="block text-[10px] font-bold uppercase text-[#D4AF37] mb-2">Método de Pago</label>
                                        <select name="mpago" class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-black focus:ring-[#D4AF37]">
                                            <option value="Efectivo" class="text-black">💵 Efectivo</option>
                                            <option value="Tarjeta" class="text-black">💳 Tarjeta</option>
                                        </select>
                                    </div>

                                    <div class="w-full md:w-1/2 text-right">
                                        <p class="text-[10px] font-bold text-gray-400 uppercase">Total a pagar</p>
                                        <p class="text-4xl font-bold text-[#FDF2D0] font-mono">$<?php echo e(number_format($totalCuenta, 2)); ?></p>
                                    </div>
                                </div>

                                <button type="submit" class="w-full mt-6 bg-[#D4AF37] text-[#1A1A1A] py-4 rounded-2xl font-bold text-lg hover:bg-[#B8962E] transition-all shadow-xl">
                                    COMPLETAR VENTA
                                </button>
                            </form>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
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
<?php endif; ?><?php /**PATH D:\laragon\www\gestion-bisuteria\resources\views/ventas/create.blade.php ENDPATH**/ ?>