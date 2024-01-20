<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable=['name','price'];
    protected $casts = [
        'name'=>'string'  ,
        'price'=>'string'
    ];
    public function restourant() : object{
        return $this->belongsToMany(Restourant::class,'item_restourant');
    }

}
