<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restourant extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'cusine_type',
        'address',
        'phone',
      
    ];
    protected $casts = [
        'name'=>'string',
        'cusine_type'=>'string',
        'address'=>'string',
        'phone'=>'string',
       
        
    ];
 
    public function items() : object{
        return $this->belongsToMany(Item::class,'item_restourants');
    }
    public function orders() : object{
        return $this->hasMany(Order::class);
    }
    public function rates() : object{
        return $this->hasMany(Rate::class);
    }
}
