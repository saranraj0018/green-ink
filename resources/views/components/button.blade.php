@props(['type' => 'button', 'varient' => 'primary'])

@php

    $styles = [
        'primary' => 'bg-[#006400] text-white hover:bg-[#006400]/80',
        'secondary' => 'bg-[#d98c33]/50 text-gray-800 hover:bg-gray-300',
        'outline' => 'border border-[#006400] text-[#006400] hover:bg-[#006400] hover:text-white',
        'danger' => 'bg-[#d7263d] text-white hover:bg-red-700',
        'ghost' => 'text-[#000] hover:bg-[#d98c33]/20',
        'link' => 'text-[#000] underline hover:text-gray-700',
    ];

    $bg = $styles[$varient];

@endphp

<button {{ $attributes->merge([]) }} class="{{ $bg }} cursor-pointer text-[.9em] font-medium px-3 py-1 rounded-md transition" type="{{ $type }}">
    {{ $slot }}
</button>
