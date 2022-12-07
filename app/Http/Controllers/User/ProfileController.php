<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('backend.pages.profile.', compact('user'));
    }
}
