@php
    use Illuminate\Support\Str;
@endphp

<x-layouts.public title="Works | Krysalis">
    <section class="bg-[#F8F5EF] px-6 py-20 text-black lg:px-8">
        <div class="mx-auto grid max-w-7xl items-center gap-12 lg:grid-cols-2">
            <div>
                <p class="mb-4 text-sm font-bold uppercase tracking-[0.3em] text-[#9B7A22]">
                    Our Works
                </p>

                <h1 class="text-5xl font-black leading-tight tracking-tight">
                    Digital Systems Built for Real Businesses
                </h1>

                <p class="mt-6 max-w-xl text-lg leading-8 text-black/65">
                    Explore websites, booking platforms, dashboards, and automation systems designed to solve real operational problems.
                </p>

                <a href="{{ route('book-call') }}" class="mt-10 inline-flex rounded-full bg-[#D7B75A] px-7 py-4 text-sm font-bold text-black transition hover:bg-[#E7C96B]">
                    Book a Call
                </a>
            </div>

            @if (isset($slideshowProjects) && $slideshowProjects->count())
                <div class="relative overflow-hidden rounded-[2rem] border border-black/10 bg-black p-4 shadow-2xl">
                    <div id="works-slideshow" class="relative overflow-hidden rounded-[1.5rem] bg-black" style="height: 360px;">
                        @foreach ($slideshowProjects as $index => $slideProject)
                            <a
                                href="{{ route('projects.show', ['project' => $slideProject->slug]) }}"
                                class="works-slide absolute inset-0 h-full w-full"
                                style="display: {{ $index === 0 ? 'block' : 'none' }};"
                            >
                                @if ($slideProject->image_url)
                                    <img
                                        src="{{ $slideProject->image_url }}"
                                        alt="{{ $slideProject->title }}"
                                        class="h-full w-full object-cover"
                                    >
                                @else
                                    <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-zinc-900 to-black">
                                        <p class="text-center text-sm font-bold uppercase tracking-[0.25em] text-white/30">
                                            Project Image Not Uploaded
                                        </p>
                                    </div>
                                @endif

                                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/45 to-transparent"></div>

                                <div class="absolute bottom-0 left-0 right-0 p-6">
                                    <p class="mb-2 text-xs font-bold uppercase tracking-[0.25em] text-[#D7B75A]">
                                        Project Showcase
                                    </p>

                                    <h2 class="text-3xl font-black leading-tight text-white">
                                        {{ $slideProject->title }}
                                    </h2>

                                    <p class="mt-2 line-clamp-2 max-w-xl text-sm leading-7 text-white/75">
                                        {{ $slideProject->short_description ?? $slideProject->description }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="mt-4 flex items-center justify-between">
                        <div class="flex gap-2">
                            @foreach ($slideshowProjects as $index => $slideProject)
                                <button
                                    type="button"
                                    class="works-dot h-2 rounded-full transition-all {{ $index === 0 ? 'w-8 bg-[#D7B75A]' : 'w-2 bg-white/30' }}"
                                    data-index="{{ $index }}"
                                    aria-label="Go to slide {{ $index + 1 }}"
                                ></button>
                            @endforeach
                        </div>

                        <div class="flex gap-2">
                            <button
                                type="button"
                                id="works-prev"
                                class="flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-white/10 text-xl font-bold text-white transition hover:bg-white/20"
                                aria-label="Previous slide"
                            >
                                ‹
                            </button>

                            <button
                                type="button"
                                id="works-next"
                                class="flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-white/10 text-xl font-bold text-white transition hover:bg-white/20"
                                aria-label="Next slide"
                            >
                                ›
                            </button>
                        </div>
                    </div>
                </div>
            @else
                <div class="rounded-[2rem] border border-black/10 bg-white p-6 shadow-xl">
                    <div class="flex h-80 items-center justify-center rounded-[1.5rem] bg-gradient-to-br from-black/10 to-black/5 p-6">
                        <p class="text-center text-sm font-bold uppercase tracking-[0.2em] text-black/30">
                            Add published projects to show the slideshow
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <section class="bg-white px-6 py-16 text-black lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="mb-10 flex flex-wrap gap-3">
                @foreach ($categories as $category)
                    <a
                        href="{{ $category === 'All' ? route('works') : route('works', ['category' => $category]) }}"
                        class="rounded-full border px-5 py-2 text-sm font-bold transition
                            {{ $selectedCategory === $category
                                ? 'border-[#D7B75A] bg-[#D7B75A] text-black'
                                : 'border-black/10 bg-white text-black/70 hover:border-[#9B7A22] hover:text-[#9B7A22]'
                            }}"
                    >
                        {{ $category }}
                    </a>
                @endforeach
            </div>

            <div class="mb-8 flex flex-col justify-between gap-3 md:flex-row md:items-center">
                <div>
                    <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#9B7A22]">
                        {{ $selectedCategory === 'All' ? 'All Projects' : $selectedCategory }}
                    </p>

                    <p class="mt-2 text-sm text-black/55">
                        Showing {{ $projects->count() }} {{ Str::plural('project', $projects->count()) }}
                    </p>
                </div>

                @if ($selectedCategory !== 'All')
                    <a href="{{ route('works') }}" class="text-sm font-bold text-black/50 transition hover:text-[#9B7A22]">
                        Clear filter
                    </a>
                @endif
            </div>

            <div class="grid gap-8 md:grid-cols-2">
                @forelse ($projects as $project)
                    <article class="overflow-hidden rounded-3xl border border-black/10 bg-[#F8F5EF] shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                        <a href="{{ route('projects.show', ['project' => $project->slug]) }}" class="block">
                            <div class="h-64 bg-gradient-to-br from-black/10 to-black/5 p-4">
                                @if ($project->image_url)
                                    <img
                                        src="{{ $project->image_url }}"
                                        alt="{{ $project->title }}"
                                        class="h-full w-full rounded-2xl object-cover"
                                    >
                                @else
                                    <div class="flex h-full items-center justify-center rounded-2xl border border-black/10 bg-white/60 text-sm font-bold text-black/30">
                                        Project Preview
                                    </div>
                                @endif
                            </div>
                        </a>

                        <div class="p-7">
                            <span class="rounded-full bg-black px-3 py-1 text-xs font-bold text-white">
                                {{ $project->category }}
                            </span>

                            <h2 class="mt-5 text-2xl font-black">
                                {{ $project->title }}
                            </h2>

                            <p class="mt-3 leading-7 text-black/60">
                                {{ $project->short_description }}
                            </p>

                            <a href="{{ route('projects.show', ['project' => $project->slug]) }}" class="mt-6 inline-flex rounded-full border border-black/15 px-5 py-3 text-sm font-bold transition hover:border-[#9B7A22] hover:text-[#9B7A22]">
                                View Project →
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="rounded-3xl border border-black/10 bg-[#F8F5EF] p-10 md:col-span-2">
                        <h2 class="text-2xl font-black">No projects published yet.</h2>
                        <p class="mt-3 text-black/60">Add projects from the admin panel.</p>
                    </div>
                @endforelse
            </div>

            @if ($featuredProject)
                <div class="mt-16 grid gap-8 rounded-[2rem] bg-black p-8 text-white lg:grid-cols-2">
                    <div class="h-80 rounded-3xl bg-white/10 p-4">
                        @if ($featuredProject->image_url)
                            <img
                                src="{{ $featuredProject->image_url }}"
                                alt="{{ $featuredProject->title }}"
                                class="h-full w-full rounded-2xl object-cover"
                            >
                        @else
                            <div class="flex h-full items-center justify-center rounded-2xl border border-white/10 text-white/30">
                                Featured Project Preview
                            </div>
                        @endif
                    </div>

                    <div class="flex flex-col justify-center">
                        <p class="mb-3 text-sm font-bold uppercase tracking-[0.25em] text-[#D7B75A]">
                            Featured Case Study
                        </p>

                        <h2 class="text-3xl font-black">
                            {{ $featuredProject->title }}
                        </h2>

                        <p class="mt-5 leading-8 text-white/60">
                            {{ $featuredProject->short_description }}
                        </p>

                        @if ($featuredProject->features)
                            <p class="mt-5 text-sm leading-7 text-white/50">
                                {{ $featuredProject->features }}
                            </p>
                        @endif

                        <a href="{{ route('projects.show', ['project' => $featuredProject->slug]) }}" class="mt-8 inline-flex w-fit rounded-full bg-[#D7B75A] px-6 py-3 text-sm font-bold text-black hover:bg-[#E7C96B]">
                            View Case Study
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const slides = document.querySelectorAll('.works-slide');
            const dots = document.querySelectorAll('.works-dot');
            const nextButton = document.getElementById('works-next');
            const prevButton = document.getElementById('works-prev');

            if (!slides.length) {
                return;
            }

            let currentSlide = 0;

            function showSlide(index) {
                slides.forEach((slide, slideIndex) => {
                    slide.style.display = slideIndex === index ? 'block' : 'none';
                });

                dots.forEach((dot, dotIndex) => {
                    if (dotIndex === index) {
                        dot.classList.remove('w-2', 'bg-white/30');
                        dot.classList.add('w-8', 'bg-[#D7B75A]');
                    } else {
                        dot.classList.remove('w-8', 'bg-[#D7B75A]');
                        dot.classList.add('w-2', 'bg-white/30');
                    }
                });

                currentSlide = index;
            }

            function nextSlide() {
                const next = currentSlide === slides.length - 1 ? 0 : currentSlide + 1;
                showSlide(next);
            }

            function prevSlide() {
                const previous = currentSlide === 0 ? slides.length - 1 : currentSlide - 1;
                showSlide(previous);
            }

            nextButton?.addEventListener('click', nextSlide);
            prevButton?.addEventListener('click', prevSlide);

            dots.forEach((dot) => {
                dot.addEventListener('click', function () {
                    showSlide(Number(this.dataset.index));
                });
            });

            showSlide(0);
            setInterval(nextSlide, 3500);
        });
    </script>
</x-layouts.public>