<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_restourant extends Model
{
    use HasFactory;
    protected $fillable=['restourant_id','item_id'];
    protected $casts = [
        'restourant_id'=>'integer'  ,
        'item_id'=>'integer'
    ];
}
