<?php

namespace App\Helpers\Api;

trait ResponseTrait
{
    /**
     * Define Response Status Code
     *
     * @var Integer
     */
    public $status_code;

    /**
     * Define Response
     *
     * @var Array
     */
    public $response = [];

    /**
     * Add Response
     *
     * @param Array $response
     * @param String $response
     * @return Object
     */
    public function addResponse($response)
    {
        array_push($this->response, $response);
        return $this;
    }

    /**
     * Add Status Code
     *
     * @param Integer $code
     * @return Object
     */
    public function addStatusCode($code)
    {
        $this->status_code = $code;
        return $this;
    }

    /**
     * Return The Response Object
     *
     * @return Object
     */
    public function response()
    {
        return response()->json(
            [
                'message' => $this->response,
            ],
            (int) $this->status_code
        );
    }
}