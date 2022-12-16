<?php
namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

//  This controller handles users, users authorization and authentication

class AuthController extends Controller
{
    public function create(){
        return view('pages.register'); 
    }

    //  This Function  Create new user 
    public function store(Request $request){
        $formFields = $request->validate([
            'name'=>['required', 'min:2'],
            'email'=>['required', 'email', Rule::unique('users', 'email')],
            'photo'=> 'mimes:jpg,jpeg,png',
            'password'=>'required|confirmed|min:2'
        ]);

        // Hash password
        $formFields['password']= bcrypt($formFields['password']);
        # Profile photo upload and resizing 
        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo');
            $extention = $formFields['photo']->getClientOriginalExtension();
            $filename =time().'.'.$extention;
            Image::make( $formFields['photo'])->resize(300, 200)->save('profile/'. $filename, 100);
            $formFields['photo']='profile/'. $filename;
        }


        $user =User::create($formFields);
        // login 
        auth()->login($user);
        return redirect('/');
    }

    //  Update user 
    public function update(){
        return view('pages.update');
       }

       
    //    Update User Profile
    public function updateUser(Request $request, $id){ 
        
        $fields = $request->validate([
        'name'=>'required',
        'email'=>'required',
    ]);
     // Check if the user has a profile picture, resize and save picture in server
     if($request->hasFile('photo')){
        $file = $request->file('photo');
        $extention = $file->getClientOriginalExtension();
        $filename =time().'.'.$extention;
        Image::make($file)->resize(300, 200)->save('profile/'. $filename, 100);
       

        // Find and delete update picture 
        $user =User::find($id);
        $old_img =$user->photo;
     
        if($old_img){
            unlink($old_img);
        }     
        
        // update user with the new profile picture if there is a new profile picture
        $user->update([
            "name"=>$fields['name'],
            "email"=>$fields['email'],
            "photo"=> 'profile/'. $filename,
       ]);
    } 
    //  Update user without profile picture
        $user =User::find($id);
        $user->update([
        "name"=>$fields['name'],
        "email"=>$fields['email'],
   ]);
   return redirect('/');
}             
    public function loginform(){
        return view('pages.login');
       }
    
    //    Log a user into the app
    public function login(Request $request){
        $formFields = $request->validate([
            'email'=>['required', 'email'],
            'password'=>'required'
        ]);
   

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/');
        }
       

        return back()->withErrors(['email'=>'invalid Credentials'])->onlyInput('email');
    }

    //  Log a user out of the app
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}