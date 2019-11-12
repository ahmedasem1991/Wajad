<?php

namespace App\Http\Controllers\Api;

use App\WajadOffice;
use Location\Coordinate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Location\Distance\Vincenty;

class OfficeController extends Controller
{
    protected $Feilds=['id','name_en as name','details_en as details','address_ar as address','image','latitude','longitude','status'];
    public function index(Request $request)
    {  

        if($request->server('HTTP_ACCEPT_LANGUAGE')=='ar'
        ){
            $this->Feilds=['id','name_ar as name','details_en as details','address_ar as address','image','latitude','longitude','status'];
        }
        $check=1;
        $array=  $Offices = QueryBuilder::for(WajadOffice::class)
        ->select($this->Feilds)
        ->get();
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
            $check=0;
            $Offices = $Offices->filter(function ($Office) {
            $coordinate1 = new Coordinate($Office->latitude, $Office->longitude);  
            $coordinate2 = new Coordinate($this->request['latitude'],$this->request['longitude']);  
            $calculator  = new Vincenty();
            $Office->distance=  ($calculator->getDistance($coordinate1, $coordinate2))/1000; 
            return $Office->distance < $this->request['distance'];
        });
       }
    //    if ($check==0) {
    //     $array=[];
        
    // }
       $array['data']=$Offices;
        return $this->jsonResponse($array);

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
