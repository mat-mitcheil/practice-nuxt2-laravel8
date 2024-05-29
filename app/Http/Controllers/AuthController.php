<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User as UserResource;



class AuthController extends Controller{

    public function login(Request $request){
        $this->validate($request,[
            'email'=> 'email|string|required',
            'password'=> 'string|required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            $user=Auth::user();

            // Generate a new token for the user
            $token = $user->createToken('token');
            $plainToken = $token->plainTextToken;

            // return response()->json([
            //     'message'=>'Success',
            //     'credentials'=>$user,
            //     'token'=> $plainToken
            // ]);
            return (new UserResource($request->user()))->additional([
                'meta'=>[
                    'token'=>$plainToken
                ]
            ]);
        }
        return response()->json([
            'message'=>'Invalid Credentials'
        ]);
        
    }

    public function logout(Request $request){

        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }


}