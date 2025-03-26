<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provider extends Model
{
    /** @use HasFactory<\Database\Factories\ProviderFactory> */
    use HasFactory;
    protected $fillable = [
        'skills',
        'status',
        'user_id'
    ];
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }
}
