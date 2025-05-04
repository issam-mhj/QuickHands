<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory;
    protected $fillable = [
        'content',
        'conversation_id',
        'user_id',
    ];
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }
}
