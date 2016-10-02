<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Review;
use App\Service;

class ReviewController extends Controller {



public function __construct(){
        $this->middleware('jwt.auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $reviews = Review::with('relprofile','relservice')->get();
        
        
        $resp = $reviews;
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
//        $this->validate($request, [
//            'title' => 'required',
//            'rating' => 'required',
//            'service_id' => 'required',
//            'profile_id' => 'required',
//        ]);
        if(! $request->profile_id || ! $request->service_id){
            return response()->json([
                'error' => [
                    'message' => 'Please Provide service_id and profile_id'
                ]
            ], 422);
        }
        //$linktogo = $request->service_id;
        $review = new Review;
        $review->title = $request->title;
        $review->service_id = $request->service_id;
        $review->profile_id = $request->profile_id;
        $review->description =$request->description;
        $review->rating =$request->rating;
        // should now be saved
        $review->save();
        $resp = $review;
        //$review = Review::create($input);  
        
        //!!!!!! NOT NICE !!!!! PLEASE CHANGE !!!!!!!!!
        //$vars = get_object_vars($review);
        //return view('/result', ['inputs' => $vars]);                  
        //!!!!!! redirect to something better, okay?
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
    public function show($id) {
        $review = Review::where('review_id', $id)->first();

        $resp = $review;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
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
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request) {
        $resp = false;
        if($request->has('review_id'))
        {
            $deletedreview = Review::where('review_id',$request->review_id)->delete();
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