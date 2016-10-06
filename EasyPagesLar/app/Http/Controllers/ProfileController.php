<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Auth;
use JWTAuthentication;
use App\Http\Controllers\AuthenticateController;

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
        
        $profile = new Profile;
        $profile->user_id = $user->id;
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
        $resp = $profile;
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
    public function show($userid) {
        $profile = Profile::where('user_id',$userid)->first();
        $resp = $profile;
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
////        
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request) {        
        if(! $user = JWTAuthentication::parseToken()->authenticate() ){
            return response()->json([
                'error' => [
                    'message' => 'Please log in first'
                ]
            ], 400);
        }
        
        $profile = $user->getprofile();
        if ($request->has('fname')) {
            $newFirstName = $request->fname;
            Profile::where('profile_id', $profile->profile_id)
                    ->update(['fname' => $newFirstName]);
        }
        if ($request->has('lname')) {
            $newLastName = $request->lname;
            Profile::where('profile_id', $profile->profile_id)
                    ->update(['lname' => $newLastName]);
        }
        if ($request->has('dob')) {
            $newDob = $request->dob;
            Profile::where('profile_id', $profile->profile_id)
                    ->update(['dob' => $newDob]);
        }
        if ($request->has('sex')) {
            $newGender = $request->sex;
            Profile::where('profile_id', $profile->profile_id)
                    ->update(['sex' => $newGender]);
        }
        //$company = Company::where('company_id', $company->company_id)->first();
        //return view('/result2', ['inputs' => $company]);
        // /\ used for testing
        $resp = $profile;
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
//    public function destroy($id) {
//        
//    }

}

?>