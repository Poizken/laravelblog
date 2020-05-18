<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:60|unique:users',
            'email' => 'required|email|unique:users',
            'description' => 'nullable|max:300',
            'password' => 'required|min:6|confirmed',
            'avatar' => 'nullable|image',
        ]);
        $user = User::addUser($request->all());
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->route('admin.users.index')->with('success', 'New user has been registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => [
                'required',
                'min:2',
                'max:60',
                Rule::unique('users')->ignore($id)
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id)
            ],
            'description' => 'nullable|max:300',
            'password' => 'nullable|min:6|confirmed',
            'avatar' => 'nullable|image',
        ]);
        $user = User::find($id);
        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->route('admin.users.index')->with('success', 'User\'s data have been modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $name = $user->name;
        $user->remove();

        return redirect()->route('admin.users.index')->with('success', "User {$user->name} was removed");
    }

    public function toggle($id)
    {
        if ($id == \Auth::user()->id) {
            return redirect()->back()->withErrors('You can\'t ban yourself');
        }
        $user = User::find($id);
        $user->switchBan();

        return redirect()->route('admin.users.index')->with('success', "User's status has been switched");
    }
}
