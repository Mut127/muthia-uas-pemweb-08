<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $hotels = Hotel::latest()->paginate(10);
        return view('hotels.index', compact('hotels'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('hotels.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama'     => 'required',
            'alamat'   => 'required|string',
            'telepon'  => 'required'
        ]);

        //create hotel
        Hotel::create([
            'nama'     => $request->nama,
            'alamat'   => $request->alamat,
            'telepon'  => $request->telepon
        ]);

        //redirect to index
        return redirect()->route('hotels.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //get hotel by ID
        $hotel = Hotel::findOrFail($id);

        //render view with hotel
        return view('hotels.show', compact('hotel'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get hotel by ID
        $hotel = Hotel::findOrFail($id);

        //render view with hotel
        return view('hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate form
        $request->validate([
            'nama'     => 'required',
            'alamat'   => 'required',
            'telepon'  => 'required'
        ]);

        //get hotel by ID
        $hotel = Hotel::findOrFail($id);

        //update hotel without image
        $hotel->update([
            'nama'     => $request->nama,
            'alamat'   => $request->alamat,
            'telepon'  => $request->telepon
        ]);

        //redirect to index
        return redirect()->route('hotels.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get hotel by ID
        $hotel = Hotel::findOrFail($id);

        //delete product
        $hotel->delete();

        //redirect to index
        return redirect()->route('hotels.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
