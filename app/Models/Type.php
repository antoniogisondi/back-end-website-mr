<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Work;

class Type extends Model
{
    use HasFactory;
    protected $fillable = ['nome_tipologia', 'slug', 'descrizione', 'cover_image'];

    public static function generateSlug($nome_tipologia){
        return Str::slug($nome_tipologia, '-');
    }
    public function works() {
        return $this->hasMany(Work::class);
    }
    
    
}
