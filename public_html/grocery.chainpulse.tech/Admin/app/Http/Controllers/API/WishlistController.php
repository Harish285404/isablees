<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Arr;
use App\Models\Whislist;
use App\Models\Property;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Session;
class WishlistController extends Controller
{   
    /* Add wishlist product*/
    public function save_product(Request $request)
    {
        
        $user_id = Auth::user()->id;
        
        $vid = $request->input('property_id');

    	$exist = Whislist::where('user_id',$user_id)->where('property_id',$vid)->count();

    	if($exist > 0)
    	{		
    		Whislist::where('user_id',$user_id)->where('property_id',$vid)->delete();
    		
    		$data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Product removed successfully';
        }
    	else
    	{
    		$wishlist = new Whislist;
    		$wishlist->user_id = $user_id;
    		$wishlist->property_id = $request->property_id;
    		$wishlist->save();
    		
    		$data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Product saved successfully';
    		
    	}
    	
        return $data;
    }
    
      /* Add wishlist product*/
    public function save_like(Request $request)
    {
        
        $user_id = Auth::user()->id;
        
        $vid = $request->input('property_id');

    	$exist = Whislist::where('user_id',$user_id)->where('property_id',$vid)->count();

    	if($exist > 0)
    	{		
    		Whislist::where('user_id',$user_id)->where('property_id',$vid)->update(['status'=>'1']);
    		
    // 		$data['status_code']    =   1;
    //         $data['status_text']    =   'Success';             
    //         $data['message']        =   'Product removed successfully';
        }
    	else
    	{

    		$wishlist = new Whislist;
    		$wishlist->user_id = $user_id;
    		$wishlist->property_id = $request->property_id;
    		$wishlist->save();
    		
    	}
    		$data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Product saved successfully';
    		
    	
    	
        return $data;
    // 	}
    }
    
    public function save_dislike(Request $request)
    {
        
        $user_id = Auth::user()->id;
        
        $vid = $request->input('property_id');
  
        $exist = Whislist::where('user_id',$user_id)->where('property_id',$vid)->count();

    	if($exist > 0)
    	{		
    		Whislist::where('user_id',$user_id)->where('property_id',$vid)->update(['status'=>'2']);
    		
    // 		$data['status_code']    =   1;
    //         $data['status_text']    =   'Success';             
    //         $data['message']        =   'Product removed successfully';
        }
    	else
    	{

    		$wishlist = new Whislist;
    		$wishlist->user_id = $user_id;
    		$wishlist->property_id = $request->property_id;
    	    $wishlist->status = '2';
    		$wishlist->save();
    	}
    		$data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Product saved successfully';
    		
    	
    	
        return $data;
    }
    
     /* Fetch wishlist product*/
    public function get_liked_list(Request $request)
    {
        $langId  = $request->langId;
         
        $user_id = Auth::user()->id;
        
        $result_data = [];
        
        Session::put('langId', $langId);
        
       	$saved_data = Whislist::where('user_id',$user_id)->where('status','1')->get(['property_id']);
       	
       	 if($langId != null){
       	
       	for($i=0;$i<count($saved_data);$i++)
		{
			$result_data[] = Property::where('id',$saved_data[$i]->property_id)->get();

		}
		
		$result = Arr::flatten($result_data);
		
		 for($j = 0;$j<count($result);$j++){
          
          $result[$j]->property_name = GoogleTranslate::trans($result[$j]->property_name,$langId);
          $result[$j]->location = GoogleTranslate::trans($result[$j]->location,$langId);
          
        } 
		
		$item_count = count($result);
       	 }else{
       	      Session::put('langId', 'en');
       	     for($k=0;$k<count($saved_data);$k++)
		{
			$result_data[] = Property::where('id',$saved_data[$k]->property_id)->get();

		}
		
		$result = Arr::flatten($result_data);
       	     
       	 }
		
    	if(sizeof($result) > 0)
    	{
    		$data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Liked Property Fetched Successfully';
            $data['data']      =         $result; 
        }
    	else
    	{
    		$data['status_code']    =   0;
            $data['status_text']    =   'Failed';             
            $data['message']        =   'No Data found';
            $data['data']           =   [];  
    	}
    	
        return $data;
    }
    
     public function get_disliked_list(Request $request)
    {
        $langId  = $request->langId;
        
        $user_id = Auth::user()->id;
        
        $result_data = [];
        
       	Session::put('langId', $langId);
        
       	$saved_data = Whislist::where('user_id',$user_id)->where('status','2')->get(['property_id']);
       	
       	 if($langId != null){
       	
       	for($i=0;$i<count($saved_data);$i++)
		{
			$result_data[] = Property::where('id',$saved_data[$i]->property_id)->get();

		}
		
		$result = Arr::flatten($result_data);
		
		 for($j = 0;$j<count($result);$j++){
          
          $result[$j]->property_name = GoogleTranslate::trans($result[$j]->property_name,$langId);
          $result[$j]->location = GoogleTranslate::trans($result[$j]->location,$langId);
          
        } 
		
		$item_count = count($result);
       	 }else{
       	      Session::put('langId', 'en');
       	     for($k=0;$k<count($saved_data);$k++)
		{
			$result_data[] = Property::where('id',$saved_data[$k]->property_id)->get();

		}
		
		$result = Arr::flatten($result_data);
       	     
       	 }
		
    	if(sizeof($result) > 0)
    	{
    		$data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Disliked Property Fetched Successfully';
            $data['data']      =         $result; 
        }
    	else
    	{
    		$data['status_code']    =   0;
            $data['status_text']    =   'Failed';             
            $data['message']        =   'No Data found';
            $data['data']           =   [];  
    	}
    	
        return $data;
    }
}
