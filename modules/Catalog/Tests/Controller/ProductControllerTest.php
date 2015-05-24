<?php

use Laracasts\TestDummy\Factory;
use Laracasts\TestDummy\DbTestCase;

class ProductControllerTest extends DbTestCase {

    public function setUp() {
        parent::setUp();
        Artisan::call('module:migrate');
        Factory::times(3)->create('Modules\Catalog\Entities\Product');
    }

    public function testIndex() {

        $response = $this->call("GET", "1.0/product");
        $content = $response->getContent();

        $this->assertJson($content);
        $this->assertEquals($response->getStatusCode(), '200');

    }

    public function getBasePath() {
        return realpath(__DIR__.'/../../../../');
    }

}
