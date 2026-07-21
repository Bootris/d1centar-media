@props(['class' => 'h-9 w-9'])

{{-- d1centar mark: "D1" inside a ring. Inherits currentColor (brand green). --}}
<svg {{ $attributes->merge(['class' => $class]) }} viewBox="0 0 48 48" fill="none" aria-hidden="true">
    <circle cx="24" cy="24" r="21" stroke="currentColor" stroke-width="3.5" />
    <text x="24" y="24" text-anchor="middle" dominant-baseline="central"
        font-family="'Space Grotesk', ui-sans-serif, sans-serif" font-weight="700" font-size="20"
        letter-spacing="-0.5" fill="currentColor">D1</text>
</svg>
