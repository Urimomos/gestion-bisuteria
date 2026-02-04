@props([
    'sidebar' => false,
])

@if($sidebar)
    <flux:sidebar.brand name="Bisutería Zacatelco" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-10 items-center justify-center rounded-md bg-transparent">
            <x-app-logo-icon class="size-8" />
        </x-slot>
    </flux:sidebar.brand>
@else
    <flux:brand name="Bisutería Zacatelco" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-10 items-center justify-center rounded-md bg-transparent">
            <x-app-logo-icon class="size-8" />
        </x-slot>
    </flux:brand>
@endif