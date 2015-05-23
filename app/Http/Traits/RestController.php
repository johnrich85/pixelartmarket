<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Response;

trait RestController
{

    protected $jsonPrettyPrint = 0;

    /**
     * Given a value other than false, enables
     * json pretty print.
     *
     * @param $enable Boolean
     */
    protected function jsonPrettyPrint($enable) {
        if($enable == false) {
            $this->jsonPrettyPrint = 0;
            return;
        }

        $this->jsonPrettyPrint = JSON_PRETTY_PRINT;
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function createdResponse($data)
    {
        $response = [
            'code' => 201,
            'status' => 'success',
            'data' => $data
        ];
        return Response::json($response, $response['code'], array(), JSON_PRETTY_PRINT);
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function showResponse($data)
    {
        $response = [
            'code' => 200,
            'status' => 'success',
            'data' => $data
        ];

        return Response::json($response, $response['code'], array(), JSON_PRETTY_PRINT);
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function listResponse($data)
    {
        $response = [
            'code' => 200,
            'status' => 'success',
            'data' => $data
        ];

        return Response::json($response, $response['code'], array(), JSON_PRETTY_PRINT);
    }

    /**
     * @return mixed
     */
    protected function notFoundResponse()
    {
        $response = [
            'code' => 404,
            'status' => 'error',
            'data' => 'Resource Not Found',
            'message' => 'Not Found'
        ];

        return Response::json($response, $response['code'], array(), JSON_PRETTY_PRINT);
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function unauthorizedResponse($data)
    {
        $response = [
            'code' => 401,
            'status' => 'error',
            'data' => $data,
        ];

        return Response::json($response, $response['code'], array(), JSON_PRETTY_PRINT);
    }

    /**
     * @return mixed
     */
    protected function deletedResponse()
    {
        $response = [
            'code' => 204,
            'status' => 'success',
            'data' => [],
            'message' => 'Resource deleted'
        ];

        return Response::json($response, $response['code'], array(), JSON_PRETTY_PRINT);
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function clientErrorResponse($data)
    {
        $response = [
            'code' => 422,
            'status' => 'error',
            'data' => $data,
            'message' => 'Unprocessable entity'
        ];

        return Response::json($response, $response['code'], array(), JSON_PRETTY_PRINT);
    }

}