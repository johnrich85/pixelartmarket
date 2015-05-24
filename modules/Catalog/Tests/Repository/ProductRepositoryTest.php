<?php

use Modules\Catalog\Repositories\ProductRepository;
use Modules\Catalog\Entities\Product;
use Laracasts\TestDummy\Factory;
use Laracasts\TestDummy\DbTestCase;

class ProductRepositoryTest extends DbTestCase  {

    public function setUp() {
        parent::setUp();
        Artisan::call('module:migrate');
        Factory::times(3)->create('Modules\Catalog\Entities\Product');
    }

    public function getBasePath() {
        return realpath(__DIR__.'/../../../../');
    }

    public function testAll() {

        $this->repo = new ProductRepository(new Product());

        $data = $this->repo->all();

        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection', $data);
        $this->assertEquals(3, count($data));
    }

    /**
     * Rollback transactions after each test.
     */
    public function tearDown()
    {
        parent::tearDown();
    }
}