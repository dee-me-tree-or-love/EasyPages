<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Comment;
use App\Review;
use JWTAuthentication;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\AuthenticateController;

class CommentsController extends Controller
{
    //     /**
    // * Display a listing of the resource.
    // *
    // * @return Response
    // */
    // public function index()
    // {
    
    // }

    // /**
    // * Show the form for creating a new resource.
    // *
    // * @return Response
    // */
    // public function create()
    // {
    
    // }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store(Request $request)
    {
        if(! $user = JWTAuthentication::parseToken()->authenticate() ){
            return response()->json([
                'error' => [
                    'message' => 'Please log in first'
                ]
            ], 400);
        }
        
        $comment = new Comment;
        
        $comment->author = $user->username;
        $comment->text = $request->text;
        $comment->review_id = $request->review_id;
        $comment->user_id = $user->id;
        $comment->thread_id =$request->thread_id;
        // should now be saved
        $comment->save();
        $resp = $comment;

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

    // /**
    // * Display the comments by the reviewID
    // *
    // * @param  int  $id
    // * @return Response
    // */
    // public function show($reviewID)
    // {
        
    // }

    // /**
    // * Show the form for editing the specified resource.
    // *
    // * @param  int  $id
    // * @return Response
    // */
    // public function edit($id)
    // {
    
    // }

    // /**
    // * Update the specified resource in storage.
    // *
    // * @param  int  $id
    // * @return Response
    // */
    // public function update($id)
    // {
    
    // }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        if(! $user = JWTAuthentication::parseToken()->authenticate() ){
            return response()->json([
                'error' => [
                    'message' => 'Please log in first'
                ]
            ], 400);
        }
                
        $commenttobedeleted = Review::where('comment_id',$id);
        
        
        if(! $id)
        {
            return response()->json([
            'message' => 'No request comment_id found'
        ], 400);
        }
        
        
        $resp = false;
        if($id)
        {
            $deletedcomment = Comment::where('comment_id',$id)->delete();
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
