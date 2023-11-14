<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('auth.gedung.index', [
            'gedung' => Gedung::orderBy('id', 'asc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_gedung' => 'required|min:5|max:20',
            'slug' => 'required|alpha_dash|min:5|max:20|unique:gedung,slug',
        ]);

        Gedung::create($validatedData);

        return redirect('gedung')->with('success', 'success');
    }

    /**
     * Show the form for editing the specified resource.

     *
     */
    public function edit(Gedung $gedung)
    {
        return view('auth.gedung.edit', [
            'gedung' => $gedung
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Gedung $gedung)
    {
        $rules = [
            'nama_gedung' => 'required|min:5|max:20',
        ];

        if ($request->slug != $gedung->slug) {
            $rules['slug'] = 'required|alpha_dash|min:5|max:20|unique:gedung,slug';
        }

        $validatedData = $request->validate($rules);

        Gedung::where('id', $gedung->id)->update($validatedData);
        return redirect('gedung')->with('success', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Gedung $gedung)
    {
        Gedung::destroy($gedung->id);

        return redirect('gedung')->with('delete', 'delete');
    }
}
