<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey = 'id'; // or null

    public $incrementing = false;


    protected $fillable = [
        'id','user_id','price','deviceName','status', 'returnDate', 'soldDate'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

}
