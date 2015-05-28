<?php namespace Modules\Catalog\Repositories;

use Modules\Catalog\Entities\Product;
use Modules\Catalog\Repositories\Contract\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;
class ProductRepository implements ProductRepositoryInterface{

    protected $model;

    /**
     * @param Product $model
     */
    public function __construct(Product $model) {
        $this->model = $model;
    }

    /**
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($columns = array('*')) {
        $query = $this->model->with('productType');

        //$test = new \Johnrich85\EloquentQueryModifier\EloquentQueryModifier();


        //$query = $ApiQueryModifier->addParameters($query, $input);

        $query->where('name', 'Test Product');
        $query->orWhere('name', 'Test Product 2');

        var_dump($query->getQuery()->getBindings());
          die();

        $query->orderBy('id', 'DESC');

        $results = $query->get($columns);

        return $results;
    }

    public function find($id,$columns = array('*')) {

    }
}