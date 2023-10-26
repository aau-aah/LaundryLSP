<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Outlet;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlets = Outlet::all();
        $members = Member::all();

        return view('pages.transaksi', ['outlets' => $outlets], ['members' => $members]);
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
            'kode_invoice' => 'required|string',
            'berat' => 'required|integer',
            'biaya_tambahan' => 'required|integer',
            'id_member' => 'required|integer',
            'id_outlet' => 'required|integer',
        ]);

        /**
         * Input form to database.
         **/
        Transaksi::create([
            'id_outlet' => $request['id_outlet'],
            'kode_invoice' => $request['kode_invoice'],
            'id_member' => $request['id_member'],
            'tgl' => date('Y-m-d H:i:s'),
            'batas_waktu' => date('Y-m-d H:i:s'),
            'biaya_tambahan' => $request['biaya_tambahan'],
            'berat' => $request['berat'],
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
