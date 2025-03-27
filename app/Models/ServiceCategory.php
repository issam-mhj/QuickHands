<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceCategory extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceCategoryFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];
    public function Services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
