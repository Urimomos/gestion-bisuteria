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
        <h2 class="text-2xl font-bold mb-6 text-[#1A1A1A]">Editar Pieza: <?php echo e($producto->nombre); ?></h2>

        <form action="<?php echo e(route('productos.update', $producto->idproducto)); ?>" method="POST" class="bg-white p-8 rounded-3xl shadow-lg border border-[#D4AF37]/20">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Nombre de la pieza</label>
                    <input type="text" name="nombre" value="<?php echo e($producto->nombre); ?>" class="w-full border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37]" required>
                </div>

                
                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Categoría</label>
                    <input type="text" name="categoria" value="<?php echo e($producto->categoria); ?>" placeholder="Ej. Pulseras" class="w-full border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37]">
                </div>

                
                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Ubicación</label>
                    <input type="text" name="ubicacion" value="<?php echo e($producto->ubicacion); ?>" placeholder="Ej. Vitrina A" class="w-full border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37]">
                </div>

                
                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Stock Actual</label>
                    <input type="number" name="inventario" value="<?php echo e($producto->inventario); ?>" class="w-full border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37]" required>
                </div>

                
                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Precio de Venta</label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-gray-400">$</span>
                        <input type="number" step="0.01" name="preventa" value="<?php echo e($producto->preventa); ?>" class="w-full pl-8 border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37]" required>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex gap-4">
                <button type="submit" class="flex-1 bg-[#D4AF37] text-white py-3 rounded-xl font-bold shadow-md hover:bg-[#B8962E] transition">
                    GUARDAR CAMBIOS
                </button>
                <a href="<?php echo e(route('inventory.index')); ?>" class="px-6 py-3 border border-gray-300 rounded-xl text-gray-600 font-bold hover:bg-gray-50 transition">
                    CANCELAR
                </a>
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