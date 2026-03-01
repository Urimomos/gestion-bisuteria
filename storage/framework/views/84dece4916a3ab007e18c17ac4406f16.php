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

    <div class="p-4 md:p-8">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-[#1A1A1A]">Directorio de Clientes</h2>
                <p class="text-sm text-gray-600">Gestión de los clientes de Bisutería Zacatelco.</p>
            </div>
            <a href="<?php echo e(route('clientes.create')); ?>" class="w-full md:w-auto text-center bg-[#1A1A1A] text-[#FDF2D0] px-6 py-3 rounded-full font-bold shadow-md hover:bg-black transition-all uppercase text-xs tracking-widest">
                + NUEVO CLIENTE
            </a>
        </div>

        
        <div class="mb-8">
            <form action="<?php echo e(route('clientes.index')); ?>" method="GET" class="flex flex-col sm:flex-row gap-2 max-w-xl">
                <input type="text" name="search" value="<?php echo e(request('search')); ?>" 
                       placeholder="Nombre o apellido..." 
                       class="flex-1 border-[#D4AF37]/30 rounded-2xl p-4 text-sm focus:ring-[#D4AF37] bg-white/50">
                <button type="submit" class="bg-[#D4AF37] text-white px-8 py-4 sm:py-2 rounded-2xl font-bold italic shadow-sm hover:bg-[#B8962E] transition-all">
                    Buscar
                </button>
            </form>
        </div>

        
        <div class="hidden lg:block bg-white rounded-3xl shadow-xl border border-[#D4AF37]/20 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-[#FDF2D0]/50 border-b border-[#D4AF37]/20 text-[#1A1A1A]">
                    <tr>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest">Nombre Completo</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-center">Teléfono</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-center">Correo</th>
                        <th class="p-4 text-[10px] font-bold uppercase tracking-widest text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr class="hover:bg-gray-50 transition-colors text-sm">
                        <td class="p-4">
                            <div class="font-bold text-gray-800 uppercase tracking-tight"><?php echo e($cliente->nombre); ?> <?php echo e($cliente->AP); ?> <?php echo e($cliente->AM); ?></div>
                        </td>
                        <td class="p-4 text-center text-gray-600 font-mono"><?php echo e($cliente->telefono ?? '---'); ?></td>
                        <td class="p-4 text-center text-gray-600 italic"><?php echo e($cliente->email ?? '---'); ?></td>
                        <td class="p-4 text-center space-x-4">
                            <button onclick="openEditModal(<?php echo e($cliente); ?>)" class="text-blue-600 hover:scale-125 transition inline-block">✏️</button>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->rol === 'maestro'): ?>
                            <form action="<?php echo e(route('clientes.destroy', $cliente->idcliente)); ?>" method="POST" class="inline" onsubmit="return confirm('¿Eliminar cliente?');">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600 hover:scale-125 transition">🗑️</button>
                            </form>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <div class="lg:hidden space-y-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <div class="bg-white p-5 rounded-3xl shadow-md border border-[#D4AF37]/10 flex flex-col gap-4">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter">Cliente</p>
                        <h4 class="font-black text-[#1A1A1A] leading-tight"><?php echo e($cliente->nombre); ?> <?php echo e($cliente->AP); ?> <?php echo e($cliente->AM); ?></h4>
                    </div>
                    <div class="flex gap-4">
                        <button onclick="openEditModal(<?php echo e($cliente); ?>)" class="text-xl">✏️</button>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->rol === 'maestro'): ?>
                        <form action="<?php echo e(route('clientes.destroy', $cliente->idcliente)); ?>" method="POST" onsubmit="return confirm('¿Eliminar?');">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-xl">🗑️</button>
                        </form>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 border-t border-gray-50 pt-3">
                    <div>
                        <p class="text-[9px] text-gray-400 font-bold uppercase">Teléfono</p>
                        <p class="text-xs font-mono text-gray-600"><?php echo e($cliente->telefono ?? '---'); ?></p>
                    </div>
                    <div>
                        <p class="text-[9px] text-gray-400 font-bold uppercase">Correo</p>
                        <p class="text-xs italic text-gray-600 truncate"><?php echo e($cliente->email ?? '---'); ?></p>
                    </div>
                </div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <div class="text-center py-10 bg-white rounded-3xl border border-dashed border-gray-200">
                <p class="text-gray-400 text-sm italic">No hay clientes registrados.</p>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    
    <div id="editModal" class="fixed inset-0 bg-black/60 hidden items-end sm:items-center justify-center z-[100] p-0 sm:p-4 backdrop-blur-sm transition-all">
        <div class="bg-white p-6 sm:p-8 rounded-t-[2.5rem] sm:rounded-[2.5rem] w-full max-w-lg shadow-2xl border-t-4 border-[#D4AF37] animate-in slide-in-from-bottom duration-300">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-black text-[#1A1A1A] uppercase tracking-tighter">Editar Cliente</h3>
                <button onclick="closeModal()" class="text-gray-400 text-2xl">&times;</button>
            </div>
            
            <form id="editForm" method="POST" class="space-y-4">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                
                <div>
                    <label class="block text-[10px] font-bold text-[#D4AF37] uppercase mb-2 ml-1">Nombre(s)</label>
                    <input type="text" name="nombre" id="edit_nombre" oninput="this.value = this.value.replace(/[0-9]/g, '')"
                           class="w-full bg-[#FDF2D0]/20 border-gray-100 rounded-2xl p-4 text-sm focus:ring-[#D4AF37]">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-bold text-[#D4AF37] uppercase mb-2 ml-1">Apellido P.</label>
                        <input type="text" name="AP" id="edit_ap" oninput="this.value = this.value.replace(/[0-9]/g, '')"
                               class="w-full bg-[#FDF2D0]/20 border-gray-100 rounded-2xl p-4 text-sm">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-[#D4AF37] uppercase mb-2 ml-1">Apellido M.</label>
                        <input type="text" name="AM" id="edit_am" oninput="this.value = this.value.replace(/[0-9]/g, '')"
                               class="w-full bg-[#FDF2D0]/20 border-gray-100 rounded-2xl p-4 text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-[#D4AF37] uppercase mb-2 ml-1">Teléfono</label>
                    <input type="text" name="telefono" id="edit_tel" class="w-full bg-[#FDF2D0]/20 border-gray-100 rounded-2xl p-4 text-sm font-mono">
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-[#D4AF37] uppercase mb-2 ml-1">Correo Electrónico</label>
                    <input type="email" name="email" id="edit_email" class="w-full bg-[#FDF2D0]/20 border-gray-100 rounded-2xl p-4 text-sm">
                </div>

                <div class="mt-8 flex flex-col sm:flex-row gap-3">
                    <button type="submit" class="flex-[2] bg-[#1A1A1A] text-[#FDF2D0] py-4 rounded-2xl font-bold shadow-lg hover:bg-black transition-all uppercase text-xs tracking-widest">
                        Guardar Cambios
                    </button>
                    <button type="button" onclick="closeModal()" class="flex-1 py-4 bg-gray-50 text-gray-400 rounded-2xl font-bold hover:bg-gray-100 transition-all uppercase text-xs tracking-widest">
                        Cerrar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(cliente) {
            const form = document.getElementById('editForm');
            form.action = `/clientes/${cliente.idcliente}`;
            document.getElementById('edit_nombre').value = cliente.nombre;
            document.getElementById('edit_ap').value = cliente.AP || '';
            document.getElementById('edit_am').value = cliente.AM || '';
            document.getElementById('edit_tel').value = cliente.telefono || '';
            document.getElementById('edit_email').value = cliente.email || '';
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
        }
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1a7ecdc5bab41c522bd30c83b1a73cf0)): ?>
<?php $attributes = $__attributesOriginal1a7ecdc5bab41c522bd30c83b1a73cf0; ?>
<?php unset($__attributesOriginal1a7ecdc5bab41c522bd30c83b1a73cf0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1a7ecdc5bab41c522bd30c83b1a73cf0)): ?>
<?php $component = $__componentOriginal1a7ecdc5bab41c522bd30c83b1a73cf0; ?>
<?php unset($__componentOriginal1a7ecdc5bab41c522bd30c83b1a73cf0); ?>
<?php endif; ?><?php /**PATH D:\laragon\www\gestion-bisuteria\resources\views/clientes/index.blade.php ENDPATH**/ ?>