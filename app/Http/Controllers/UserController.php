<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{  

    public function sighn_up(){

        return view('auth.register');
    }


    public function sighn_in(){

        return view('auth.login');
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
        ]);

        if($validator->fails()) {
       
             return redirect()->back()->withErrors(['errors'=>$validator->errors()->first()]);
             
           
        }
        
           
           $input = $request->all();
            $input['password'] = $input['password'];
            $user = User::create($input);
            return redirect()->to(route('sighn_in'));
             
        
          }




public function login(Request $request){


    $validator = Validator::make($request->all(), [
      
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:4',
    ]);

    if($validator->fails()) {
        return redirect()->back()->withErrors(['errors'=>$validator->errors()->first()]);
    }
    $user=User::where('email',$request->email)->first();
    if($user&& $user->password==$request->password)
{ 
     Auth::login($user);
     return redirect()->intended();
}
else{
   
    return redirect()->back()->withErrors(['errors'=>'email or password is incorrect']);

}


}

public function logout(){

Auth::logout();
return redirect()->to(route('home'));


}




      public function index()
      {
   
       return view('admin',['users'=>$users]);




      }



   public function show(){
    $user=Auth::user();
    $bookings=$user->bookings;
   
    return view('protfolio',['bookings'=>$bookings]);


      }


   public function delete($id){


    $user=User::findOrFail($id);
    return view('delete_user',['user'=>$user]);
   }


   public function destroy( User $user){


    $user->delete();
    return redirect()->to(route('dashboard'));
   }


   
   public function cancel( User $user){


  
    return redirect()->to(route('dashboard'));
   }





 }

