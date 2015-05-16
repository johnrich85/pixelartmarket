<?php

Route::group(['prefix' => 'catalog', 'namespace' => 'Modules\Catalog\Http\Controllers'], function()
{
	Route::get('/', 'CatalogController@index');
});