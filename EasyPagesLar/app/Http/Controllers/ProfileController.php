<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Profile;

class ProfileController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
       
        return view('wop');
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
        $profile = new Profile;
        $profile->user_id = $request->user_id;
        $profile->fname = $request->fname;
        $profile->lname = $request->lname;
        $profile->dob = $request->dob;
        $profile->sex =$request->sex;
        // should now be saved
        $profile->save();
        
        //$review = Review::create($input);  
        
        //!!!!!! NOT NICE !!!!! PLEASE CHANGE !!!!!!!!!
        //$vars = get_object_vars($profile);
        //return view('/result', ['inputs' => $vars]);    
        return redirect('/user/'.$profile->user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($profid) {
        $profile = Profile::where('profile_id',$profid)->first();
        return view('profiledashboard.restricted.main', ['profile' => $profile]);
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