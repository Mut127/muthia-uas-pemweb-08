<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Kamar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $kamars = Kamar::latest()->paginate(10);
        return view('kamars.index', compact('kamars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $hotels = Hotel::all();
        return view('kamars.create', compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'nomor_kamar'    => 'required',
            'tipe_kamar'    => 'required',
            'harga'         => 'required',
            'hotel_id'      => 'required|exists:hotels,id'
        ]);

        //create hotel
        Kamar::create([
            'nomor_kamar'  => $request->nomor_kamar,
            'tipe_kamar'   => $request->tipe_kamar,
            'harga'  => $request->harga,
            'hotel_id' => $request->hotel_id
        ]);

        //redirect to index
        return redirect()->route('kamars.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kamar = Kamar::findOrFail($id);

        //render view with hotel
        return view('kamars.show', compact('kamar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kamar = Kamar::findOrFail($id);
        $hotels = Hotel::all();
        return view('kamars.edit', compact('kamar', 'hotels'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate form
        $request->validate([
            'nomor_kamar'    => 'required',
            'tipe_kamar'    => 'required',
            'harga'         => 'required',
            'hotel_id'      => 'required|exists:hotels,id'
        ]);

        //get hotel by ID
        $kamar = Kamar::findOrFail($id);

        //update hotel without image
        $kamar->update([
            'nomor_kamar'  => $request->nomor_kamar,
            'tipe_kamar'   => $request->tipe_kamar,
            'harga'  => $request->harga,
            'hotel_id' => $request->hotel_id
        ]);

        //redirect to index
        return redirect()->route('kamars.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get hotel by ID
        $kamar = Kamar::findOrFail($id);

        //delete product
        $kamar->delete();

        //redirect to index
        return redirect()->route('kamars.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
