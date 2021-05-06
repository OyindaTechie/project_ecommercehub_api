<?php

namespace App\Http\Controllers;

use App\Device;
use Faker\Generator as Faker;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    

    // create a new device 
    public function store(Request $request, Faker $faker)
    {

        // validate the name and price 
        $request->validate([
            'name' => 'required|string|unique:users',
            'price' => 'required|string',
        ]);


        // create the device and save to the database 
 
        $device = Device::create([
            'id' => $faker->unique()->randomNumber($nbDigits = 9, $strict = true),
            'name' => $request->name,
            'price' =>  $request->price,
          ]);


  
        return response()->json(['success' => 'Device Created successfully', 'device' => $device], 200);

    }

}
