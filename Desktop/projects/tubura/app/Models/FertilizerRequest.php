<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FertilizerRequest extends Model
{
    use HasFactory;
    protected  $fillable=['farmer_id','fertilizer_application_id','requested_amount','received_amount'];

    public function fertilizer_requests()
      {
          return $this->belongsTo('App\Models\FertilizerRequest');
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
