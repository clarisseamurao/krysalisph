<x-layouts.public title="Book a Call | Krysalis">
    <section class="bg-[#F8F5EF] px-6 py-20 text-black lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="mb-14 max-w-3xl">
                <p class="mb-4 text-sm font-bold uppercase tracking-[0.3em] text-[#9B7A22]">Book a Strategy Call</p>
                <h1 class="text-5xl font-black leading-tight tracking-tight">
                    Let’s Build the System Your Business Needs
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-black/65">
                    Tell us about your business, your current problem, and the type of digital system you want to build.
                </p>
            </div>

            @if (session('success'))
                <div class="mb-8 rounded-2xl border border-[#D7B75A]/40 bg-[#D7B75A]/15 px-6 py-5 font-semibold text-[#6F5515]">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid gap-10 lg:grid-cols-[0.85fr_1.15fr]">
                <div>
                    <div class="rounded-[2rem] border border-black/10 bg-white p-8 shadow-sm">
                        <h2 class="text-xl font-black text-[#9B7A22]">Why book a call?</h2>
                        <p class="mt-5 leading-8 text-black/65">
                            This is not a sales trap. The goal is to understand your business and identify what kind of system actually makes sense.
                        </p>

                        <div class="mt-8 space-y-4">
                            @foreach ([
                                'Your business goals',
                                'Current website or system problems',
                                'Needed features',
                                'Possible timeline and budget',
                                'Best digital solution for your business',
                            ] as $item)
                                <div class="flex items-start gap-3">
                                    <div class="mt-1 h-5 w-5 rounded-full border border-[#9B7A22]"></div>
                                    <p class="font-medium text-black/75">{{ $item }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-6 grid gap-4 sm:grid-cols-3">
                        @foreach ([
                            ['No Pressure', 'A clear discussion first.'],
                            ['Practical Advice', 'No unnecessary features.'],
                            ['Clear Next Steps', 'Know what to build next.'],
                        ] as $card)
                            <div class="rounded-3xl border border-black/10 bg-white p-5 text-center">
                                <div class="mx-auto mb-4 h-10 w-10 rounded-2xl border border-[#D7B75A]/50 bg-[#D7B75A]/10"></div>
                                <h3 class="font-black">{{ $card[0] }}</h3>
                                <p class="mt-2 text-sm leading-6 text-black/55">{{ $card[1] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <form action="{{ route('book-call.store') }}" method="POST" class="rounded-[2rem] border border-black/10 bg-white p-8 shadow-xl">
                    @csrf

                    <h2 class="mb-8 text-2xl font-black text-[#9B7A22]">Booking Form</h2>

                    <div class="grid gap-5 md:grid-cols-2">
                        <div class="md:col-span-2">
                            <label class="mb-2 block text-sm font-bold">Full Name *</label>
                            <input name="full_name" value="{{ old('full_name') }}" class="w-full rounded-xl border border-black/10 px-4 py-3 outline-none focus:border-[#D7B75A]" placeholder="Enter your full name">
                            @error('full_name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-bold">Email *</label>
                            <input name="email" type="email" value="{{ old('email') }}" class="w-full rounded-xl border border-black/10 px-4 py-3 outline-none focus:border-[#D7B75A]" placeholder="Enter your email">
                            @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-bold">Phone Number</label>
                            <input name="phone" value="{{ old('phone') }}" class="w-full rounded-xl border border-black/10 px-4 py-3 outline-none focus:border-[#D7B75A]" placeholder="Enter your phone number">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-bold">Business Name</label>
                            <input name="business_name" value="{{ old('business_name') }}" class="w-full rounded-xl border border-black/10 px-4 py-3 outline-none focus:border-[#D7B75A]" placeholder="Enter business name">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-bold">Business Type</label>
                            <select name="business_type" class="w-full rounded-xl border border-black/10 px-4 py-3 outline-none focus:border-[#D7B75A]">
                                <option value="">Select business type</option>
                                <option value="Restaurant">Restaurant</option>
                                <option value="Clinic">Clinic</option>
                                <option value="Salon">Salon</option>
                                <option value="Hotel / Resort">Hotel / Resort</option>
                                <option value="Professional Service">Professional Service</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div>
    <label class="mb-2 block text-sm font-bold">Service Needed *</label>

    <select name="service_needed" class="w-full rounded-xl border border-black/10 px-4 py-3 outline-none focus:border-[#D7B75A]">
        <option value="">Select service</option>

        @foreach ($services as $service)
            <option value="{{ $service->title }}" @selected(old('service_needed') === $service->title)>
                {{ $service->title }}
            </option>
        @endforeach

        <option value="Custom System" @selected(old('service_needed') === 'Custom System')>
            Custom System
        </option>
    </select>

    @error('service_needed')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

                        <div>
                            <label class="mb-2 block text-sm font-bold">Preferred Date</label>
                            <input name="preferred_date" type="date" value="{{ old('preferred_date') }}" class="w-full rounded-xl border border-black/10 px-4 py-3 outline-none focus:border-[#D7B75A]">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-bold">Preferred Time</label>
                            <input name="preferred_time" type="time" value="{{ old('preferred_time') }}" class="w-full rounded-xl border border-black/10 px-4 py-3 outline-none focus:border-[#D7B75A]">
                        </div>

                        <div class="md:col-span-2">
                            <label class="mb-2 block text-sm font-bold">Message</label>
                            <textarea name="message" rows="5" class="w-full rounded-xl border border-black/10 px-4 py-3 outline-none focus:border-[#D7B75A]" placeholder="Tell us more about your business and what you need...">{{ old('message') }}</textarea>
                        </div>
                    </div>

                    <button type="submit" class="mt-8 w-full rounded-full bg-[#D7B75A] px-7 py-4 text-sm font-black text-black transition hover:bg-[#E7C96B]">
                        Submit Booking Request
                    </button>
                </form>
            </div>
        </div>
    </section>

    <section class="bg-white px-6 py-16 text-black lg:px-8">
    <div class="mx-auto max-w-7xl">
        <p class="mb-8 text-center text-sm font-bold uppercase tracking-[0.25em] text-[#9B7A22]">
            Services We Offer
        </p>

        @if ($services->count())
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($services as $service)
                    <div class="rounded-3xl border border-black/10 bg-[#F8F5EF] p-6">
                        <h3 class="font-black">
                            {{ $service->title }}
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-black/55">
                            {{ $service->short_description }}
                        </p>

                        @if ($service->timeline)
                            <p class="mt-4 text-xs font-bold uppercase tracking-[0.18em] text-[#9B7A22]">
                                {{ $service->timeline }}
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="rounded-3xl border border-black/10 bg-[#F8F5EF] p-8 text-center">
                <h3 class="text-xl font-black">
                    No services available yet.
                </h3>

                <p class="mt-2 text-black/60">
                    Services will appear here once added by the admin.
                </p>
            </div>
        @endif
    </div>
</section>
</x-layouts.public>