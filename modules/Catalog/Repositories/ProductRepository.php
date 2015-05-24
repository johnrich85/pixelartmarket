<?php namespace Modules\Catalog\Repositories;

use Modules\Catalog\Entities\Product;
use Modules\Catalog\Repositories\Contract\ProductRepositoryInterface;

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
        return $this->model->with('productType')->get($columns);
    }

    public function find($id,$columns = array('*')) {

    }
}