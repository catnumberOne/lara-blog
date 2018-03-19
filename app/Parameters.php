<?php

namespace App;

use App\Item;
use Illuminate\Database\Eloquent\Model;

class Parameters extends Model
{
   protected $fillable=['title','unit'];

   public function item()
    {
      return $this->belongsTo(Item::class);
    }
   public function parameters()
  		{
    		return $this->all();//hasMany(Parameter::class);
  		}
}
