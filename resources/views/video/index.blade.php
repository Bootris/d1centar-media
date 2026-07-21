<x-site-layout :title="__('media.video.page_title')" :description="__('media.video.page_subtitle')">

    {{-- Page header --}}
    <section class="bg-navy-950 text-white">
        <div class="mx-auto max-w-[100rem] px-6 py-16 sm:py-20">
            <p class="flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.22em] text-bronze-400">
                <span class="live-dot" aria-hidden="true"></span>{{ __('media.video.kicker') }}
            </p>
            <h1 class="mt-3 font-display text-4xl font-black leading-none tracking-tight text-balance sm:text-7xl">{{ __('media.video.page_title') }}</h1>
            <p class="mt-5 max-w-xl text-navy-100">{{ __('media.video.page_subtitle') }}</p>
            <p class="mt-6 text-sm text-navy-200">{{ $posts->total() }} {{ __('media.video.count') }}</p>
        </div>
    </section>

    <section class="mx-auto max-w-[100rem] px-6 py-14">

        {{-- Category filter --}}
        @if ($categories->isNotEmpty())
            <div class="flex flex-wrap items-center gap-2 border-b border-cream-300 pb-8">
                <a href="{{ route('video.index') }}"
                    class="rounded-full px-4 py-1.5 text-sm font-medium transition {{ $activeCategory ? 'border border-cream-300 text-ink-600 hover:border-bronze-400 hover:text-bronze-600' : 'bg-ink-900 text-white' }}">
                    {{ __('media.blog.all') }}
                </a>
                @foreach ($categories as $category)
                    <a href="{{ route('video.index', ['category' => $category->slug]) }}"
                        class="rounded-full px-4 py-1.5 text-sm font-medium transition {{ $activeCategory === $category->slug ? 'bg-ink-900 text-white' : 'border border-cream-300 text-ink-600 hover:border-bronze-400 hover:text-bronze-600' }}">
                        {{ $category->name }} <span class="text-xs opacity-60">({{ $category->posts_count }})</span>
                    </a>
                @endforeach
            </div>
        @endif

        @if ($posts->isEmpty())
            <div class="mt-14 rounded-md border-2 border-dashed border-cream-300 p-16 text-center">
                <x-logo class="mx-auto h-12 w-12 text-cream-300" />
                <p class="mt-4 text-ink-600">{{ __('media.video.empty') }}</p>
            </div>
        @else
            <div class="reveal-group mt-12 grid gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    @php
                        $film = ['film-green', 'film-warm', 'film-cool'][$post->id % 3];
                        $imageUrl = $post->featured_image ? Illuminate\Support\Facades\Storage::disk('public')->url($post->featured_image) : null;
                    @endphp
                    <article class="group flex h-full flex-col">
                        <a href="{{ route('blog.show', $post->slug) }}" class="relative block aspect-video overflow-hidden rounded-sm">
                            @if ($imageUrl)
                                <img src="{{ $imageUrl }}" alt="{{ $post->title }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
                            @else
                                <span class="film absolute inset-0 transition duration-500 group-hover:scale-105"></span>
                            @endif
                            <span class="absolute left-3 top-3 z-10 rounded-sm bg-bronze-500 px-2.5 py-1 text-[10.5px] font-bold uppercase tracking-[0.12em] text-white">{{ __('media.blog.video_badge') }}</span>
                            <span class="play-ring absolute left-1/2 top-1/2 z-10 h-16 w-16 -translate-x-1/2 -translate-y-1/2" aria-hidden="true"></span>
                        </a>

                        <div class="mt-4 flex items-center justify-between">
                            @if ($post->category)
                                <span class="inline-flex items-center gap-2 text-[11.5px] font-semibold uppercase tracking-[0.16em] text-bronze-600">
                                    <span class="h-1.5 w-1.5 rounded-full bg-bronze-500"></span>{{ $post->category->name }}
                                </span>
                            @else
                                <span></span>
                            @endif
                            <span class="font-sans text-[12px] font-semibold tracking-wide text-ink-400">NO. {{ str_pad($post->id, 3, '0', STR_PAD_LEFT) }}</span>
                        </div>

                        <h3 class="mt-3 font-display text-xl font-semibold leading-tight text-ink-900 transition group-hover:text-bronze-600">
                            <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                        </h3>

                        <div class="mt-auto flex items-center gap-4 border-t border-ink-900/10 pt-3.5 text-[12.5px] text-ink-600">
                            @if ($post->author_display)<span class="font-semibold text-ink-900">{{ $post->author_display }}</span>@endif
                            <span>{{ $post->published_at?->format('d.m.Y.') }}</span>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-14">
                {{ $posts->links() }}
            </div>
        @endif
    </section>

</x-site-layout>
