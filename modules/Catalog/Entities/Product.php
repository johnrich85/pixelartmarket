<?php namespace Modules\Catalog\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    /**
     * The attributes that can be mass-assigned.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * @var string
     */
    protected $table = 'product';

    /**
     * Defines relation to product-type table.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productType()
    {
        return $this->belongsTo('Modules\Catalog\Entities\ProductType');
    }

}