<?php namespace Modules\Catalog\Http\Controllers\Product;

use Pingpong\Modules\Routing\Controller;
use App\Http\Traits\RestController;

class ProductController extends Controller {

	use RestController;

	/**
	 * @requestType GET
	 * @route /
	 */
	public function index() {
		//return $this->createdResponse(array('test'));
	}

	/**
	 * @requestType GET
	 * @route /{id}
	 */
	public function show() {

	}

	/**
	 * @requestType POST
	 * @route /
	 */
	public function store() {
	}

	/**
	 * @requestType PUT/PATCH
	 * @route /{id}
	 */
	public function update() {
	}

	/**
	 * @requestType DELETE
	 * @route /{id}
	 */
	public function destroy() {
	}
}