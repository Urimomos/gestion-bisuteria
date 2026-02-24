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

    <div class="p-6 lg:p-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-bold text-[#1A1A1A]">Gestión de Equipo</h2>
                <p class="text-gray-600">Administra los accesos y roles de tus empleados.</p>
            </div>
        </div>

        <style>
    .form-maestro {
        background-color: #1A1A1A !important;
        color: #FDF2D0 !important;
    }
    .form-maestro label {
        color: #D1D5DB !important; /* Gris claro para los labels */
    }
    .form-maestro input, .form-maestro select {
        color: white !important;
        background-color: rgba(255, 255, 255, 0.05) !important;
    }
    .form-maestro option {
        color: black !important;
    }
</style>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="form-maestro p-8 rounded-3xl shadow-xl h-fit border border-[#D4AF37]/20">
                <h3 class="font-bold uppercase mb-6 tracking-widest text-center" style="color: #FDF2D0 !important; border-bottom: 1px solid rgba(212, 175, 55, 0.2); padding-bottom: 10px;">Nuevo Registro</h3>
                <form action="<?php echo e(route('usuarios.store')); ?>" method="POST" class="space-y-4">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Nombre Completo</label>
                        <input type="text" name="name" required oninput="this.value = this.value.replace(/[0-9]/g, '')" class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white focus:ring-[#D4AF37]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Correo Electrónico</label>
                        <input type="email" name="email" required class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Contraseña Provisional</label>
                        <input type="password" name="password" required class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Asignar Rol</label>
                        <select name="rol" class="w-full bg-white/10 border-white/20 rounded-xl p-3 text-white">
                            <option value="empleado" class="text-black">Empleado (Ventas/Inventario)</option>
                            <option value="maestro" class="text-black">Maestro (Administrador)</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-[#D4AF37] text-white py-3 rounded-xl font-bold mt-4 hover:bg-[#B8962E] transition-all">
                        REGISTRAR ACCESO
                    </button>
                </form>
            </div>

            
            <div class="lg:col-span-2 bg-white rounded-3xl shadow-xl border border-[#D4AF37]/20 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="p-4 text-xs font-bold uppercase text-gray-400">Usuario</th>
                            <th class="p-4 text-xs font-bold uppercase text-gray-400">Rol</th>
                            <th class="p-4 text-xs font-bold uppercase text-gray-400 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-4">
                                <div class="flex items-center space-x-3">
                                    <div class="size-10 bg-[#D4AF37] text-white rounded-full flex items-center justify-center font-bold text-sm">
                                        <?php echo e($user->initials()); ?>

                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-800"><?php echo e($user->name); ?></p>
                                        <p class="text-xs text-gray-500"><?php echo e($user->email); ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->rol === 'maestro'): ?>
                                    <span class="bg-[#FDF2D0] text-[#B8962E] px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter border border-[#D4AF37]/30">
                                        👑 Maestro
                                    </span>
                                <?php else: ?>
                                    <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter">
                                        👤 Empleado
                                    </span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                            <td class="p-4 text-center">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->id !== auth()->id()): ?>
                                <form action="<?php echo e(route('usuarios.destroy', $user->id)); ?>" method="POST" onsubmit="return confirm('¿Retirar acceso a este usuario?');">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="text-red-400 hover:text-red-600">
                                        <?php if (isset($component)) { $__componentOriginalca0d7d887f05c1393a9d98702b6659ea = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalca0d7d887f05c1393a9d98702b6659ea = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.trash','data' => ['variant' => 'mini']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon.trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'mini']); ?>
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
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                        </tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </tbody>
                </table>
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
<?php endif; ?><?php /**PATH C:\laragon\www\gestion-bisuteria\resources\views/usuarios/index.blade.php ENDPATH**/ ?>