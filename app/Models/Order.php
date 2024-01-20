<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'date',
        'total-cost',
        'restourant_id',
        'customer_id',
        'order_type',
        'user_id'
    ];
    protected $casts = [
        'date' => 'datetime',
        'restourant_id'=>'integer',
       'customer_id'=>'integer',
       'order_type'=>'string'
    ];
    public function restourant() : object{
        return $this->belongsTo(Restourant::class);
    }
    public function user() : object{
        return $this->belongsTo(User::class);
    }
    public function items() : object{
        return $this->belongsToMany(Item::class,'item_orders');
    }
}
