<x-site-layout :title="$post->seo_title ?: $post->title" :description="$post->seo_description ?: $post->excerpt">

    {{-- Article header --}}
    <section class="bg-navy-950 text-white">
        <div class="mx-auto max-w-4xl px-6 py-14 sm:py-20">
            <a href="{{ url()->previous() !== url()->current() && str_contains(url()->previous(), '/video') ? route('video.index') : route('blog.index') }}"
                class="inline-flex items-center gap-2 text-sm font-medium text-navy-100 transition hover:text-bronze-400">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 10H4M8 5l-5 5 5 5" /></svg>
                {{ __('media.blog.back') }}
            </a>

            <div class="mt-8 flex flex-wrap items-center gap-x-4 gap-y-2 text-xs text-navy-200">
                @if ($post->category)
                    <span class="inline-flex items-center gap-2 font-semibold uppercase tracking-[0.14em] text-bronze-400">
                        <span class="h-1.5 w-1.5 rounded-full bg-bronze-500"></span>{{ $post->category->name }}
                    </span>
                @endif
                @if ($post->video_embed_url)
                    <span class="rounded-sm bg-bronze-500 px-2 py-0.5 text-[10px] font-bold uppercase tracking-[0.12em] text-white">{{ __('media.blog.video_badge') }}</span>
                @endif
                <time datetime="{{ $post->published_at?->toDateString() }}">{{ __('media.blog.published') }} {{ $post->published_at?->format('d.m.Y.') }}</time>
                <span aria-hidden="true">·</span>
                <span>{{ $post->reading_time }} {{ __('media.blog.min_read') }}</span>
                @if ($post->author_display)
                    <span aria-hidden="true">·</span>
                    <span class="text-white">{{ $post->author_display }}</span>
                @endif
            </div>

            <h1 class="mt-5 font-display text-3xl font-black leading-tight tracking-tight text-balance sm:text-5xl">{{ $post->title }}</h1>

            @if ($post->excerpt)
                <p class="mt-6 max-w-2xl font-display text-lg leading-relaxed text-navy-100">{{ $post->excerpt }}</p>
            @endif
        </div>
    </section>

    {{-- Article body --}}
    <article class="mx-auto max-w-4xl px-6 py-14">
        @if ($post->video_embed_url)
            <div class="mb-10 aspect-video overflow-hidden rounded-sm border border-cream-300 bg-navy-950">
                <iframe src="{{ $post->video_embed_url }}" class="h-full w-full border-0" loading="lazy"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen title="{{ $post->title }}"></iframe>
            </div>
        @elseif ($post->featured_image)
            <img src="{{ Illuminate\Support\Facades\Storage::disk('public')->url($post->featured_image) }}"
                alt="{{ $post->title }}" class="mb-10 w-full rounded-sm border border-cream-300">
        @endif

        <div class="prose-law">
            {!! $post->body !!}
        </div>
    </article>

    {{-- Related --}}
    @if ($related->isNotEmpty())
        <section class="border-t border-cream-300 bg-cream-50 py-16">
            <div class="mx-auto max-w-[100rem] px-6">
                <h2 class="font-display text-2xl font-black tracking-tight text-ink-900">{{ __('media.blog.related') }}</h2>
                <div class="mt-8 grid gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($related as $relatedPost)
                        <x-post-card :post="$relatedPost" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</x-site-layout>
