<?php

namespace App\Helpers\Api;

trait ResponseTrait
{
    /**
     * Define Response Status Code
     *
     * @var integer
     */
    public $status_code;

    /**
     * Define Response
     *
     * @var array
     */
    public $response = [];

    /**
     * Define Unexpected Error
     * Status Code 409
     * 
     * @var string
     */
    protected $unexpected_error = 'Unexpected Error Occured Please Try Again Later';

    /**
     * Define UnAuthorized Error
     * Status Code 401
     *
     * @var string
     */
    protected $un_authorized = 'You Are Not Authorized To Handle This Request';
    
    /**
     * Define Invalid Data
     *
     * @var string
     */
    protected $invalid_data = 'Invalid Request. Data Are Invalid , Or Don\'t Match Our Records';

    /**
     * Add Response
     *
     * @param array $response
     * @param string $response
     * @return object
     */
    public function addResponse($response)
    {
        array_push($this->response, $response);
        return $this;
    }

    /**
     * Add Status Code
     *
     * @param integer $code
     * @return object
     */
    public function addStatusCode($code)
    {
        $this->status_code = $code;
        return $this;
    }

    /**
     * Return The Response Object
     *
     * @return object
     */
    public function response()
    {
        return response()->json(
            [
                'data' => $this->response,
            ],
            (int) $this->status_code
        );
    }
}