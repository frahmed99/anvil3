<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $id = Auth::user()->id;
        $profile = User::find($id);
        return view('backend.pages.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = User::find(Auth::user()->id);
        $profile->name = $request->name;
        $profile->email = $request->email;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('media/upload/user_images' . $profile->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('media/upload/user_images'), $filename);
            $profile['profile_photo_path'] = $filename;
        }
        $profile->save();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('user.index');
    }
}
