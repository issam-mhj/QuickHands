<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewsFactory> */
    use HasFactory;
    protected $fillable = [
        'rating',
        'comment',
        'offer_id'
    ];
    public function Offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }
}
