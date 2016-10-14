<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Company;

class UserController extends Controller {

public function __construct(){
        $this->middleware('jwt.auth');
}
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
//  public function index()
//  {
//    
//  }
//
//  /**
//   * Show the form for creating a new resource.
//   *
//   * @return Response
//   */
//  public function create()
//  {
//    
//  }
//
//  /**
//   * Store a newly created resource in storage.
//   *
//   * @return Response
//   */
//  public function store()
//  {
//    
//  }
//
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $user = User::find($id);
    if($user->type == 'i')
    {
        $profile = $user->getprofile();
        $resp = compact($user,$profile);
        if(!$resp)
        {
            return response()->json([
            'message' => 'Sorry, we are confused :('
        ], 400);
        }
        return response()->json([
            'message' => $resp
        ], 200);
        //return view('profiledashboard.main', ['user' => $user]);
    }
    else
    {
        $company = $user->getprofile();
        $resp = compact($user,$company);
        //return view('companydashboard.main', ['user' => $user]);
        if(!$user)
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

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
//  public function edit($id)
//  {
//    
//  }
//
//  /**
//   * Update the specified resource in storage.
//   *
//   * @param  int  $id
//   * @return Response
//   */
//  public function update($id)
//  {
//    
//  }
//
//  /**
//   * Remove the specified resource from storage.
//   *
//   * @param  int  $id
//   * @return Response
//   */
//  public function destroy($id)
//  {
//    
//  }
  
}

?>