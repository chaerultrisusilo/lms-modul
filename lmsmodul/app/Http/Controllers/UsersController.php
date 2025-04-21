<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Users";
        // select * from users
        $datas = User::get();
        return view('users.index', compact('title', 'datas'));
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
    public function store(Request $request)
    {
        User::create([
            'name' => $request->user_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->to('users');
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
        $edit = User::find($id);
        return view('users.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Categories::where('id', $id)->update([
        //     'category_name' => $request->category_name,
        // ]);

        $user = User::find($id);
        $user->user_name = $request->user_name;
        $user->save();

        return redirect()->to('categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        // $user= Users::find($id);
        // $user->delete();
        return redirect()->to('users');
    }
}
