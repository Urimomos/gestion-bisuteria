<?php if (isset($component)) { $__componentOriginal17e56bc23bb0192e474b351c4358d446 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17e56bc23bb0192e474b351c4358d446 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::sidebar.index','data' => ['sticky' => true,'stashable' => true,'class' => 'bg-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sticky' => true,'stashable' => true,'class' => 'bg-white']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <?php if (isset($component)) { $__componentOriginal6cdb42459f68d5ce2e97131ae988e57c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6cdb42459f68d5ce2e97131ae988e57c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::brand','data' => ['href' => ''.e(route('dashboard')).'','name' => 'Zacatelco','class' => 'px-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::brand'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('dashboard')).'','name' => 'Zacatelco','class' => 'px-2']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        <div style="height: 150px; width: 280px; display: flex; align-items: center; justify-content: flex-start; overflow: visible;">
           <?php if (isset($component)) { $__componentOriginal159d6670770cb479b1921cea6416c26c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal159d6670770cb479b1921cea6416c26c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-logo-icon','data' => ['class' => 'w-48 h-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-logo-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-48 h-auto']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal159d6670770cb479b1921cea6416c26c)): ?>
<?php $attributes = $__attributesOriginal159d6670770cb479b1921cea6416c26c; ?>
<?php unset($__attributesOriginal159d6670770cb479b1921cea6416c26c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal159d6670770cb479b1921cea6416c26c)): ?>
<?php $component = $__componentOriginal159d6670770cb479b1921cea6416c26c; ?>
<?php unset($__componentOriginal159d6670770cb479b1921cea6416c26c); ?>
<?php endif; ?>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6cdb42459f68d5ce2e97131ae988e57c)): ?>
<?php $attributes = $__attributesOriginal6cdb42459f68d5ce2e97131ae988e57c; ?>
<?php unset($__attributesOriginal6cdb42459f68d5ce2e97131ae988e57c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6cdb42459f68d5ce2e97131ae988e57c)): ?>
<?php $component = $__componentOriginal6cdb42459f68d5ce2e97131ae988e57c; ?>
<?php unset($__componentOriginal6cdb42459f68d5ce2e97131ae988e57c); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalacac6a48a34186ea0abd369a00e5e2d4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalacac6a48a34186ea0abd369a00e5e2d4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::navlist.index','data' => ['variant' => 'outline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::navlist'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'outline']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        <?php if (isset($component)) { $__componentOriginalda376aa217444bbd92367ba1444eb3b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalda376aa217444bbd92367ba1444eb3b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::navlist.item','data' => ['icon' => 'home','href' => ''.e(route('dashboard')).'','wire:navigate' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::navlist.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'home','href' => ''.e(route('dashboard')).'','wire:navigate' => true]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>
Panel Principal <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalda376aa217444bbd92367ba1444eb3b8)): ?>
<?php $attributes = $__attributesOriginalda376aa217444bbd92367ba1444eb3b8; ?>
<?php unset($__attributesOriginalda376aa217444bbd92367ba1444eb3b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalda376aa217444bbd92367ba1444eb3b8)): ?>
<?php $component = $__componentOriginalda376aa217444bbd92367ba1444eb3b8; ?>
<?php unset($__componentOriginalda376aa217444bbd92367ba1444eb3b8); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalda376aa217444bbd92367ba1444eb3b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalda376aa217444bbd92367ba1444eb3b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::navlist.item','data' => ['icon' => 'archive-box','href' => ''.e(route('inventory.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::navlist.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'archive-box','href' => ''.e(route('inventory.index')).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>
Inventario <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalda376aa217444bbd92367ba1444eb3b8)): ?>
<?php $attributes = $__attributesOriginalda376aa217444bbd92367ba1444eb3b8; ?>
<?php unset($__attributesOriginalda376aa217444bbd92367ba1444eb3b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalda376aa217444bbd92367ba1444eb3b8)): ?>
<?php $component = $__componentOriginalda376aa217444bbd92367ba1444eb3b8; ?>
<?php unset($__componentOriginalda376aa217444bbd92367ba1444eb3b8); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalda376aa217444bbd92367ba1444eb3b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalda376aa217444bbd92367ba1444eb3b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::navlist.item','data' => ['icon' => 'clock','href' => ''.e(route('reportes.index')).'','wire:navigate' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::navlist.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'clock','href' => ''.e(route('reportes.index')).'','wire:navigate' => true]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>
Historial de Cambios <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalda376aa217444bbd92367ba1444eb3b8)): ?>
<?php $attributes = $__attributesOriginalda376aa217444bbd92367ba1444eb3b8; ?>
<?php unset($__attributesOriginalda376aa217444bbd92367ba1444eb3b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalda376aa217444bbd92367ba1444eb3b8)): ?>
<?php $component = $__componentOriginalda376aa217444bbd92367ba1444eb3b8; ?>
<?php unset($__componentOriginalda376aa217444bbd92367ba1444eb3b8); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalda376aa217444bbd92367ba1444eb3b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalda376aa217444bbd92367ba1444eb3b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::navlist.item','data' => ['icon' => 'currency-dollar','href' => ''.e(route('ventas.buscar')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::navlist.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'currency-dollar','href' => ''.e(route('ventas.buscar')).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>
Ventas <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalda376aa217444bbd92367ba1444eb3b8)): ?>
<?php $attributes = $__attributesOriginalda376aa217444bbd92367ba1444eb3b8; ?>
<?php unset($__attributesOriginalda376aa217444bbd92367ba1444eb3b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalda376aa217444bbd92367ba1444eb3b8)): ?>
<?php $component = $__componentOriginalda376aa217444bbd92367ba1444eb3b8; ?>
<?php unset($__componentOriginalda376aa217444bbd92367ba1444eb3b8); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalda376aa217444bbd92367ba1444eb3b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalda376aa217444bbd92367ba1444eb3b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::navlist.item','data' => ['icon' => 'users','href' => ''.e(route('clientes.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::navlist.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'users','href' => ''.e(route('clientes.index')).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>
Clientes <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalda376aa217444bbd92367ba1444eb3b8)): ?>
<?php $attributes = $__attributesOriginalda376aa217444bbd92367ba1444eb3b8; ?>
<?php unset($__attributesOriginalda376aa217444bbd92367ba1444eb3b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalda376aa217444bbd92367ba1444eb3b8)): ?>
<?php $component = $__componentOriginalda376aa217444bbd92367ba1444eb3b8; ?>
<?php unset($__componentOriginalda376aa217444bbd92367ba1444eb3b8); ?>
<?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->rol === 'maestro'): ?>
            <div class="mt-4 px-4">
                <p class="text-xs font-bold text-gray-400 uppercase mb-2">Administración</p>
                <?php if (isset($component)) { $__componentOriginalda376aa217444bbd92367ba1444eb3b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalda376aa217444bbd92367ba1444eb3b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::navlist.item','data' => ['icon' => 'user-circle','href' => ''.e(route('usuarios.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::navlist.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'user-circle','href' => ''.e(route('usuarios.index')).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>
Empleados <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalda376aa217444bbd92367ba1444eb3b8)): ?>
<?php $attributes = $__attributesOriginalda376aa217444bbd92367ba1444eb3b8; ?>
<?php unset($__attributesOriginalda376aa217444bbd92367ba1444eb3b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalda376aa217444bbd92367ba1444eb3b8)): ?>
<?php $component = $__componentOriginalda376aa217444bbd92367ba1444eb3b8; ?>
<?php unset($__componentOriginalda376aa217444bbd92367ba1444eb3b8); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalda376aa217444bbd92367ba1444eb3b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalda376aa217444bbd92367ba1444eb3b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::navlist.item','data' => ['icon' => 'chart-bar','href' => ''.e(route('reportes.ventas')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::navlist.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'chart-bar','href' => ''.e(route('reportes.ventas')).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                Reporte de Ventas <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalda376aa217444bbd92367ba1444eb3b8)): ?>
<?php $attributes = $__attributesOriginalda376aa217444bbd92367ba1444eb3b8; ?>
<?php unset($__attributesOriginalda376aa217444bbd92367ba1444eb3b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalda376aa217444bbd92367ba1444eb3b8)): ?>
<?php $component = $__componentOriginalda376aa217444bbd92367ba1444eb3b8; ?>
<?php unset($__componentOriginalda376aa217444bbd92367ba1444eb3b8); ?>
<?php endif; ?>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalacac6a48a34186ea0abd369a00e5e2d4)): ?>
<?php $attributes = $__attributesOriginalacac6a48a34186ea0abd369a00e5e2d4; ?>
<?php unset($__attributesOriginalacac6a48a34186ea0abd369a00e5e2d4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalacac6a48a34186ea0abd369a00e5e2d4)): ?>
<?php $component = $__componentOriginalacac6a48a34186ea0abd369a00e5e2d4; ?>
<?php unset($__componentOriginalacac6a48a34186ea0abd369a00e5e2d4); ?>
<?php endif; ?>

    

    <?php if (isset($component)) { $__componentOriginalacac6a48a34186ea0abd369a00e5e2d4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalacac6a48a34186ea0abd369a00e5e2d4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::navlist.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::navlist'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        

        <form method="POST" action="<?php echo e(route('logout')); ?>" id="logout-form" class="hidden">
                <?php echo csrf_field(); ?>
            </form>

            <?php if (isset($component)) { $__componentOriginalda376aa217444bbd92367ba1444eb3b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalda376aa217444bbd92367ba1444eb3b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::navlist.item','data' => ['icon' => 'chevron-right','href' => ''.e(route('logout')).'','onclick' => 'event.preventDefault(); document.getElementById(\'logout-form\').submit();','class' => 'text-red-600 hover:text-red-700 font-bold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::navlist.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'chevron-right','href' => ''.e(route('logout')).'','onclick' => 'event.preventDefault(); document.getElementById(\'logout-form\').submit();','class' => 'text-red-600 hover:text-red-700 font-bold']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                <?php echo e(__('Cerrar Sesión')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalda376aa217444bbd92367ba1444eb3b8)): ?>
<?php $attributes = $__attributesOriginalda376aa217444bbd92367ba1444eb3b8; ?>
<?php unset($__attributesOriginalda376aa217444bbd92367ba1444eb3b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalda376aa217444bbd92367ba1444eb3b8)): ?>
<?php $component = $__componentOriginalda376aa217444bbd92367ba1444eb3b8; ?>
<?php unset($__componentOriginalda376aa217444bbd92367ba1444eb3b8); ?>
<?php endif; ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalacac6a48a34186ea0abd369a00e5e2d4)): ?>
<?php $attributes = $__attributesOriginalacac6a48a34186ea0abd369a00e5e2d4; ?>
<?php unset($__attributesOriginalacac6a48a34186ea0abd369a00e5e2d4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalacac6a48a34186ea0abd369a00e5e2d4)): ?>
<?php $component = $__componentOriginalacac6a48a34186ea0abd369a00e5e2d4; ?>
<?php unset($__componentOriginalacac6a48a34186ea0abd369a00e5e2d4); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal17e56bc23bb0192e474b351c4358d446)): ?>
<?php $attributes = $__attributesOriginal17e56bc23bb0192e474b351c4358d446; ?>
<?php unset($__attributesOriginal17e56bc23bb0192e474b351c4358d446); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal17e56bc23bb0192e474b351c4358d446)): ?>
<?php $component = $__componentOriginal17e56bc23bb0192e474b351c4358d446; ?>
<?php unset($__componentOriginal17e56bc23bb0192e474b351c4358d446); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginal95c5505ccad18880318521d2bba3eac7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95c5505ccad18880318521d2bba3eac7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::main','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <?php echo e($slot); ?> 
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95c5505ccad18880318521d2bba3eac7)): ?>
<?php $attributes = $__attributesOriginal95c5505ccad18880318521d2bba3eac7; ?>
<?php unset($__attributesOriginal95c5505ccad18880318521d2bba3eac7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95c5505ccad18880318521d2bba3eac7)): ?>
<?php $component = $__componentOriginal95c5505ccad18880318521d2bba3eac7; ?>
<?php unset($__componentOriginal95c5505ccad18880318521d2bba3eac7); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\gestion-bisuteria\resources\views/layouts/app/sidebar.blade.php ENDPATH**/ ?>