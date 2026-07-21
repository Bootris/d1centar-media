<?php if (isset($component)) { $__componentOriginald956570c5321d7185b887a45463f814f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald956570c5321d7185b887a45463f814f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.site-layout','data' => ['title' => $post->seo_title ?: $post->title,'description' => $post->seo_description ?: $post->excerpt]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('site-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($post->seo_title ?: $post->title),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($post->seo_description ?: $post->excerpt)]); ?>

    
    <section class="bg-navy-950 text-white">
        <div class="mx-auto max-w-4xl px-6 py-14 sm:py-20">
            <a href="<?php echo e(url()->previous() !== url()->current() && str_contains(url()->previous(), '/video') ? route('video.index') : route('blog.index')); ?>"
                class="inline-flex items-center gap-2 text-sm font-medium text-navy-100 transition hover:text-bronze-400">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 10H4M8 5l-5 5 5 5" /></svg>
                <?php echo e(__('media.blog.back')); ?>

            </a>

            <div class="mt-8 flex flex-wrap items-center gap-x-4 gap-y-2 text-xs text-navy-200">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->category): ?>
                    <span class="inline-flex items-center gap-2 font-semibold uppercase tracking-[0.14em] text-bronze-400">
                        <span class="h-1.5 w-1.5 rounded-full bg-bronze-500"></span><?php echo e($post->category->name); ?>

                    </span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->video_embed_url): ?>
                    <span class="rounded-sm bg-bronze-500 px-2 py-0.5 text-[10px] font-bold uppercase tracking-[0.12em] text-white"><?php echo e(__('media.blog.video_badge')); ?></span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <time datetime="<?php echo e($post->published_at?->toDateString()); ?>"><?php echo e(__('media.blog.published')); ?> <?php echo e($post->published_at?->format('d.m.Y.')); ?></time>
                <span aria-hidden="true">·</span>
                <span><?php echo e($post->reading_time); ?> <?php echo e(__('media.blog.min_read')); ?></span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->author_display): ?>
                    <span aria-hidden="true">·</span>
                    <span class="text-white"><?php echo e($post->author_display); ?></span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <h1 class="mt-5 font-display text-3xl font-black leading-tight tracking-tight text-balance sm:text-5xl"><?php echo e($post->title); ?></h1>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->excerpt): ?>
                <p class="mt-6 max-w-2xl font-display text-lg leading-relaxed text-navy-100"><?php echo e($post->excerpt); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    
    <article class="mx-auto max-w-4xl px-6 py-14">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->video_embed_url): ?>
            <div class="mb-10 aspect-video overflow-hidden rounded-sm border border-cream-300 bg-navy-950">
                <iframe src="<?php echo e($post->video_embed_url); ?>" class="h-full w-full border-0" loading="lazy"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen title="<?php echo e($post->title); ?>"></iframe>
            </div>
        <?php elseif($post->featured_image): ?>
            <img src="<?php echo e(Illuminate\Support\Facades\Storage::disk('public')->url($post->featured_image)); ?>"
                alt="<?php echo e($post->title); ?>" class="mb-10 w-full rounded-sm border border-cream-300">
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="prose-law">
            <?php echo $post->body; ?>

        </div>
    </article>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($related->isNotEmpty()): ?>
        <section class="border-t border-cream-300 bg-cream-50 py-16">
            <div class="mx-auto max-w-[100rem] px-6">
                <h2 class="font-display text-2xl font-black tracking-tight text-ink-900"><?php echo e(__('media.blog.related')); ?></h2>
                <div class="mt-8 grid gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal14b498b52c33a1421ff8895e4557790f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal14b498b52c33a1421ff8895e4557790f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.post-card','data' => ['post' => $relatedPost]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('post-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['post' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($relatedPost)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal14b498b52c33a1421ff8895e4557790f)): ?>
<?php $attributes = $__attributesOriginal14b498b52c33a1421ff8895e4557790f; ?>
<?php unset($__attributesOriginal14b498b52c33a1421ff8895e4557790f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal14b498b52c33a1421ff8895e4557790f)): ?>
<?php $component = $__componentOriginal14b498b52c33a1421ff8895e4557790f; ?>
<?php unset($__componentOriginal14b498b52c33a1421ff8895e4557790f); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

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
<?php /**PATH /var/www/html/d1centar-media/resources/views/blog/show.blade.php ENDPATH**/ ?>