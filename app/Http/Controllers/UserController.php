<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('role', '!=', 2)->latest()->paginate(5);

        return view('superadmin.usertable', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        //render view with user
        return view('superadmin.userdetail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'verified'     => 'required',
        ]);

        $User = User::findOrFail($id);
        
        if ($request->verified == 0) {
            $User->update([
                'verified'     => 0,
            ]);
        } else {
            $User->update([
                'verified'     => 1,
            ]);
        }

        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function verified(string $id)
    {
        $User = User::findOrFail($id);

        $User->update([
            'verified'     => true,
        ]);

        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
