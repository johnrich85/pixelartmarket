<?php

use App\Http\Traits\RestController;
use Pingpong\Testing\TestCase;

class RestControllerTraitTest extends TestCase {

    use RestController;

    public function getBasePath() {
        return realpath(__DIR__.'/../../../../');
    }

    public function getPackageAliases()
    {
        return [
            'Response' => 'Illuminate\Support\Facades\Response'
        ];
    }

    public function testJsonPrettyPrint() {
        $this->assertEquals(0, $this->jsonPrettyPrint);

        $this->jsonPrettyPrint(true);

        $this->assertEquals(JSON_PRETTY_PRINT, $this->jsonPrettyPrint);

        $this->jsonPrettyPrint(false);

        $this->assertEquals(0, $this->jsonPrettyPrint);
    }

    public function testCreatedResponse() {
        $resp = $this->createdResponse(array('prop'=>'test'));
        $this->assertInstanceOf('Illuminate\Http\JsonResponse', $resp);

        $data = $resp->getData();
        $this->assertEquals('test', $data->data->prop);
        $this->assertEquals('success', $data->status);
        $this->assertEquals('201', $resp->getStatusCode());

    }

    public function testShowResponse() {
        $resp = $this->showResponse(array('prop'=>'test'));
        $this->assertInstanceOf('Illuminate\Http\JsonResponse', $resp);

        $data = $resp->getData();
        $this->assertEquals('test', $data->data->prop);
        $this->assertEquals('success', $data->status);
        $this->assertEquals('200', $resp->getStatusCode());

    }

    public function testListResponse() {
        $resp = $this->listResponse(array('prop'=>'test'));
        $this->assertInstanceOf('Illuminate\Http\JsonResponse', $resp);

        $data = $resp->getData();
        $this->assertEquals('test', $data->data->prop);
        $this->assertEquals('success', $data->status);
        $this->assertEquals('200', $resp->getStatusCode());

    }

    public function testNotFoundResponse() {
        $resp = $this->NotFoundResponse();
        $this->assertInstanceOf('Illuminate\Http\JsonResponse', $resp);

        $data = $resp->getData();
        $this->assertEquals('Resource Not Found', $data->data);
        $this->assertEquals('error', $data->status);
        $this->assertEquals('404', $resp->getStatusCode());

    }

    public function testUnauthorizedResponse() {
        $resp = $this->unauthorizedResponse(array('prop'=>'test'));
        $this->assertInstanceOf('Illuminate\Http\JsonResponse', $resp);

        $data = $resp->getData();
        $this->assertEquals('test', $data->data->prop);
        $this->assertEquals('error', $data->status);
        $this->assertEquals('401', $resp->getStatusCode());

    }

    public function testDeletedResponse() {
        $resp = $this->DeletedResponse();
        $this->assertInstanceOf('Illuminate\Http\JsonResponse', $resp);

        $data = $resp->getData();
        $this->assertEquals([], $data->data);
        $this->assertEquals('success', $data->status);
        $this->assertEquals('204', $resp->getStatusCode());

    }

    public function testClientErrorResponse() {
        $resp = $this->clientErrorResponse(array('prop'=>'test'));
        $this->assertInstanceOf('Illuminate\Http\JsonResponse', $resp);

        $data = $resp->getData();
        $this->assertEquals('test', $data->data->prop);
        $this->assertEquals('error', $data->status);
        $this->assertEquals('422', $resp->getStatusCode());

    }

}