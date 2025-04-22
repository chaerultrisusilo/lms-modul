<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\major;
use App\Models\User;
use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Instructors";

        // eager load roles
        $datas = Instructor::with('majors', '')->get();

        return view('instructors.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::doesntHave('roles')->get();
        $majors = Major::all();
        return view('instructors.create', compact('users', 'majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        $instructor = Instructor::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone' => $request->phone,
            'photo' => $photoPath,
            'is_active' => $request->is_active,
        ]);

        $instructor->majors()->attach($request->majors_id);
        return redirect()->route('instructors.index');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
