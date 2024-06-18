<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\Models\User;
use App\Models\UserOtp;
use Validator;
use App\Mail\TestMail;
use Hash;
use DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Session;
class CommonController extends Controller
{
         /* Login Api */
    
    public function login(Request $request)
    { 
        
       $rules=array(
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean',
        );
        
        $messages=array(
            'email.required' => 'Please enter Email.',
            'password.required' => 'Please enter Password .',
            'email.email' => 'Please enter valid Email address.'
        );
        
        $validator = Validator::make( $request->all(), $rules, $messages );

        if ( $validator->fails() ) 
        {
            return response()->json([
                'status_code' => 0,
                'status_text' => 'Failed',
                'message' => $validator->errors()->first()
            ],400);
        }
        else
        { 

        $credentials = request(['email','password','role'=>'3']);
          
        if(!Auth::attempt($credentials))
             return response()->json([ 'status_code' => 0,
                'status_text' => 'Failed',
                'message' => 'Invalid credentials.'
        ], 401);
        
        
        $user = $request->user();
        
        $tokenResult = $user->createToken('Personal Access Token');
    
        $token = $tokenResult->token;
       
      
        if ($request->remember_me)
        $token->expires_at = Carbon::now()->addHours(24);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),
            'user_id'=>$user->id,
        ]);
        }
    }
    
    /* Register Api */ 

    public function signup(Request $request) 
    { 
    //   print_r($request->all());
        $rules=array(
             'first_name' => 'required',
             'last_name' => 'required',
             'email' => 'required|string|email',
             'password' => 'required|string',
             'phone_number' => 'required|max:10',
        );
        
        $messages=array(
            'first_name.required' => 'Please enter First name.',
            'last_name.required' => 'Please enter Last name.',
            'email.required' => 'Please enter Email.',
            'email.email' => 'Please enter valid Email address.',
            'password.required' => 'Please enter Password .',
            'phone_number.required' => 'Please enter Phone number.',
            'phone_number.max:10' => 'The phone number must not be greater than 10 characters.',
        );
        
        $validator = Validator::make($request->all(), $rules, $messages );

        if ( $validator->fails() ) 
        {
             return response()->json([
                'status_code' => 0,
                'status_text' => 'Failed',
                'message' => $validator->errors()->first()
            ],400);
        }
        else
        { 

            $user = new User([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'plane_password'=>$request->password,
                'phone_number' => $request->phone_number,
                'role' => '3',
                'status'=>'0'
            ]);

            $user->save();
            
            return response()->json(['status_code'=>1,'status_text'=>'Success','message' => 'User created successfully !'], 200); 
        }
    }
    
    /* Forgot password send otp api*/

    public function sendverificationcode(Request $request) 
    {   
        $email = $request->email;

        $data = $request->all();

        $rules=array(
            'email' => 'required|email',
        );
        
        $messages=array(
            'email.required' => 'Please enter Email.',
            'email.email' => 'Please enter valid Email address.',
        );
        
        $validator = Validator::make( $request->all(), $rules, $messages );

        if ( $validator->fails() ) 
        {
             return response()->json([
                'status_code' => 0,
                'status_text' => 'Failed',
                'message' => $validator->errors()->first()
            ],400);
        }
        else
        {  
            $optdata = UserOtp::where('email',$email)->get(); 
            $user_id = User::where('email',$request->email)->get(['id']);
            
            if(sizeof($user_id))
            {
                $otp = rand(100000,999999);
       
                if(sizeof($optdata))
                {
                    $user = UserOtp::where('email','=',$request->email)->update(['otp' => $otp]);
                    $details = [
                        'body'=>'your verification code',
                        'otp'=>$otp,
                    ];
                     
                    \Mail::to($email)->send(new TestMail($details));
                    return response()->json(['status_code'=>1,'status_text'=> 'Success','message'=>'Otp sent on your mail!','otp'=>$otp,'email'=>$email]); 
                }

                else
                {

                    $user = UserOtp::create([
                        'email' => $email,
                        'otp' => $otp 
                    ]);

                    $details = [
                       'otp'=>$otp,
                    ];
              
                    \Mail::to($email)->send(new TestMail($details));
       

                    return response()->json(['status_code'=>1,'status_text'=>'Success','message'=>'Otp sent on your mail!','otp'=>$otp,'email'=>$email]);
                } 
                
              }
              else
              {
                   return response()->json(['status_code'=>0,'status_text'=>'Failed','message'=>'Email not exist.']);
              }
        }
    }
    
    
    /* Forgot password verify otp api*/
    
   
    public function verifyotp(Request $request) 
    {   
        $data = $request->all();

        $otp = $request->otp;
        
        $email = $request->email;
      
        $rules=array(
            'email' => 'required|email',
            'otp' => 'required',
        );
        
        $messages=array(
            'email.required' => 'Please enter Email.',
            'email.email' => 'Please enter valid Email address.',
            'otp.required' => 'Please enter otp.',
        );
        
        $validator = Validator::make( $request->all(), $rules, $messages );

        if ( $validator->fails() ) 
        {
             return response()->json([
                'status_code' => 0,
                'status_text' => 'Failed',
                'message' => $validator->errors()->first()
            ],400);
        }
        else
        {  

       
            $optdata = UserOtp::where('email',$email)->where('otp',$otp)->get();
          
            if(sizeof($optdata))
            {
               return response()->json(['status_code'=>1,'status_text'=>'Success','message'=>'OTP verfied Successfully !','email'=>$request->email]);
            }
            else
            {
               return response()->json(['status_code'=>0,'status_text'=> 'Failed','message'=>'Invalid otp']);
            }
        }
    }
    
    
    /* Forgot change password api */

    public function forgot_change_password(Request $request) 
    {  
       
        $new_password = $request->new_password;

        $confirm_password = $request->confirm_password;

        $email = $request->email;
        
        $rules=array(
            'email' => 'required|email',
            'new_password' => 'required',
            'confirm_password' => 'required',
        );
        
        $messages=array(
            'email.required' => 'Please enter Email.',
            'email.email' => 'Please enter valid Email address.',
            'new_password.required' => 'Please enter new Password .',
            'confirm_password.required' => 'Please enter a conform password.'
        );
        
        $validator = Validator::make( $request->all(), $rules, $messages );

        if ( $validator->fails() ) 
        {
            return response()->json([
                'status_code' => 0,
                'status_text' => 'Failed',
                'message' => $validator->errors()->first()
            ],400);
        }
        else
        {  

            $user_id = User::where('email',$request->email)->get(['id']);
    
            if(sizeof($user_id))
            {
                if($new_password == $confirm_password)            {
            
                        $password = Hash::make($request->new_password);
                       
                        $user = User::where('email',$email)->update(['password'=>$password,'plane_password'=>$new_password]);
                        
                        return response()->json(['status_code'=>1,'status_text'=>'Success','message'=>'Password changed successfully !']);
                }
                else
                {
                
                      return response()->json(['status_code'=>0,'status_text'=> 'Failed','message'=>'Password not match']);
                }
    
            }
            else
            {
    
                return response()->json(['status_code'=>0,'status_text'=>'Failed','message'=>'Email not exist.']);
            }
            
        }
    }
    
    
    /* logout API */  

    public function logout(Request $request) 
    {
        $request->user()->token()->revoke();

        return response()->json([
             'status_code' => 1,
                'status_text' => 'Success',
            
                'message' => 'Logged out successfully !'
        ]);
    }
    
    
    /* Fetch user details */

    public function user_details(Request $request) {

        $id = Auth::user()->id;

        $user = User::where('id',$id)->get(['id','first_name','last_name','email','role','address','phone_number','image']);
        
        $langId  = $request->langId;
        
        Session::put('langId', $langId);
       
          
        if($langId != null){
            
        
        for($i = 0;$i<count($user);$i++){
          
          $user[$i]->first_name = GoogleTranslate::trans($user[$i]->first_name,$langId);
          if($user[$i]->last_name != null){
             $user[$i]->last_name = GoogleTranslate::trans($user[$i]->last_name,$langId);
              }
               if($user[$i]->address != null){
              $user[$i]->address = GoogleTranslate::trans($user[$i]->address,$langId);
               } 
          
        }  
        }else{
          Session::put('langId', 'en');
         $user = User::where('id',$id)->get(['id','first_name','last_name','email','role','address','phone_number','image']);
        }
       
        if($user)
        {
            $data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'User Data Fetched Successfully !';
            $data['data']      =         $user;  
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
    
    
    /* Change password API  */
    
    public function changepassword(Request $request) 
    {  
        
        $rules=array(
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        );
        
        $messages=array(
            'current_password.required' => 'Please enter current password.',
            'new_password.required' => 'Please enter new Password .',
            'confirm_password.required' => 'Please enter a conform password.'
        );
        
        $validator = Validator::make( $request->all(), $rules, $messages );

        if ( $validator->fails() ) 
        {
             return response()->json([
                'status_code' => 0,
                'status_text' => 'Failed',
                'message' => $validator->errors()->first()
            ],400);
        }
        else
        {  

            $user_type = Auth::user()->role;

            if($user_type=='3')
            {
                $current_password = $request->current_password;
                
                $new_password = $request->new_password;
        
                $confirm_password = $request->confirm_password;
                
                if (!(Hash::check($current_password , auth()->user()->password))) 
                {
                    return response()->json(['status_code'=>0,'status_text'=> 'Failed','message'=>'Current password not match !']); 
                }

                if ((Hash::check($new_password , auth()->user()->password))) 
                {
                    return response()->json(['status_code'=>0,'status_text'=> 'Failed','message'=>'New Password cannot be same as your current password!']); 
                }
        
                if($new_password == $confirm_password)
                {
                    $user = Auth::user();
                    $user->plane_password = $request->new_password;
                    $user->password = Hash::make($request->new_password);
                    $user->save();
                    return response()->json(['status_code'=>1,'status_text'=> 'Success','message'=>'Password changed successfully !']);
                }
                else
                {
                    return response()->json(['status_code'=>0,'status_text'=>'Failed','message'=>'Password not match']);
                }
            }
            else
            {
                return response()->json([
                    'status_code'=>0,'status_text'=>'Failed',
                    'message' => 'Unauthorized.'
                ], 401);
            } 
       }
    }
    
    
    /* Delete user api*/

    public function delete_user(Request $request)
    {   
        $id = Auth::user()->id;

        $user = User::Where('id',$id)->delete();

        return response()->json(['message' => 'You have been successfully deleted your account!'], 200); 
    }
    
    /* Edit profile api*/

    public function edituser(Request $request)
    {

        $id = Auth::user()->id;
        
        $first_name = $request->first_name;
        
        $last_name = $request->last_name;
        
        $phone_number = $request->phone_number;
        
        $alternate_phone_number = $request->alternate_phone_number;

        $image = $request->image;
        
        $address  = $request->address;
             
        $user_type = Auth::user()->role;
        
        $user = User::where('id',$id)->get();

        if($user_type=='3')
        {
            if($request->image)
            {
                $file = $request->file('image');
    
                $extention = $file->getClientOriginalExtension();
    
                $filename = time().'.'.$extention;
    
                $file->move('User-images/', $filename);
    
                $user_meta= User::where('id',$id)->update([ 'image'=>$filename]);
            }
        
            if($request->first_name)
            {
                $user_meta= User::where('id',$id)->update(['first_name'=>$first_name]);
            }
            else
            {
                $user_meta= User::where('id',$id)->update(['first_name'=>$user[0]->first_name]);
            }
             if($request->last_name)
            {
                $user_meta= User::where('id',$id)->update(['last_name'=>$last_name]);
            }
            else
            {
                $user_meta= User::where('id',$id)->update(['last_name'=>$user[0]->last_name]);
            }

            if($request->phone_number)
            {
                $user_meta= User::where('id',$id)->update(['phone_number'=>$phone_number]);
            }
    
            else
            {
                $user_meta= User::where('id',$id)->update(['phone_number'=>$user[0]->phone_number]);
            }
            
            if($request->alternate_phone_number)
            {
                $user_meta= User::where('id',$id)->update(['alt_phone_number'=>$alternate_phone_number]);
            }
            else
            {
                $user_meta= User::where('id',$id)->update(['alt_phone_number'=>$user[0]->alternate_phone_number]);
            }
            
            if($request->address)
            {
                $user_meta= User::where('id',$id)->update(['address'=>$address]);
            }
            else
            {
                $user_meta= User::where('id',$id)->update(['address'=>$user[0]->address]);
            }
            
            $user = User::where('id',$id)->get(['id','first_name','last_name','email','role','address','phone_number','image']);
            
            $langId  = $request->langId;
        
            Session::put('langId', $langId);
           
              
            if($langId != null){
                
            
            for($i = 0;$i<count($user);$i++){
              
              $user[$i]->first_name = GoogleTranslate::trans($user[$i]->first_name,$langId);
               if($user[$i]->last_name != null){
             $user[$i]->last_name = GoogleTranslate::trans($user[$i]->last_name,$langId);
              }
               if($user[$i]->address != null){
              $user[$i]->address = GoogleTranslate::trans($user[$i]->address,$langId);
               } 
            }  
            }else{
              Session::put('langId', 'en');
             $user = User::where('id',$id)->get(['id','first_name','last_name','email','role','address','phone_number','image']);
            }
       

            if($user)
            {
                $data['status_code']    =   1;
                $data['status_text']    =   'Success';             
                $data['message']        =   'Profile Updated Successfully';
                $data['data']      =         $user;  
            }
            else
            {
                $data['status_code']    =   0;
                $data['status_text']    =   'Failed';             
                $data['message']        =   'Profile Not Updated !';
                $data['data']           =    [];  
            }
            
            return $data;

        }
        else
        {
            return response()->json(['status_code'=>0,'status_text'=>'Failed','message' => 'Unauthorized.'], 401);
        } 
    }
}
