<?php

namespace App\Http\Controllers;

use App\Models\major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Jurusan";
        $datas = major::get();

        // return $datas;

        return view('majors.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('majors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        major::create([
            'name' => $request->name,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('majors.index');
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
        $edit = major::find($id);
        return view('majors.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        major::where('id', $id)->update([
            'name' => $request->name,
            'is_active' => $request->is_active,
        ]);
        return redirect()->route('majors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        major::where('id', $id)->delete();

        return redirect()->route('majors.index');
    }
}
