<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Type;
use App\Models\Image;

class Work extends Model
{
    use HasFactory;
    protected $fillable = ['type_id', 'titolo', 'slug', 'descrizione', 'costo', 'data_inizio', 'data_fine', 'cliente', 'indirizzo_lavoro', 'responsabile_lavoro', 'materiali'];
    public static function generateSlug($titolo)
    {
        return Str::slug($titolo, '-');
    }
    public function type() {
        return $this->belongsTo(Type::class);
    }

    /**
     * Get all of the comments for the Work
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}

