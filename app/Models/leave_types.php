<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class leave_types extends Model
{
    protected $fillable = [
        'name',
        'max_days'
    ];

    public function leave(): HasMany
    {
        return $this->hasMany(Leave::class);
    }
}
