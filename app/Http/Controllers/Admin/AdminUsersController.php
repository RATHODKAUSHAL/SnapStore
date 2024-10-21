<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::get();
        return view('admin.users.index',  compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
        // $users = User::get();
        return view('admin.users.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $users = new User();
        $users->first_name = $request->first_name;
        $users->last_name = $request->last_name;
        $users->email = $request->email;
        $users->contact_number = $request->contact_number;
        $users->role = $request->role;
        $users->save();

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $users =  User::findOrFail($id);
        return view('admin.users.create', [
            'users' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $users =  User::find($id);

        if(!$users){
            return redirect()->route('users.index')->with('error', 'User not found');
        }

        // $request->validate([
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'email' => 'required|string|max:255',
        // ]);

        $users->first_name = $request->first_name;
        $users->last_name = $request->last_name;
        $users->email = $request->email;
        $users->contact_number = $request->contact_number;
        $users->role = $request->role;
        $users->save();
        return redirect()->route('users.index')->with('success', 'User Updated Sucessfullyu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        $users = User::find($id);
        $users->delete($request->all());
        return redirect()->route('users.index')->with('User Deleted Successfully');
    }
}
