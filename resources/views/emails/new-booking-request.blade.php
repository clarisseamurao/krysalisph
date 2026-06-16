<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Booking Request</title>
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
                                New Booking Request Received
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 32px;">
                            <p style="margin: 0 0 10px; color: #8a6a18; font-size: 12px; font-weight: bold; letter-spacing: 2px; text-transform: uppercase;">
                                Reference Number
                            </p>

                            <h2 style="margin: 0 0 24px; font-size: 28px; color: #111111;">
                                {{ $booking->reference_number }}
                            </h2>

                            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee; font-weight: bold; width: 190px;">Full Name</td>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee;">{{ $booking->full_name }}</td>
                                </tr>

                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee; font-weight: bold;">Email</td>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee;">{{ $booking->email }}</td>
                                </tr>

                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee; font-weight: bold;">Phone</td>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee;">{{ $booking->phone ?: 'Not provided' }}</td>
                                </tr>

                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee; font-weight: bold;">Business Name</td>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee;">{{ $booking->business_name ?: 'Not provided' }}</td>
                                </tr>

                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee; font-weight: bold;">Business Type</td>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee;">{{ $booking->business_type ?: 'Not provided' }}</td>
                                </tr>

                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee; font-weight: bold;">Service Needed</td>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #eeeeee;">{{ $booking->service_needed }}</td>
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

                            <div style="margin-top: 28px; padding: 20px; background: #f8f5ef; border-radius: 14px; border: 1px solid #eadfca;">
                                <p style="margin: 0 0 8px; font-weight: bold; color: #8a6a18;">
                                    Message
                                </p>

                                <p style="margin: 0; line-height: 1.7;">
                                    {{ $booking->message ?: 'No message provided.' }}
                                </p>
                            </div>

                            <p style="margin: 28px 0 0; color: #555555; font-size: 14px; line-height: 1.6;">
                                Log in to the Krysalis admin panel to review, update the status, and add admin notes.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="background: #0b0b0d; padding: 20px 32px;">
                            <p style="margin: 0; color: #999999; font-size: 12px;">
                                This email was generated automatically by the Krysalis booking system.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>