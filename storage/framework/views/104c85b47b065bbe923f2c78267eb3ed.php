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
            <h2 class="text-2xl font-bold text-[#1A1A1A]">Editar Pieza</h2>
            <p class="text-[#D4AF37] font-bold italic"><?php echo e($producto->nombre); ?></p>
        </div>

        <form action="<?php echo e(route('productos.update', $producto->idproducto)); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="bg-white p-6 md:p-8 rounded-3xl shadow-xl border border-[#D4AF37]/20">
                
                <div class="mb-8 flex flex-col items-center md:flex-row md:gap-6 border-b border-gray-100 pb-6">
                    <div class="shrink-0 mb-4 md:mb-0">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($producto->imagen): ?>
                            <img src="<?php echo e(asset('storage/' . $producto->imagen)); ?>" class="size-32 rounded-3xl object-cover border-2 border-[#D4AF37]/20 shadow-md">
                        <?php else: ?>
                            <div class="size-32 bg-gray-50 rounded-3xl flex items-center justify-center text-4xl border-2 border-dashed border-gray-200">🖼️</div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div class="text-center md:text-left">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-2">Cambiar Foto</label>
                        <input type="file" name="imagen" class="text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-bold file:bg-[#1A1A1A] file:text-[#FDF2D0] cursor-pointer">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-6">
                    
                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Nombre de la pieza</label>
                        <input type="text" name="nombre" 
                        oninput="this.value = this.value.replace(/[0-9]/g, '')"
                        value="<?php echo e($producto->nombre); ?>" 
                               class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]" required>
                    </div>

                    
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Categoría</label>
                        <input type="text" name="categoria" 
                        oninput="this.value = this.value.replace(/[0-9]/g, '')"
                        value="<?php echo e($producto->categoria); ?> " 
                               placeholder="Ej. Pulseras" class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]">
                    </div>

                    
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Ubicación</label>
                        <input type="text" name="ubicacion" value="<?php echo e($producto->ubicacion); ?>" 
                               placeholder="Ej. Vitrina A" class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]">
                    </div>

                    
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Stock Actual</label>
                        <input type="number" min="0" oninput="if(this.value < 0) this.value = 0;"
                               name="inventario" value="<?php echo e($producto->inventario); ?>" 
                               class="w-full bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]" required>
                    </div>

                    
                    <div>
                        <label class="block text-[10px] font-bold mb-2 uppercase tracking-widest text-gray-400">Precio de Venta</label>
                        <div class="relative">
                            <span class="absolute left-4 top-4 text-[#D4AF37] font-bold">$</span>
                            <input type="number" min="0" oninput="if(this.value < 0) this.value = 0;" step="0.01" 
                                   name="preventa" value="<?php echo e($producto->preventa); ?>" 
                                   class="w-full pl-8 bg-[#FDF2D0]/20 border-[#D4AF37]/30 rounded-2xl p-4 text-sm font-bold focus:ring-[#D4AF37]" required>
                        </div>
                    </div>
                </div>

                
                <div class="mt-10 flex flex-col-reverse md:flex-row gap-4">
                    <a href="<?php echo e(route('inventory.index')); ?>" 
                       class="w-full md:flex-1 px-6 py-4 border border-gray-200 rounded-2xl text-gray-500 font-bold hover:bg-gray-50 transition text-center text-sm">
                        CANCELAR
                    </a>
                    <button type="submit" 
                            class="w-full md:flex-[2] bg-[#D4AF37] text-white py-4 rounded-2xl font-bold shadow-xl hover:bg-[#B8962E] transition-all uppercase text-sm tracking-widest">
                        GUARDAR CAMBIOS
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
<?php endif; ?><?php /**PATH D:\laragon\www\gestion-bisuteria\resources\views/inventory/edit.blade.php ENDPATH**/ ?>