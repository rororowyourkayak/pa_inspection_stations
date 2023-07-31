<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class County extends Model
{
    use HasFactory;

    protected $fillable = ["county", "county_slug"];
    public $timestamps = false;

    public function stations() : HasMany {

        return $this -> hasMany(Station::class);
    }
}
