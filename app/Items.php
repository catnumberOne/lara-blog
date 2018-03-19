<?php

namespace App;

use App\Parameters;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Items extends Model
{
    protected $fillable=['title','description','preview','price'];

    public function parameters($id)
  		{
    		return DB::table('items')->where('items.id','=', $id)
    		->join('parameters_values','parameters_values.items_id','=','items.id')
    		->join('parameters','parameters_values.parameters_id','=','parameters.id')
    		->select('parameters.title','parameters_values.value','parameters.unit','items.preview')->get();
  		}
}
