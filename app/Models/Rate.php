<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $fillable=[
        'rate',
      
        'restourant_id',
        
    ];
    protected $casts = [
        'rate'=>'integer',
      
        'restourant_id'=>'integer',
     
    ];
    public function restorant() : object{
        return $this->belongsTo(Restourant::class);
    }
    public function user() : object{
        return $this->belongsTo(User::class);
    }
}

