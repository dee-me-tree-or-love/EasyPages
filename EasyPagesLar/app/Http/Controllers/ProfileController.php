<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Auth;

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
        return $profile;
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
    public function update(Request $request) {
        $profile = Auth::user()->getprofile();
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
        
        return redirect()->back();
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