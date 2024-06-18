<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;
use App\Models\Property;
use App\Models\ProjectType;
use App\Models\Outside;
use App\Models\Exposure;
use App\Models\Floors;
use App\Models\Accessbility;
use App\Models\Surfaces;
use App\Models\Sale;
use DB;
use Carbon\Carbon;

class UserController extends Controller
{

  public function index()
  {
    $rentdata = DB::table('properties')
      ->where('provider_id', Auth::user()->id)
      ->where('type', '1')
      ->get();

    $saledata = DB::table('properties')
      ->where('provider_id', Auth::user()->id)
      ->where('type', '2')
      ->get();

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
      ->where('sales.provider_id', Auth::user()->id)
      ->count();

    $property_count = Sale::count();

    $rent = DB::table('properties')
      ->join('sales', 'properties.id', '=', 'sales.property_id')
      ->select('properties.*', 'sales.*')
      ->where('properties.type', '1')
      ->where('sales.provider_id', Auth::user()->id)
      ->count();


    $soldproperty = DB::table('properties')
      ->join('sales', 'properties.id', '=', 'sales.property_id')
      ->select('properties.*', 'sales.*')
      ->where('properties.type', '2')
      ->orderBy('sales.id', 'desc')
      ->where('sales.provider_id', Auth::user()->id)
      ->limit(3)
      ->get();


    return view('User.dashboard', [
      'rentdata' => $rentdata, 'saledata' => $saledata, 'sold' => $sold, 'rent' => $rent, 'soldproperty' => $soldproperty,
      'property_count' => $property_count
    ]);
  }



  public function properties()
  {
    return view('User.properties');
  }

  public function add_property()
  {
    return view('User.addproperty');
  }

  public function edit_property()
  {
    return view('User.edit-property');
  }

  public function single_properties()
  {
    return view('User.sigle-properties');
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


    return view('User.sales-detail', ['type' => $type, 'outside' => $outside, 'exposure' => $exposure, 'floors' => $floors, 'accessbility' => $accessbility, 'property' => $property, 'data' => $data]);
  }


  public function progress_bar(Request $request)

  {

    $id = $request->input('id');

    if ($id == 'Y') {

      $sold = DB::table('properties')
       ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '2')
        ->where('sales.provider_id', Auth::user()->id)
        ->whereYear('sales.created_at', date('Y'))
        ->count();

      $property_count = Sale::count();

      $rent = DB::table('properties')
      ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('properties.type', '1')
        ->where('sales.provider_id', Auth::user()->id)
        ->whereYear('sales.created_at', date('Y'))
        ->count();
    } elseif ($id == 'M') {

      $sold = DB::table('properties')
       ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '2')
        ->where('sales.provider_id', Auth::user()->id)
        ->whereMonth('sales.created_at', date('m'))
        ->count();

      $property_count = Sale::count();

      $rent = DB::table('properties')
         ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('properties.type', '1')
        ->where('sales.provider_id', Auth::user()->id)
        ->whereMonth('sales.created_at', date('m'))
        ->count();
    } elseif ($id == 'W') {

      $sold = DB::table('properties')
          ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '2')
        ->where('sales.provider_id', Auth::user()->id)
        ->whereBetween(
          'sales.created_at',
          [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )

        ->count();

      $property_count = Sale::count();
      $rent = DB::table('properties')
          ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '1')
        ->where('sales.provider_id', Auth::user()->id)
        ->whereBetween(
          'sales.created_at',
          [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )
        ->count();
    } elseif ($id == 'D') {

      $sold = DB::table('properties')
         ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '2')
        ->where('sales.provider_id', Auth::user()->id)
        ->whereDate('sales.created_at', Carbon::today())
        ->count();

      $property_count = Sale::count();
      $rent = DB::table('properties')
         ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '1')
        ->where('sales.provider_id', Auth::user()->id)
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
         ->where('sales.provider_id', Auth::user()->id)
        ->whereYear('sales.created_at', date('Y'))
        ->count();

      $rent = DB::table('properties')
       ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '1')
         ->where('sales.provider_id', Auth::user()->id)
        ->whereYear('sales.created_at', date('Y'))
        ->count();

    } 

    elseif ($id == 'M')

      {

      $sold = DB::table('properties')
       ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '2')
         ->where('sales.provider_id', Auth::user()->id)
        ->whereMonth('sales.created_at', date('m'))
        ->count();

   
      $rent = DB::table('properties')
       ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '1')
         ->where('sales.provider_id', Auth::user()->id)
        ->whereMonth('sales.created_at', date('m'))
        ->count();

    }
    
     elseif ($id == 'W') 
        
    {

      $sold = DB::table('properties')
         ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '2')
         ->where('sales.provider_id', Auth::user()->id)
        ->whereBetween(
          'sales.created_at',
          [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )

        ->count();

   
      $rent = DB::table('properties')
         ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '1')
         ->where('sales.provider_id', Auth::user()->id)
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
         ->where('sales.provider_id', Auth::user()->id)

        ->whereDate('sales.created_at', Carbon::today())
        ->count();

    
      $rent = DB::table('properties')
         ->join('sales', 'properties.id', '=', 'sales.property_id')
        ->where('type', '1')
         ->where('sales.provider_id', Auth::user()->id)
        ->whereDate('sales.created_at', Carbon::today())
        ->count();
    }


                return response()->json(['success' => true, 'sale' => $sold, 'rent' => $rent, 'id' => $id]);
      }









  public function sales_list()
  {

    $data = DB::table('properties')
      ->join('sales', 'properties.id', '=', 'sales.property_id')
      ->join('users', 'sales.provider_id', '=', 'users.id')
      ->select('properties.id', 'properties.property_name', 'properties.image', 'properties.location', 'users.first_name', 'users.last_name', 'sales.user_id', 'sales.price')
      ->where('properties.provider_id', Auth::user()->id)
      ->get();
    return view('User.sales-list', ['data' => $data]);
  }

  public function profile()
  {
    $id = Auth::user()->id;

    $data = User::where('id', '=', $id)->get();

    return view('User.profile', ['data' => $data]);
  }

  public function edit_profile()
  {
    $id = Auth::user()->id;

    $data = User::where('id', '=', $id)->get();

    return view('User.edit-profile', ['data' => $data]);
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
    return view('User.change-password');
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
}
