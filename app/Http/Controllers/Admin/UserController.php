<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add(Request $request)
    {
        $validator = Validator($request->all(),
        [
            'name' => ['required', 'string', 'max:255'],
            'phone' =>['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->type = $request->type;
        $user->password = bcrypt($request->password);
        $user->save();

        toastr()->addSuccess('User created successfully');
        return redirect()->back();
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(string $id)
    {
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(Request $request, string $id)
    {
        $validator = Validator($request->all(),
        [
            'name' => ['required', 'string', 'max:255'],
            'phone' =>['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->type = $request->type;
        $user->save();

        toastr()->addSuccess('User updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        toastr()->addSuccess('User delete successfully');
        return redirect()->back();
    }
}
