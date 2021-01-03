<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeedApplication extends Model
{
    use HasFactory;


    protected  $fillable=['open','season_id'];

    public function seed_requests()
      {
          return $this->hasMany('App\Models\SeedRequest');
      }


      public function season()
      {
          return $this->belongsTo('App\Models\Season');
      }
    
}
