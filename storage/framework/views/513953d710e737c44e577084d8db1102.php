<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title' => null, 'description' => null]));

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

foreach (array_filter((['title' => null, 'description' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    use Illuminate\Support\Facades\Cache;
    use App\Models\Post;

    $siteName = $site['site_name'] ?? config('app.name');
    $pageTitle = $title ? "{$title} — {$siteName}" : "{$siteName} — " . __('media.brand_tagline');
    $pageDescription = $description ?? __('media.meta.description');
    $locale = app()->getLocale();
    $homeUrl = url($locale);

    $navLinks = [
        ['href' => route('blog.index'), 'label' => __('media.nav.news')],
        ['href' => route('video.index'), 'label' => __('media.nav.video')],
        ['href' => $homeUrl . '#onama', 'label' => __('media.nav.about')],
        ['href' => $homeUrl . '#kontakt', 'label' => __('media.nav.contact')],
    ];

    // Real latest headlines for the broadcast ticker.
    $tickerHeadlines = Cache::remember('site_ticker', 600, fn () =>
        Post::published()->orderByDesc('published_at')->take(6)->pluck('title')->all()
    );

    $socials = array_filter([
        'YouTube' => $site['youtube'] ?? null,
        'Instagram' => $site['instagram'] ?? null,
        'Facebook' => $site['facebook'] ?? null,
    ]);
?>
<!DOCTYPE html>
<html lang="<?php echo e($locale); ?>" class="scroll-pt-20">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($pageTitle); ?></title>
    <meta name="description" content="<?php echo e($pageDescription); ?>">
    <meta property="og:title" content="<?php echo e($pageTitle); ?>">
    <meta property="og:description" content="<?php echo e($pageDescription); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">
    <link rel="icon" href="/favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;0,9..144,900;1,9..144,400&family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-cream-100 font-sans text-ink-900 antialiased">

    
    <header id="site-header" class="sticky top-0 z-40 border-b border-white/10 bg-navy-950 text-white">
        <div class="mx-auto flex h-14 max-w-[100rem] items-center gap-4 px-4 sm:gap-6 sm:px-6">
            
            <a href="<?php echo e($homeUrl); ?>" class="flex shrink-0 items-center gap-2.5">
                <?php if (isset($component)) { $__componentOriginal987d96ec78ed1cf75b349e2e5981978f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal987d96ec78ed1cf75b349e2e5981978f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.logo','data' => ['class' => 'h-8 w-8 text-bronze-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-8 w-8 text-bronze-500']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal987d96ec78ed1cf75b349e2e5981978f)): ?>
<?php $attributes = $__attributesOriginal987d96ec78ed1cf75b349e2e5981978f; ?>
<?php unset($__attributesOriginal987d96ec78ed1cf75b349e2e5981978f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal987d96ec78ed1cf75b349e2e5981978f)): ?>
<?php $component = $__componentOriginal987d96ec78ed1cf75b349e2e5981978f; ?>
<?php unset($__componentOriginal987d96ec78ed1cf75b349e2e5981978f); ?>
<?php endif; ?>
                <span class="font-display text-2xl font-black leading-none tracking-tight">d<span class="text-bronze-500">1</span>centar</span>
            </a>

            
            <span class="hidden items-center gap-2 text-[11px] font-semibold uppercase tracking-[0.18em] text-white sm:flex">
                <span class="live-dot" aria-hidden="true"></span><?php echo e(__('media.live')); ?>

            </span>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($tickerHeadlines)): ?>
                <div class="ticker-mask hidden h-14 flex-1 items-center overflow-hidden border-x border-white/10 px-5 lg:flex">
                    <div class="ticker-track gap-10 text-[13px] text-navy-200">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = array_merge($tickerHeadlines, $tickerHeadlines); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $headline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="flex items-center gap-10">
                                <span class="h-1 w-1 rounded-full bg-bronze-500" aria-hidden="true"></span>
                                <?php echo e($headline); ?>

                            </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="hidden flex-1 lg:block"></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <nav class="hidden items-center gap-6 text-[13.5px] font-medium lg:flex" aria-label="Main">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $navLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($link['href']); ?>" class="text-navy-100 transition hover:text-white"><?php echo e($link['label']); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </nav>

            <span class="ml-auto hidden items-center gap-1.5 text-xs font-medium tracking-wide text-navy-200 lg:flex">
                <a href="<?php echo e(url('sr')); ?>" class="<?php echo e($locale === 'sr' ? 'text-white' : 'transition hover:text-white'); ?>">SR</a>
                <span class="text-navy-700">/</span>
                <a href="<?php echo e(url('en')); ?>" class="<?php echo e($locale === 'en' ? 'text-white' : 'transition hover:text-white'); ?>">EN</a>
            </span>

            <button id="menu-toggle" type="button" aria-expanded="false" aria-controls="mobile-menu"
                class="ml-auto rounded-md p-2 text-white transition hover:bg-white/10 lg:hidden">
                <span class="sr-only">Meni</span>
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" aria-hidden="true">
                    <path d="M4 7h16M4 12h16M4 17h16" />
                </svg>
            </button>
        </div>
    </header>

    
    <div id="menu-overlay" class="pointer-events-none fixed inset-0 z-40 bg-navy-950/70 opacity-0 transition-opacity duration-300 lg:hidden"></div>
    <div id="mobile-menu"
        class="fixed inset-y-0 right-0 z-50 flex w-80 max-w-[85vw] translate-x-full flex-col bg-navy-950 p-8 text-white transition-transform duration-300 lg:hidden">
        <div class="flex items-center justify-between">
            <span class="font-display text-2xl font-black tracking-tight">d<span class="text-bronze-500">1</span>centar</span>
            <button id="menu-close" type="button" class="rounded-md p-2 transition hover:bg-white/10">
                <span class="sr-only">Zatvori</span>
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" aria-hidden="true">
                    <path d="m6 6 12 12M18 6 6 18" />
                </svg>
            </button>
        </div>

        <nav class="mt-10 flex flex-col gap-1" aria-label="Mobile">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $navLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($link['href']); ?>"
                    class="rounded-md px-4 py-3 font-display text-xl text-cream-100 transition hover:bg-white/5 hover:text-bronze-400">
                    <?php echo e($link['label']); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </nav>

        <div class="mt-auto flex items-center gap-3 pt-8 text-sm font-medium text-navy-100">
            <a href="<?php echo e(url('sr')); ?>" class="<?php echo e($locale === 'sr' ? 'text-bronze-400' : ''); ?>">Srpski</a>
            <span class="text-navy-700">/</span>
            <a href="<?php echo e(url('en')); ?>" class="<?php echo e($locale === 'en' ? 'text-bronze-400' : ''); ?>">English</a>
        </div>
    </div>

    <main>
        <?php echo e($slot); ?>

    </main>

    
    <footer class="relative overflow-hidden bg-navy-950 text-navy-100">
        <div class="mx-auto max-w-[100rem] px-6 pt-16 pb-8">
            <div class="wordmark-ghost text-[19vw] leading-[0.8] sm:text-[16vw]" aria-hidden="true">
                d<span style="-webkit-text-stroke: 1.5px rgba(110,158,86,0.5);">1</span>centar
            </div>

            <div class="mt-10 grid gap-10 border-t border-white/10 pt-12 md:grid-cols-[2fr_1fr_1fr_1fr]">
                <p class="max-w-sm font-display text-lg leading-relaxed text-navy-100"><?php echo e(__('media.footer.about')); ?></p>

                <div>
                    <h3 class="text-xs font-semibold uppercase tracking-[0.16em] text-navy-200"><?php echo e(__('media.footer.sections')); ?></h3>
                    <ul class="mt-5 space-y-3 text-sm">
                        <li><a href="<?php echo e(route('blog.index')); ?>" class="transition hover:text-bronze-400"><?php echo e(__('media.nav.news')); ?></a></li>
                        <li><a href="<?php echo e(route('video.index')); ?>" class="transition hover:text-bronze-400"><?php echo e(__('media.nav.video')); ?></a></li>
                        <li><a href="<?php echo e($homeUrl); ?>#onama" class="transition hover:text-bronze-400"><?php echo e(__('media.nav.about')); ?></a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-semibold uppercase tracking-[0.16em] text-navy-200"><?php echo e(__('media.footer.newsroom')); ?></h3>
                    <ul class="mt-5 space-y-3 text-sm">
                        <li><a href="<?php echo e($homeUrl); ?>#onama" class="transition hover:text-bronze-400"><?php echo e(__('media.footer.newsroom_about')); ?></a></li>
                        <li><a href="<?php echo e($homeUrl); ?>#kontakt" class="transition hover:text-bronze-400"><?php echo e(__('media.footer.newsroom_tip')); ?></a></li>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($site['email'])): ?>
                            <li><a href="mailto:<?php echo e($site['email']); ?>" class="transition hover:text-bronze-400"><?php echo e($site['email']); ?></a></li>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($site['phone'])): ?>
                            <li><a href="tel:<?php echo e(preg_replace('/[^+\d]/', '', $site['phone'])); ?>" class="transition hover:text-bronze-400"><?php echo e($site['phone']); ?></a></li>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xs font-semibold uppercase tracking-[0.16em] text-navy-200"><?php echo e(__('media.footer.follow')); ?></h3>
                    <ul class="mt-5 space-y-3 text-sm">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li><a href="<?php echo e($url); ?>" target="_blank" rel="noopener" class="transition hover:text-bronze-400"><?php echo e($label); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li>YouTube</li>
                            <li>Instagram</li>
                            <li>Facebook</li>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </ul>
                </div>
            </div>

            <div class="mt-14 flex flex-col items-start justify-between gap-2 border-t border-white/10 pt-6 text-xs text-navy-200 sm:flex-row sm:items-center">
                <p>© <?php echo e(date('Y')); ?> <?php echo e($siteName); ?>, <?php echo e($site['address'] ?? 'Niš'); ?>. <?php echo e(__('media.footer.rights')); ?></p>
                <p><?php echo e(__('media.footer.tagline')); ?></p>
            </div>
        </div>
    </footer>

</body>

</html>
<?php /**PATH /var/www/html/d1centar-media/resources/views/components/site-layout.blade.php ENDPATH**/ ?>