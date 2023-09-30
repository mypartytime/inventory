<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        

        return redirect('/login');
    } // end method

    public function Profile(){

        $id = Auth::user()->id;
        $adminData = User::find($id);

        return view('admin.admin_profile_view',compact('adminData'));

    } // end method

    public function EditProfile(){

        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('admin.admin_profile_edit',compact('editData'));

    } // end method

    public function UpdateProfile(Request $request){

        $profile_id = Auth::user()->id;

        if($request->file('profile_image')){

            $image = $request->file('profile_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/admin_images/'.$name_gen);
            $save_url = $name_gen;

            User::findOrFail($profile_id)->update([

                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'profile_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'ตั้งค่าโปรไฟล์ใหม่เรียบร้อยแล้ว', 
                'alert-type' => 'info'
            );

            

            return redirect()->back()->with($notification);


        } else {

            User::findOrFail($profile_id)->update([

                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'ตั้งค่าโปรไฟล์ใหม่เรียบร้อยแล้ว', 
                'alert-type' => 'info'
            );

            

            return redirect()->back()->with($notification);

        } // End Eles 


    }// End Method 

    public function ChangePassword(){

        return view('admin.admin_change_password');

    }// End Method 

    public function UpdatePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message','เปลี่ยนรหัสผ่านเรียบร้อยแล้ว');
            return redirect()->route('admin.profile');
        } else{
            session()->flash('message','รหัสผ่านเก่าไม่ถูกต้อง');
            return redirect()->back();
        }

    }// End Method 
}
