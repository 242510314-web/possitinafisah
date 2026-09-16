<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Jenis::class);

        $jenis = Jenis::latest()->get();

        return view('jenis.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Jenis::class);

        return view('jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Jenis::class);

        $request->validate([
            'nama_jenis' => 'required|string|max:255',
        ]);

        Jenis::create([
            'nama_jenis' => $request->nama_jenis,
        ]);

        return redirect()
            ->route('jenis.index')
            ->with('success', 'Jenis berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jenis = Jenis::findOrFail($id);

        $this->authorize('view', $jenis);

        return view('jenis.show', compact('jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenis = Jenis::findOrFail($id);

        $this->authorize('update', $jenis);

        return view('jenis.edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jenis = Jenis::findOrFail($id);

        $this->authorize('update', $jenis);

        $request->validate([
            'nama_jenis' => 'required|string|max:255',
        ]);

        $jenis->update([
            'nama_jenis' => $request->nama_jenis,
        ]);

        return redirect()
            ->route('jenis.index')
            ->with('success', 'Jenis berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $jenis = Jenis::findOrFail($id);

    $this->authorize('delete', $jenis);

    if ($jenis->produk()->exists()) {
        return redirect()
            ->route('jenis.index')
            ->with('error', 'Jenis "' . $jenis->nama_jenis . '" tidak dapat dihapus karena masih digunakan oleh produk.');
    }

    $jenis->delete();

    return redirect()
        ->route('jenis.index')
        ->with('success', 'Jenis berhasil dihapus.');
    }
}