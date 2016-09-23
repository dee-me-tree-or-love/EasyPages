<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Review;
use App\Service;

class ReviewController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $reviews = Review::all();
        return view('reviewboard', ['reviews' => $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        
    }

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
        //$linktogo = $request->service_id;
        $review = new Review;
        $review->title = $request->title;
        $review->service_id = $request->service_id;
        $review->profile_id = $request->profile_id;
        $review->description =$request->description;
        $review->rating =$request->rating;
        // should now be saved
        $review->save();
        
        //$review = Review::create($input);  
        
        //!!!!!! NOT NICE !!!!! PLEASE CHANGE !!!!!!!!!
        //$vars = get_object_vars($review);
        //return view('/result', ['inputs' => $vars]);                  
        //!!!!!! redirect to something better, okay?
        return redirect()->back();
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $review = Review::where('review_id', $id)->first();

        return view('singlereview', ['review' => $review]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        
    }

}

?>