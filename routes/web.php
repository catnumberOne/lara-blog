<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');    
});
Route::get('/page1', function () {
    return view('page1');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');

Route::get('/additem','ItemsController@add');
Route::post('/additem','ItemsController@save');

Route::get('/show/{id}',function($id)
{
    $items=App\Items::find($id); // получаем все, что касается товара (название, цена....)
    $parameters=$items->parameters($id);//получаем все параметры
    $images=explode(';',$items->preview); //ссылки на картинки передаем отдельным массивом
    //dd($images);
    //die();
    return view('shop.show',['items'=>$items,'parameters'=>$parameters,'images'=>$images]);
});

Route::post('/get_parameters','ParametersController@get');
Route::post('/save_parameters','ParametersController@save');

