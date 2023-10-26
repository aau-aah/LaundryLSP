<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlets = Outlet::orderBy('created_at', 'DESC')->get();
        return view('pages.outlet', ['outlets' => $outlets]);
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
        /**
         * Validation.
         **/
        $validated = $request->validate([
            'nama' => 'required|string',
            'tlp' => 'required|min_digits:10|max_digits:13|numeric|unique:outlets',
            'alamat' => 'required|string',
        ]);

        /**
         * Input form to database.
         **/
        Outlet::create([
            'nama' => Str::lower($request['nama']),
            'tlp' => $request['tlp'],
            'alamat' => $request['alamat'],
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outlet $outlet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Outlet $outlet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outlet $outlet)
    {
        //
    }
}
