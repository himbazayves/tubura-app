<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeasonType extends Model
{
    use HasFactory;
    protected  $fillable=['name'];
    public function seasons()
    {
        return $this->hasMany('App\Models\Season');
    }
}
