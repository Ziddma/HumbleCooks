<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StepImage extends Model
{
    use HasFactory;

    public function step(): BelongsTo
    {
        return $this->belongsTo(Step::class);
    }
}
