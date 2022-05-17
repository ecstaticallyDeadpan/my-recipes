<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the users recipes
     */
    public function recipes()
    {
        return $this->belongsTo(Recipe::class);
    }
}
