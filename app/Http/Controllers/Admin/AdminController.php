<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;
use DB;
use App\Models\Property;
use App\Models\ProjectType;
use App\Models\Outside;
use App\Models\Exposure;
use App\Models\Floors;
use App\Models\Accessbility;
use App\Models\Sale;
use Carbon\Carbon;

class AdminController extends Controller
{
      public function index()
      {
            $rentdata = Property::where('type', '1')->get();
            $saledata = Property::where('type', '2')->get();
            for ($i = 0; $i < count($rentdata); $i++) {
                  $rentdata[$i]->image =  explode(',', $rentdata[$i]->image);
                  $rentdata[$i]->project_type_ids =  explode(',', $rentdata[$i]->project_type_ids);
                  $rentdata[$i]->outside_ids =  explode(',', $rentdata[$i]->outside_ids);
                  $rentdata[$i]->exposure_ids =  explode(',', $rentdata[$i]->exposure_ids);
                  $rentdata[$i]->floor_ids =  explode(',', $rentdata[$i]->floor_ids);
                  $rentdata[$i]->acessbility_ids =  explode(',', $rentdata[$i]->acessbility_ids);
            }

            for ($j = 0; $j < count($saledata); $j++) {
                  $saledata[$j]->image =  explode(',', $saledata[$j]->image);
                  $saledata[$j]->project_type_ids =  explode(',', $saledata[$j]->project_type_ids);
                  $saledata[$j]->outside_ids =  explode(',', $saledata[$j]->outside_ids);
                  $saledata[$j]->exposure_ids =  explode(',', $saledata[$j]->exposure_ids);
                  $saledata[$j]->floor_ids =  explode(',', $saledata[$j]->floor_ids);
                  $saledata[$j]->acessbility_ids =  explode(',', $saledata[$j]->acessbility_ids);
            }



            $sold = DB::table('properties')
                  ->join('sales', 'properties.id', '=', 'sales.property_id')
                  ->select('properties.*', 'sales.*')
                  ->where('properties.type', '2')
                  ->count();

            $property_count = Sale::count();

            $rent = DB::table('properties')
                  ->join('sales', 'properties.id', '=', 'sales.property_id')
                  ->select('properties.*', 'sales.*')
                  ->where('properties.type', '1')
                  ->count();

            // dd($soldproperty);

            $soldproperty = DB::table('properties')
                  ->join('sales', 'properties.id', '=', 'sales.property_id')
                  ->select('properties.*', 'sales.*')
                  ->where('properties.type', '2')
                  ->orderBy('sales.id', 'desc')
                  ->limit(3)
                  ->get();
            // dd($soldproperty);


            return view('Admin.dashboard', [
                  'rentdata' => $rentdata, 'saledata' => $saledata, 'sold' => $sold, 'rent' => $rent, 'soldproperty' => $soldproperty,
                  'property_count' => $property_count
            ]);
      }

      public function properties()
      {
            $rentdata = Property::where('type', '1')->get();
            $saledata = Property::where('type', '2')->get();
            for ($i = 0; $i < count($rentdata); $i++) {
                  $rentdata[$i]->image =  explode(',', $rentdata[$i]->image);
                  $rentdata[$i]->project_type_ids =  explode(',', $rentdata[$i]->project_type_ids);
                  $rentdata[$i]->outside_ids =  explode(',', $rentdata[$i]->outside_ids);
                  $rentdata[$i]->exposure_ids =  explode(',', $rentdata[$i]->exposure_ids);
                  $rentdata[$i]->floor_ids =  explode(',', $rentdata[$i]->floor_ids);
                  $rentdata[$i]->acessbility_ids =  explode(',', $rentdata[$i]->acessbility_ids);
            }

            for ($j = 0; $j < count($saledata); $j++) {
                  $saledata[$j]->image =  explode(',', $saledata[$j]->image);
                  $saledata[$j]->project_type_ids =  explode(',', $saledata[$j]->project_type_ids);
                  $saledata[$j]->outside_ids =  explode(',', $saledata[$j]->outside_ids);
                  $saledata[$j]->exposure_ids =  explode(',', $saledata[$j]->exposure_ids);
                  $saledata[$j]->floor_ids =  explode(',', $saledata[$j]->floor_ids);
                  $saledata[$j]->acessbility_ids =  explode(',', $saledata[$j]->acessbility_ids);
            }
            // dd($saledata[0][0]->image);
            return view('Admin.properties', ['rentdata' => $rentdata, 'saledata' => $saledata]);
      }

      public function single_properties(Request $request, $id)
      {
            $property = Property::where('id', $id)->get();
            $property[0]->image =  explode(',', $property[0]->image);
            $property[0]->project_type_ids =  explode(',', $property[0]->project_type_ids);
            $property[0]->outside_ids =  explode(',', $property[0]->outside_ids);
            $property[0]->exposure_ids =  explode(',', $property[0]->exposure_ids);
            $property[0]->floor_ids =  explode(',', $property[0]->floor_ids);
            $property[0]->acessbility_ids =  explode(',', $property[0]->acessbility_ids);

            // dd($property);
            return view('Admin.sigle-properties', ['property' => $property]);
      }


      public function delete_properties(Request $request)
      {
            $id = $request->id;
            // dd($id);
            $User = Property::where('id', $id)->delete();

            return redirect()->back()->with('message', 'Property  successfully deleted!');
      }


      public function property_provider()
      {

            $data = DB::table('properties')
                  ->join('users', 'properties.provider_id', '=', 'users.id')
                  ->select('users.first_name', 'users.id', 'properties.provider_id', \DB::raw("count(properties.provider_id) as count"))
                  ->groupBy('users.id', 'users.first_name', 'properties.provider_id')
                  ->get();

            // dd($data);

            // $image=explode(',',$data[0]->image);

            return view('Admin.property-provider', ['data' => $data]);
      }


      public function delete_properties_provider(Request $request)
      {
            $id = $request->id;
            $User = User::where('id', $id)->delete();
            $data = Property::where('provider_id', $id)->delete();
            return redirect()->back()->with('message', 'Property Provider successfully deleted!');
      }






      public function provider_detail(Request $request)
      {
            $id = $request->id;

            $data = DB::table('users')
                  ->where('properties.provider_id', '=', $id)
                  ->join('properties', 'users.id', '=', 'properties.provider_id')
                  ->select('users.*', 'properties.*')
                  ->get();


            return view('Admin.provider-detail', ['data' => $data]);
      }

      public function sales_list()
      {


            $data = DB::table('properties')
                  ->join('sales', 'properties.id', '=', 'sales.property_id')
                  ->join('users', 'sales.provider_id', '=', 'users.id')
                  ->select('properties.id', 'properties.property_name', 'properties.image', 'properties.location', 'users.first_name', 'users.last_name', 'sales.user_id', 'sales.price')
                  ->get();


            // dd($data);
            return view('Admin.sales-list', ['data' => $data]);
      }




      public function sales_detail(Request $request, $id)
      {

            $data = DB::table('properties')
                  ->join('sales', 'properties.id', '=', 'sales.property_id')
                  ->join('users', 'sales.provider_id', '=', 'users.id')
                  ->select('properties.id', 'properties.property_name', 'properties.image', 'properties.location', 'users.first_name', 'users.last_name', 'sales.user_id', 'sales.price')
                  ->where('properties.id', '=', $id)
                  ->get();

            // dd($data);

            $property = Property::where('id', $id)->get();
            $type =  ProjectType::get(['id', 'title']);
            $outside = Outside::get(['id', 'title']);
            $exposure = Exposure::get(['id', 'title']);
            $floors = Floors::get(['id', 'title']);
            $accessbility = Accessbility::get(['id', 'title']);
            $property[0]->image =  explode(',', $property[0]->image);
            $property[0]->project_type_ids =  explode(',', $property[0]->project_type_ids);
            $property[0]->outside_ids =  explode(',', $property[0]->outside_ids);
            $property[0]->exposure_ids =  explode(',', $property[0]->exposure_ids);
            $property[0]->floor_ids =  explode(',', $property[0]->floor_ids);
            $property[0]->acessbility_ids =  explode(',', $property[0]->acessbility_ids);


            return view('Admin.sales-detail', ['type' => $type, 'outside' => $outside, 'exposure' => $exposure, 'floors' => $floors, 'accessbility' => $accessbility, 'property' => $property, 'data' => $data]);
      }

      public function profile()
      {
            $id = Auth::user()->id;

            $data = User::where('id', '=', $id)->get();

            return view('Admin.profile', ['data' => $data]);
      }

      public function edit_profile()
      {
            $id = Auth::user()->id;

            $data = User::where('id', '=', $id)->get();

            return view('Admin.edit-profile', ['data' => $data]);
      }



      public function progress_bar(Request $request)

  {

    $id = $request->input('id');

    if ($id == 'Y') {

      $sold = DB::table('properties')
       ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '2')
        ->whereYear('sales.created_at', date('Y'))
        ->count();

      $property_count = Sale::count();

      $rent = DB::table('properties')
      ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('properties.type', '1')
        ->whereYear('sales.created_at', date('Y'))
        ->count();
    } elseif ($id == 'M') {

      $sold = DB::table('properties')
       ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '2')
        ->whereMonth('sales.created_at', date('m'))
        ->count();

      $property_count = Sale::count();

      $rent = DB::table('properties')
         ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('properties.type', '1')
        ->whereMonth('sales.created_at', date('m'))
        ->count();
    } elseif ($id == 'W') {

      $sold = DB::table('properties')
          ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '2')
        ->whereBetween(
          'sales.created_at',
          [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )

        ->count();

      $property_count = Sale::count();
      $rent = DB::table('properties')
          ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '1')
        ->whereBetween(
          'sales.created_at',
          [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )
        ->count();
    } elseif ($id == 'D') {

      $sold = DB::table('properties')
         ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '2')
        ->whereDate('sales.created_at', Carbon::today())
        ->count();

      $property_count = Sale::count();
      $rent = DB::table('properties')
         ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '1')
        ->whereDate('sales.created_at', Carbon::today())
        ->count();
    }
    return response()->json(['success' => true, 'sale' => $sold, 'total' => $property_count, 'rent' => $rent, 'id' => $id]);
  }

  public function circle_chart(Request $request)

      {

            $id = $request->input('id');
            
     if ($id == 'Y')

         {

      $sold = DB::table('properties')
       ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '2')
        ->whereYear('sales.created_at', date('Y'))
        ->count();

      $rent = DB::table('properties')
       ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '1')
        ->whereYear('sales.created_at', date('Y'))
        ->count();

    } 

    elseif ($id == 'M')

      {

      $sold = DB::table('properties')
       ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '2')
        ->whereMonth('sales.created_at', date('m'))
        ->count();

   
      $rent = DB::table('properties')
       ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '1')
        ->whereMonth('sales.created_at', date('m'))
        ->count();

    }
    
     elseif ($id == 'W') 
        
    {

      $sold = DB::table('properties')
         ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '2')
        ->whereBetween(
          'sales.created_at',
          [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )

        ->count();

   
      $rent = DB::table('properties')
         ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '1')
        ->whereBetween(
          'sales.created_at',
          [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )
        ->count();

    }
     elseif ($id == 'D') 

     {

      $sold = DB::table('properties')
         ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '2')
        ->whereDate('sales.created_at', Carbon::today())
        ->count();

    
      $rent = DB::table('properties')
         ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '1')
        ->whereDate('sales.created_at', Carbon::today())
        ->count();
    }


                return response()->json(['success' => true, 'sale' => $sold, 'rent' => $rent, 'id' => $id]);
      }




      public function subcategory(Request $request)
      {
            $id = $request->input('id');

            $ids = [];
            $names = [];

            $category = Categories::where('store', $id)->get(['id', 'name']);

            for ($i = 0; $i < count($category); $i++) {
                  array_push($ids, $category[$i]->id);
                  array_push($names, $category[$i]->name);
            }
            // $index= Voucher_aval::where('category_id',$id)->max('category_index');

            return response()->json(['success' => true, 'subcategory' => $names, 'ids' => $ids]);
      }



      /*     profile update     */

      public function update(Request $request)
      {
            $request->validate([
                  'first_name' => 'required',
                  'last_name' => 'required',
                  'phone_number' => 'required|max:10',
                  'alt_phone_number' => 'max:10',
                  'address' => 'required',
            ]);
            $User = User::find($request->id);
            $User->first_name = $request->first_name;
            $User->last_name = $request->last_name;
            $User->email = $request->email;
            $User->phone_number = $request->phone_number;
            $User->alt_phone_number = $request->alt_phone_number;
            $User->address = $request->address;
            if ($request->image) {

                  $image = $request->file('image');

                  $name = time() . '.' . $image->getClientOriginalExtension();

                  $destinationPath = 'User-images';

                  $image->move($destinationPath, $name);
                  $User->image = $name;
            }

            $update = $User->save();

            if ($update) {
                  return redirect()->back()->with('message', 'Profile Successfully Updated!');
            }
      }
      public function change_password()
      {
            return view('Admin.change-password');
      }
      /*     forgot password     */

      public function update_password(Request $request)
      {
            $request->validate([
                  'oldpass' => 'required',
                  'newpass' => 'min:6|required',
                  'cnewpass' => 'min:6|required',
            ]);

            if (Hash::check($request->oldpass, auth()->user()->password)) {
                  if (!Hash::check($request->newpass, auth()->user()->password)) {
                        if ($request->newpass == $request->cnewpass) {


                              $user = User::find(auth()->id());
                              $user->update([
                                    'password' => bcrypt($request->newpass),
                                    'plane_password' => $request->newpass
                              ]);

                              return redirect()->back()->with('message', 'Password updated successfully!');
                        } else {

                              return redirect()->back()->with('message', 'Password mismatched!');
                        }
                  }

                  return redirect()->back()->with('message', 'New password can not be the old password!');
            }

            return redirect()->back()->with('message', 'Old password does not matched!');
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
        if($end_date == 'above')
         {
              $property = Property::orWhere('living_area', '>' ,$start_date)
          ->orWhere('land_area','>',$start_date)
            ->where('type',2)
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
           $property = Property::orWhereBetween('living_area', [$start_date, $end_date])
          ->orWhereBetween('land_area', [$start_date, $end_date])
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
          elseif($floor!=null && $surface!=null){
              
              $property = Property::orwhere('properties.floor_ids','LIKE', '%'. $floor . '%')
            ->orwhere('properties.surface_ids','LIKE', '%'. $surface . '%')
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
        
       
         if($end_date == 'above')
         {
              $property = Property::orWhere('living_area', '>' ,$start_date)
          ->orWhere('land_area', '>' ,$start_date)
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
        
           $property = Property::orWhereBetween('living_area', [$start_date, $end_date])
          ->orWhereBetween('land_area', [$start_date, $end_date])
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
        //   dd($property);
              
          }
          elseif($floor!=null && $surface!=null){
              
              $property = Property::orwhere('properties.floor_ids','LIKE', '%'. $floor . '%')
            ->orwhere('properties.surface_ids','LIKE', '%'. $surface . '%')
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
