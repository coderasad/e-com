<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;
use Illuminate\Support\facades\Auth;
use Hash;

class ChangePassword extends Controller
{
    public function ChangePassword(){
        return view('auth.passwordchange');
    }
    public function UpdatePassword(Request $request){
        $password = Auth::user()->password;
        $old_pass = $request->old_password;
        if (Hash::check($old_pass,$password)) {
            $validatedData = $request->validate([
                'password' => 'required|min:1',
            ]);
            $new_pass = $request->password;
            $con_pass = $request->new_password;
            if($new_pass == $con_pass){
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                toast('Password Change Successfully','toast_success')->position('top-end')->width('auto')->padding('5px')->background('#28a745')->timerProgressBar();
                return Redirect()->route('login');
            }
            else{
                toast('Password Not Match','toast_success')->position('top-end')->width('auto')->padding('5px')->background('#dc3545')->timerProgressBar();
                return Redirect()->back();
            }
        }else {
            toast('Password Not Match','toast_success')->position('top-end')->width('auto')->padding('5px')->background('#dc3545')->timerProgressBar();
            return Redirect()->back();     
        }
    }
}
