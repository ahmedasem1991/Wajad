<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WajadOffice;
use Spatie\QueryBuilder\QueryBuilder;
use Location\Coordinate;
use Location\Distance\Vincenty;
use Spatie\QueryBuilder\Filter;
use function GuzzleHttp\json_decode;
use Illuminate\Support\Facades\Validator;


class OfficeController extends Controller
{
    private $request=[];

    public function index(Request $request)
    {  
        $Offices = QueryBuilder::for(WajadOffice::class)
        ->paginate($request->get('per_page', 15));


        $this->request['latitude']=$request->lat;
        $this->request['longitude']=$request->lng;
        if($request->unit=='m')
        {
            $this->request['distance']=$request->distance*0.62137;
        }
        else{
            $this->request['distance']=$request->distance;
        }
        
        if ($request->has('distance')) {
        $Offices = $Offices->filter(function ($Office) {
            $coordinate1 = new Coordinate($Office->latitude, $Office->longitude);  
            $coordinate2 = new Coordinate($this->request['latitude'],$this->request['longitude']);  
            $calculator  = new Vincenty();
            $Office->distance=  ($calculator->getDistance($coordinate1, $coordinate2))/1000; 
            return $Office->distance < $this->request['distance'];
        });
       }

        return $this->jsonResponse($Offices);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
