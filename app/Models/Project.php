<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'business_type',
        'short_description',
        'description',
        'problem',
        'solution',
        'result',
        'features',
        'image',
        'qr_code',
        'is_featured',
        'status',
    ];

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? Storage::url($this->image) : null;
    }

    public function getQrCodeUrlAttribute(): ?string
    {
        return $this->qr_code ? Storage::url($this->qr_code) : null;
    }
}