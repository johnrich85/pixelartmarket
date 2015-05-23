<?php namespace Modules\Catalog\Http\Controllers\Product;

use Pingpong\Modules\Routing\Controller;
use App\Http\Traits\RestController;
use Modules\Catalog\Entities\Product;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller {

	use RestController;

	/**
	 * @requestType GET
	 * @route /
	 */
	public function index() {
		$model = new Product();
		$product = $model->find(1);

		return $this->showResponse($product->toArray());
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