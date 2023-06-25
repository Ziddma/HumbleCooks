<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Step extends Model
{
    use HasFactory;

    public function receipt(): BelongsTo
    {
        return $this->belongsTo(Receipt::class);
    }

    public function stepImages(): HasMany
    {
        return $this->hasMany(StepImage::class);
    }
}
