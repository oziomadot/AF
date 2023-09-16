<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Available extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function volunter():HasMany
    {
        return $this->hasMany(Volunteer::class);
    }

    public function plan():HasMany
    {
        return $this->hasMany(Plan::class);
    }

    

}
