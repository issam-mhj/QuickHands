<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;
    protected $fillable = [
        'start_date',
        'end_date',
        'status',
        'offer_id',
    ];
    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }
    public function TaskUpdates(): HasMany
    {
        return $this->hasMany(TaskUpdate::class);
    }
}
