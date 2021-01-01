<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FertilizerRequest extends Model
{
    use HasFactory;
    protected  $fillable=['farmer_id','season_id','requested_amount','received_amount', 'fertilizer_id',];

    public function season()
      {
          return $this->belongsTo('App\Models\Season');
      }


      public function farmer()
      {
          return $this->belongsTo('App\Models\Farmer');
      }

      public function fertilizer()
      {
          return $this->belongsTo('App\Models\Fertilizer');
      }
}
