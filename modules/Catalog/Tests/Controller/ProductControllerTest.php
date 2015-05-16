<?php

use Pingpong\Testing\TestCase;

class ProductControllerTest extends TestCase {

    public function testIndex() {
        $this->call("GET", "1.0/product");
        $this->assertResponseOk();
    }

    public function getBasePath() {
        return realpath(__DIR__.'/../../../../');
    }
}
