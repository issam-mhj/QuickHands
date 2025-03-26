<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskUpdate extends Model
{
    /** @use HasFactory<\Database\Factories\TaskUpdateFactory> */
    use HasFactory;
    protected $fillable = [
        'update_text',
        'task_id'
    ];
    public function Task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
