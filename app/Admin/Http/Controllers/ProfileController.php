<?php

namespace App\Admin\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function editProfile()
    {
        /** @var Admin $admin */
        $admin = Auth::user();

        return view('admin::pages.profiles.edit-profile', compact('admin'));
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required'

        ]);

        /** @var Admin $admin */
        $admin = \Auth::user();
        $admin->name = $request->get('name');
        $admin->save();

        return redirect()->route('admin.home');
    }

    public function changePassword(){

        return view('admin::pages.profiles.change-password');
    }

    public function updatePassword(Request $request)
    {
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return redirect()->route('admin.profile.change-password')->with("error","Your current password does not matches with old password");
        }
        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            return redirect()->route('admin.profile.change-password')->with("error","New Password cannot be same as your current password.");
        }
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirmation_password' => 'required|same:new_password'

        ]);

        /** @var Admin $admin */
        $admin = Auth::user();
        $admin->password = Hash::make($request->get('new_password'));
        $admin->save();

//        try {
//            Mail::send(new UserWelcomeMail($admin));
//        } catch (\Exception $e) {
//            logger()->error($e->getMessage(), ['exception' => $e]);
//        }

        return redirect()->route('admin.home')->with('success', "Password updated");
    }
}
