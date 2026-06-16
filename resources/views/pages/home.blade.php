<x-layouts.public title="Krysalis | Premium Business Systems">
    <section class="relative border-b border-white/10">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(215,183,90,0.22),transparent_35%),linear-gradient(180deg,#0B0B0D_0%,#111113_100%)]"></div>

        <div class="relative mx-auto grid max-w-7xl items-center gap-12 px-6 py-24 lg:grid-cols-2 lg:px-8">
            <div>
                <p class="mb-5 text-sm font-bold uppercase tracking-[0.3em] text-[#D7B75A]">Premium Digital Systems</p>

                <h1 class="max-w-3xl text-5xl font-black leading-tight tracking-tight text-white md:text-6xl">
                    Turn Your Website Into a 24/7 Customer System
                </h1>

                <p class="mt-6 max-w-xl text-lg leading-8 text-white/65">
                    Krysalis builds websites, booking systems, dashboards, and business tools that help service-based companies get leads, manage requests, and operate with less manual work.
                </p>

                <div class="mt-10 flex flex-col gap-4 sm:flex-row">
                    <a href="{{ route('book-call') }}" class="rounded-full bg-[#D7B75A] px-7 py-4 text-center text-sm font-bold text-black shadow-xl shadow-[#D7B75A]/20 transition hover:bg-[#E7C96B]">
                        Book a Strategy Call
                    </a>
                    <a href="{{ route('works') }}" class="rounded-full border border-white/15 px-7 py-4 text-center text-sm font-bold text-white transition hover:border-[#D7B75A]/60 hover:text-[#D7B75A]">
                        View Our Works
                    </a>
                </div>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-white/[0.04] p-4 shadow-2xl shadow-black/50">
                <div class="rounded-[1.5rem] border border-white/10 bg-[#111113] p-6">
                    <div class="mb-6 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-white/45">Dashboard Preview</p>
                            <h2 class="text-xl font-bold text-white">Business Control Center</h2>
                        </div>
                        <span class="rounded-full bg-[#D7B75A]/15 px-3 py-1 text-xs font-bold text-[#D7B75A]">Live</span>
                    </div>

                    <div class="grid gap-4 md:grid-cols-3">
                        <div class="rounded-2xl bg-black/60 p-5">
                            <p class="text-xs text-white/45">New Leads</p>
                            <p class="mt-2 text-3xl font-black text-white">128</p>
                        </div>
                        <div class="rounded-2xl bg-black/60 p-5">
                            <p class="text-xs text-white/45">Bookings</p>
                            <p class="mt-2 text-3xl font-black text-white">42</p>
                        </div>
                        <div class="rounded-2xl bg-black/60 p-5">
                            <p class="text-xs text-white/45">Revenue</p>
                            <p class="mt-2 text-3xl font-black text-white">₱84k</p>
                        </div>
                    </div>

                    <div class="mt-6 rounded-2xl border border-white/10 bg-black/50 p-5">
                        <div class="mb-4 flex items-center justify-between">
                            <p class="text-sm font-bold text-white">Recent Requests</p>
                            <p class="text-xs text-[#D7B75A]">View all</p>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center justify-between rounded-xl bg-white/[0.03] px-4 py-3">
                                <span class="text-sm text-white/70">Restaurant booking system</span>
                                <span class="text-xs text-[#D7B75A]">New</span>
                            </div>
                            <div class="flex items-center justify-between rounded-xl bg-white/[0.03] px-4 py-3">
                                <span class="text-sm text-white/70">Clinic appointment dashboard</span>
                                <span class="text-xs text-white/40">Review</span>
                            </div>
                            <div class="flex items-center justify-between rounded-xl bg-white/[0.03] px-4 py-3">
                                <span class="text-sm text-white/70">Salon website redesign</span>
                                <span class="text-xs text-white/40">Contacted</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F8F5EF] px-6 py-20 text-black lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="mb-12 flex flex-col justify-between gap-6 md:flex-row md:items-end">
            <div class="max-w-2xl">
                <p class="mb-3 text-sm font-bold uppercase tracking-[0.25em] text-[#9B7A22]">What We Build</p>
                <h2 class="text-4xl font-black tracking-tight">Not just websites. Business systems.</h2>
                <p class="mt-5 leading-8 text-black/60">
                    These are the core services Krysalis can provide. The admin controls this list from the dashboard.
                </p>
            </div>

            <a href="{{ route('book-call') }}" class="w-fit rounded-full border border-black/15 px-6 py-3 text-sm font-bold text-black transition hover:border-[#9B7A22] hover:text-[#9B7A22]">
                Request a Service
            </a>
        </div>

        @if ($featuredServices->count())
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($featuredServices as $service)
                    <div class="group rounded-3xl border border-black/10 bg-white p-8 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                        <div class="mb-8 flex h-12 w-12 items-center justify-center rounded-2xl border border-[#D7B75A]/50 bg-[#D7B75A]/10">
                            <div class="h-4 w-4 rounded-full bg-[#D7B75A]"></div>
                        </div>

                        <h3 class="text-xl font-black">{{ $service->title }}</h3>

                        <p class="mt-4 leading-7 text-black/60">
                            {{ $service->short_description }}
                        </p>

                        <div class="mt-6 flex flex-wrap gap-3">
                            @if ($service->starting_price)
                                <span class="rounded-full bg-black px-4 py-2 text-xs font-bold text-white">
                                    {{ $service->starting_price }}
                                </span>
                            @endif

                            @if ($service->timeline)
                                <span class="rounded-full border border-black/10 px-4 py-2 text-xs font-bold text-black/60">
                                    {{ $service->timeline }}
                                </span>
                            @endif
                        </div>

                        <a href="{{ route('book-call') }}" class="mt-7 inline-flex text-sm font-black text-[#9B7A22]">
                            Book this service →
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="rounded-3xl border border-black/10 bg-white p-10">
                <h3 class="text-2xl font-black">No featured services yet.</h3>
                <p class="mt-3 text-black/60">
                    Add services in the admin panel and mark them as featured to show them here.
                </p>
            </div>
        @endif
    </div>
</section>
<section class="bg-[#0B0B0D] px-6 py-20 text-white lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="mb-12 flex flex-col justify-between gap-6 md:flex-row md:items-end">
            <div class="max-w-2xl">
                <p class="mb-3 text-sm font-bold uppercase tracking-[0.25em] text-[#D7B75A]">
                    Featured Works
                </p>

                <h2 class="text-4xl font-black tracking-tight">
                    Systems designed to solve real business problems.
                </h2>

                <p class="mt-5 leading-8 text-white/60">
                    View selected projects built around booking, lead generation, dashboards, and service management.
                </p>
            </div>

            <a href="{{ route('works') }}" class="w-fit rounded-full border border-white/15 px-6 py-3 text-sm font-bold text-white transition hover:border-[#D7B75A] hover:text-[#D7B75A]">
                View All Works
            </a>
        </div>

        @if ($featuredProjects->count())
            <div class="grid gap-8 md:grid-cols-3">
                @foreach ($featuredProjects as $project)
                    <article class="overflow-hidden rounded-[2rem] border border-white/10 bg-white/[0.04] transition hover:-translate-y-1 hover:border-[#D7B75A]/50">
                        <a href="{{ route('projects.show', ['project' => $project->slug]) }}" class="block">
                            <div class="h-56 bg-white/5 p-4">
                                @if ($project->image_url)
                                    <img
                                        src="{{ $project->image_url }}"
                                        alt="{{ $project->title }}"
                                        class="h-full w-full rounded-2xl object-cover"
                                    >
                                @else
                                    <div class="flex h-full items-center justify-center rounded-2xl border border-white/10 bg-white/[0.03] text-sm font-bold text-white/25">
                                        Project Preview
                                    </div>
                                @endif
                            </div>
                        </a>

                        <div class="p-7">
                            <span class="rounded-full bg-[#D7B75A] px-3 py-1 text-xs font-black text-black">
                                {{ $project->category }}
                            </span>

                            <h3 class="mt-5 text-xl font-black text-white">
                                {{ $project->title }}
                            </h3>

                            <p class="mt-3 line-clamp-3 leading-7 text-white/55">
                                {{ $project->short_description }}
                            </p>

                            <a href="{{ route('projects.show', ['project' => $project->slug]) }}" class="mt-6 inline-flex text-sm font-black text-[#D7B75A]">
                                View Project →
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="rounded-[2rem] border border-white/10 bg-white/[0.04] p-10">
                <h3 class="text-2xl font-black text-white">
                    No featured projects yet.
                </h3>

                <p class="mt-3 text-white/60">
                    Go to the admin panel, edit a project, and enable Featured Project.
                </p>
            </div>
        @endif
    </div>
</section>

<section class="bg-black px-6 py-20 text-center lg:px-8">
    <div class="mx-auto max-w-4xl">
        <p class="mb-4 text-sm font-bold uppercase tracking-[0.25em] text-[#D7B75A]">
            Start With a Strategy Call
        </p>

        <h2 class="text-4xl font-black leading-tight text-white md:text-5xl">
            Your website should bring leads, bookings, and control — not just decoration.
        </h2>

        <p class="mx-auto mt-6 max-w-2xl leading-8 text-white/60">
            Tell us what your business needs. We will help identify the right system before building anything unnecessary.
        </p>

        <div class="mt-10 flex flex-col justify-center gap-4 sm:flex-row">
            <a href="{{ route('book-call') }}" class="rounded-full bg-[#D7B75A] px-8 py-4 text-sm font-black text-black transition hover:bg-[#E7C96B]">
                Book a Strategy Call
            </a>

            <a href="{{ route('works') }}" class="rounded-full border border-white/15 px-8 py-4 text-sm font-black text-white transition hover:border-[#D7B75A] hover:text-[#D7B75A]">
                View Works
            </a>
        </div>
    </div>
</section>
</x-layouts.public>