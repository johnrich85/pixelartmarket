<?php

Route::group(['prefix' => '1.0', 'namespace' => 'Modules\Catalog\Http\Controllers\Product'], function()
{
	Route::resource('product', 'ProductController@index');
});