<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    protected  $fillable=['season_type_id', 'year_id'];
    public function season_type()
    {
        return $this->belongsTo('App\Models\SeasonType');
    }

    public function year()
    {
        return $this->belongsTo('App\Models\Year');
    }
}
