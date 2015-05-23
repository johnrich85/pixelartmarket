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
	}

	/**
	 * @requestType GET
	 * @route /
	 */
	public function index() {
		$products = $this->productRepo->all();
		$products = $products->toArray();

		$this->jsonPrettyPrint(true);
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