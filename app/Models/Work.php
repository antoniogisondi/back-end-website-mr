<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Work extends Model
{
    use HasFactory;
    protected $fillable = ['titolo', 'slug', 'descrizione', 'img-1', 'img-2', 'img-3', 'img-4'];
    public static function generateSlug($titolo)
    {
        return Str::slug($titolo, '-');
    }
}
