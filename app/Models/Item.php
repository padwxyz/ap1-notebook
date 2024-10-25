<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function note()
    {
        return $this->hasMany(Note::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
