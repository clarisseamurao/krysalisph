<x-layouts.public title="{{ $project->title }} | Krysalis">
    <section class="bg-[#F8F5EF] px-6 py-20 text-black lg:px-8">
        <div class="mx-auto max-w-7xl">
            <a href="{{ route('works') }}" class="mb-8 inline-flex text-sm font-black text-[#9B7A22]">
                ← Back to Works
            </a>

            <div class="grid gap-12 lg:grid-cols-[1.05fr_0.95fr] lg:items-center">
                <div>
                    <p class="mb-4 text-sm font-bold uppercase tracking-[0.3em] text-[#9B7A22]">
                        {{ $project->category }}
                    </p>

                    <h1 class="text-5xl font-black leading-tight tracking-tight">
                        {{ $project->title }}
                    </h1>

                    <p class="mt-6 max-w-2xl text-lg leading-8 text-black/65">
                        {{ $project->short_description }}
                    </p>

                    <div class="mt-8 flex flex-wrap gap-3">
                        @if ($project->business_type)
                            <span class="rounded-full bg-black px-5 py-2 text-sm font-bold text-white">
                                {{ $project->business_type }}
                            </span>
                        @endif

                        <span class="rounded-full border border-black/10 px-5 py-2 text-sm font-bold text-black/60">
                            {{ $project->status === 'published' ? 'Published Project' : 'Draft' }}
                        </span>
                    </div>

                    <div class="mt-10 flex flex-col gap-4 sm:flex-row">
                        <a href="{{ route('book-call') }}" class="rounded-full bg-[#D7B75A] px-7 py-4 text-center text-sm font-bold text-black transition hover:bg-[#E7C96B]">
                            Build Something Similar
                        </a>

                        <a href="{{ route('works') }}" class="rounded-full border border-black/15 px-7 py-4 text-center text-sm font-bold text-black transition hover:border-[#9B7A22] hover:text-[#9B7A22]">
                            View More Works
                        </a>
                    </div>
                </div>

                <div class="rounded-[2rem] border border-black/10 bg-white p-5 shadow-xl">
                    <div class="h-96 rounded-[1.5rem] bg-gradient-to-br from-black/10 to-black/5 p-4">
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
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white px-6 py-20 text-black lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-3">
            <div class="rounded-3xl border border-black/10 bg-[#F8F5EF] p-8">
                <p class="mb-4 text-sm font-bold uppercase tracking-[0.2em] text-[#9B7A22]">Problem</p>
                <p class="leading-8 text-black/65">
                    {{ $project->problem ?: 'This section explains the business problem the system was designed to solve.' }}
                </p>
            </div>

            <div class="rounded-3xl border border-black/10 bg-[#F8F5EF] p-8">
                <p class="mb-4 text-sm font-bold uppercase tracking-[0.2em] text-[#9B7A22]">Solution</p>
                <p class="leading-8 text-black/65">
                    {{ $project->solution ?: 'This section explains the system, workflow, or digital solution created for the business.' }}
                </p>
            </div>

            <div class="rounded-3xl border border-black/10 bg-[#F8F5EF] p-8">
                <p class="mb-4 text-sm font-bold uppercase tracking-[0.2em] text-[#9B7A22]">Result</p>
                <p class="leading-8 text-black/65">
                    {{ $project->result ?: 'This section explains the business value or improvement produced by the project.' }}
                </p>
            </div>
        </div>
    </section>

    <section class="bg-[#0B0B0D] px-6 py-20 text-white lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[1fr_0.55fr]">
            <div>
                <p class="mb-4 text-sm font-bold uppercase tracking-[0.3em] text-[#D7B75A]">
                    Project Details
                </p>

                <h2 class="text-4xl font-black tracking-tight">
                    What was included
                </h2>

                @if ($project->description)
                    <div class="mt-6 max-w-3xl text-lg leading-8 text-white/60">
                        {!! nl2br(e($project->description)) !!}
                    </div>
                @endif

                @if ($project->features)
                    <div class="mt-10 rounded-3xl border border-white/10 bg-white/[0.04] p-8">
                        <h3 class="text-xl font-black text-white">Features</h3>
                        <p class="mt-4 leading-8 text-white/60">
                            {{ $project->features }}
                        </p>
                    </div>
                @endif
            </div>

            <aside class="rounded-[2rem] border border-white/10 bg-white/[0.04] p-8">
                <h3 class="text-xl font-black text-white">Project Summary</h3>

                <div class="mt-8 space-y-5">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#D7B75A]">Category</p>
                        <p class="mt-2 text-white/70">{{ $project->category }}</p>
                    </div>

                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#D7B75A]">Business Type</p>
                        <p class="mt-2 text-white/70">{{ $project->business_type ?: 'Not specified' }}</p>
                    </div>

                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#D7B75A]">Published</p>
                        <p class="mt-2 text-white/70">{{ $project->created_at->format('F d, Y') }}</p>
                    </div>
                </div>

                @if ($project->qr_code_url)
                    <div class="mt-10 border-t border-white/10 pt-8">
                        <p class="mb-4 text-xs font-bold uppercase tracking-[0.2em] text-[#D7B75A]">
                            QR Code
                        </p>

                        <img
                            src="{{ $project->qr_code_url }}"
                            alt="{{ $project->title }} QR Code"
                            class="h-36 w-36 rounded-2xl bg-white object-cover p-2"
                        >
                    </div>
                @endif
            </aside>
        </div>
    </section>

    @if ($relatedProjects->count())
        <section class="bg-[#F8F5EF] px-6 py-20 text-black lg:px-8">
            <div class="mx-auto max-w-7xl">
                <div class="mb-10 flex flex-col justify-between gap-6 md:flex-row md:items-end">
                    <div>
                        <p class="mb-3 text-sm font-bold uppercase tracking-[0.25em] text-[#9B7A22]">
                            More Work
                        </p>
                        <h2 class="text-4xl font-black tracking-tight">
                            Related projects
                        </h2>
                    </div>

                    <a href="{{ route('works') }}" class="w-fit rounded-full border border-black/15 px-6 py-3 text-sm font-bold text-black transition hover:border-[#9B7A22] hover:text-[#9B7A22]">
                        View All Works
                    </a>
                </div>

                <div class="grid gap-8 md:grid-cols-3">
                    @foreach ($relatedProjects as $related)
                        <article class="overflow-hidden rounded-3xl border border-black/10 bg-white shadow-sm">
                            <a href="{{ route('projects.show', ['project' => $related->slug]) }}" class="block">
                                <div class="h-48 bg-gradient-to-br from-black/10 to-black/5 p-4">
                                    @if ($related->image_url)
                                        <img
                                            src="{{ $related->image_url }}"
                                            alt="{{ $related->title }}"
                                            class="h-full w-full rounded-2xl object-cover"
                                        >
                                    @else
                                        <div class="flex h-full items-center justify-center rounded-2xl border border-black/10 bg-white/60 text-sm font-bold text-black/30">
                                            Project Preview
                                        </div>
                                    @endif
                                </div>
                            </a>

                            <div class="p-6">
                                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#9B7A22]">
                                    {{ $related->category }}
                                </p>

                                <h3 class="mt-3 text-xl font-black">
                                    {{ $related->title }}
                                </h3>

                                <a href="{{ route('projects.show', ['project' => $related->slug]) }}" class="mt-5 inline-flex text-sm font-black text-[#9B7A22]">
    View Project →
</a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="bg-black px-6 py-20 text-center lg:px-8">
        <h2 class="mx-auto max-w-3xl text-4xl font-black text-white">
            Want a system like this for your business?
        </h2>

        <a href="{{ route('book-call') }}" class="mt-8 inline-flex rounded-full bg-[#D7B75A] px-8 py-4 text-sm font-bold text-black hover:bg-[#E7C96B]">
            Book a Strategy Call
        </a>
    </section>
</x-layouts.public>