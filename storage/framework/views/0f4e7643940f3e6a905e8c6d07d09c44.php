<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['class' => 'h-9 w-9']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['class' => 'h-9 w-9']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>


<svg <?php echo e($attributes->merge(['class' => $class])); ?> viewBox="0 0 48 48" fill="none" aria-hidden="true">
    <circle cx="24" cy="24" r="21" stroke="currentColor" stroke-width="3.5" />
    <text x="24" y="24" text-anchor="middle" dominant-baseline="central"
        font-family="'Space Grotesk', ui-sans-serif, sans-serif" font-weight="700" font-size="20"
        letter-spacing="-0.5" fill="currentColor">D1</text>
</svg>
<?php /**PATH /var/www/html/d1centar-media/resources/views/components/logo.blade.php ENDPATH**/ ?>