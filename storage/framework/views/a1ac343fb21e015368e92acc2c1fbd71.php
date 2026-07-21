<?php if (isset($component)) { $__componentOriginald956570c5321d7185b887a45463f814f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald956570c5321d7185b887a45463f814f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.site-layout','data' => ['title' => __('media.video.page_title'),'description' => __('media.video.page_subtitle')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('site-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('media.video.page_title')),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('media.video.page_subtitle'))]); ?>

    
    <section class="bg-navy-950 text-white">
        <div class="mx-auto max-w-[100rem] px-6 py-16 sm:py-20">
            <p class="flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.22em] text-bronze-400">
                <span class="live-dot" aria-hidden="true"></span><?php echo e(__('media.video.kicker')); ?>

            </p>
            <h1 class="mt-3 font-display text-4xl font-black leading-none tracking-tight text-balance sm:text-7xl"><?php echo e(__('media.video.page_title')); ?></h1>
            <p class="mt-5 max-w-xl text-navy-100"><?php echo e(__('media.video.page_subtitle')); ?></p>
            <p class="mt-6 text-sm text-navy-200"><?php echo e($posts->total()); ?> <?php echo e(__('media.video.count')); ?></p>
        </div>
    </section>

    <section class="mx-auto max-w-[100rem] px-6 py-14">

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($categories->isNotEmpty()): ?>
            <div class="flex flex-wrap items-center gap-2 border-b border-cream-300 pb-8">
                <a href="<?php echo e(route('video.index')); ?>"
                    class="rounded-full px-4 py-1.5 text-sm font-medium transition <?php echo e($activeCategory ? 'border border-cream-300 text-ink-600 hover:border-bronze-400 hover:text-bronze-600' : 'bg-ink-900 text-white'); ?>">
                    <?php echo e(__('media.blog.all')); ?>

                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('video.index', ['category' => $category->slug])); ?>"
                        class="rounded-full px-4 py-1.5 text-sm font-medium transition <?php echo e($activeCategory === $category->slug ? 'bg-ink-900 text-white' : 'border border-cream-300 text-ink-600 hover:border-bronze-400 hover:text-bronze-600'); ?>">
                        <?php echo e($category->name); ?> <span class="text-xs opacity-60">(<?php echo e($category->posts_count); ?>)</span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($posts->isEmpty()): ?>
            <div class="mt-14 rounded-md border-2 border-dashed border-cream-300 p-16 text-center">
                <?php if (isset($component)) { $__componentOriginal987d96ec78ed1cf75b349e2e5981978f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal987d96ec78ed1cf75b349e2e5981978f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.logo','data' => ['class' => 'mx-auto h-12 w-12 text-cream-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mx-auto h-12 w-12 text-cream-300']); ?>
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
                <p class="mt-4 text-ink-600"><?php echo e(__('media.video.empty')); ?></p>
            </div>
        <?php else: ?>
            <div class="reveal-group mt-12 grid gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $film = ['film-green', 'film-warm', 'film-cool'][$post->id % 3];
                        $imageUrl = $post->featured_image ? Illuminate\Support\Facades\Storage::disk('public')->url($post->featured_image) : null;
                    ?>
                    <article class="group flex h-full flex-col">
                        <a href="<?php echo e(route('blog.show', $post->slug)); ?>" class="relative block aspect-video overflow-hidden rounded-sm">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($imageUrl): ?>
                                <img src="<?php echo e($imageUrl); ?>" alt="<?php echo e($post->title); ?>" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
                            <?php else: ?>
                                <span class="film absolute inset-0 transition duration-500 group-hover:scale-105"></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <span class="absolute left-3 top-3 z-10 rounded-sm bg-bronze-500 px-2.5 py-1 text-[10.5px] font-bold uppercase tracking-[0.12em] text-white"><?php echo e(__('media.blog.video_badge')); ?></span>
                            <span class="play-ring absolute left-1/2 top-1/2 z-10 h-16 w-16 -translate-x-1/2 -translate-y-1/2" aria-hidden="true"></span>
                        </a>

                        <div class="mt-4 flex items-center justify-between">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->category): ?>
                                <span class="inline-flex items-center gap-2 text-[11.5px] font-semibold uppercase tracking-[0.16em] text-bronze-600">
                                    <span class="h-1.5 w-1.5 rounded-full bg-bronze-500"></span><?php echo e($post->category->name); ?>

                                </span>
                            <?php else: ?>
                                <span></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <span class="font-sans text-[12px] font-semibold tracking-wide text-ink-400">NO. <?php echo e(str_pad($post->id, 3, '0', STR_PAD_LEFT)); ?></span>
                        </div>

                        <h3 class="mt-3 font-display text-xl font-semibold leading-tight text-ink-900 transition group-hover:text-bronze-600">
                            <a href="<?php echo e(route('blog.show', $post->slug)); ?>"><?php echo e($post->title); ?></a>
                        </h3>

                        <div class="mt-auto flex items-center gap-4 border-t border-ink-900/10 pt-3.5 text-[12.5px] text-ink-600">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->author_display): ?><span class="font-semibold text-ink-900"><?php echo e($post->author_display); ?></span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <span><?php echo e($post->published_at?->format('d.m.Y.')); ?></span>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="mt-14">
                <?php echo e($posts->links()); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </section>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald956570c5321d7185b887a45463f814f)): ?>
<?php $attributes = $__attributesOriginald956570c5321d7185b887a45463f814f; ?>
<?php unset($__attributesOriginald956570c5321d7185b887a45463f814f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald956570c5321d7185b887a45463f814f)): ?>
<?php $component = $__componentOriginald956570c5321d7185b887a45463f814f; ?>
<?php unset($__componentOriginald956570c5321d7185b887a45463f814f); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/d1centar-media/resources/views/video/index.blade.php ENDPATH**/ ?>