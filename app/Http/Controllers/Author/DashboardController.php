<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\user;
use DB;
use Illuminate\Support\facades\Auth;

class DashboardController extends Controller
{

    public function index(){
        $data = [
            'order' =>  DB::table('orders')->where('user_id',Auth::id())->orderBy('id','DESC')->paginate(4)
        ];
        return view('author.dashboard')->with($data); 
    }

    // orderView
    public function orderView($id){
        $data = [
            'order_view' =>  DB::table('order_details')
                            ->join('products','order_details.product_id','products.id')
                            ->select('order_details.*','products.product_details','products.image_one','products.product_name')
                            ->where('order_details.order_id',$id)
                            ->get()
        ];
        return view('author.order_view')->with($data); 
    }

    public function edit_profile($id){   
        $data['user'] = user::findorfail($id);
        return view('author.edit')->with($data); 
    }

    public function profile_update(Request $request, $id){

        $validatedData = $request->validate([
            'name' => 'required|min:3|max:25',
            'email' => 'required|unique:users,email,'.$id.'id|max:55',
        ]);

        $image = $request->file('img');
         
        if($image){
            $ext = '.'.strtolower($image->getClientOriginalExtension());
            $user = user::findorfail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->img = $ext;
            $user->save();            
            $id = $user->id;        
            $image_name = $id.'-author'.$ext;
            $upload_path = 'public/frontend/images/author/';
            $success = $image->move($upload_path,$image_name);             
            toast('Profile Updated Successfully!','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#28a745')->animation('tada faster','fadeInUp faster')->timerProgressBar();
            return redirect()->to('author/dashboard');
        }else{
            $data = [                
                'name' => $request->name,
                'email' => $request->email
            ];
            $db = DB::table('users')->where('id', $id)->update($data);       
            if($db){
                toast('Profile Updated Successfully!','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#28a745')->animation('tada faster','fadeInUp faster')->timerProgressBar();
                return redirect()->to('author/dashboard');
            }
            else{
                toast('Nothing to updated','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#17a2b8')->animation('tada faster','fadeInUp faster')->timerProgressBar();
                return redirect()->to('author/dashboard');
            }
        }
    }
       
    public function ChangePassword(){  
        return view('author.passwordchange');
    }
    public function UpdatePassword(Request $request){
        $password = Auth::user()->password;
        $old_pass = $request->old_password;
        if (Hash::check($old_pass,$password)) {
            $validatedData = $request->validate([
                'password' => 'required|min:8',
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
                toast('Confirm Password Not Match','toast_success')->position('top-end')->width('auto')->padding('5px')->background('#dc3545')->timerProgressBar();
                return Redirect()->back();
            }
        }else {
            toast('Old Password Not Match','toast_success')->position('top-end')->width('auto')->padding('5px')->background('#dc3545')->timerProgressBar();
            return Redirect()->back();     
        }
    }
}
