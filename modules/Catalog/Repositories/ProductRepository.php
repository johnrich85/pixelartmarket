<?php namespace Modules\Catalog\Repositories;

use Mockery\CountValidator\Exception;
use Modules\Catalog\Entities\Product;
use Modules\Catalog\Repositories\Contract\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Johnrich85\EloquentQueryModifier\EloquentQueryModifier;

class ProductRepository implements ProductRepositoryInterface{

    protected $model;
    protected $modifier;

    /**
     * @param Product $model
     */
    public function __construct(Product $model, EloquentQueryModifier $modifier) {
        $this->model = $model;
        $this->modifier = $modifier;
    }

    /**
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($params = array()) {
        $query = $this->model->with('productType');

        try {
            $this->modifier->modify($query, $params);
        }
        catch(Exception $e) {
            //TODO - handle exception
            return false;
        }

        return $query->get();
    }

    public function find($id,$columns = array('*')) {

    }
}