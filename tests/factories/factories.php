<?php

$factory('Modules\Catalog\Entities\Product', [
    'name' => 'Rock or Bust',
    'description' => $faker->sentence,
    'product_type_id' => 'factory:Modules\Catalog\Entities\ProductType',
]);

$factory('Modules\Catalog\Entities\ProductType', [

    'name' => 'Type 1',
]);