<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Review;
use App\Http\Requests;
use JWTAuthentication;

class ServiceController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $services = Service::with('serreviews','relcompany')->get();
        $resp = $services;
        if($resp == null)
        {
            return response()->json([
            'message' => 'Sorry, we are confused :('
        ], 400);
        }
        return response()->json([
            'message' => $resp
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
//    public function create() {
//        
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        
        if(! $request->title){
            return response()->json([
                'error' => [
                    'message' => 'Please provide title'
                ]
            ], 422);
        }
        
        if(! $user = JWTAuthentication::parseToken()->authenticate()){
            return response()->json([
                'error' => [
                    'message' => 'Please log in first'
                ]
            ], 400);
        }
        
        if($user->type != 'c'){
               return response()->json([
                'error' => [
                    'message' => 'Please log in as company'
                ]
            ], 422);         
        }
        
        $company = $user->getcompany();
        $companyid = $company->company_id;
        
        
        $service = new Service;
        $service->title = $request->title;
        $service->company_id = $companyid;
        $service->description =$request->description;
        $service->price =$request->price;
        // should now be saved
        $service->save();
        $resp = $service;
        if(!$resp)
        {
            return response()->json([
            'message' => 'Sorry, we are confused :('
        ], 400);
        }
        return response()->json([
            'message' => $resp
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($service_id) {
        //$service = Service::where('service_id', $service_id)->first();
        $service = Service::with('relcompany')->find($service_id); // fix!
		$reviews = Review::where('service_id', $service_id)->get();
		
        $data = array(
            'service' => $service,
            'reviews' => $reviews,
        );
        $resp =  compact('service', 'reviews');
        if(!$service)
        {
            return response()->json([
            'message' => 'Sorry, we are confused :('
        ], 400);
        }
        return response()->json([
            'message' => $resp
        ], 200);
    }

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return Response
//     */
//    public function edit($id) {
//        
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  int  $id
//     * @return Response
//     */
    
    
    public function update($id, Request $request) {        
        if(! $user = JWTAuthentication::parseToken()->authenticate() ){
            return response()->json([
                'error' => [
                    'message' => 'Please log in first'
                ]
            ], 400);
        }
        
        if($user->type != 'c'){
            return response()->json([
                'error' => [
                    'message' => 'Please log in as a company first'
            ]
            ]);
        }
        
        $company = $user->getcompany();
        $service = Service::where('service_id', $id)->first();
        
        if($service->company_id != $company->company_id){
            return response()->json([
                'error' => [
                    'message' => 'This is not your service'
            ]
            ]);
        }        
        
        if ($request->has('title')) {
            $newTitle = $request->title;
            Service::where('service_id', $id)->update(['title' => $newTitle]);
        }
        if ($request->has('description')) {
            $newDescription = $request->description;
            Service::where('service_id', $id)->update(['description' => $newDescription]);
        }
        if ($request->has('rating')) {
            $newPrice = $request->price;
            Service::where('service_id', $id)->update(['price' => $newPrice]);
        }   
        
        $service = Service::where('service_id', $id)->first();
        
        $resp = $service;
        if(!$resp)
        {
            return response()->json([
            'message' => 'Sorry, we are confused :('
        ], 400);
        }
        return response()->json([
            'message' => $resp
        ], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function destroy($id) {
        
        if(! $user = JWTAuthentication::parseToken()->authenticate()){
            return response()->json([
                'error' => [
                    'message' => 'Please log in first'
                ]
            ], 400);
        }
        
        if($user->type != 'c'){
               return response()->json([
                'error' => [
                    'message' => 'Please log in as company'
                ]
            ], 422);         
        }
        
        $company = $user->getcompany();
        $companyid = $company->company_id;
        
        $servicetobedeleted = Service::where('service_id',$id)->value('company_id');
        
        if($companyid != $servicetobedeleted)
        {
            return response()->json([
                'message' => 'This is not the correct company'
            ], 400);
        } 
        
        $resp = false;
        if($id)
        {
            $reviewstobedeleted = Review::where('service_id',$id)->delete();
            $deletedservice = Service::where('service_id',$id)->delete();
            $resp = "success";
        }
        if(!$resp)
        {
            return response()->json([
            'message' => 'Sorry, we are confused :('
        ], 400);
        }
        return response()->json([
            'message' => $resp
        ], 200);
    }

}

?>
