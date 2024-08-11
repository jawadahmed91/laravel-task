<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Province;
use App\Models\Assignment;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $provinces = Province::all();
        return view('users.create', compact('provinces'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => ['required', 'in:admin,polio_worker'],
            'union_council' => 'required_if:role,polio_worker|exists:union_councils,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        if ($user->role === 'polio_worker') {
            Assignment::create([
                'polio_worker_id' => $user->id,
                'union_council_id' => $request->union_council,
            ]);
        }
    
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $provinces = Province::all();

        return view('users.edit', compact('user', 'provinces'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => ['required', 'in:admin,polio_worker'],
            'union_council' => 'required_if:role,polio_worker|exists:union_councils,id',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email', 'role'));

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        if ($user->role === 'polio_worker') {
            // Check if an assignment exists and update it
            $assignment = Assignment::where('polio_worker_id', $user->id)->first();
            
            if ($assignment) {
                $assignment->update([
                    'union_council_id' => $request->union_council,
                ]);
            } else {
                // If no assignment exists, create a new one
                Assignment::create([
                    'polio_worker_id' => $user->id,
                    'union_council_id' => $request->union_council,
                ]);
            }
        } else {
            // If the role is not polio_worker, delete any existing assignment
            Assignment::where('polio_worker_id', $user->id)->delete();
        }

        
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
