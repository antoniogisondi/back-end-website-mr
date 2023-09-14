<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Work;

class Work extends Model
{
    use HasFactory;
    protected $fillable = ['titolo', 'slug', 'descrizione'];
    public static function generateSlug($titolo)
    {
        return Str::slug($titolo, '-');
    }
    public function type() {
        return $this->belongsTo(Type::class);
    }
}
