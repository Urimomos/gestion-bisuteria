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
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-[#1A1A1A]">Registro de Nuevo Producto</h2>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6">
                <ul class="list-disc list-inside text-sm">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <li><?php echo e($error); ?></li>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </ul>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <form action="<?php echo e(route('productos.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
            <?php echo csrf_field(); ?>
            <div class="bg-white p-8 rounded-3xl shadow-lg border border-[#D4AF37]/20">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    
                    <div class="col-span-2">
                        <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Nombre de la Pieza</label>
                        <input type="text" name="nombre" value="<?php echo e(old('nombre')); ?>" oninput="this.value = this.value.replace(/[0-9]/g, '')" class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37] focus:border-[#D4AF37]" placeholder="Ej. Collar de Perlas con Dije Dorado">
                    </div>

                    <div>
                       <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Categoría</label>
                       <input type="text" name="categoria" placeholder="Ej. Pulseras, Collares" oninput="this.value = this.value.replace(/[0-9]/g, '')"
                              class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37] focus:border-[#D4AF37]">
                   </div>
                   <div>
                       <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Ubicación en Tienda</label>
                       <input type="text" name="ubicacion" placeholder="Ej. Vitrina Principal, Estante 2" 
                              class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37] focus:border-[#D4AF37]">
                   </div>

                    
                    <div>
                        <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Costo (Precompra)</label>
                        <input type="number"
                        min="0" 
                        step="0.01" 
                        name="precompra" 
                        oninput="if(this.value < 0) this.value = 0;"
                        value="<?php echo e(old('precompra')); ?>" 
                        class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3" 
                        placeholder="0.00">
                    </div>

                    
                    <div>
                        <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Precio (Preventa)</label>
                        <input type="number" 
                        min="0"
                        oninput="if(this.value < 0) this.value = 0;"
                        step="0.01" 
                        name="preventa" 
                        value="<?php echo e(old('preventa')); ?>" 
                        class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3" 
                        placeholder="0.00">
                    </div>

                    
                    <div>
                        <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Stock Inicial (Inventario)</label>
                        <input type="number" 
                        min="0"
                        oninput="if(this.value < 0) this.value = 0;"
                        name="inventario" 
                        value="<?php echo e(old('inventario')); ?>" 
                        class="w-full bg-[#FDF2D0]/30 border-[#D4AF37]/30 rounded-xl p-3" 
                        placeholder="0">
                    </div>

                    
                    <div>
                        <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Foto del Producto</label>
                        <input type="file" name="imagen" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#1A1A1A] file:text-[#FDF2D0] hover:file:bg-black">
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="<?php echo e(route('inventory.index')); ?>" class="px-6 py-3 text-gray-500 font-bold hover:text-gray-700 transition-colors">CANCELAR</a>
                    <button type="submit" class="bg-[#D4AF37] text-white px-10 py-3 rounded-full font-bold shadow-lg hover:bg-[#B8962E] transition-all transform hover:scale-105">
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
<?php endif; ?><?php /**PATH C:\laragon\www\gestion-bisuteria\resources\views/inventory/create.blade.php ENDPATH**/ ?>