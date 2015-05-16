<?php namespace Modules\Catalog\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class CatalogController extends Controller {
	
	public function index()
	{
		return view('catalog::index');
	}
	
}