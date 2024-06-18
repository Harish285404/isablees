<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\Models\User;
use File;
class GoogleSocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {
     
            $user = Socialite::driver('google')->stateless()->user();
         
      
            $finduser = User::where('google_id', $user->id)->first();
      
            if($finduser){
      
                Auth::login($finduser);
     
                return redirect('/user');
      
            }else{
                  $name = explode(" ",$user->name);
                   $first_name = $name[0];
                   if(count($name)>1){
                    $last_name = $name[1];
                   }else{
                        $last_name = null;
                   }
                
                 if(!empty($user->getAvatar()) && $user->getAvatar()!='' && $user->getAvatar() != null)
                  {
                    $fileContents = file_get_contents($user->getAvatar());
                    File::put('/home2/chainpul/public_html/immotep.chainpulse.tech/'.'/User-images/' . $user->getId() . ".jpg", $fileContents);
                    $avatar_file_name =  $user->getId() . ".jpg";
                 
                    $newUser = User::create([
                    'first_name' => $first_name,
                     'last_name' => $last_name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'image'=>$avatar_file_name,
                    'role'=>'2',
                    'status'=>'0'
                    
                ]);
     
                Auth::login($newUser);
      
                return redirect('/user');
                  }
                 
                $newUser = User::create([
                     'first_name' => $first_name,
                     'last_name' => $last_name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'role'=>'2',
                    'status'=>'0'
                    
                ]);
     
                Auth::login($newUser);
      
                return redirect('/user');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
