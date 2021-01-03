<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FertilizerStock extends Model
{
    use HasFactory;
    protected  $fillable=['current_amount','intitial_amount','seed_id', 'fertilizer_id'];

    public function season()
      {
          return $this->belongsTo('App\Models\Season');
      }
  
  
      public function fertilizer()
      {
          return $this->belongsTo('App\Models\Fertilizer');
      }
  
      
}