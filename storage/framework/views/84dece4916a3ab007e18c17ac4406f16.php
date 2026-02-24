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
                <h2 class="text-2xl font-bold text-[#1A1A1A]">Directorio de Clientes</h2>
                <p class="text-gray-600">Gestión de los clientes de Bisutería Zacatelco.</p>
            </div>
            <a href="<?php echo e(route('clientes.create')); ?>" class="bg-[#1A1A1A] text-[#FDF2D0] px-6 py-3 rounded-full font-bold shadow-md hover:bg-black transition-all">
                + NUEVO CLIENTE
            </a>
        </div>

        
        <div class="mb-6">
            <form action="<?php echo e(route('clientes.index')); ?>" method="GET" class="flex gap-2 max-w-md">
                <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Buscar por nombre o apellido..." 
                       class="flex-1 border-[#D4AF37]/30 rounded-xl p-3 focus:ring-[#D4AF37]">
                <button type="submit" class="bg-[#D4AF37] text-white px-4 rounded-xl font-bold italic shadow-sm hover:bg-[#B8962E]">Buscar</button>
            </form>
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-[#D4AF37]/20 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-[#FDF2D0]/50 border-b border-[#D4AF37]/20 text-[#1A1A1A]">
                    <tr>
                        <th class="p-4 text-xs font-bold uppercase tracking-widest">Nombre Completo</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-widest text-center">Teléfono</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-widest text-center">Correo</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-widest text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4">
                            <div class="font-bold text-gray-800"><?php echo e($cliente->nombre); ?> <?php echo e($cliente->AP); ?> <?php echo e($cliente->AM); ?></div>
                        </td>
                        <td class="p-4 text-center text-gray-600 text-sm"><?php echo e($cliente->telefono ?? '---'); ?></td>
                        <td class="p-4 text-center text-gray-600 text-sm"><?php echo e($cliente->email ?? '---'); ?></td>
                        <td class="p-4 text-center space-x-2">
                            
                            <button onclick="openEditModal(<?php echo e($cliente); ?>)" class="text-blue-600 hover:scale-110 transition inline-block">✏️</button>
                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->rol === 'maestro'): ?>
                            <form action="<?php echo e(route('clientes.destroy', $cliente->idcliente)); ?>" method="POST" class="inline" onsubmit="return confirm('¿Eliminar cliente?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600 hover:scale-110 transition">🗑️</button>
                            </form>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <div id="editModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white p-8 rounded-3xl w-full max-w-lg shadow-2xl border-t-4 border-[#D4AF37]">
        <h3 class="text-xl font-bold mb-6 text-[#1A1A1A] uppercase tracking-tight">Actualizar Datos del Cliente</h3>
        
        <form id="editForm" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <div class="space-y-4">
                
                <div>
                    <label class="block text-xs font-bold text-[#D4AF37] uppercase mb-1 ml-1">Nombre(s)</label>
                    <input type="text" name="nombre" id="edit_nombre" 
                           oninput="this.value = this.value.replace(/[0-9]/g, '')"
                           class="w-full border-gray-200 rounded-xl p-3 focus:ring-[#D4AF37] focus:border-[#D4AF37]" required>
                </div>

                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-[#D4AF37] uppercase mb-1 ml-1">Apellido P.</label>
                        <input type="text" name="AP" id="edit_ap" 
                               oninput="this.value = this.value.replace(/[0-9]/g, '')"
                               class="w-full border-gray-200 rounded-xl p-3 focus:ring-[#D4AF37] focus:border-[#D4AF37]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#D4AF37] uppercase mb-1 ml-1">Apellido M.</label>
                        <input type="text" name="AM" id="edit_am" 
                               oninput="this.value = this.value.replace(/[0-9]/g, '')"
                               class="w-full border-gray-200 rounded-xl p-3 focus:ring-[#D4AF37] focus:border-[#D4AF37]">
                    </div>
                </div>

                
                <div>
                    <label class="block text-xs font-bold text-[#D4AF37] uppercase mb-1 ml-1">Teléfono</label>
                    <input type="text" name="telefono" id="edit_tel" 
                           class="w-full border-gray-200 rounded-xl p-3 focus:ring-[#D4AF37] focus:border-[#D4AF37]">
                </div>

                
                <div>
                    <label class="block text-xs font-bold text-[#D4AF37] uppercase mb-1 ml-1">Correo Electrónico</label>
                    <input type="email" name="email" id="edit_email" 
                           class="w-full border-gray-200 rounded-xl p-3 focus:ring-[#D4AF37] focus:border-[#D4AF37]">
                </div>
            </div>

            <div class="mt-8 flex gap-3">
                <button type="submit" class="flex-1 bg-[#1A1A1A] text-[#FDF2D0] py-3 rounded-xl font-bold shadow-lg hover:bg-black transition-all">
                    GUARDAR CAMBIOS
                </button>
                <button type="button" onclick="closeModal()" class="px-6 py-3 bg-gray-100 text-gray-500 rounded-xl font-bold hover:bg-gray-200 transition-all">
                    CANCELAR
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