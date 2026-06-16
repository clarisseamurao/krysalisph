<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Booking Request Has Been Received</title>
</head>
<body style="margin: 0; padding: 0; background: #f5f1e8; font-family: Arial, sans-serif; color: #111111;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background: #f5f1e8; padding: 30px 0;">
        <tr>
            <td align="center">
                <table width="640" cellpadding="0" cellspacing="0" style="background: #ffffff; border-radius: 18px; overflow: hidden; border: 1px solid #e2d7bd;">
                    <tr>
                        <td style="background: #0b0b0d; padding: 28px 32px;">
                            <h1 style="margin: 0; color: #d7b75a; font-size: 22px; letter-spacing: 1px;">
                                KRYSALIS
                            </h1>

                            <p style="margin: 8px 0 0; color: #ffffff; font-size: 14px;">
                                Booking Request Confirmation
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 32px;">
                            <h2 style="margin: 0 0 14px; font-size: 26px; color: #111111;">
                                Hi {{ $booking->full_name }},
                            </h2>

                            <p style="margin: 0 0 24px; line-height: 1.7; color: #444444;">
                                We received your booking request. Krysalis will review your details and contact you using the information you provided.
                            </p>

                            <div style="margin: 0 0 28px; padding: 22px; background: #f8f5ef; border-radius: 14px; border: 1px solid #eadfca;">
                                <p style="margin: 0 0 8px; color: #8a6a18; font-size: 12px; font-weight: bold; letter-spacing: 2px; text-transform: uppercase;">
                                    Reference Number
                                </p>

                                <p style="margin: 0; font-size: 28px; font-weight: bold; color: #111111;">
                                    {{ $booking->reference_number }}
                                </p>

                                <p style="margin: 12px 0 0; color: #666666; font-size: 14px; line-height: 1.6;">
                                    Save this number in case you need to follow up about your request.
                                </p>
                            </div>

                            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee; font-weight: bold; width: 190px;">Service Requested</td>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee;">{{ $booking->service_needed }}</td>
                                </tr>

                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee; font-weight: bold;">Business Name</td>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee;">{{ $booking->business_name ?: 'Not provided' }}</td>
                                </tr>

                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee; font-weight: bold;">Preferred Date</td>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee;">
                                        @if ($booking->preferred_date)
                                            {{ \Carbon\Carbon::parse($booking->preferred_date)->format('F d, Y') }}
                                        @else
                                            Not provided
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee; font-weight: bold;">Preferred Time</td>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee;">
                                        @if ($booking->preferred_time)
                                            {{ \Carbon\Carbon::parse($booking->preferred_time)->format('g:i A') }}
                                        @else
                                            Not provided
                                        @endif
                                    </td>
                                </tr>
                            </table>

                            <div style="margin-top: 28px; padding: 20px; background: #0b0b0d; border-radius: 14px;">
                                <p style="margin: 0 0 10px; color: #d7b75a; font-weight: bold;">
                                    What happens next?
                                </p>

                                <p style="margin: 0; line-height: 1.7; color: #dddddd;">
                                    We will review your request, check the service details, and contact you to confirm the next available schedule or ask for more information if needed.
                                </p>
                            </div>

                            <p style="margin: 28px 0 0; color: #555555; font-size: 14px; line-height: 1.6;">
                                This message confirms that your request was submitted successfully. Please do not reply with urgent changes unless this email address is actively monitored.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="background: #0b0b0d; padding: 20px 32px;">
                            <p style="margin: 0; color: #999999; font-size: 12px;">
                                © {{ date('Y') }} Krysalis. This email was generated automatically by the Krysalis booking system.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>