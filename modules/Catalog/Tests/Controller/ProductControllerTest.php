<?php

use Pingpong\Testing\TestCase;

class ProductControllerTest extends TestCase {

    public function testIndex() {
        $args = array('*');
        $Entity = Mockery::mock('Modules\Catalog\Entities\Product[all]', array($args))
            ->shouldReceive('all')
            ->andReturn(new \Illuminate\Database\Eloquent\Collection())
            ->once();
        $this->app->instance('Modules\Catalog\Entities\Product', $Entity->getMock());

        $response = $this->call("GET", "1.0/product");
        $content = $response->getContent();

        $this->assertJson($content);
        $this->assertEquals($response->getStatusCode(), '200');

    }

    public function getBasePath() {
        return realpath(__DIR__.'/../../../../');
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
