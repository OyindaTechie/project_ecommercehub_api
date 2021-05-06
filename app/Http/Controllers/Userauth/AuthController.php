<?php

namespace App\Http\Controllers\Userauth;

use App\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;
// use App\Notifications\SignupActivate;
use Faker\Generator as Faker;
use App\Traits\Smeservices;
use App\Transaction;
use Illuminate\Support\Facades\Config;

class AuthController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api')->except(['signup', 'login', 'alltransactions']);
    }

     /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */


    //  sign upa new user 
    public function signup(Request $request)
    {


        // validate user input 
         $request->validate([
         
            'phone' => 'required|string|unique:users',
            'email' => 'required|string|unique:users',
            'address'=> 'required|string',
            'name'=> 'required|string',
            'password' => 'required|string',

        ]);


        // create the user 

        $user = new User([
            'id'  =>$request->phone,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'password' => bcrypt($request->password),
        
        ]);

        // save the user to the db 
        $user->save();
        return response()->json([
            'success' => 'Successfully created user, please login with your number'
        ], 200);
        

    }




    //    get all user transactions, bought items and returned items
    public function transactions()
    {
 

        // authenticate the user 
        $userid =  Auth::user();

        // get all items where user id is that of the user and the item is either bought or returned 
        $transactionssold = Transaction::where('user_id', $userid->id)->where('status', 'Sold')->get();
        $transactionsreturned = Transaction::where('user_id', $userid->id)->where('status', 'Returned')->get();

        return response()->json([
            'success' => 'success',
            'transactions_sold' => $transactionssold,
            'transactions_returned' => $transactionsreturned,
            'user' => $userid
        ], 200);

    }




    public function alltransactions()
    {


   //    get all user transactions, bought items and returned items, this is viewed by the admin only
        $transactionssold = Transaction::where('status', 'Sold')->get();
        $transactionsreturned = Transaction::where('status', 'Returned')->get();

        return response()->json([
            'success' => 'success',
            'transactions_sold' => $transactionssold,
            'transactions_returned' => $transactionsreturned,
        ], 200);

    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */


    //  logina user  
    public function login(Request $request)
    {

      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|string',
        'password' => 'required|string|min:6'
      ]);
   


    //   find the user 
    $admin = User::where('email', $request->email)->first();


    // if user does not exist return error mesage 
    if(!$admin) {

        return response(['status' => 'Error', 'message' => 'No such user on our platform, kindly check your credentials']);

    }


    // check the password entered against the hashed password in the db 
        if (!(Hash::check($request->password, $admin->password))){

            return response(['status' => 'error', 'message' => 'Password is not equal']);
        }


 
        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials))
        return response()->json([
            'message' => 'Please check your credentials'
        ], 401);

 
        //    return then authetication token and details of the user 
        $tokenResult = $admin->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
            'user' => Auth::User(),
  
            ]);



    }



    // get all the devices /items from the db 
    public function devices()
    {




    $alldevices = Device::all();

     return response()->json($alldevices, 201);
    }



    
}
