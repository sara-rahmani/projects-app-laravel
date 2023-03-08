<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;



class UserController extends Controller
{
    public function create() {
        return view('admin.users.create')
        ->with('user', null);
        
    }
    public function store() {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required','email', 'unique:users,email'],
            'password' => ['required','min:8','confirmed'],
        ]);
        User::create($attributes);

        session()->flash('success','User Created Successfully');
        return redirect('/admin');
    }
    public function edit(User $user) {
        return view('admin.users.create')
        ->with('user', $user);    }

    public function update(User $user, Request $request) {
        // ddd(request()->all());

        $attributes = request()->validate([
            'name' => ['required','unique:users,name,'.$user->id],
        ]);




$user->update($attributes);

session()->flash('success','User Updated Successfully');
return redirect('/admin');

    }


    public function destroy(User $user) {
        //  ddd(request()->all());
        $user->delete();

        // Set a flash message
        session()->flash('success','User Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
}
