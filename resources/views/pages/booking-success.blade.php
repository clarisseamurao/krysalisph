<x-layouts.public title="Booking Submitted | Krysalis">
    <section class="min-h-[75vh] bg-[#F8F5EF] px-6 py-20 text-black lg:px-8">
        <div class="mx-auto max-w-4xl">
            <div class="rounded-[2rem] border border-black/10 bg-white p-8 shadow-xl md:p-12">
                <div class="mb-6 inline-flex rounded-full bg-[#D7B75A]/20 px-5 py-2 text-sm font-black uppercase tracking-[0.2em] text-[#8A6A18]">
                    Request Submitted
                </div>

                <h1 class="text-4xl font-black leading-tight tracking-tight md:text-5xl">
                    Your booking request has been received.
                </h1>

                <p class="mt-5 max-w-2xl text-lg leading-8 text-black/60">
                    Thank you, {{ $booking->full_name }}. We will review your request and contact you using the details you provided.
                </p>

                <div class="mt-10 rounded-3xl border border-[#D7B75A]/40 bg-[#F8F5EF] p-6">
                    <p class="text-sm font-black uppercase tracking-[0.2em] text-[#8A6A18]">
                        Reference Number
                    </p>

                    <p class="mt-3 break-all text-3xl font-black text-black md:text-4xl">
                        {{ $booking->reference_number }}
                    </p>

                    <p class="mt-3 text-sm leading-6 text-black/55">
                        Save this reference number for follow-up.
                    </p>
                </div>

                <div class="mt-10 grid gap-4 md:grid-cols-2">
                    <div class="rounded-2xl border border-black/10 bg-[#F8F5EF] p-5">
                        <p class="text-xs font-black uppercase tracking-[0.2em] text-[#8A6A18]">
                            Service Requested
                        </p>
                        <p class="mt-2 font-bold text-black">
                            {{ $booking->service_needed }}
                        </p>
                    </div>

                    <div class="rounded-2xl border border-black/10 bg-[#F8F5EF] p-5">
                        <p class="text-xs font-black uppercase tracking-[0.2em] text-[#8A6A18]">
                            Business
                        </p>
                        <p class="mt-2 font-bold text-black">
                            {{ $booking->business_name ?: 'Not specified' }}
                        </p>
                    </div>

                    <div class="rounded-2xl border border-black/10 bg-[#F8F5EF] p-5">
                        <p class="text-xs font-black uppercase tracking-[0.2em] text-[#8A6A18]">
                            Preferred Date
                        </p>
                        <p class="mt-2 font-bold text-black">
                            @if ($booking->preferred_date)
                                {{ \Carbon\Carbon::parse($booking->preferred_date)->format('F d, Y') }}
                            @else
                                Not specified
                            @endif
                        </p>
                    </div>

                    <div class="rounded-2xl border border-black/10 bg-[#F8F5EF] p-5">
                        <p class="text-xs font-black uppercase tracking-[0.2em] text-[#8A6A18]">
                            Preferred Time
                        </p>
                        <p class="mt-2 font-bold text-black">
                            @if ($booking->preferred_time)
                                {{ \Carbon\Carbon::parse($booking->preferred_time)->format('g:i A') }}
                            @else
                                Not specified
                            @endif
                        </p>
                    </div>
                </div>

                <div class="mt-10 rounded-3xl bg-black p-6 text-white">
                    <h2 class="text-xl font-black">
                        What happens next?
                    </h2>

                    <p class="mt-3 leading-7 text-white/60">
                        Krysalis will review your request, check the service details, and contact you to confirm the next available schedule.
                    </p>
                </div>

                <div class="mt-10 flex flex-col gap-4 sm:flex-row">
                    <a href="{{ route('home') }}" class="rounded-full bg-[#D7B75A] px-7 py-4 text-center text-sm font-black text-black transition hover:bg-[#E7C96B]">
                        Back to Home
                    </a>

                    <a href="{{ route('works') }}" class="rounded-full border border-black/15 px-7 py-4 text-center text-sm font-black text-black transition hover:border-[#8A6A18] hover:text-[#8A6A18]">
                        View Works
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.public>