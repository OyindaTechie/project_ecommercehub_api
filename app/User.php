<?php

namespace App;

use App\Chatmodel\Chatgroup;
use App\Chatmodel\Chatreport;
use App\Models\Userrequest;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Staff;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

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
        'id','name','phone','email','address','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // 'password',
    protected $hidden = [
       'password', 'remember_token',
    ];

    public function transaction()
    {
      return $this->hasMany(Transaction::class);
    }
 



}
