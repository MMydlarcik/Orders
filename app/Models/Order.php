<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $fillable = ['code', 'author_id'];

    public function getId()
    {
        return $this->id;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getAuthorId()
    {
        return $this->author_id;
    }

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function historyItems()
    {
        return $this->hasMany(OrderHistory::class, 'order_id', 'id');
    }
}
