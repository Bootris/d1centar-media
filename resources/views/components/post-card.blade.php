@props(['post'])

@php
    $isVideo = (bool) $post->video_embed_url;
    $film = ['film-green', 'film-warm', 'film-cool'][$post->id % 3];
    $imageUrl = $post->featured_image
        ? Illuminate\Support\Facades\Storage::disk('public')->url($post->featured_image)
        : null;
@endphp

<article {{ $attributes->merge(['class' => 'group flex h-full flex-col']) }}>
    <a href="{{ route('blog.show', $post->slug) }}" class="relative block aspect-[3/2] overflow-hidden rounded-sm">
        @if ($imageUrl)
            <img src="{{ $imageUrl }}" alt="{{ $post->title }}"
                class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
        @else
            <span class="film absolute inset-0 transition duration-500 group-hover:scale-105"></span>
        @endif

        @if ($isVideo)
            <span class="absolute left-3 top-3 z-10 rounded-sm bg-bronze-500 px-2.5 py-1 text-[10.5px] font-bold uppercase tracking-[0.12em] text-white">
                {{ __('media.blog.video_badge') }}
            </span>
            <span class="play-ring absolute left-1/2 top-1/2 z-10 h-12 w-12 -translate-x-1/2 -translate-y-1/2" aria-hidden="true"></span>
        @endif
    </a>

    <div class="mt-4 flex items-center justify-between">
        @if ($post->category)
            <span class="inline-flex items-center gap-2 text-[11.5px] font-semibold uppercase tracking-[0.16em] text-bronze-600">
                <span class="h-1.5 w-1.5 rounded-full bg-bronze-500" aria-hidden="true"></span>{{ $post->category->name }}
            </span>
        @else
            <span></span>
        @endif
        <span class="font-sans text-[12px] font-semibold tracking-wide text-ink-400">NO. {{ str_pad($post->id, 3, '0', STR_PAD_LEFT) }}</span>
    </div>

    <h3 class="mt-3 font-display text-xl font-semibold leading-tight text-ink-900 transition group-hover:text-bronze-600 sm:text-[22px]">
        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
    </h3>

    <div class="mt-auto flex items-center gap-4 border-t border-ink-900/10 pt-3.5 text-[12.5px] text-ink-600">
        @if ($post->author_display)
            <span class="font-semibold text-ink-900">{{ $post->author_display }}</span>
        @endif
        <span>{{ $isVideo ? __('media.blog.watch_video') : $post->reading_time . ' ' . __('media.blog.min_read') }}</span>
    </div>
</article>
