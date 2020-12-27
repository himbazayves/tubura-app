<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

  protected  $fillable=['cell_id','surname','name','land_size', 'NID','phone_number'];

  public function cell()
    {
        return $this->belongsTo('App\Models\Cell');
    }
}
