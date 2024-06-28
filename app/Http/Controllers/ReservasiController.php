<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use App\Models\Tamu;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $reservasis = Reservasi::latest()->paginate(10);
        return view('reservasis.index', compact('reservasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tamus = Tamu::all();
        $kamars = Kamar::all();
        return view('reservasis.create', compact('tamus', 'kamars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'tanggal_checkin'    => 'required',
            'tanggal_checkout'    => 'required',
            'kamar_id'         => 'required|exists:kamars,id',
            'tamu_id'      => 'required|exists:tamus,id'
        ]);

        //create reservasi
        Reservasi::create([
            'tanggal_checkin'  => $request->tanggal_checkin,
            'tanggal_checkout'   => $request->tanggal_checkout,
            'kamar_id'  => $request->kamar_id,
            'tamu_id' => $request->tamu_id
        ]);

        //redirect to index
        return redirect()->route('reservasis.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reservasi = Reservasi::findOrFail($id);

        //render view with reservasi
        return view('reservasis.show', compact('reservasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $kamars = Kamar::all();
        $tamus = Tamu::all();
        return view('reservasis.edit', compact('reservasi', 'kamars', 'tamus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate form
        $request->validate([
            'tanggal_checkin'    => 'required',
            'tanggal_checkout'    => 'required',
            'kamar_id'         => 'required|exists:kamars,id',
            'tamu_id'      => 'required|exists:tamus,id'
        ]);

        //get reservasi by ID
        $reservasi = Reservasi::findOrFail($id);

        //update reservasi
        $reservasi->update([
            'tanggal_checkin'  => $request->tanggal_checkin,
            'tanggal_checkout'   => $request->tanggal_checkout,
            'kamar_id'  => $request->kamar_id,
            'tamu_id' => $request->tamu_id
        ]);

        //redirect to index
        return redirect()->route('reservasis.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get reservasi by ID
        $reservasi = Reservasi::findOrFail($id);

        //delete reservasi
        $reservasi->delete();

        //redirect to index
        return redirect()->route('reservasis.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
