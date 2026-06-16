<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Krysalis' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0B0B0D] text-[#F8F5EF] antialiased">
    <div class="min-h-screen overflow-hidden">
        <header x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 border-b border-white/10 bg-[#0B0B0D]/90 backdrop-blur-xl">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5 lg:px-8">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl border border-[#C9A64A]/40 bg-[#C9A64A]/10 text-xl font-black text-[#D7B75A]">
                K
            </div>

            <div>
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-white">Krysalis</p>
                <p class="text-xs text-white/45">Digital Business Systems</p>
            </div>
        </a>

        <nav class="hidden items-center gap-8 md:flex">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-[#D7B75A]' : 'text-white/70 hover:text-white' }} text-sm font-medium transition">
                Home
            </a>

            <a href="{{ route('story') }}" class="{{ request()->routeIs('story') ? 'text-[#D7B75A]' : 'text-white/70 hover:text-white' }} text-sm font-medium transition">
                Story
            </a>

            <a href="{{ route('works') }}" class="{{ request()->routeIs('works') || request()->routeIs('projects.show') ? 'text-[#D7B75A]' : 'text-white/70 hover:text-white' }} text-sm font-medium transition">
    Works
</a>

            <a href="{{ route('book-call') }}" class="{{ request()->routeIs('book-call') ? 'text-[#D7B75A]' : 'text-white/70 hover:text-white' }} text-sm font-medium transition">
                Book a Call
            </a>
        </nav>

        <div class="hidden md:block">
            <a href="{{ route('book-call') }}" class="rounded-full bg-[#D7B75A] px-5 py-3 text-sm font-bold text-black shadow-lg shadow-[#D7B75A]/20 transition hover:bg-[#E7C96B]">
                Book a Call
            </a>
        </div>

        <button
            type="button"
            class="inline-flex h-11 w-11 items-center justify-center rounded-xl border border-white/10 text-white md:hidden"
            @click="mobileMenuOpen = !mobileMenuOpen"
            aria-label="Toggle navigation menu"
        >
            <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h16M4 17h16" />
            </svg>

            <svg x-show="mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <div
        x-show="mobileMenuOpen"
        x-transition
        x-cloak
        class="border-t border-white/10 bg-[#0B0B0D] px-6 py-5 md:hidden"
    >
        <nav class="mx-auto flex max-w-7xl flex-col gap-3">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'border-[#D7B75A] bg-[#D7B75A]/10 text-[#D7B75A]' : 'border-white/10 text-white/70' }} rounded-2xl border px-4 py-3 text-sm font-bold">
                Home
            </a>

            <a href="{{ route('story') }}" class="{{ request()->routeIs('story') ? 'border-[#D7B75A] bg-[#D7B75A]/10 text-[#D7B75A]' : 'border-white/10 text-white/70' }} rounded-2xl border px-4 py-3 text-sm font-bold">
                Story
            </a>

            <a href="{{ route('works') }}" class="{{ request()->routeIs('works') || request()->routeIs('projects.show') ? 'border-[#D7B75A] bg-[#D7B75A]/10 text-[#D7B75A]' : 'border-white/10 text-white/70' }} rounded-2xl border px-4 py-3 text-sm font-bold">
                Works
            </a>

            <a href="{{ route('book-call') }}" class="{{ request()->routeIs('book-call') ? 'border-[#D7B75A] bg-[#D7B75A]/10 text-[#D7B75A]' : 'border-white/10 text-white/70' }} rounded-2xl border px-4 py-3 text-sm font-bold">
                Book a Call
            </a>

            <a href="{{ route('book-call') }}" class="mt-2 rounded-2xl bg-[#D7B75A] px-4 py-4 text-center text-sm font-black text-black">
                Start a Project
            </a>
        </nav>
    </div>
</header>

        <main>
            {{ $slot }}
        </main>

        <footer class="border-t border-white/10 bg-black">
            <div class="mx-auto grid max-w-7xl gap-10 px-6 py-12 md:grid-cols-4 lg:px-8">
                <div class="md:col-span-2">
                    <div class="mb-4 flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl border border-[#C9A64A]/40 bg-[#C9A64A]/10 text-xl font-black text-[#D7B75A]">K</div>
                        <p class="text-sm font-bold uppercase tracking-[0.28em] text-white">Krysalis</p>
                    </div>
                    <p class="max-w-md text-sm leading-7 text-white/55">
                        We build premium websites, booking systems, dashboards, and automation tools for businesses that want more than a basic online presence.
                    </p>
                </div>

                <div>
                    <h3 class="mb-4 text-sm font-semibold text-[#D7B75A]">Quick Links</h3>
                    <div class="space-y-3 text-sm text-white/60">
                        <a href="{{ route('home') }}" class="block hover:text-white">Home</a>
                        <a href="{{ route('story') }}" class="block hover:text-white">Story</a>
                        <a href="{{ route('works') }}" class="block hover:text-white">Works</a>
                        <a href="{{ route('book-call') }}" class="block hover:text-white">Book a Call</a>
                    </div>
                </div>

                <div>
                    <h3 class="mb-4 text-sm font-semibold text-[#D7B75A]">Contact</h3>
                    <div class="space-y-3 text-sm text-white/60">
                        <p>hello@krysalis.com</p>
                        <p>Philippines</p>
                        <p>Strategy calls by request</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-white/10 px-6 py-5 text-center text-xs text-white/40">
                © {{ date('Y') }} Krysalis. All rights reserved.
            </div>
        </footer>
    </div>
</body>
</html>