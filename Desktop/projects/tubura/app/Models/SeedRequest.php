<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeedRequest extends Model
{
    use HasFactory;

    protected  $fillable=['farmer_id','seed_application_id','requested_amount','received_amount','seed_id'];

    public function seed_application()
      {
          return $this->belongsTo('App\Models\SeedApplication');
      }


      public function farmer()
      {
          return $this->belongsTo('App\Models\Farmer');
      }

      public function seed()
      {
          return $this->belongsTo('App\Models\Seed');
      }
}
