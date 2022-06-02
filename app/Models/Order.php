<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $fillable = ['code', 'author_id'];

    public function getId (){
        return $this->id;
    }

    public function getCode (){
        return $this->code;
    }

    public function getAuthorId (){
        return $this->author_id;
    }
}
