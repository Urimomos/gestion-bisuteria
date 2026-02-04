<div class="max-w-2xl mx-auto p-6 bg-brand-crema rounded-xl shadow-lg border border-gray-200">
    <div class="flex items-center space-x-4 mb-6">
        <x-app-logo-icon class="size-12" /> 
        <h2 class="text-2xl font-bold text-brand-negro">Registrar Nuevo Producto</h2>
    </div>

    <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        {{-- Nombre --}}
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-brand-negro">Nombre de la pieza</label>
            <input type="text" wire:model="name" class="w-full rounded-md border-gray-300 shadow-sm focus:border-brand-dorado focus:ring-brand-dorado">
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        {{-- Precios (Inspirado en lógica de costos de tus estudios) --}}
        <div>
            <label class="block text-sm font-medium text-brand-negro">Costo (Adquisición)</label>
            <input type="number" step="0.01" wire:model="cost" class="w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-brand-negro">Precio (Venta)</label>
            <input type="number" step="0.01" wire:model="price" class="w-full rounded-md border-gray-300 shadow-sm">
        </div>

        {{-- Inventario (Requisito de Stock) --}}
        <div>
            <label class="block text-sm font-medium text-brand-negro">Stock Inicial</label>
            <input type="number" wire:model="stock" class="w-full rounded-md border-gray-300 shadow-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-brand-negro">Alerta Stock Bajo</label>
            <input type="number" wire:model="min_stock" class="w-full rounded-md border-gray-300 shadow-sm" placeholder="Ej. 5">
        </div>

        {{-- Fotografía (Requisito funcional) --}}
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-brand-negro">Fotografía del Producto</label>
            <input type="file" wire:model="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-brand-dorado file:text-white hover:file:bg-opacity-80">
        </div>

        <div class="md:col-span-2 mt-4">
            <button type="submit" class="w-full bg-brand-negro text-white py-3 rounded-lg font-bold hover:bg-opacity-90 transition">
                Guardar en Inventario
            </button>
        </div>
    </form>
</div>