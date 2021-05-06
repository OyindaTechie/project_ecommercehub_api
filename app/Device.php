<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    
    protected $primaryKey = 'id'; // or null

    public $incrementing = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password','number','address','image', 'activation_token', 'verifyemail',
    // ];

    protected $fillable = [
        'id','name','price'
    ];

}
