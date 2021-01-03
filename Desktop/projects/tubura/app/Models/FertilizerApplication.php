<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FertilizerApplication extends Model
{
    use HasFactory;
    protected  $fillable=['open','season_id'];

    public function fertilizer_requests()
      {
          return $this->hasMany('App\Models\FertilizerRequest');
      }


      public function season()
      {
          return $this->belongsTo('App\Models\Season');
      }
}
