<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Satuan;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Barang List';


        $barangs = Barang::all();

        return view('barang.index', [
            'pageTitle' => $pageTitle,
            'barangs' => $barangs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Barang';


         $satuans = Satuan::all();


        return view('barang.create', compact('pageTitle', 'satuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'Kode_barang' => 'required',
            'Nama_barang' => 'required',
            'Harga_barang' => 'required|numeric',
            'Deskripsi_barang' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


         $barang = New Barang;
         $barang->kodeBarang = $request->Kode_barang;
         $barang->namaBarang = $request->Nama_barang;
         $barang->hargaBarang = $request->Harga_barang;
         $barang->deskripsiBarang = $request->Deskripsi_barang;
         $barang->satuan_id = $request->Satuan_barang;
         $barang->save();

         return redirect()->route('barangs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Barang Detail';


        $barang = Barang::find($id);

        return view('barang.show', compact('pageTitle', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Barang Edit';


        $satuans = Satuan::all();

        $barang = Barang::find($id);

        return view('barang.edit', compact('pageTitle','satuans', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'Kode_barang' => 'required',
            'Nama_barang' => 'required',
            'Harga_barang' => 'required|numeric',
            'Deskripsi_barang' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $barang = Barang::find($id);
        $barang->kodeBarang = $request->Kode_barang;
        $barang->namaBarang = $request->Nama_barang;
        $barang->hargaBarang = $request->Harga_barang;
        $barang->deskripsiBarang = $request->Deskripsi_barang;
        $barang->satuan_id = $request->satuan_id;
        $barang->save();

        return redirect()->route('barangs.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        Barang::find($id)->delete();

        return redirect()->route('barangs.index');

    }
}
