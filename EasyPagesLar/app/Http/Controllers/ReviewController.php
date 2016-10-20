<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Review;
use App\Service;
use JWTAuthentication;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\AuthenticateController;

class ReviewController extends Controller {

public function __construct(){
        //$this->middleware('jwt.auth');
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
        
        if(! $user = JWTAuthentication::parseToken()->authenticate() ){
            return response()->json([
                'error' => [
                    'message' => 'Please log in first'
                ]
            ], 400);
        }
        
        $userprofile = $user->getprofile();
        $userprofileid = $userprofile->profile_id;
        
        if(! $request->service_id){
            return response()->json([
                'error' => [
                    'message' => 'Please provide service_id'
                ]
            ], 422);
        }
        
        //$linktogo = $request->service_id;
        $review = new Review;
        $review->title = $request->title;
        $review->service_id = $request->service_id;
        $review->profile_id = $userprofileid;
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
        $review = Review::with('relprofile','relservice','comments.replies')->find($id);

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showbyprof($id) {
        $reviews = Review::where('profile_id', $id)->get();

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
    public function update($id, Request $request) {        
        if(! $user = JWTAuthentication::parseToken()->authenticate() ){
            return response()->json([
                'error' => [
                    'message' => 'Please log in first'
                ]
            ], 400);
        }
        
        if($user->type != 'i'){
            return response()->json([
                'error' => [
                    'message' => 'Please log in as individual first'
            ]
            ]);
        }
        
        $profile = $user->getprofile();
        $review = Review::where('review_id', $id)->first();
        
        if($review->profile_id != $profile->profile_id){
            return response()->json([
                'error' => [
                    'message' => 'This is not your review'
            ]
            ]);
        }        
        
        if ($request->has('title')) {
            $newTitle = $request->title;
            Review::where('review_id', $id)->update(['title' => $newTitle]);
        }
        if ($request->has('description')) {
            $newDescription = $request->description;
            Review::where('review_id', $id)->update(['description' => $newDescription]);
        }
        if ($request->has('rating')) {
            $newRating = $request->rating;
            Review::where('review_id', $id)->update(['rating' => $newRating]);
        }        
        
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        if(! $user = JWTAuthentication::parseToken()->authenticate() ){
            return response()->json([
                'error' => [
                    'message' => 'Please log in first'
                ]
            ], 400);
        }
        
        $userprofile = $user->getprofile();
        $userprofileid = $userprofile->profile_id;
        
        $reviewtobedeleted = Review::where('review_id',$id)->value('profile_id');
        
        if($userprofileid != $reviewtobedeleted)
        {
            return response()->json([
                'message' => 'This is not the correct user'
            ], 400);
        } 
        
        if(! $id)
        {
            return response()->json([
            'message' => 'No request review_id found'
        ], 400);
        }
        
        
        $resp = false;
        if($id)
        {
            $deletedreview = Review::where('review_id',$id)->delete();
            $resp = "success";
        }
        if(!$resp)
        {
            return response()->json([
            'message' => 'Sorry, we are confused :['
        ], 400);
        }
        return response()->json([
            'message' => $resp
        ], 200);
    }

}

?>