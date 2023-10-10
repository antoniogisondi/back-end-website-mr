<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Work;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['work_id', 'image', 'description', 'image_2', 'description_2', 'image_3', 'description_3', 'image_4', 'description_4', 'image_5', 'description_5', 
                            'image_6', 'description_6', 'image_7', 'description_7', 'image_8', 'description_8', 'image_9', 'description_9', 'image_10', 'description_10',];

    public function work(){
        /**
         * Get the user that owns the Image
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        return $this->belongsTo(Work::class);
    }
}
