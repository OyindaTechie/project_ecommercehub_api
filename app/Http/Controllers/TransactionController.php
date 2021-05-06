<?php

namespace App\Http\Controllers;

use App\Datatransdetails;
use App\Device;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Faker\Generator as Faker;

class TransactionController extends Controller
{


    public function __construct()
    {

    // This is the middleware
        $this->middleware('auth:api')->except('index');
   
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $transactions =   Transaction::all();

        return  $transactions;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    //   buy an item with the item id 
    public function store(Request $request, Faker $faker)
    {


        // validate the id 
          $request->validate([

      
             'deviceId' => 'required|string',


         ]);


    //   get the user 
         $userid = Auth::User();

        //  get the item / device 
         $device = Device::findorfail($request->deviceId);

         // get the current time
         $currentDate = Carbon::now();

        //  save the transction in the db 
            $transaction = Transaction::create([
                'id' => $faker->unique()->randomNumber($nbDigits = 9, $strict = true),
                'user_id' => $userid->id,
                'price' => $device->price,
                'status' => 'Sold',
                'deviceName' => $device->name,
                // 'returnDate' => $userid->id,
                'soldDate' => $currentDate->toDateTimeString()           ,

              ]);

// return the response 
           return response()->json([
            'success' => 'success' , 'transaction' => $transaction
           ], 200);



    }

 


    // return an item 

    public function return(Request $request)
    {
        
        // validate  the id  
        $request->validate([

      
            'deviceId' => 'required|string',


        ]);

        
        // find the item 
        $transaction = Transaction::findorfail($request->deviceId);
        

        
        $currentDate = Carbon::now();

        // update the return date 
        $transaction->returnDate =  $currentDate->toDateTimeString();
        $transaction->status =  'Returned';

        // save the returned item and change its status to return 
        $transaction->save();


        return response()->json([
            'success' => 'success' , 'transaction' => $transaction
           ], 200);

    }


  

}
