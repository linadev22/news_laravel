<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Index()
    {
        return view('admin.auth.index');
    }
    public function UpdateProfile(Request $request)
    {
        $id = Auth::user()->id;
        $image = $request->image;
        if ($image) {
            //generate name
            $image_name = date('YmdHsi') . "." . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
            $image_path = 'Profile/' . $image_name;

            User::findOrFail($id)->update([
                'image' => $image_path,
                'name' => $request->name,
                'email' => $request->email,
                'created_at' => Carbon::now(),
            ]);
        } else {
            User::findOrFail($id)->update([
                // 'image' => $image_path,
                'name' => $request->name,
                'email' => $request->email,
                'created_at' => Carbon::now(),
            ]);
        }
        return back();
    }
    public function updatePassword(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);
        $hashPassword = User::find($id)->password;
        if (Hash::check($request->old_password, $hashPassword)) {
            User::findOrFail($id)->update([
                'password' => Hash::make($request->new_password),
            ]);
            Auth::logout();
        }
        return back();
    }
    public function List()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }
    public function UserForm()
    {
        $user = User::all();
        return view('admin.user.insert_user', compact('user'));
    }
    public function StoreUser(Request $request)
    {

        $image = $request->image;
        if ($image) {
            //generate name
            $image_name = date('YmdHsi') . "." . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
            $image_path = 'Profile/' . $image_name;

            User::insert([
                'image' => $image_path,
                'password' => Hash::make($request->phone),
                'name' => $request->name,
                'role' => $request->role,
                'email' => $request->email,
                'phone' => $request->phone,
                'created_at' => Carbon::now(),
            ]);
        } else {
            User::insert([
                // 'image' => $image_path,
                'password' => Hash::make($request->phone),
                'name' => $request->name,
                'role' => $request->role,
                'email' => $request->email,
                'phone' => $request->phone,
                'created_at' => Carbon::now(),
            ]);
        }
        return redirect()->route('user.index');
    }
    public function Edit()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.user.edit_form', compact('user', 'id'));
    }

    public function Update(Request $request, $id)
    {
        $id = Auth::user()->id;
        $image = $request->image;
        if ($image) {
            //generate name
            $image_name = date('YmdHsi') . "." . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
            $image_path = 'Profile/' . $image_name;

            User::findOrFail($id)->update([
                'image' => $image_path,
                'password' => Hash::make($request->phone),
                'name' => $request->name,
                'role' => $request->role,
                'email' => $request->email,
                'phone' => $request->phone,
                'created_at' => Carbon::now(),
            ]);
        } else {
            User::findOrFail($id)->update([
                // 'image' => $image_path,
                'password' => Hash::make($request->phone),
                'name' => $request->name,
                'role' => $request->role,
                'email' => $request->email,
                'phone' => $request->phone,
                'created_at' => Carbon::now(),
            ]);
        }
        return redirect()->route('user.index');
    }
    public function Delete($id)
    {
        User::findOrFail($id)->delete();
        return back();
    }
}
