<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Donator extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function thing(): BelongsTo
    {
        return $this->belongsTo(Thing::class);
    }
}
