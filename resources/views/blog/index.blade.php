<x-site-layout :title="__('media.blog.title')" :description="__('media.blog.subtitle')">

    {{-- Page header --}}
    <section class="bg-navy-950 text-white">
        <div class="mx-auto max-w-[100rem] px-6 py-16 sm:py-20">
            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-bronze-400">{{ __('media.blog.eyebrow') }}</p>
            <h1 class="mt-3 font-display text-4xl font-black leading-none tracking-tight text-balance sm:text-7xl">{{ __('media.blog.title') }}</h1>
            <p class="mt-5 max-w-xl text-navy-100">{{ __('media.blog.subtitle') }}</p>
        </div>
    </section>

    <section class="mx-auto max-w-[100rem] px-6 py-14">

        {{-- Category filter --}}
        @if ($categories->isNotEmpty())
            <div class="flex flex-wrap items-center gap-2 border-b border-cream-300 pb-8">
                <a href="{{ route('blog.index') }}"
                    class="rounded-full px-4 py-1.5 text-sm font-medium transition {{ $activeCategory ? 'border border-cream-300 text-ink-600 hover:border-bronze-400 hover:text-bronze-600' : 'bg-ink-900 text-white' }}">
                    {{ __('media.blog.all') }}
                </a>
                @foreach ($categories as $category)
                    <a href="{{ route('blog.index', ['category' => $category->slug]) }}"
                        class="rounded-full px-4 py-1.5 text-sm font-medium transition {{ $activeCategory === $category->slug ? 'bg-ink-900 text-white' : 'border border-cream-300 text-ink-600 hover:border-bronze-400 hover:text-bronze-600' }}">
                        {{ $category->name }} <span class="text-xs opacity-60">({{ $category->posts_count }})</span>
                    </a>
                @endforeach
            </div>
        @endif

        @if ($posts->isEmpty())
            <div class="mt-14 rounded-md border-2 border-dashed border-cream-300 p-16 text-center">
                <x-logo class="mx-auto h-12 w-12 text-cream-300" />
                <p class="mt-4 text-ink-600">{{ __('media.blog.empty') }}</p>
            </div>
        @else
            <div class="reveal-group mt-12 grid gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    <x-post-card :post="$post" />
                @endforeach
            </div>

            <div class="mt-14">
                {{ $posts->links() }}
            </div>
        @endif
    </section>

</x-site-layout>
