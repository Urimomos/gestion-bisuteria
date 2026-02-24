<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Courier', monospace; font-size: 12px; text-align: center; }
        .header { font-weight: bold; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { border-bottom: 1px dashed #000; text-align: left; }
        .total { font-weight: bold; font-size: 14px; margin-top: 15px; border-top: 1px solid #000; padding-top: 5px; }
        .footer { margin-top: 20px; font-size: 10px; }
    </style>
</head>
<body>
    <div class="header">
        BISUTERÍA ZACATELCO<br>
        TLAXCALA, MÉXICO<br>
        ---------------------------<br>
        TICKET DE VENTA
    </div>

    <div style="text-align: left;">
        FECHA: <?php echo e($ventaDetalle[0]->Fecha); ?><br>
        CLIENTE: <?php echo e($ventaDetalle[0]->cliente); ?><br>
        PAGO: <?php echo e($ventaDetalle[0]->mpago); ?>

    </div>

    <table>
        <thead>
            <tr>
                <th>CANT.</th>
                <th>PRODUCTO</th>
                <th>SUBT.</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $ventaDetalle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php $subtotal = $item->Cantidad * $item->preventa; $total += $subtotal; ?>
                <tr>
                    <td><?php echo e($item->Cantidad); ?></td>
                    <td><?php echo e($item->producto); ?></td>
                    <td>$<?php echo e(number_format($subtotal, 2)); ?></td>
                </tr>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </tbody>
    </table>

    <div class="total">
        TOTAL A PAGAR: $<?php echo e(number_format($total, 2)); ?>

    </div>

    <div class="footer">
        ¡GRACIAS POR SU COMPRA!<br>
        Hecho a mano con amor.
    </div>
</body>
</html><?php /**PATH C:\laragon\www\gestion-bisuteria\resources\views/reportes/ticket_pdf.blade.php ENDPATH**/ ?>