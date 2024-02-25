<?php

namespace App\Http\Controllers;

use App\Models\checkout;
use App\Models\keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public  function index(Request $request) {

        if ($request->ajax()) {
            $data = checkout::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('checkout.index');
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
        // Validasi request
        $request->validate([
            'total' => 'required'
        ]);

        // Cek apakah keranjang kosong
        $keranjangCount = Keranjang::where('user_id', Auth::user()->id)->count();

        if ($keranjangCount == 0) {
            // Jika keranjang kosong, redirect dengan pesan error
            return redirect()->route('keranjang.index')->with('error', 'Keranjang kosong. Tidak dapat melakukan checkout.');
        }

        // Data untuk disimpan
        $data = [
            "user_id" => Auth::user()->id,
            "total" => $request->total,
        ];

        // Buat checkout
        checkout::create($data);

        // Hapus keranjang
        Keranjang::where('user_id', Auth::user()->id)->delete();

        // Redirect ke halaman keranjang dengan pesan sukses
        return redirect()->route('keranjang.index')->with('success', 'Checkout berhasil.');
    }

    /**
     * Display the specified resource.
     */
    public function show(checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(checkout $checkout)
    {
        //
    }
}
