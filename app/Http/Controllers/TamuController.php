<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tamus = Tamu::latest()->paginate(10);
        return view('tamus.index', compact('tamus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tamus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama'     => 'required',
            'email'   => 'required',
            'telepon'  => 'required'
        ]);

        //create hotel
        Tamu::create([
            'nama'     => $request->nama,
            'email'   => $request->email,
            'telepon'  => $request->telepon
        ]);

        //redirect to index
        return redirect()->route('tamus.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //get hotel by ID
        $tamu = Tamu::findOrFail($id);

        //render view with hotel
        return view('tamus.show', compact('tamu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get hotel by ID
        $tamu = Tamu::findOrFail($id);

        //render view with hotel
        return view('Tamus.edit', compact('tamu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate form
        $request->validate([
            'nama'     => 'required',
            'email'   => 'required',
            'telepon'  => 'required'
        ]);

        //get hotel by ID
        $tamu = Tamu::findOrFail($id);

        //update hotel without image
        $tamu->update([
            'nama'     => $request->nama,
            'email'   => $request->email,
            'telepon'  => $request->telepon
        ]);

        //redirect to index
        return redirect()->route('tamus.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get hotel by ID
        $tamu = Tamu::findOrFail($id);

        //delete product
        $tamu->delete();

        //redirect to index
        return redirect()->route('tamus.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
