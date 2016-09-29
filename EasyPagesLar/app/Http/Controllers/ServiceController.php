<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Review;
use App\Http\Requests;


class ServiceController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $services = Service::all();
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
        
        if(! $request->company_id || ! $request->title){
            return response()->json([
                'error' => [
                    'message' => 'Please Provide service_id and profile_id'
                ]
            ], 422);
        }
        
        $service = Service::create($request->all());
        //$review = Review::create($input);  
        //!!!!!! NOT NICE !!!!! PLEASE CHANGE !!!!!!!!!
        //$vars = get_object_vars($service);
        //return view('/result', ['inputs' => $vars]);
        //!!!!!! redirect to something better, okay?
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
        $service = Service::where('service_id', $service_id)->first();
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
//    public function update($id) {
//        
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function destroy(Request $request) {
        $resp = false;
        if($request->has('service_id'))
        {
            $deletedservice = Service::where('service_id',$request->service_id)->delete();
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