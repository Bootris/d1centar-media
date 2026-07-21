<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['post']));

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

foreach (array_filter((['post']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $isVideo = (bool) $post->video_embed_url;
    $film = ['film-green', 'film-warm', 'film-cool'][$post->id % 3];
    $imageUrl = $post->featured_image
        ? Illuminate\Support\Facades\Storage::disk('public')->url($post->featured_image)
        : null;
?>

<article <?php echo e($attributes->merge(['class' => 'group flex h-full flex-col'])); ?>>
    <a href="<?php echo e(route('blog.show', $post->slug)); ?>" class="relative block aspect-[3/2] overflow-hidden rounded-sm">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($imageUrl): ?>
            <img src="<?php echo e($imageUrl); ?>" alt="<?php echo e($post->title); ?>"
                class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
        <?php else: ?>
            <span class="film absolute inset-0 transition duration-500 group-hover:scale-105"></span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isVideo): ?>
            <span class="absolute left-3 top-3 z-10 rounded-sm bg-bronze-500 px-2.5 py-1 text-[10.5px] font-bold uppercase tracking-[0.12em] text-white">
                <?php echo e(__('media.blog.video_badge')); ?>

            </span>
            <span class="play-ring absolute left-1/2 top-1/2 z-10 h-12 w-12 -translate-x-1/2 -translate-y-1/2" aria-hidden="true"></span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </a>

    <div class="mt-4 flex items-center justify-between">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->category): ?>
            <span class="inline-flex items-center gap-2 text-[11.5px] font-semibold uppercase tracking-[0.16em] text-bronze-600">
                <span class="h-1.5 w-1.5 rounded-full bg-bronze-500" aria-hidden="true"></span><?php echo e($post->category->name); ?>

            </span>
        <?php else: ?>
            <span></span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <span class="font-sans text-[12px] font-semibold tracking-wide text-ink-400">NO. <?php echo e(str_pad($post->id, 3, '0', STR_PAD_LEFT)); ?></span>
    </div>

    <h3 class="mt-3 font-display text-xl font-semibold leading-tight text-ink-900 transition group-hover:text-bronze-600 sm:text-[22px]">
        <a href="<?php echo e(route('blog.show', $post->slug)); ?>"><?php echo e($post->title); ?></a>
    </h3>

    <div class="mt-auto flex items-center gap-4 border-t border-ink-900/10 pt-3.5 text-[12.5px] text-ink-600">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->author_display): ?>
            <span class="font-semibold text-ink-900"><?php echo e($post->author_display); ?></span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <span><?php echo e($isVideo ? __('media.blog.watch_video') : $post->reading_time . ' ' . __('media.blog.min_read')); ?></span>
    </div>
</article>
<?php /**PATH /var/www/html/d1centar-media/resources/views/components/post-card.blade.php ENDPATH**/ ?>