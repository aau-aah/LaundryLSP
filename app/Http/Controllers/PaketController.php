<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Outlet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlets = Outlet::all();
        $pakets = Paket::all();
        return view('pages.paket', ['outlets' => $outlets], ['pakets' => $pakets]);
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
            'nama_paket' => 'required|string',
            'jenis' => 'required|string',
            'harga' => 'required|integer',
            'id_outlet' => 'required|integer',
        ]);

        /**
         * Input form to database.
         **/
        Paket::create([
            'nama_paket' => Str::lower($request['nama_paket']),
            'jenis' => $request['jenis'],
            'harga' => $request['harga'],
            'id_outlet' => $request['id_outlet'],
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paket $paket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paket $paket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paket $paket)
    {
        //
    }
}
