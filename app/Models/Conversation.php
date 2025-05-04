<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
    /** @use HasFactory<\Database\Factories\ConversationFactory> */
    use HasFactory;
    protected $fillable = [
        'offer_id'
    ];
    public function Messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
    public function Offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }
}
