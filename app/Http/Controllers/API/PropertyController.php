<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Sale;
use DB;
use Validator;
use Auth;
use App\Models\Whislist;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Session;
class PropertyController extends Controller
{
    public function properties(Request $request)
    {   
        
        $langId  = $request->langId;
        
       Session::put('langId', $langId);
       
          
        $property = Property::where('type',$request->type)->where('status','0')->get();
        if($langId != null){
            
        
        for($i = 0;$i<count($property);$i++){
          
          $property[$i]->property_name = GoogleTranslate::trans($property[$i]->property_name,$langId);
          $property[$i]->location = GoogleTranslate::trans($property[$i]->location,$langId);
          
        }  
    }else{
        Session::put('langId', 'en');
        $property = Property::where('type',$request->type)->where('status','0')->get();
    }
        if(sizeof($property))
        {
            $data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Property List Fetched Successfully !';
            $data['data']      =         $property;  
        }
        else
        {
            $data['status_code']    =   0;
            $data['status_text']    =   'Failed';             
            $data['message']        =   'No Data Found';
            $data['data']           =   [];  
        }
        
        return $data;
        
    }
    
    public function property_details(Request $request)
    {   
        $id = $request->id;
        
        $langId  = $request->langId;
        
        Session::put('langId', $langId);
         $property = Property::where('id',$id)->get();
        
         if($langId != null){
            
        
        for($i = 0;$i<count($property);$i++){
          
          $property[$i]->property_name = GoogleTranslate::trans($property[$i]->property_name,$langId);
          $property[$i]->location = GoogleTranslate::trans($property[$i]->location,$langId);
          
        }  
        }else{
            Session::put('langId', 'en');
             $property = Property::where('id',$id)->get();
        }
        
        
        if(sizeof($property))
        {
            $data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Property Details Fetched Successfully !';
            $data['data']      =         $property;  
        }
        else
        {
            $data['status_code']    =   0;
            $data['status_text']    =   'Failed';             
            $data['message']        =   'No Data Found';
            $data['data']           =   [];  
        }
        
        return $data;
        
    }
    
    public function get_search_result(Request $request)
    {
        //  $id = Auth::user()->id;
         $rules=array(
            'query' => 'required',
        );
        
        $messages=array(
            'query.required' => 'Please select location or name .',
        );
        
        $validator = Validator::make( $request->all(), $rules, $messages );

        if ( $validator->fails() ) 
        {
            return [
                'status_code' => 0,
                'status_text' => 'Failed',
                'message' => $validator->errors()->first()
            ];
        }
        else
        {
            
        $query = $request->input('query');

      	if(isset($query) && $query != null && $query != '')
      	{

             $property = DB::table('properties')
           ->select('properties.id','properties.property_name','properties.image','properties.location')
           ->where('properties.property_name','LIKE', '%'. $query . '%')
           ->orwhere('properties.location','LIKE', '%'. $query . '%')
           ->get();
           
         for($i=0;$i<count($property);$i++){
              
                     $property[$i]->image =  explode(',',$property[$i]->image);
                     
                      foreach($property[$i]->image as $image=>$v){
            
                             if($image == '0'){
                                                     
                                 $property[$i]->image = 'https://immotep.chainpulse.tech/Property-images/'.$v;
                             }
                     }
               
        }  
        
           $langId  = $request->langId;
         
        
           $result = [];
          
          
            if($langId!=null){
                
                     for($i=0;$i<count($property);$i++){
              
               $result[$i]['id'] = $property[$i]->id;
               
               $result[$i]['property_name'] = GoogleTranslate::trans($property[$i]->property_name,$langId);
                
               $result[$i]['location'] = GoogleTranslate::trans($property[$i]->location,$langId);
               
              
                     $property[$i]->image =  explode(',',$property[$i]->image);
                     
                      foreach($property[$i]->image as $image=>$v){
            
                             if($image == '0'){
                                                     
                                 $property[$i]->image = 'https://immotep.chainpulse.tech/Property-images/'.$v;
                             }
                     }
               
        }  
                
            }else{
                
             for($i=0;$i<count($property);$i++){
              
               $result[$i]['id'] = $property[$i]->id;
               
               $result[$i]['property_name'] = $property[$i]->property_name;
                
               $result[$i]['location'] = $property[$i]->location;
               
               
                     $property[$i]->image =  explode(',',$property[$i]->image);
                     
                      foreach($property[$i]->image as $image=>$v){
            
                             if($image == '0'){
                                                     
                                 $property[$i]->image = 'https://immotep.chainpulse.tech/Property-images/'.$v;
                             }
                     }
               
        }  
        
    }


	      	if(sizeof($property) > 0)
	    	{
	    		$data['status_code']    =   1;
	            $data['status_text']    =   'Success';             
	            $data['message']        =   'Search Results Fetched Successfully';
	            $data['data']      =         $result;  
	           
	        }
	    	else
	    	{
	    		$data['status_code']    =   0;
	            $data['status_text']    =   'Failed';             
	            $data['message']        =   'No Data Found';
	            $data['data']           =   [];  
	    	}


	    }
	    else
	    {
     		$data['status_code']    =   0;
            $data['status_text']    =   'Failed';             
            $data['message']        =   'Please provide the search query.';
            $data['data']           =   [];  	    	
	    }
	    
        return $data;
     

       }        
    }
    
    public function property_buy(Request $request)
    {   
        $result = new Sale;
        $result->provider_id = $request->provider_id;
        $result->property_id = $request->property_id;
        $result->user_id = $request->user_id;
        $result->price = $request->price;
        $result->save();
        $property_id = Property::where('id',$request->property_id)->get(['type']);
        if($property_id[0]->type =='1'){
          
          $property = Property::where('id',$request->property_id)->update(['status'=>'1']);  
            
        }else{
            
            $property = Property::where('id',$request->property_id)->update(['status'=>'2']);  
        }
        
        
        if($result)
        {
            $data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Property List Fetched Successfully !';
            $data['data']      =         $result;  
        }
        else
        {
            $data['status_code']    =   0;
            $data['status_text']    =   'Failed';             
            $data['message']        =   'No Data Found';
            $data['data']           =   [];  
        }
        
        return $data;
        
    }
    
    public function my_property(Request $request)
    {   
         $langId  = $request->langId;
         
         $property = DB::table('properties')
           	->join('sales', 'properties.id', '=', 'sales.property_id')  
           ->join('users', 'sales.provider_id', '=', 'users.id')  
          ->select('properties.id','properties.property_name','properties.image','properties.location','properties.type')
          ->where('sales.user_id',Auth::user()->id)
          ->get();
          
          $result = [];
          
          
            if($langId!=null){
                
                     for($i=0;$i<count($property);$i++){
              
               $result[$i]['id'] = $property[$i]->id;
               
               $result[$i]['property_name'] = GoogleTranslate::trans($property[$i]->property_name,$langId);
                
               $result[$i]['location'] = GoogleTranslate::trans($property[$i]->location,$langId);
               
               if($property[$i]->type=='1'){
                   
                    $result[$i]['type'] = GoogleTranslate::trans('Rent',$langId);
                   
               }else{
                   
                    $result[$i]['type'] = GoogleTranslate::trans('Purchased',$langId);
                   
               }
               
                     $property[$i]->image =  explode(',',$property[$i]->image);
                     
                      foreach($property[$i]->image as $image=>$v){
            
                             if($image == '0'){
                                                     
                                 $result[$i]['image'] = 'https://immotep.chainpulse.tech/Property-images/'.$v;
                                
                             }
                             elseif($image > '0')
                             {
                             
                                $result[$i]['image_url'][] = 'https://immotep.chainpulse.tech/Property-images/'.$v;
                              
                            }
                              
                     }
               
        }  
                
            }else{
                
             for($i=0;$i<count($property);$i++){
              
               $result[$i]['id'] = $property[$i]->id;
               
               $result[$i]['property_name'] = $property[$i]->property_name;
                
               $result[$i]['location'] = $property[$i]->location;
               
               if($property[$i]->type=='1'){
                   
                    $result[$i]['type'] = 'Rent';
                   
               }else{
                   
                    $result[$i]['type'] = 'Purchased';
                   
               }
               
                     $property[$i]->image =  explode(',',$property[$i]->image);
                     
                      foreach($property[$i]->image as $image=>$v){
            
                             if($image == '0'){
                                                     
                                 $result[$i]['image'] = 'https://immotep.chainpulse.tech/Property-images/'.$v;
                                
                             }
                             elseif($image > '0')
                             {
                             
                                $result[$i]['image_url'][] = 'https://immotep.chainpulse.tech/Property-images/'.$v;
                              
                            }
                              
                     }
               
        }  
        
    }
        
        if(sizeof($result))
        {
            $data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Property List Fetched Successfully !';
            $data['data']      =         $result;  
        }
        else
        {
            $data['status_code']    =   0;
            $data['status_text']    =   'Failed';             
            $data['message']        =   'No Data Found';
            $data['data']           =   [];  
        }
        
        return $data;
        
    }
    

}
