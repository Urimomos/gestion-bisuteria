<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bisutería Zacatelco</title>

    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <style>
        /* FUERZA BRUTA: El fondo crema debe estar aquí */
        body { background-color: #FDF2D0 !important; margin: 0; padding: 0; }
        
        /* Sidebar blanco con borde dorado */
        ui-sidebar, [data-flux-sidebar] { 
            background-color: #ffffff !important; 
            border-right: 2px solid #D4AF37 !important; 
        }

        /* Texto negro para legibilidad */
        span, p, h2, h3, label { color: #1A1A1A !important; }
        
        /* Íconos negros */
        svg { stroke: #1A1A1A !important; }

        .text-red-600, .text-red-600 span {
            color: #dc2626 !important; /* Rojo intenso para el logout */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="min-h-screen antialiased">
    
    <?php if (isset($component)) { $__componentOriginal23399719f391f3076fe3bf0929a84741 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23399719f391f3076fe3bf0929a84741 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'f4ac99e09542ff494432bc959d4fee61::app.sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts::app.sidebar'); ?>
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
<?php if (isset($__attributesOriginal23399719f391f3076fe3bf0929a84741)): ?>
<?php $attributes = $__attributesOriginal23399719f391f3076fe3bf0929a84741; ?>
<?php unset($__attributesOriginal23399719f391f3076fe3bf0929a84741); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23399719f391f3076fe3bf0929a84741)): ?>
<?php $component = $__componentOriginal23399719f391f3076fe3bf0929a84741; ?>
<?php unset($__componentOriginal23399719f391f3076fe3bf0929a84741); ?>
<?php endif; ?>

    <?php app('livewire')->forceAssetInjection(); ?>
<?php echo app('flux')->scripts(); ?>

</body>
</html><?php /**PATH C:\laragon\www\gestion-bisuteria\resources\views/layouts/master.blade.php ENDPATH**/ ?>