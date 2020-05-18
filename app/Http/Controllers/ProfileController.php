<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('pages.profile', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => [
                'required',
                'min:2',
                'max:60',
                Rule::unique('users')->ignore(Auth::user()->id)
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id)
            ],
            'description' => 'nullable|max:300',
            'password' => 'nullable|min:6|confirmed',
            'avatar' => 'nullable|image',
        ]);

        $user = Auth::user();
        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->back()->with('success', 'Profile has been updated');
    }
}
