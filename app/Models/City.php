<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['city', 'city_slug'];
    public $timestamps = false;

    public function stations() : HasMany {

        return $this -> hasMany(Station::class, 'city_slug','city_slug');
    }

    public function county() : BelongsTo {
        return $this->belongsTo(County::class);
    }

}
