<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_order extends Model
{
    use HasFactory;
    protected $fillable=['order_id','item_id'];
    protected $casts = [
        'order_id'=>'integer'  ,
        'item_id'=>'integer'
    ];
    
}
