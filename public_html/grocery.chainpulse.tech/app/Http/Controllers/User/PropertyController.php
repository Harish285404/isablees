<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectType;
use App\Models\Outside;
use App\Models\Exposure;
use App\Models\Floors;
use App\Models\Accessbility;
use App\Models\Property;
use App\Models\Surfaces;
use Auth;
use DB;
class PropertyController extends Controller
{
    public function index()
    {   
       $type =  ProjectType::get(['id','title']);
       $outside = Outside::get(['id','title']);
       $exposure = Exposure::get(['id','title']);
       $floors = Floors::get(['id','title']);
       $accessbility = Accessbility::get(['id','title']);
       $surfaces = Surfaces::get(['id','title']);
       
        return view('User.addproperty',['type'=>$type,'outside'=>$outside,'exposure'=>$exposure,'floors'=>$floors,'accessbility'=>$accessbility,
            'surfaces'=>$surfaces]);
    }
    


   public function add_property(Request $request)
   {

    // dd($request->all());
     $request->validate([
      'name' => 'required',
      'property_type' => 'required|in:"1", "2"',
      'price' => 'required',
      'location' => 'required',
      'longitude' => 'required',
      'latitude' => 'required',
      'living_area' => 'required',
      'land_area' => 'required',
      'pieces' => 'required',
      'rooms' => 'required',
        'project_type' => 'required',
      'outside_type' => 'required',
      'exposure_type' => 'required',
      'floors_type' => 'required',
      'surfaces_type' => 'required',
      'accessbility_type' => 'required',
        // 'image' => 'required',
         
    ]);
    $property = new Property;
     $property->provider_id = Auth::user()->id;
    $property->property_name = $request->name;
    $property->type = $request->property_type;
    $property->price = $request->price;
    $property->location = $request->location;
    $property->longitude = $request->longitude;
    $property->latitude = $request->latitude;
    $property->living_area = $request->living_area;
    $property->land_area = $request->land_area;
    $property->pieces = $request->pieces;
    $property->rooms = $request->rooms;

    $property['project_type_ids'] =implode(',',$request->input('project_type'));
    $property['outside_ids'] = implode(',',$request->input('outside_type'));
    $property['exposure_ids'] = implode(',',$request->input('exposure_type'));
    $property['floor_ids'] = implode(',',$request->input('floors_type'));
    $property['acessbility_ids'] = implode(',',$request->input('accessbility_type'));
    $property['surface_ids'] = implode(',',$request->input('surfaces_type'));


    $names = [];


    foreach($request->file('filename') as $image)
    {
        $destinationPath = 'Property-images';
        $filename = $image->getClientOriginalName();
        $image->move($destinationPath, $filename);
        array_push($names, $filename);          

    }
    $property->image = implode(',',($names));

    $property->save();
    
     return redirect()->back()->with('message', 'Property Successfully Inserted!');
 
   }
   
    public function properties()
    {   
        $rentdata = DB::table('properties')
       ->where('provider_id',Auth::user()->id)
       ->where('type','1')
       ->get();


        $saledata = DB::table('properties')
       ->where('provider_id',Auth::user()->id)
       ->where('type','2')
       ->get();

        for($i=0;$i<count($rentdata);$i++){
        $rentdata[$i]->image =  explode(',',$rentdata[$i]->image);
        $rentdata[$i]->project_type_ids =  explode(',',$rentdata[$i]->project_type_ids);
        $rentdata[$i]->outside_ids =  explode(',',$rentdata[$i]->outside_ids);
        $rentdata[$i]->exposure_ids =  explode(',',$rentdata[$i]->exposure_ids);
        $rentdata[$i]->floor_ids =  explode(',',$rentdata[$i]->floor_ids);
        $rentdata[$i]->acessbility_ids =  explode(',',$rentdata[$i]->acessbility_ids);
    }

    for($j=0;$j<count($saledata);$j++){
      $saledata[$j]->image =  explode(',',$saledata[$j]->image);
      $saledata[$j]->project_type_ids =  explode(',',$saledata[$j]->project_type_ids);
        $saledata[$j]->outside_ids =  explode(',',$saledata[$j]->outside_ids);
        $saledata[$j]->exposure_ids =  explode(',',$saledata[$j]->exposure_ids);
        $saledata[$j]->floor_ids =  explode(',',$saledata[$j]->floor_ids);
        $saledata[$j]->acessbility_ids =  explode(',',$saledata[$j]->acessbility_ids);
    }
        // dd($saledata[0][0]->image);
        return view('User.properties',['rentdata'=>$rentdata,'saledata'=>$saledata]);
    }
    

      public function single_properties(Request $request,$id)
    {   
        $property = Property::where('id',$id)->get();
        $property[0]->image =  explode(',',$property[0]->image);
        $property[0]->project_type_ids =  explode(',',$property[0]->project_type_ids);
        $property[0]->outside_ids =  explode(',',$property[0]->outside_ids);
        $property[0]->exposure_ids =  explode(',',$property[0]->exposure_ids);
        $property[0]->floor_ids =  explode(',',$property[0]->floor_ids);
       
        $property[0]->surface_ids =  explode(',',$property[0]->surface_ids);
    
    // dd($property);
        return view('User.sigle-properties',['property'=>$property]);
    }

    public function edit_property(Request $request,$id)
    {
       $property = Property::where('id',$id)->get();
       $type =  ProjectType::get(['id','title']);
       $outside = Outside::get(['id','title']);
       $exposure = Exposure::get(['id','title']);
       $floors = Floors::get(['id','title']);
       $accessbility = Accessbility::get(['id','title']);
       $surfaces = Surfaces::get(['id','title']);
       $property[0]->image =  explode(',',$property[0]->image);
       $property[0]->project_type_ids =  explode(',',$property[0]->project_type_ids);
       $property[0]->outside_ids =  explode(',',$property[0]->outside_ids);
       $property[0]->exposure_ids =  explode(',',$property[0]->exposure_ids);
       $property[0]->floor_ids =  explode(',',$property[0]->floor_ids);
       $property[0]->acessbility_ids =  explode(',',$property[0]->acessbility_ids);
        $property[0]->surface_ids =  explode(',',$property[0]->surface_ids);

       return view('User.edit-property',['type'=>$type,'outside'=>$outside,'exposure'=>$exposure,'floors'=>$floors,'accessbility'=>$accessbility
        ,'property'=>$property,'surfaces'=>$surfaces]);
    }



      public function delete_properties(Request $request)
  {
      $id = $request->id;

       $User = Property::where('id',$id)->delete();

         return redirect()->back()->with('message', 'Property  successfully deleted!');
  }
  
   public function update_property(Request $request)
   {

    // dd($request->all());
    //  $request->validate([
    //   'first_name' => 'required',
    //   'last_name' => 'required',
    //   'phone_number' => 'required|max:10',
    //   'alt_phone_number' => 'max:10',
    //   'address' => 'required',
    // ]);
    
    $id  = $request->id;
    $property = Property::find($id);
    $property->provider_id = Auth::user()->id;
    $property->property_name = $request->name;
    $property->type = $request->property_type;
    $property->price = $request->price;
    $property->location = $request->location;
    $property->longitude = $request->longitude;
    $property->latitude = $request->latitude;
    $property->living_area = $request->living_area;
    $property->land_area = $request->land_area;
    $property->pieces = $request->pieces;
    $property->rooms = $request->rooms;

    $property['project_type_ids'] =implode(',',$request->input('project_type'));
    $property['outside_ids'] = implode(',',$request->input('outside_type'));
    $property['exposure_ids'] = implode(',',$request->input('exposure_type'));
    $property['floor_ids'] = implode(',',$request->input('floors_type'));
    $property['acessbility_ids'] = implode(',',$request->input('accessbility_type'));
     $property['surface_ids'] = implode(',',$request->input('surfaces_type'));


    $names = [];
if($request->file('filename')){


    foreach($request->file('filename') as $image)
    {
        $destinationPath = 'Property-images';
        $filename = $image->getClientOriginalName();
        $image->move($destinationPath, $filename);
        array_push($names, $filename); 
         

    }
}
    foreach(array_keys($request->images) as $images)
        {
            array_push($names,$images); 
        }
    $property->image = implode(',',($names));

    $property->save();
    
     return redirect()->back()->with('message', 'Property Successfully Updated!');
 
   }
   
    public function get_search_result(Request $request)
    {

    $query = $request->input('query');
        $floor = $request->input('floors');
        $surface = $request->input('surface');
        $project = $request->input('project');
        $outside = $request->input('outside');
        
        $ids = [];
        $images = [];
        $names = [];
        $location = [];
        
        
      	if(!empty($project))
      	{
        
      for($k=0;$k<count($project);$k++){
             $property = Property::orwhere('properties.floor_ids','LIKE', '%'. $floor . '%')
            ->orwhere('properties.surface_ids','LIKE', '%'. $surface . '%')
              ->orwhere('properties.project_type_ids','LIKE', '%'. $project[$k]. '%')
                ->where('provider_id',Auth::user()->id)
            ->where('type','2')
                ->get();
                //   dd($property);
                
                for ($i = 0; $i < count($property); $i++) {
                    $property[$i]->image =  explode(',', $property[$i]->image);
                array_push($ids,$property[$i]->id);
                 array_push($images,$property[$i]->image[0]);
                  array_push($names,$property[$i]->property_name);
                     array_push($location,$property[$i]->location);
                }
  
          }
          }
          	elseif(!empty($outside))
      	{
        
      for($k=0;$k<count($outside);$k++){
             $property = Property::orwhere('properties.floor_ids','LIKE', '%'. $floor . '%')
            ->orwhere('properties.surface_ids','LIKE', '%'. $surface . '%')
                ->orwhere('properties.outside_ids','LIKE', '%'. $outside[$k] . '%')
                  ->where('provider_id',Auth::user()->id)
            ->where('type','2')
                ->get();
                //   dd($property);
                
                for ($i = 0; $i < count($property); $i++) {
                    $property[$i]->image =  explode(',', $property[$i]->image);
                array_push($ids,$property[$i]->id);
                 array_push($images,$property[$i]->image[0]);
                  array_push($names,$property[$i]->property_name);
                     array_push($location,$property[$i]->location);
                }
  
          }
          }
           	elseif(!empty($outside) && !empty($project) )
      	{
        
      for($k=0;$k<count($outside);$k++){
             $property = Property::orwhere('properties.floor_ids','LIKE', '%'. $floor . '%')
            ->orwhere('properties.surface_ids','LIKE', '%'. $surface . '%')
                ->orwhere('properties.outside_ids','LIKE', '%'. $outside[$k] . '%')
                ->orwhere('properties.project_type_ids','LIKE', '%'. $project[$k]. '%')
                  ->where('provider_id',Auth::user()->id)
            ->where('type','2')
                ->get();
                //   dd($property);
                
                for ($i = 0; $i < count($property); $i++) {
                    $property[$i]->image =  explode(',', $property[$i]->image);
                array_push($ids,$property[$i]->id);
                 array_push($images,$property[$i]->image[0]);
                  array_push($names,$property[$i]->property_name);
                     array_push($location,$property[$i]->location);
                }
  
          }
          }elseif($query!=null && $query!='0'){
              
        $array = explode('-', $query);
        $start_date =$array[0];
        $end_date =$array[1];
        
           $property = Property::orwhereBetween('living_area', [$start_date, $end_date])
          ->orwhereBetween('land_area', [$start_date, $end_date])
            ->where('provider_id',Auth::user()->id)
            ->where('type','2')
                ->get();
                //   dd($property);
                
                for ($i = 0; $i < count($property); $i++) {
                    $property[$i]->image =  explode(',', $property[$i]->image);
                array_push($ids,$property[$i]->id);
                 array_push($images,$property[$i]->image[0]);
                  array_push($names,$property[$i]->property_name);
                     array_push($location,$property[$i]->location);
                }
              
          }
          elseif($floor!=null && $surface!=null){
              
              $property = Property::orwhere('properties.floor_ids','LIKE', '%'. $floor . '%')
            ->orwhere('properties.surface_ids','LIKE', '%'. $surface . '%')
              ->where('provider_id',Auth::user()->id)
            ->where('type','2')
                ->get();
                //   dd($property);
                
                for ($i = 0; $i < count($property); $i++) {
                    $property[$i]->image =  explode(',', $property[$i]->image);
                array_push($ids,$property[$i]->id);
                 array_push($images,$property[$i]->image[0]);
                  array_push($names,$property[$i]->property_name);
                     array_push($location,$property[$i]->location);
                }
              
          }elseif($floor!=null){
               $property = Property::orwhere('properties.floor_ids','LIKE', '%'. $floor . '%')
                 ->where('provider_id',Auth::user()->id)
            ->where('type','2')
                ->get();
                //   dd($property);
                
                for ($i = 0; $i < count($property); $i++) {
                    $property[$i]->image =  explode(',', $property[$i]->image);
                array_push($ids,$property[$i]->id);
                 array_push($images,$property[$i]->image[0]);
                  array_push($names,$property[$i]->property_name);
                     array_push($location,$property[$i]->location);
                }
          }elseif($surface!=null){
               $property = Property::orwhere('properties.surface_ids','LIKE', '%'. $surface . '%')
                 ->where('provider_id',Auth::user()->id)
            ->where('type','2')
                ->get();
                //   dd($property);
                
                for ($i = 0; $i < count($property); $i++) {
                    $property[$i]->image =  explode(',', $property[$i]->image);
                array_push($ids,$property[$i]->id);
                 array_push($images,$property[$i]->image[0]);
                  array_push($names,$property[$i]->property_name);
                     array_push($location,$property[$i]->location);
                }
          }else{
              $query = $request->input('query');
        $array = explode('-', $query);
        $start_date =$array[0];
        $end_date =$array[1];
            for($k=0;$k<count($project);$k++){
             $property = Property::whereBetween('living_area', [$start_date, $end_date])
          ->whereBetween('land_area', [$start_date, $end_date])
          ->where('properties.floor_ids','LIKE', '%'. $floor . '%')
            ->where('properties.surface_ids','LIKE', '%'. $surface . '%')
              ->where('properties.project_type_ids','LIKE', '%'. $project[$k]. '%')
                ->where('properties.outside_ids','LIKE', '%'. $outside[$k] . '%')
                  ->where('provider_id',Auth::user()->id)
            ->where('type','2')
                ->get();
                //   dd($property);
                
                for ($i = 0; $i < count($property); $i++) {
                    $property[$i]->image =  explode(',', $property[$i]->image);
                array_push($ids,$property[$i]->id);
                 array_push($images,$property[$i]->image[0]);
                  array_push($names,$property[$i]->property_name);
                     array_push($location,$property[$i]->location);
                }
  
          }   
          }
         
            return response()->json(['success'=>true,'ids'=>$ids,'name'=>$names,'image'=>$images,'location'=>$location]);



    }
    
     public function get_rent_result(Request $request)
    {

        $query = $request->input('query');
        $floor = $request->input('floors');
        $surface = $request->input('surface');
        $project = $request->input('project');
        $outside = $request->input('outside');
        
        $ids = [];
        $images = [];
        $names = [];
        $location = [];
        
        
      	if(!empty($project))
      	{
        
      for($k=0;$k<count($project);$k++){
             $property = Property::orwhere('properties.floor_ids','LIKE', '%'. $floor . '%')
            ->orwhere('properties.surface_ids','LIKE', '%'. $surface . '%')
              ->orwhere('properties.project_type_ids','LIKE', '%'. $project[$k]. '%')
                ->where('provider_id',Auth::user()->id)
            ->where('type','1')
                ->get();
                //   dd($property);
                
                for ($i = 0; $i < count($property); $i++) {
                    $property[$i]->image =  explode(',', $property[$i]->image);
                array_push($ids,$property[$i]->id);
                 array_push($images,$property[$i]->image[0]);
                  array_push($names,$property[$i]->property_name);
                     array_push($location,$property[$i]->location);
                }
  
          }
          }
          	elseif(!empty($outside))
      	{
        
      for($k=0;$k<count($outside);$k++){
             $property = Property::orwhere('properties.floor_ids','LIKE', '%'. $floor . '%')
            ->orwhere('properties.surface_ids','LIKE', '%'. $surface . '%')
                ->orwhere('properties.outside_ids','LIKE', '%'. $outside[$k] . '%')
                  ->where('provider_id',Auth::user()->id)
            ->where('type','1')
                ->get();
                //   dd($property);
                
                for ($i = 0; $i < count($property); $i++) {
                    $property[$i]->image =  explode(',', $property[$i]->image);
                array_push($ids,$property[$i]->id);
                 array_push($images,$property[$i]->image[0]);
                  array_push($names,$property[$i]->property_name);
                     array_push($location,$property[$i]->location);
                }
  
          }
          }
           	elseif(!empty($outside) && !empty($project) )
      	{
        
      for($k=0;$k<count($outside);$k++){
             $property = Property::orwhere('properties.floor_ids','LIKE', '%'. $floor . '%')
            ->orwhere('properties.surface_ids','LIKE', '%'. $surface . '%')
                ->orwhere('properties.outside_ids','LIKE', '%'. $outside[$k] . '%')
                ->orwhere('properties.project_type_ids','LIKE', '%'. $project[$k]. '%')
                  ->where('provider_id',Auth::user()->id)
            ->where('type','1')
                ->get();
                //   dd($property);
                
                for ($i = 0; $i < count($property); $i++) {
                    $property[$i]->image =  explode(',', $property[$i]->image);
                array_push($ids,$property[$i]->id);
                 array_push($images,$property[$i]->image[0]);
                  array_push($names,$property[$i]->property_name);
                     array_push($location,$property[$i]->location);
                }
  
          }
          }elseif($query!=null && $query!='0'){
              
        $array = explode('-', $query);
        $start_date =$array[0];
        $end_date =$array[1];
        
           $property = Property::orwhereBetween('living_area', [$start_date, $end_date])
          ->orwhereBetween('land_area', [$start_date, $end_date])
            ->where('provider_id',Auth::user()->id)
            ->where('type','1')
                ->get();
                //   dd($property);
                
                for ($i = 0; $i < count($property); $i++) {
                    $property[$i]->image =  explode(',', $property[$i]->image);
                array_push($ids,$property[$i]->id);
                 array_push($images,$property[$i]->image[0]);
                  array_push($names,$property[$i]->property_name);
                     array_push($location,$property[$i]->location);
                }
              
          }
          elseif($floor!=null && $surface!=null){
              
              $property = Property::orwhere('properties.floor_ids','LIKE', '%'. $floor . '%')
            ->orwhere('properties.surface_ids','LIKE', '%'. $surface . '%')
              ->where('provider_id',Auth::user()->id)
            ->where('type','1')
                ->get();
                //   dd($property);
                
                for ($i = 0; $i < count($property); $i++) {
                    $property[$i]->image =  explode(',', $property[$i]->image);
                array_push($ids,$property[$i]->id);
                 array_push($images,$property[$i]->image[0]);
                  array_push($names,$property[$i]->property_name);
                     array_push($location,$property[$i]->location);
                }
              
          }elseif($floor!=null){
               $property = Property::orwhere('properties.floor_ids','LIKE', '%'. $floor . '%')
                 ->where('provider_id',Auth::user()->id)
            ->where('type','1')
                ->get();
                //   dd($property);
                
                for ($i = 0; $i < count($property); $i++) {
                    $property[$i]->image =  explode(',', $property[$i]->image);
                array_push($ids,$property[$i]->id);
                 array_push($images,$property[$i]->image[0]);
                  array_push($names,$property[$i]->property_name);
                     array_push($location,$property[$i]->location);
                }
          }elseif($surface!=null){
               $property = Property::orwhere('properties.surface_ids','LIKE', '%'. $surface . '%')
                 ->where('provider_id',Auth::user()->id)
            ->where('type','1')
                ->get();
                //   dd($property);
                
                for ($i = 0; $i < count($property); $i++) {
                    $property[$i]->image =  explode(',', $property[$i]->image);
                array_push($ids,$property[$i]->id);
                 array_push($images,$property[$i]->image[0]);
                  array_push($names,$property[$i]->property_name);
                     array_push($location,$property[$i]->location);
                }
          }else{
              $query = $request->input('query');
        $array = explode('-', $query);
        $start_date =$array[0];
        $end_date =$array[1];
            for($k=0;$k<count($project);$k++){
             $property = Property::whereBetween('living_area', [$start_date, $end_date])
          ->whereBetween('land_area', [$start_date, $end_date])
          ->where('properties.floor_ids','LIKE', '%'. $floor . '%')
            ->where('properties.surface_ids','LIKE', '%'. $surface . '%')
              ->where('properties.project_type_ids','LIKE', '%'. $project[$k]. '%')
                ->where('properties.outside_ids','LIKE', '%'. $outside[$k] . '%')
                  ->where('provider_id',Auth::user()->id)
            ->where('type','1')
                ->get();
                //   dd($property);
                
                for ($i = 0; $i < count($property); $i++) {
                    $property[$i]->image =  explode(',', $property[$i]->image);
                array_push($ids,$property[$i]->id);
                 array_push($images,$property[$i]->image[0]);
                  array_push($names,$property[$i]->property_name);
                     array_push($location,$property[$i]->location);
                }
  
          }   
          }
         
            return response()->json(['success'=>true,'ids'=>$ids,'name'=>$names,'image'=>$images,'location'=>$location]);



    }



}
