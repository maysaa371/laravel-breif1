<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class AppProfileAdminController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();

        return view('Admin.layout.app-profile', compact('users'));

    }


public function editImage(Request $request,$id)
{
    // Retrieve the user based on the provided ID
    $user = User::findOrFail($id);

// Save the profile image
if ($request->hasFile('profileimage')) {
    $file = $request->file('profileimage');
    $filename = time() . '.' . $file->getClientOriginalExtension();
    $file->move('uploads/images/', $filename);
    $user->img = $filename;
}
    return redirect()->back();
}
public function update(Request $request, $id)
{
    $user = User::find($id);
    $user->fname = $request->input('fname');
    $user->lname = $request->input('lname');
    $user->img = $request->input('img');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    $user->password = $request->input('password');
    $user->save();

    return redirect()->route('app-profile', $user->id)
        ->with('success', 'User updated successfully');
}

}
