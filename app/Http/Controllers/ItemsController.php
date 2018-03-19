<?php

namespace App\Http\Controllers;

use App\Items;
use App\Parameters_values;
use Illuminate\Http\Request;
//use Illuminate\Http\UploadedFile;
//use Illuminate\Http\Concerns\InteractsWithInput;
//use Symfony\Component\HttpFoundation\File\UploadedFile;

class ItemsController extends Controller
{
    //
 public function add()
	{
		return view('shop.add');
	}


 public function save(Request $request){
 	$root=$_SERVER['DOCUMENT_ROOT']."/images/"; //определяем папку для сохранения картинок	
	//Сохраняем картинки
	$url_img=[]; // массив, который будет содержать ссылки на все картинки
	$files = $request->file('preview');
	//dd($request);
	//die();

	if(is_array($files)){
		foreach($files as $file) //обрабатываем массив с файлами
		{
    		if(empty($file)) continue; // если <input type="file"... есть, но туда ничего не загруженно, то пропускаем
     		$f_name=$file->getClientOriginalName(); //получаем имя файла
     		$url_img[]='/images/'.$f_name; //добавляем url картинки в массив
     		$file->move($root,$f_name); //перемещаем файл в папку
		}
	}else{
			$f_name=$files->getClientOriginalName(); //получаем имя файла
     		$url_img[]='/images/'.$f_name; //добавляем url картинки в массив
     		$files->move($root,$f_name); //перемещаем файл в папку

	}
	$preview = implode(';', $url_img);	
	$item = new Items;
	$item->title = $request->item_title;
	$item->description = $request->description;
	$item->price = $request->price;
	$item->preview = $preview;
	$item->save();


	if(is_array($request->parameter)){ $out = array_combine($request->parameter,$request->value);}
	elseif(!empty($request->parameter)){ $out = array($request->parameter => $request->value); }

	if(empty($out)){ return redirect('/additem')->with('message','Товар сохранен');}

	foreach($out as $param=>$value){
		$parameters = new Parameters_values;
		$parameters->parameters_id = $param;
		$parameters->items_id = $item->id;
		$parameters->value = $value;
		$parameters->save();
	}
	return redirect('/show/'.$item->id)->with('message','Товар сохранен');
 }

}
