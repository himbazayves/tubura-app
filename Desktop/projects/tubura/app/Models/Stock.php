<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected  $fillable=['season_id','current_amount','intitial_amount','seed_id', 'fertilizer_id'];

  public function season()
    {
        return $this->belongsTo('App\Models\Season');
    }


    public function fertilizer()
    {
        return $this->belongsTo('App\Models\Fertilizer');
    }

    public function seed()
    {
        return $this->belongsTo('App\Models\Seed');
    }


}
