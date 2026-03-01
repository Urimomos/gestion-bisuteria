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
        <div class="mb-8 text-center md:text-left">
            <h2 class="text-2xl font-bold text-[#1A1A1A]">Registro de Nuevo Producto</h2>
            <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Inventario Zacatelco</p>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-2xl mb-6 shadow-sm">
                <p class="font-bold text-sm mb-2 italic">⚠️ Por favor corrige lo siguiente:</p>
                <ul class="list-disc list-inside text-xs space-y-1">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <li><?php echo e($error); ?></li>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </ul>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <form action="<?php echo e(route('productos.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
            <?php echo csrf_field(); ?>
            <div class="bg-white p-6 md:p-8 rounded-3xl shadow-xl border border-[#D4AF37]/20">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-6">
                    
                    
                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Nombre de la Pieza</label>
                        <input type="text" name="nombre" value="<?php echo e(old('nombre')); ?>" 
                               oninput="this.value = this.value.replace(/[0-9]/g, '')" 
                               class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 focus:ring-[#D4AF37] focus:border-[#D4AF37] text-sm" 
                               placeholder="Ej. Collar de Perlas con Dije">
                    </div>

                    
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Categoría</label>
                        <input type="text" name="categoria" placeholder="Ej. Pulseras" 
                               oninput="this.value = this.value.replace(/[0-9]/g, '')"
                               class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]">
                    </div>

                    
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Ubicación</label>
                        <input type="text" name="ubicacion" placeholder="Ej. Vitrina A" 
                               class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]">
                    </div>

                    
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Costo (Compra)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-4 text-gray-400">$</span>
                            <input type="number" min="0" step="0.01" name="precompra" 
                                   oninput="if(this.value < 0) this.value = 0;"
                                   value="<?php echo e(old('precompra')); ?>" 
                                   class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 pl-8 text-sm focus:ring-[#D4AF37]" placeholder="0.00">
                        </div>
                    </div>

                    
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Precio (Venta)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-4 text-[#D4AF37] font-bold">$</span>
                            <input type="number" min="0" step="0.01" name="preventa" 
                                   oninput="if(this.value < 0) this.value = 0;"
                                   value="<?php echo e(old('preventa')); ?>" 
                                   class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 pl-8 text-sm font-bold text-[#1A1A1A] focus:ring-[#D4AF37]" placeholder="0.00">
                        </div>
                    </div>

                    
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Stock Inicial</label>
                        <input type="number" min="0" name="inventario" value="<?php echo e(old('inventario')); ?>" 
                               oninput="if(this.value < 0) this.value = 0;"
                               class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]" placeholder="0">
                    </div>

                    
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Foto</label>
                        <input type="file" name="imagen" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-bold file:bg-[#1A1A1A] file:text-[#FDF2D0] hover:file:bg-black cursor-pointer">
                    </div>
                </div>

                
                <div class="mt-10 flex flex-col-reverse md:flex-row justify-end gap-4">
                    <a href="<?php echo e(route('inventory.index')); ?>" 
                       class="w-full md:w-auto px-8 py-4 text-center text-gray-400 font-bold hover:text-gray-600 transition-colors text-sm">
                        CANCELAR
                    </a>
                    <button type="submit" 
                            class="w-full md:w-auto bg-[#D4AF37] text-white px-10 py-4 rounded-2xl font-bold shadow-xl hover:bg-[#B8962E] transition-all uppercase text-sm tracking-widest">
                        GUARDAR PRODUCTO
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
<?php endif; ?><?php /**PATH D:\laragon\www\gestion-bisuteria\resources\views/inventory/create.blade.php ENDPATH**/ ?>