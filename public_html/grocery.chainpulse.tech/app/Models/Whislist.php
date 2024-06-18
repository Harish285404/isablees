<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whislist extends Model
{
    use HasFactory;
        protected $table = 'whislists';
    public $timestamps = true;
  
    protected $fillable = [
        'user_id','property_id','status'
    ];
    
     public function getWishlistAttribute()
    {
        $user_id = Auth::user()->id;

        $category_id = Whislist::where('user_id',$user_id)->where('property_id',$this->id)->get(['status']);

        for($i=0;$i<count($category_id);$i++)
        {

            if($category_id[$i]->status == '1'){

                return 1;

            }elseif($category_id[$i]->status == '2'){

                 return 2;
            }else{
                
                 return 0;
            }

        }
        
       // return $category_id[$i]->status;
    }
}
