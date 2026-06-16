<x-layouts.public title="Story | Krysalis">
    <section class="bg-[#F8F5EF] text-black">
        <div class="mx-auto grid max-w-7xl items-center gap-14 px-6 py-20 lg:grid-cols-2 lg:px-8">
            <div>
                <p class="mb-4 text-sm font-bold uppercase tracking-[0.3em] text-[#9B7A22]">Our Story</p>
                <h1 class="text-5xl font-black leading-tight tracking-tight">
                    Turn Your Business Website Into a Working Digital System
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-8 text-black/65">
                    Krysalis was created for businesses that need more than a nice-looking website. We build digital systems that help owners capture leads, organize requests, manage services, and grow with less manual work.
                </p>

                <div class="mt-10 flex flex-col gap-4 sm:flex-row">
                    <a href="{{ route('book-call') }}" class="rounded-full bg-[#D7B75A] px-7 py-4 text-center text-sm font-bold text-black transition hover:bg-[#E7C96B]">
                        Book a Call
                    </a>
                    <a href="{{ route('works') }}" class="rounded-full border border-black/15 px-7 py-4 text-center text-sm font-bold text-black transition hover:border-[#9B7A22] hover:text-[#9B7A22]">
                        View Our Works
                    </a>
                </div>
            </div>

            <div class="rounded-[2rem] bg-[#0B0B0D] p-5 shadow-2xl">
                <div class="rounded-[1.5rem] border border-white/10 bg-[#111113] p-6 text-white">
                    <div class="mb-6 flex items-center justify-between">
                        <h2 class="text-xl font-bold">Krysalis Dashboard</h2>
                        <span class="rounded-full bg-[#D7B75A]/15 px-3 py-1 text-xs font-bold text-[#D7B75A]">System View</span>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-3">
                        <div class="rounded-2xl bg-black/60 p-4">
                            <p class="text-xs text-white/45">Clients</p>
                            <p class="mt-2 text-2xl font-black">248</p>
                        </div>
                        <div class="rounded-2xl bg-black/60 p-4">
                            <p class="text-xs text-white/45">Bookings</p>
                            <p class="mt-2 text-2xl font-black">128</p>
                        </div>
                        <div class="rounded-2xl bg-black/60 p-4">
                            <p class="text-xs text-white/45">Revenue</p>
                            <p class="mt-2 text-2xl font-black">₱24,560</p>
                        </div>
                    </div>

                    <div class="mt-6 h-44 rounded-2xl border border-white/10 bg-gradient-to-br from-white/10 to-transparent p-5">
                        <div class="h-full rounded-xl border border-[#D7B75A]/20"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-white/10 bg-[#0B0B0D] px-6 py-20 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-12 lg:grid-cols-[0.8fr_1.2fr]">
                <div>
                    <p class="mb-3 text-sm font-bold uppercase tracking-[0.25em] text-[#D7B75A]">Why Krysalis Exists</p>
                    <h2 class="text-4xl font-black tracking-tight text-white">Most websites look fine but do not work hard enough.</h2>
                    <p class="mt-6 leading-8 text-white/60">
                        A business website should not just sit online. It should explain your offer clearly, collect serious leads, support booking, and help you manage the work behind the scenes.
                    </p>
                </div>

                <div class="grid gap-5 sm:grid-cols-2">
                    @foreach ([
                        ['Lead Generation', 'Turn visitors into real client inquiries.'],
                        ['Booking Systems', 'Make service requests easier for customers and staff.'],
                        ['Admin Dashboards', 'Manage inquiries, projects, and services in one place.'],
                        ['Business Automation', 'Reduce repetitive tasks and missed opportunities.'],
                    ] as $item)
                        <div class="rounded-3xl border border-white/10 bg-white/[0.04] p-7">
                            <div class="mb-6 h-12 w-12 rounded-2xl border border-[#D7B75A]/40 bg-[#D7B75A]/10"></div>
                            <h3 class="text-lg font-black text-white">{{ $item[0] }}</h3>
                            <p class="mt-3 leading-7 text-white/55">{{ $item[1] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#F8F5EF] px-6 py-20 text-black lg:px-8">
        <div class="mx-auto max-w-7xl">
            <p class="mb-3 text-sm font-bold uppercase tracking-[0.25em] text-[#9B7A22]">Our Approach</p>
            <h2 class="mb-12 text-4xl font-black tracking-tight">Simple process. Serious execution.</h2>

            <div class="grid gap-6 md:grid-cols-4">
                @foreach ([
                    ['01', 'Understand the Business', 'We learn your goals, customers, services, and bottlenecks.'],
                    ['02', 'Design the Journey', 'We map how visitors become leads and customers.'],
                    ['03', 'Build the System', 'We build a clean, secure, usable Laravel-based system.'],
                    ['04', 'Launch and Improve', 'We help you move from launch to better operations.'],
                ] as $step)
                    <div class="rounded-3xl border border-black/10 bg-white p-8">
                        <p class="text-sm font-black text-[#9B7A22]">{{ $step[0] }}</p>
                        <h3 class="mt-4 text-xl font-black">{{ $step[1] }}</h3>
                        <p class="mt-4 leading-7 text-black/60">{{ $step[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-black px-6 py-20 text-center lg:px-8">
        <h2 class="mx-auto max-w-3xl text-4xl font-black text-white">
            Ready to turn your website into a system?
        </h2>
        <a href="{{ route('book-call') }}" class="mt-8 inline-flex rounded-full bg-[#D7B75A] px-8 py-4 text-sm font-bold text-black hover:bg-[#E7C96B]">
            Book a Strategy Call
        </a>
    </section>
</x-layouts.public>