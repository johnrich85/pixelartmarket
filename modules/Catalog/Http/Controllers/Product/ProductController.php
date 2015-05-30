<?php namespace Modules\Catalog\Http\Controllers\Product;

use Pingpong\Modules\Routing\Controller;
use App\Http\Traits\RestController;
use Modules\Catalog\Repositories\Contract\ProductRepositoryInterface;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller {

	use RestController;

	/**
	 * @var ProductRepositoryInterface
	 */
	protected $productRepo;

	public function __construct(ProductRepositoryInterface $productRepo) {
		$this->productRepo = $productRepo;

		if(Input::get('pretty') == true) {
			$this->jsonPrettyPrint(true);
		}
	}

	/**
	 * @requestType GET
	 * @route /
	 */
	public function index() {
		$products = $this->productRepo->all(Input::all())->toArray();
		var_dump(Input::all());die();
		return $this->listResponse($products);
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