<?php

Route::group(['prefix' => 'product', 'namespace' => 'Modules\Catalog\Http\Controllers\Product'], function()
{
	Route::resource('/', 'ProductController@index');
});