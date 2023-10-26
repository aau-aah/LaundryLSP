<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::orderBy('created_at', 'DESC')->get();
        return view('pages.member', ['members' => $members]);
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
            'jenis_kelamin' => 'required',
            'tlp' => 'required|min_digits:10|max_digits:13|numeric|unique:members',
            'alamat' => 'required|string',
        ]);

        /**
         * Input form to database.
         **/
        Member::create([
            'nama' => Str::lower($request['nama']),
            'jenis_kelamin' => $request['jenis_kelamin'],
            'tlp' => $request['tlp'],
            'alamat' => $request['alamat'],
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
