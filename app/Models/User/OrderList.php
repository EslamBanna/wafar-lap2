<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;
    protected $table = 'order_list';
    protected $fillable = ['order_id','object_id','amount','price'];

    public function order(){
        return $this->belongsTo('App\Models\User\Order','order_id','id');
    }
}
