<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable= ['user_id','order_id','cart_data','status','status_text'];
    public function getUser()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
