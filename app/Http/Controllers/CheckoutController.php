<?php

namespace App\Http\Controllers;

use App\Models\checkout;
use App\Models\keranjang;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public  function index(Request $request)
    {

        if ($request->ajax()) {
            $data = checkout::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('user',function($row){
                    $user = $row->user;
                    foreach ($user as $key => $u) {
                        return $u->name;
                    }
                })
                ->addColumn('userEmail',function($row){
                    $user = $row->user;
                    foreach ($user as $key => $u) {
                        return $u->email;
                    }
                })
                ->make(true);
        }
        $data = checkout::sum('total');
        return view('checkout.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    public function store()
    {
        $krnjs = keranjang::with('product')->where('user_id',Auth::user()->id)->get();
        $total = 0;
        for($i=0;$i<count($krnjs);$i++){
            $keranjangs = keranjang::with('product')->where('user_id',Auth::user()->id)->get()[$i];
            $price = $keranjangs->product->price;
            $quantity_keranjang = $keranjangs->quantity;
            $subtotal = $price*$quantity_keranjang;
            $total += $subtotal;

            $product = product::where('id',$keranjangs->product->id)->first();
            $update_quantity = $product->quantity - $quantity_keranjang;
            $product->update([
                'quantity' => $update_quantity,
            ]);
        }
        if(count($krnjs)!=null){
            checkout::create([
                'user_id' => Auth::user()->id,
                'id_metodePembayaran'=> 'required',
                'bukti_pembayaran'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status'=> 'processing',
                'total' => $total,
            ]);
            keranjang::truncate();
        }

        return redirect()->back();
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
