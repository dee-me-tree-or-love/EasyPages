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
  public function index()
  {
    $services = Service::all();
    
       
    
    return view('serviceboard', ['services' => $services]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($service_id)
  {
        $service = Service::where('service_id', $service_id)->first();
        $reviews = Review::where('service_id', $service_id)->get();
        $data = array(
            'service'=>$service,
            'reviews'=>$reviews,
        );
        return view('singleservice', compact('service', 'reviews'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>