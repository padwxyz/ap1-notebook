<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Locale;

class Facility extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function note()
    {
        return $this->hasMany(Note::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
