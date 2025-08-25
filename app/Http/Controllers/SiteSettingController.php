<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = SiteSetting::whereNull('deleted_at') -> get();
        // dd($rows);
        return view('sites.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sites.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate([
            'title' => 'required|unique:sitesettings|max:100',
            'description' => 'max:200',
            'content' => 'max:500',
            'facebook' => 'max:100',
            'telegram' => 'max:100',
            'youtube' => 'max:100',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:102400'
        ]);

        try{
            if($request->hasFile('logo')){
                $file = $request->file('logo');
                $fileName = time(). '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $file->move($destinationPath, $fileName);
                $logoPath = 'images/' . $fileName;
            }

            SiteSetting::create([
                'title' => $request -> title,
                'description' => $request -> description,
                'content' => $validated['content'],
                'facebook' => $request -> facebook,
                'telegram' => $request -> telegram,
                'youtube' => $request -> youtube,
                'logo' => $request -> logo ? $logoPath:null
            ]);
            // dd($validated);
            return redirect()->route('site.index');
        }catch(\Throwable $th){
            throw $th;
        }
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
        $row = SiteSetting::findOrFail($id);
        return view('sites.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = SiteSetting::findOrFail($id);
        $validated = request()->validate([
            'title' => 'required|unique:sitesettings,title,' . $id . '|max:100',
            'description' => 'max:200',
            'content' => 'max:500',
            'facebook' => 'max:100',
            'telegram' => 'max:100',
            'youtube' => 'max:100',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400'
        ]);

        try{
            if($request->hasFile('logo')){
                //Delete old image
                if ($row->logo && file_exists(public_path($row->logo))) {
                    unlink(public_path($row->logo));
                }

                //Handle new image
                $file = $request->file('logo');
                $fileName = time(). '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('images');
                $file->move($destinationPath, $fileName);
                $row -> logo = 'images/'. $fileName;
            }

            $row -> update([
                'title' => $request -> title,
                'description' => $request -> description,
                'content' => $validated['content'],
                'facebook' => $request -> facebook,
                'telegram' => $request -> telegram,
                'youtube' => $request -> youtube,
                'logo' => $row -> logo
            ]);
            return redirect()->route('site.index');
        }
        catch(\Throwable $th)
        {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = SiteSetting::findOrFail($id);

        if($row->logo && file_exists(public_path($row->logo))){
            unlink(public_path($row->logo));
        }

        $row -> delete();

        return redirect()->route('site.index');
    }
}
