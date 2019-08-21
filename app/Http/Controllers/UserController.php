<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('auth/edit', array('user' => $user));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
        ]);

        $id = User::findOrFail($data->id);

        User::whereId($id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

    }
}
