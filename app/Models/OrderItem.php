<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_item';
    protected $primaryKey = 'id';
    protected $fillable = ['order_id','code', 'qty'];
}
