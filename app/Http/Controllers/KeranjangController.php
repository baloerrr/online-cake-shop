<?php

namespace App\Http\Controllers;

use App\Models\checkout;
use App\Models\keranjang;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkout = checkout::where('user_id', Auth::User()->id)->get();

        $datas = keranjang::where('user_id', Auth::User()->id)->get();
        return view('keranjang.index', compact('datas', 'checkout'));
    }

    public function keranjang_hover()
    {
        $checkout = checkout::where('user_id', Auth::User()->id)->get();
        $datas = keranjang::where('user_id', Auth::User()->id)->get();
        return view('layouts.navbar', compact('datas', 'checkout'));
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
    public function store(string $productId)
{
    // Hapus semua produk dengan is_checkout = false untuk user yang sedang login
    Keranjang::where('user_id', Auth::user()->id)
        ->where('is_checkout', false)
        ->delete();

    // Buat entri baru dengan status is_checkout = false
    Keranjang::create([
        'user_id' => Auth::user()->id,
        'product_id' => $productId,
        'quantity' => 1,
        'is_checkout' => false,
    ]);

    return redirect()->route('keranjang.index')->with('AddCart', 'Produk berhasil ditambahkan ke keranjang');
}




    public function handleKeranjangMinus($productId)
    {

        $keranjang = keranjang::where('product_id', '=', $productId)->first();
        if ($keranjang->quantity > 1) {
            keranjang::where('product_id', '=', $productId)->update([
                'quantity' => (int)$keranjang->quantity - 1
            ]);
            return redirect()->back();
        }
        return redirect()->back()->with('message', 'oops');
    }

    public function handleKeranjangPlus($productId)
    {
        $keranjang = keranjang::where('product_id', '=', $productId)->first();
        keranjang::where('product_id', '=', $productId)->update([
            'quantity' => (int)$keranjang->quantity + 1
        ]);
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     */
    public function show(keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, keranjang $keranjang)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = keranjang::find($id);
        $data->delete();

        return  redirect()->route('keranjang.index');
    }
}
