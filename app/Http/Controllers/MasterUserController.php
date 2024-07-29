<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class MasterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('data-users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $data_user)
    {
        return view('users.edit', compact('data_user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $data_user)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $update = $data_user->update($data);

        if ($update) {
            return redirect()->route('data-users.index')->with('success', 'User updated successfully.');
        } else {
            return back()->withErrors(['msg' => 'User update failed. Please try again.']);
        }
    }
   
}
