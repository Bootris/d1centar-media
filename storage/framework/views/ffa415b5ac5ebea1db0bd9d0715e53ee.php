<?php if (isset($component)) { $__componentOriginald956570c5321d7185b887a45463f814f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald956570c5321d7185b887a45463f814f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.site-layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('site-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    
    <section class="relative overflow-hidden bg-navy-950 text-white">
        <div class="wordmark-ghost absolute -bottom-16 -left-6 text-[34vw] leading-[0.8]" aria-hidden="true">d1</div>

        <div class="relative mx-auto grid max-w-[100rem] items-end gap-10 px-6 py-16 lg:grid-cols-[1.05fr_.95fr] lg:gap-16 lg:py-24">
            <div class="reveal is-visible">
                <p class="flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.22em] text-bronze-400">
                    <?php echo e(__('media.hero.kicker')); ?> <span class="text-navy-200">/ <?php echo e(__('media.hero.place')); ?></span>
                </p>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($featured): ?>
                    <h1 class="mt-6 font-display text-4xl font-black leading-[0.98] tracking-tight text-balance sm:text-6xl">
                        <?php echo e($featured->title); ?>

                    </h1>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($featured->excerpt): ?>
                        <p class="mt-6 max-w-xl font-display text-lg leading-relaxed text-navy-100"><?php echo e($featured->excerpt); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-3 border-t border-white/10 pt-6 text-sm text-navy-200">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($featured->category): ?>
                            <span class="inline-flex items-center gap-2 font-semibold uppercase tracking-[0.14em] text-bronze-400">
                                <span class="h-1.5 w-1.5 rounded-full bg-bronze-500"></span><?php echo e($featured->category->name); ?>

                            </span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($featured->author_display): ?>
                            <span>Piše <span class="font-semibold text-white"><?php echo e($featured->author_display); ?></span></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <span><?php echo e($featured->published_at?->format('d.m.Y.')); ?></span>
                        <span><?php echo e($featured->video_embed_url ? __('media.blog.watch_video') : $featured->reading_time . ' ' . __('media.blog.min_read')); ?></span>
                    </div>
                    <a href="<?php echo e(route('blog.show', $featured->slug)); ?>"
                        class="mt-8 inline-flex items-center gap-2 rounded-sm bg-bronze-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-bronze-600">
                        <?php echo e(__('media.hero.read')); ?>

                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 10h13M12 5l5 5-5 5" /></svg>
                    </a>
                <?php else: ?>
                    <h1 class="mt-6 font-display text-4xl font-black leading-[0.98] tracking-tight text-balance sm:text-6xl">
                        <?php echo e(__('media.hero.title_1')); ?> <em class="font-normal not-italic text-bronze-400"><?php echo e(__('media.hero.title_accent')); ?></em> <?php echo e(__('media.hero.title_2')); ?>

                    </h1>
                    <p class="mt-6 max-w-xl font-display text-lg leading-relaxed text-navy-100"><?php echo e(__('media.hero.lead')); ?></p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($featured): ?>
                <a href="<?php echo e(route('blog.show', $featured->slug)); ?>" class="group reveal is-visible relative block">
                    <div class="relative aspect-[4/3] overflow-hidden rounded-sm border border-white/10 ring-1 ring-white/5">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($featured->featured_image): ?>
                            <img src="<?php echo e(Illuminate\Support\Facades\Storage::disk('public')->url($featured->featured_image)); ?>"
                                alt="<?php echo e($featured->title); ?>" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        <?php else: ?>
                            <span class="film absolute inset-0"></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <span class="absolute left-4 top-4 z-10 inline-flex items-center gap-2 rounded-sm px-3 py-1.5 text-[11px] font-bold uppercase tracking-[0.14em] text-white <?php echo e($featured->video_embed_url ? 'bg-bronze-500' : 'bg-black/55'); ?>">
                            <?php echo e($featured->video_embed_url ? __('media.hero.latest_label') . ' · ' . __('media.blog.video_badge') : __('media.hero.latest_label')); ?>

                        </span>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($featured->video_embed_url): ?>
                            <span class="play-ring absolute left-1/2 top-1/2 z-10 h-20 w-20 -translate-x-1/2 -translate-y-1/2" aria-hidden="true"></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <span class="absolute bottom-4 left-4 z-10 text-[11px] uppercase tracking-[0.14em] text-white/85"><?php echo e($featured->category?->name ?? __('media.hero.place')); ?></span>
                    </div>
                </a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($latestPosts->isNotEmpty()): ?>
        <section class="mx-auto max-w-[100rem] px-6 py-16 lg:py-24">
            <div class="reveal flex items-end justify-between gap-6 border-b-2 border-ink-900 pb-6">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.22em] text-bronze-600"><?php echo e(__('media.latest.kicker')); ?></p>
                    <h2 class="mt-2 font-display text-3xl font-black tracking-tight text-ink-900 sm:text-5xl"><?php echo e(__('media.latest.title')); ?></h2>
                </div>
                <a href="<?php echo e(route('blog.index')); ?>" class="hidden shrink-0 items-center gap-2 text-sm font-semibold text-bronze-600 transition hover:gap-3 sm:inline-flex">
                    <?php echo e(__('media.latest.all')); ?>

                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 10h13M12 5l5 5-5 5" /></svg>
                </a>
            </div>

            <div class="reveal-group mt-12 grid gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $latestPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginal14b498b52c33a1421ff8895e4557790f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal14b498b52c33a1421ff8895e4557790f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.post-card','data' => ['post' => $post]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('post-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['post' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($post)]); ?>
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

            <div class="mt-10 sm:hidden">
                <a href="<?php echo e(route('blog.index')); ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-bronze-600">
                    <?php echo e(__('media.latest.all')); ?> <span aria-hidden="true">→</span>
                </a>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($videoPosts->isNotEmpty()): ?>
        <section class="bg-navy-950 text-white">
            <div class="mx-auto max-w-[100rem] px-6 py-16 lg:py-24">
                <div class="reveal flex flex-wrap items-end justify-between gap-6 border-b border-white/10 pb-6">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.22em] text-bronze-400"><?php echo e(__('media.video.kicker')); ?></p>
                        <h2 class="mt-2 font-display text-3xl font-black tracking-tight sm:text-5xl"><?php echo e(__('media.video.title')); ?></h2>
                    </div>
                    <a href="<?php echo e(route('video.index')); ?>" class="inline-flex shrink-0 items-center gap-2 text-sm font-semibold text-bronze-400 transition hover:gap-3">
                        <?php echo e(__('media.video.all')); ?>

                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 10h13M12 5l5 5-5 5" /></svg>
                    </a>
                </div>

                <div class="reveal-group mt-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $videoPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('blog.show', $post->slug)); ?>"
                            class="group grid grid-cols-[auto_1fr_auto] items-center gap-5 border-b border-white/10 py-6 sm:gap-10">
                            <span class="hidden font-sans text-sm font-semibold text-white/40 sm:block"><?php echo e(str_pad($i + 1, 2, '0', STR_PAD_LEFT)); ?></span>
                            <div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->category): ?>
                                    <span class="text-[11px] font-semibold uppercase tracking-[0.14em] text-bronze-400"><?php echo e($post->category->name); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <h3 class="mt-1 font-display text-xl font-semibold leading-tight transition group-hover:text-bronze-400 sm:text-2xl"><?php echo e($post->title); ?></h3>
                            </div>
                            <span class="play-ring h-10 w-10 shrink-0" aria-hidden="true"></span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            
            <div id="onama" class="mx-auto max-w-[100rem] px-6 pb-16 lg:pb-24">
                <div class="reveal border-b border-white/10 pb-6">
                    <p class="text-xs font-semibold uppercase tracking-[0.22em] text-bronze-400"><?php echo e(__('media.stats.kicker')); ?></p>
                    <h2 class="mt-2 font-display text-3xl font-black tracking-tight sm:text-5xl"><?php echo e(__('media.stats.title')); ?></h2>
                    <p class="mt-3 max-w-md text-sm text-navy-200"><?php echo e(__('media.stats.subtitle')); ?></p>
                </div>
                <div class="reveal-group mt-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = __('media.stats.items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <div class="font-sans text-5xl font-bold leading-none tracking-tight sm:text-6xl"><?php echo e($stat['value']); ?></div>
                            <div class="mt-3 max-w-[18ch] text-sm text-navy-200"><?php echo e($stat['label']); ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </section>
    <?php else: ?>
        
        <section id="onama" class="bg-navy-950 text-white">
            <div class="mx-auto max-w-[100rem] px-6 py-16 lg:py-24">
                <div class="reveal border-b border-white/10 pb-6">
                    <p class="text-xs font-semibold uppercase tracking-[0.22em] text-bronze-400"><?php echo e(__('media.stats.kicker')); ?></p>
                    <h2 class="mt-2 font-display text-3xl font-black tracking-tight sm:text-5xl"><?php echo e(__('media.stats.title')); ?></h2>
                </div>
                <div class="reveal-group mt-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = __('media.stats.items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <div class="font-sans text-5xl font-bold leading-none tracking-tight sm:text-6xl"><?php echo e($stat['value']); ?></div>
                            <div class="mt-3 max-w-[18ch] text-sm text-navy-200"><?php echo e($stat['label']); ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <section class="mx-auto max-w-[100rem] px-6 py-16 lg:py-24">
        <div class="reveal grid items-center gap-8 rounded-md border-2 border-dashed border-ink-900 p-8 sm:p-12 lg:grid-cols-[1.2fr_1fr] lg:gap-16">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.2em] text-bronze-600"><?php echo e(__('media.newsletter.stamp')); ?></p>
                <h2 class="mt-4 font-display text-3xl font-black leading-tight tracking-tight text-ink-900 sm:text-4xl"><?php echo e(__('media.newsletter.title')); ?></h2>
                <p class="mt-3 max-w-md text-ink-600"><?php echo e(__('media.newsletter.text')); ?></p>
            </div>
            <div>
                <form onsubmit="return false" class="flex flex-wrap gap-3">
                    <input type="email" placeholder="<?php echo e(__('media.newsletter.placeholder')); ?>" aria-label="<?php echo e(__('media.newsletter.placeholder')); ?>"
                        class="min-w-[12rem] flex-1 rounded-sm border-2 border-ink-900 bg-cream-50 px-4 py-3.5 text-sm outline-none transition focus:border-bronze-600 focus:ring-2 focus:ring-bronze-200">
                    <button type="submit" class="rounded-sm bg-bronze-600 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-bronze-700"><?php echo e(__('media.newsletter.button')); ?></button>
                </form>
                <p class="mt-3 text-xs text-ink-600"><?php echo e(__('media.newsletter.note')); ?></p>
            </div>
        </div>
    </section>

    
    <section id="kontakt" class="border-t border-cream-300 bg-cream-50">
        <div class="mx-auto max-w-[100rem] px-6 py-16 lg:py-24">
            <div class="reveal border-b-2 border-ink-900 pb-6">
                <p class="text-xs font-semibold uppercase tracking-[0.22em] text-bronze-600"><?php echo e(__('media.contact.eyebrow')); ?></p>
                <h2 class="mt-2 font-display text-3xl font-black tracking-tight text-ink-900 sm:text-5xl"><?php echo e(__('media.contact.title')); ?></h2>
                <p class="mt-3 max-w-xl text-ink-600"><?php echo e(__('media.contact.subtitle')); ?></p>
            </div>

            <div class="mt-12 grid gap-10 lg:grid-cols-5">
                <div class="reveal lg:col-span-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('contact_success')): ?>
                        <div class="mb-6 flex items-start gap-3 rounded-sm border border-bronze-300 bg-bronze-100 p-4 text-sm text-bronze-700" role="status">
                            <svg class="mt-0.5 h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9" /><path d="m8.5 12.5 2.5 2.5 5-5.5" /></svg>
                            <?php echo e(__('media.contact.form.success')); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <form method="POST" action="<?php echo e(route('contact.submit')); ?>" class="grid gap-5 sm:grid-cols-2">
                        <?php echo csrf_field(); ?>
                        <div class="absolute -left-[9999px]" aria-hidden="true">
                            <label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
                        </div>

                        <div>
                            <label for="c-name" class="mb-1.5 block text-sm font-medium text-ink-900"><?php echo e(__('media.contact.form.name')); ?> *</label>
                            <input id="c-name" type="text" name="name" value="<?php echo e(old('name')); ?>" required
                                class="w-full rounded-sm border border-cream-300 bg-white px-4 py-2.5 text-sm outline-none transition focus:border-bronze-600 focus:ring-2 focus:ring-bronze-200">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div>
                            <label for="c-email" class="mb-1.5 block text-sm font-medium text-ink-900"><?php echo e(__('media.contact.form.email')); ?> *</label>
                            <input id="c-email" type="email" name="email" value="<?php echo e(old('email')); ?>" required
                                class="w-full rounded-sm border border-cream-300 bg-white px-4 py-2.5 text-sm outline-none transition focus:border-bronze-600 focus:ring-2 focus:ring-bronze-200">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div>
                            <label for="c-phone" class="mb-1.5 block text-sm font-medium text-ink-900"><?php echo e(__('media.contact.form.phone')); ?></label>
                            <input id="c-phone" type="tel" name="phone" value="<?php echo e(old('phone')); ?>"
                                class="w-full rounded-sm border border-cream-300 bg-white px-4 py-2.5 text-sm outline-none transition focus:border-bronze-600 focus:ring-2 focus:ring-bronze-200">
                        </div>
                        <div>
                            <label for="c-subject" class="mb-1.5 block text-sm font-medium text-ink-900"><?php echo e(__('media.contact.form.subject')); ?></label>
                            <input id="c-subject" type="text" name="subject" value="<?php echo e(old('subject')); ?>"
                                class="w-full rounded-sm border border-cream-300 bg-white px-4 py-2.5 text-sm outline-none transition focus:border-bronze-600 focus:ring-2 focus:ring-bronze-200">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="c-message" class="mb-1.5 block text-sm font-medium text-ink-900"><?php echo e(__('media.contact.form.message')); ?> *</label>
                            <textarea id="c-message" name="message" rows="5" required
                                class="w-full rounded-sm border border-cream-300 bg-white px-4 py-2.5 text-sm outline-none transition focus:border-bronze-600 focus:ring-2 focus:ring-bronze-200"><?php echo e(old('message')); ?></textarea>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="sm:col-span-2">
                            <button type="submit" class="w-full rounded-sm bg-ink-900 px-7 py-3.5 text-sm font-semibold text-white transition hover:bg-navy-800 sm:w-auto"><?php echo e(__('media.contact.form.submit')); ?></button>
                        </div>
                    </form>
                </div>

                <div class="reveal lg:col-span-2">
                    <div class="flex h-full flex-col rounded-sm bg-navy-950 p-8 text-navy-100">
                        <h3 class="font-display text-xl font-semibold text-white"><?php echo e(__('media.contact.info_title')); ?></h3>
                        <ul class="mt-6 space-y-5 text-sm">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($site['address'])): ?>
                                <li><span class="block text-xs uppercase tracking-wider text-navy-200"><?php echo e(__('media.contact.address')); ?></span><?php echo e($site['address']); ?></li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($site['phone'])): ?>
                                <li><span class="block text-xs uppercase tracking-wider text-navy-200"><?php echo e(__('media.contact.phone')); ?></span>
                                    <a href="tel:<?php echo e(preg_replace('/[^+\d]/', '', $site['phone'])); ?>" class="transition hover:text-bronze-400"><?php echo e($site['phone']); ?></a></li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($site['email'])): ?>
                                <li><span class="block text-xs uppercase tracking-wider text-navy-200"><?php echo e(__('media.contact.email')); ?></span>
                                    <a href="mailto:<?php echo e($site['email']); ?>" class="transition hover:text-bronze-400"><?php echo e($site['email']); ?></a></li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($site['working_hours'])): ?>
                                <li><span class="block text-xs uppercase tracking-wider text-navy-200"><?php echo e(__('media.contact.hours')); ?></span><?php echo e($site['working_hours']); ?></li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($site['map_embed'])): ?>
                            <iframe src="<?php echo e($site['map_embed']); ?>" class="mt-auto h-48 w-full rounded-sm border-0 grayscale" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Mapa"></iframe>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
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
<?php /**PATH /var/www/html/d1centar-media/resources/views/home.blade.php ENDPATH**/ ?>