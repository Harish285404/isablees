<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    
     protected $table = 'sales';

     protected $fillable = [
        'provider_id','property_id','user_id','price','status'
        ];
    
}
