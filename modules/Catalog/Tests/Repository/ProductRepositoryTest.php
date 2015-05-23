<?php

use Pingpong\Testing\TestCase;
use Modules\Catalog\Repositories\ProductRepository;

class ProductRepositoryTest extends TestCase {

    public function getBasePath() {
        return realpath(__DIR__.'/../../../../');
    }

    public function testAll() {
        $args = array('name');

        $Entity = Mockery::mock('Modules\Catalog\Entities\Product[all]', array($args))
            ->shouldReceive('all')
            ->andReturn(new \Illuminate\Database\Eloquent\Collection())
            ->once();

        $this->repo = new ProductRepository($Entity->getMock());

        $data = $this->repo->all($args);

        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection', $data);
    }

    public function tearDown()
    {
        Mockery::close();
    }
}