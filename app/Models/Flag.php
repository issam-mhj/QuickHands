<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Flag extends Model
{
    /** @use HasFactory<\Database\Factories\FlagFactory> */
    use HasFactory;
    protected $fillable = [
        'content_type',
        'reason',
        'status',
        'user_id'
    ];
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
