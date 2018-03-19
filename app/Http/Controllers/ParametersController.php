<?php

namespace App\Http\Controllers;

use App\Parameters;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ParametersRepository;


class ParametersController extends Controller
{
    public function __construct()
  	{
	    $this->middleware('auth');
	    //$this->parameters = $parameters;
  	}

    public function get(Request $request)
	{
		$parameters=Parameters::all();
		//return view('parameters',['parameters'=>$parameters]);
		return view('shop.parameters',['parameters'=>$parameters]);		
	}

	public function save(Request $request)
	{
		//$param=Parameter::create($request->all()); //записываем параметр и единицу измерения в базу
	    $param = Parameters::create([
    		'title' => $request->title,
    		'unit' => $request->unit
  		]);
		return [$param->id,$param->title,$param->unit]; //возвращаем массив из id созданого параметра и название параметра
	}

}
