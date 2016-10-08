<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use JWTAuthentication;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
 
class AuthenticateController extends Controller
{


    protected $auth;
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
        $this->middleware('cors');
        $this->middleware('jwt.auth', ['except' => ['authenticate', 'register']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }
    
    public function logout()
    {
        try {
        JWTAuthentication::invalidate(JWTAuthentication::getToken());
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
 
            return response()->json(['token_expired'], $e->getStatusCode());
 
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
 
            return response()->json(['token_invalid'], $e->getStatusCode());
 
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
 
            return response()->json(['token_absent'], $e->getStatusCode());
 
        }
        return response()->json(['Successfully logged out!']);        
    }
    
    public function register(Request $request) 
    {
    if(!$request->username || !$request->email || !$request->password || !$request->type)
    {
        return response()->json([‘please_enter_all_information’], 500);
    }
        
    $newUser = User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'type' => $request->type,
    ]);
        
    if (!$newUser) {
        return response()->json([‘failed_to_create_new_user’], 500);
    }
    //TODO: implement JWT
    return response()->json([
        'token' => $this->auth->fromUser($newUser)
    ]);
    }
 
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
 
        try {
            // verify the credentials and create a token for the user
            if (! $token = $this->auth->attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
 
        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }
 
    public function getAuthenticatedUser()
    {
        try {
 
            if (! $user = JWTAuthentication::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
 
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
 
            return response()->json(['token_expired'], $e->getStatusCode());
 
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
 
            return response()->json(['token_invalid'], $e->getStatusCode());
 
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
 
            return response()->json(['token_absent'], $e->getStatusCode());
 
        }
 
        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }
}