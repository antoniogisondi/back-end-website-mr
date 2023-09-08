<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Work extends Model
{
    use HasFactory;
    public static function generateSlug($titolo)
    {
        return Str::slug($titolo, '-');
    }
}
