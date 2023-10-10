<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Work;

class Image extends Model
{
    use HasFactory;

    public function work(){
        /**
         * Get the user that owns the Image
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        return $this->belongsTo(Work::class);
    }
}
