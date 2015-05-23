<?php

namespace Modules\Catalog\Repositories\Contract;

interface ProductRepositoryInterface {
    public function all($columns = array('*'));
    public function find($id, $columns = array('*'));
}