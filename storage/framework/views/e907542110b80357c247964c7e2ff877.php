<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"> 
    <head>
        <?php echo $__env->make('partials.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </head>
    <body class="min-h-screen bg-[#FDF2D0] antialiased font-sans text-zinc-900"> 
        <div class="flex min-h-screen flex-col items-center justify-center p-6">
            <div class="flex w-full max-w-sm flex-col gap-2">
                
                
                <div class="w-full max-w-sm bg-white p-8 rounded-3xl shadow-2xl border-t-8 border-[#D4AF37] text-zinc-900">
                    <?php echo e($slot); ?>

                </div>

                
                <p class="text-center text-xs text-[#1A1A1A]/50 mt-4 uppercase tracking-widest">
                    &copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>

                </p>
            </div>
        </div>
        <?php app('livewire')->forceAssetInjection(); ?>
<?php echo app('flux')->scripts(); ?>

    </body>
</html><?php /**PATH D:\laragon\www\gestion-bisuteria\resources\views/layouts/auth/simple.blade.php ENDPATH**/ ?>