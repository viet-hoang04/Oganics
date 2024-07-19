<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\GuiEmail;


class UserController extends Controller
{
   function  handlelogin(request $request){
    $request->only('email','password');
    $email = $request->input('email');
    $pass = $request->input('password');
    
    $user = User::where('email',$email)->first();
    $canLogin=false;
    if(isset($user)){
        $canLogin= Hash::check($pass, $user->password);
    }
    // ($rqt->password, $user->password);


    if ($canLogin) {//cho đăng nhập
        Auth::login($user);
        // if(Auth::user()->role == "user"){
        //     return redirect()->route('home');
        // }
        // if(Auth::user()->role == "admin"){
        //     return redirect()->route('home');
        // }
             return redirect()->route('home');
    }else{
        $request->session()->put('message','Email hoặc mật khẩu không đúng!');
        return back();
    }
    
   }
   function register(){
    return view('register');
   }

   function handleregister(request $request){

      
    
        $email=$request->input('email');
        // $password=$request->input('password');
        // $repassword=$request->input('repassword');
        $user=User::where('email',$email)->first(); 
        if(isset($user)){
            $request->session()->put('message','Email đã tồn tại');
            // $request->session()->flash('message', 'Email đã tồn tại!');
            return back();
        }else{
            $user = new User();
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->password=$request->input('password');
            $user->phone=$request->input('phone');

            $user->save();
            return redirect()->route('login');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    public function profile()
    {   
        return view('acount');
    }
    public function edit()
    {   
        return view('editacount');
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'old_password' => 'string|min:1',
            'new_password' => 'string|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user = user::where('id',$user->id)->first();
        // dd($user);
        if (Hash::check($request->old_password,$user->password)) {
          $new_password = [
           'password'=> Hash::make($request->new_password),

          ];
          user::where('id',$user->id)->update($new_password);
          


           return redirect()->route('profile')->with('success', 'Cập nhật thành công.');
        }

        else{
           
            return redirect()->route('profile.edit')->with('error', 'Mật khẩu cũ không đúng.');
        }

        // if ($request->filled('password')) {
        //     // $user->password = Hash::make($request->password);
        // }

        // $user->save();

        // return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
    public function forgotpassword(){
        return view('forgotpassword');
    }
    public function new_password(Request $rqt){
        $validator = Validator::make($rqt->all(),[
            'email' => 'email|exists:users,email',
        ],[
            'email.email' => 'Email không hợp lệ',
            'email.exists' => 'Email không tồn tại',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($rqt->input());
        };
       
        $user = User::where('email', $rqt->email ?? $rqt->session()->get('email'))->first();
        $rqt->session()->put('email', $user->email);
        $token = strtoupper(Str::random(10));
        $user->update(["token" => $token]);
        Mail::to($user->email)->send(new GuiEmail($user));
        return view('newpassword');
    }
    public function handle_new_password(Request $rqt){
        $validator = Validator::make($rqt->all(), [
            'token' =>'exists:users,token',
            'password' => 'confirmed',
        ],[
            'token.exists' =>'Vui lòng nhập lại token',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp',
        ]);
        if ($validator->fails()) {
            // return redirect()->route('new_password');
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } 
        $rqt->session()->forget('email');
        // Update the user's password
        $user = user::where("token", "=", $rqt->token)->first();
        if($user && now()->diffInHours($user->updated_at) >= 1){
            return redirect()->route('forgotpassword');
        }
 
        $password = Hash::make($rqt->password);

        $user->update(["password" => $password]);
        return view('login');
    }
    public function user(){
        $users = User::all();
        return view('back_end.user',compact('users'));

    }
    public function adduser(){
        $users = User::all();
        return view('back_end.adduser',compact('users'));
    }
    public function store(Request $request)
    {
       
        $email=$request->input('email');
        // $password=$request->input('password');
        // $repassword=$request->input('repassword');
        $user=User::where('email',$email)->first(); 
        if(isset($user)){
            $request->session()->put('message','Email đã tồn tại');
            // $request->session()->flash('message', 'Email đã tồn tại!');
            return back();
        }else{
            $user = new User();
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->password=$request->input('password');
            $user->phone=$request->input('phone');

            $user->save();
            return redirect()->route('user');
        }

       
    }
    // public function updatead($id){
    //   $user = User::find($id);
    // //   dd($user);
    //   return view('back_end.edituser',compact('user'));

    // }
    
    // Sửa user
    // public function updatead(Request $request, $id)
    // {
    //     $user = Auth::user();

    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    //         'phone' => 'nullable|string|max:15', 
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user = user::where('id',$user->id)->first();
    //     return redirect()->route('user');
    // }

    // Xóa user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back();
    }
    
}

