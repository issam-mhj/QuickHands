<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;
    protected $fillable = [
        "title",
        "description",
        "desired_date",
        "location",
        "status",
        "user_id",
        "service_category_id",
    ];
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function ServiceCategory(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class);
    }
    public function Offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }
}
