<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['titolo', 'slug', 'descrizione'];
    public static function generateSlug($titolo)
    {
        return Str::slug($titolo, '-');
    }
}
