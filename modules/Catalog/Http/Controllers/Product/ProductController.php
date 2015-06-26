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

		return $this->listResponse($products);
	}

	/**
	 * @requestType GET
	 * @route /{id}
	 */
	public function show($id = null) {

        $product = $this->productRepo->find($id);

        if($product == null) {
            return $this->notFoundResponse();
        }
        else {
            return $this->listResponse($product);
        }

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