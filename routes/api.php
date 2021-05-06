<?php
use Illuminate\Support\Facades\Route;




      //  user api routes
  Route::prefix('userauth')->group(function () {

    Route::post('login', 'Userauth\AuthController@login');
    Route::get('devices', 'Userauth\AuthController@devices');

    Route::post('signup', 'Userauth\AuthController@signup');
    Route::get('transactions', 'Userauth\AuthController@transactions');
    Route::get('alltransactions', 'Userauth\AuthController@alltransactions');
     

  });


  //  device / item api routes 
  Route::prefix('device')->group(function () {

    Route::post('store', 'DeviceController@store');
   
  });

    //  sales api routes 
  Route::prefix('transaction')->group(function () {

    Route::post('store', 'TransactionController@store');
    Route::post('return', 'TransactionController@return');

  });







