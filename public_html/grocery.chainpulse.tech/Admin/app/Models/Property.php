<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectType;
use App\Models\Outside;
use App\Models\Exposure;
use App\Models\Floors;
use App\Models\Accessbility;
use App\Models\Property;
use App\Models\User;
use App\Models\Whislist;
use Auth;
use Session;

use Stichoza\GoogleTranslate\GoogleTranslate;
class Property extends Model
{
    use HasFactory;
    
      protected $table = 'properties';

     protected $fillable = [
        'provider_id','property_name','type','price','location','longitude','latitude','image','living_area', 'land_area','pieces','rooms','project_type_ids','outside_ids', 'exposure_ids','floor_ids','acessbility_ids','status'
    ];
    
    public function getPropertyImageUrlAttribute()
    {   
       $images =  explode(',',$this->image);
       
        foreach($images as $image=>$v){
            
             if($image == '0'){
                                     
                $image_url = 'https://immotep.chainpulse.tech/Property-images/'.$v;
             }
        }
       
        return  $image_url ;
    }
    
    public function getImagesUrlAttribute()
    {   
       $images =  explode(',',$this->image);
       
        foreach($images as $image=>$v){
            
        $image_url[] = 'https://immotep.chainpulse.tech/Property-images/'.$v;
        
        }
       
        return  $image_url ;
    }
    
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
    public function getProjectTypeAttribute()
    {   
         $translatedProjectTypes = [];
     $langid=Session::get('langId');

      $images =  explode(',',$this->project_type_ids);
        $i = 0;
        foreach($images as $image=>$v){
          
              $type =  ProjectType::where('id',$v)->get(['id','title']);  
            //   $image_url[] = $type[0];
              $image_url[$i]['id'] = $type[0]->id;
               $image_url[$i]['title'] = GoogleTranslate::trans($type[0]->title, $langid);
        $i++;
        }
       
        return  $image_url ;
    }


    

    
    public function getOutsideAttribute()
    {   
         $translatedProjectTypes = [];
       $langid=Session::get('langId');
       $images =  explode(',',$this->outside_ids);
        $i = 0;
        foreach($images as $image=>$v){
          
               $type =  Outside::where('id',$v)->get(['id','title']);  
            //   $image_url[] = $type[0];
             $image_url[$i]['id'] = $type[0]->id;
               $image_url[$i]['title'] = GoogleTranslate::trans($type[0]->title, $langid);
        $i++;
        }
       
        return  $image_url ;
    }
    
    public function getExposureAttribute()
    {   
          $translatedProjectTypes = [];
       $langid=Session::get('langId');
       $images =  explode(',',$this->floor_ids);
        $i = 0;
        foreach($images as $image=>$v){
          
               $type =  Exposure::where('id',$v)->get(['id','title']);  
            //   $image_url[] = $type[0];
             $image_url[$i]['id'] = $type[0]->id;
               $image_url[$i]['title'] = GoogleTranslate::trans($type[0]->title, $langid);
        $i++;
        }
       
        return  $image_url ;
    }
    
    public function getFloorsAttribute()
    {   
          $translatedProjectTypes = [];
       $langid=Session::get('langId');
       $images =  explode(',',$this->exposure_ids);
        $i = 0;
        foreach($images as $image=>$v){
          
               $type =  Floors::where('id',$v)->get(['id','title']);  
            //   $image_url[] = $type[0];
             $image_url[$i]['id'] = $type[0]->id;
               $image_url[$i]['title'] = GoogleTranslate::trans($type[0]->title, $langid);
        $i++;
        }
       
        return  $image_url ;
    }
    
    public function getAccessbilityAttribute()
    {   
          $translatedProjectTypes = [];
       $langid=Session::get('langId');
       $images =  explode(',',$this->acessbility_ids);
        $i = 0;
        foreach($images as $image=>$v){
          
               $type =  Accessbility::where('id',$v)->get(['id','title']);  
            //   $image_url[] = $type[0];
             $image_url[$i]['id'] = $type[0]->id;
               $image_url[$i]['title'] = GoogleTranslate::trans($type[0]->title, $langid);
        $i++;
        }
       
        return  $image_url ;
    }
    
    public function getPropertyProviderAttribute()
    {   
          $translatedProjectTypes = [];
       $langid=Session::get('langId');
       
        $user = User::where('id',$this->provider_id)->get(['id','first_name','last_name','email','phone_number','image']);
        
         for($i = 0;$i<count($user);$i++){
              
              $user[$i]->first_name = GoogleTranslate::trans($user[$i]->first_name,$langid);
              if($user[$i]->last_name != null){
              $user[$i]->last_name = GoogleTranslate::trans($user[$i]->last_name,$langid);
              }
            
            }
       
        return  $user;
    }
    
   
    public function toArray()
    {
        $array = parent::toArray();
        foreach ($this->getMutatedAttributes() as $key)
        {
            if ( ! array_key_exists($key, $array)) {
                $array[$key] = $this->{$key};   
            }
        }
        return $array;
    }
}
