<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
    'reference_number',
    'full_name',
    'email',
    'phone',
    'business_name',
    'business_type',
    'service_needed',
    'preferred_date',
    'preferred_time',
    'message',
    'status',
    'admin_notes',
];
}