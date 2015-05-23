<?php namespace Modules\Catalog\Entities;
   
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model {

    protected $fillable = ['name'];

    /**
     * @var string
     */
    protected $table = 'product_type';

    /**
     * Defines relation to product table.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products() {
        return $this->hasMany('Modules\Catalog\Entities\Product');
    }
}