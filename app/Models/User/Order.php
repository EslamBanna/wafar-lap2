<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['user_id','services_id','delivery_id','code','status','total_price'];

    public function order_lists(){
        return $this->hasMany('App\Models\User\OrderList','order_id','id');
    }

    public function delivery(){
        return $this->belongsTo('App\Models\Delivery\Delivery','delivery_id','id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User\User','user_id','id');
    }

    public function service(){
        return $this->belongsTo('App\Models\User\Service','services_id','id');
    }

    public function setStatusAttribute($value){
        if($value == "received" || $value == "Received"){
            $this->attributes['status'] = 1;
        }else if($value == "on the way" || $value == "On the way" || $value == "On The Way"){
            $this->attributes['status'] = 2;
        }else if($value == "delivered" || $value == "Delivered"){
            $this->attributes['status'] = 3;            
        }
    }
    
}
