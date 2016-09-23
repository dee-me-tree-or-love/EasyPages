<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use Auth;

class CompanyController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        
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
        $company = new Company;
        $company->user_id = $request->user_id;
        $company->name = $request->name;
        $company->description = $request->description;
        $company->website = $request->website;
        // should now be saved
        $company->save();

        //$review = Review::create($input);  
        //!!!!!! NOT NICE !!!!! PLEASE CHANGE !!!!!!!!!
        //$vars = get_object_vars($company);
        return redirect('/user/'.$company->user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($comid) {
        $company = Company::where('company_id',$comid)->first();
        return view('companydashboard.restricted.main', ['company' => $company]);
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
        $company = Auth::user()->getcompany();
        if ($request->has('name')) {
            $newName = $request->name;
            Company::where('company_id', $company->company_id)
                    ->update(['name' => $newName]);
        }
        if ($request->has('description')) {
            $newdescription = $request->description;
            Company::where('company_id', $company->company_id)
                    ->update(['description' => $newdescription]);
        }
        if ($request->has('website')) {
            $newwebsite = $request->website;
            Company::where('company_id', $company->company_id)
                    ->update(['website' => $newwebsite]);
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