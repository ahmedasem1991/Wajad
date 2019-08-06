<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Onboarding;
use Response;
use Spatie\QueryBuilder\QueryBuilder;
class OnboardingController extends Controller
{


    
 
 
    public function index(Request $request)
    {
        
        $Onboardings = QueryBuilder::for(Onboarding::class)
            
        
            ->allowedFields('id', 'title','body')
            ->allowedFilters('id','title','body')
            ->paginate($request->get('per_page', 15));
            
        $this->addResponse($Onboardings)->addStatusCode(200);

        return $this->response();
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
