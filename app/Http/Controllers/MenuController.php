<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Menu::whereNull('deleted_at') -> get();
        return view('menus.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate([
            'title' => 'required|unique:menus|max:50',
            'sub_title' => 'max:200',
            'description' => 'max:200',
            'active' => 'max:1'
        ]);

        Menu::create([
            'title' => $request -> title,
            'sub_title' => $request -> sub_title,
            'description' => $request -> description,
            'active' => $request -> active
        ]);

        return redirect()->route('menu.index'); // Redirect to roles index after storing
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
        $row = Menu::findOrFail($id);
        return view('menus.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Menu::findOrFail($id);
        $validated = $request -> validate([
            'title' => 'required|unique:menus,title,'.$id.'|max:50',
            'sub_title' => 'max:200',
            'description' => 'max:200',
            'active' => 'max:1'
        ]);

        $row -> update([
            'title' => $request -> title,
            'sub_title' => $request -> sub_title,
            'description' => $request -> description,
            'active' => $request -> active
        ]);

        return redirect()->route('menu.index'); // Redirect to roles index after storing
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Menu::findOrFail($id);
        $row -> delete();
        return redirect() -> route('menu.index');
    }
}
