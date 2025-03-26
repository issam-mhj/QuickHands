<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Offer extends Model
{
    /** @use HasFactory<\Database\Factories\OfferFactory> */
    use HasFactory;
    protected $fillable = [
        'proposed_amount',
        'estimated_time',
        'status',
        'provider_id',
        'service_id'
    ];
    public function Service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
    public function Provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }
    public function Conversation(): HasOne
    {
        return $this->hasOne(Conversation::class);
    }
    public function Reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    public function Tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
