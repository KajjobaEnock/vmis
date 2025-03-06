<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Users\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('users.index',[
            'users' => $this->userService->getAllUsers(),
            'title' => 'Users',
            'subtitle' => 'Users List'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create',[
            'title' => 'Users',
            'subtitle' => 'Create New User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'mobile_number' => $request->mobile_number,
            'status' => 1,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'created_by' => Auth::id(),
        ]);
        return redirect()->route('users.index')
            ->with('success','User Details successfully created.');
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
        return view('users.edit', [
            'user' => $this->userService->getUserById($id),
            'title' => 'Users',
            'subtitle' => 'Edit User'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $user->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'mobile_number' => $request->mobile_number,
            'status' => $request->status,
            'email' => $request->email,
            'username' => $request->username,
            'modified_by' => Auth::id(),
        ]);

        // $roles = $request['roles']; //Retreive all roles

        // if (isset($roles)) {
        //     $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        // } else {
        //     $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        // }
        return redirect()->route('users.index')
            ->with('success','User Details Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
