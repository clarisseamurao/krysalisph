<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogger;
use App\Models\Booking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Mail\NewBookingRequestMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerBookingConfirmationMail;

class BookingController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'business_name' => ['nullable', 'string', 'max:255'],
            'business_type' => ['nullable', 'string', 'max:255'],
            'service_needed' => ['required', 'string', 'max:255'],
            'preferred_date' => ['nullable', 'date'],
            'preferred_time' => ['nullable'],
            'message' => ['nullable', 'string', 'max:3000'],
        ]);

        $validated['reference_number'] = $this->generateReferenceNumber();

        $booking = Booking::create($validated);

ActivityLogger::log(
    'created',
    'Booking',
    'New booking request submitted by ' . $booking->full_name . ' with reference ' . $booking->reference_number
);

Mail::to(config('services.krysalis.admin_email'))->send(
    new NewBookingRequestMail($booking)
);
Mail::to($booking->email)->send(
    new CustomerBookingConfirmationMail($booking)
);

        return redirect()->route('book-call.success', [
            'booking' => $booking->reference_number,
        ]);
    }

    public function success(Booking $booking): View
    {
        return view('pages.booking-success', compact('booking'));
    }

    private function generateReferenceNumber(): string
    {
        $year = now()->format('Y');

        $latestBooking = Booking::whereYear('created_at', $year)
            ->whereNotNull('reference_number')
            ->latest('id')
            ->first();

        $nextNumber = $latestBooking
            ? ((int) substr($latestBooking->reference_number ?? 'KRY-' . $year . '-000000', -6)) + 1
            : 1;

        return 'KRY-' . $year . '-' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
    }
}