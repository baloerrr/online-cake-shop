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
            $data = Checkout::with('customer')->select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('user', function ($row) {
                    $user = $row->user;
                    foreach ($user as $key => $u) {
                        return $u->name;
                    }
                })
                ->addColumn('userEmail', function ($row) {
                    $user = $row->user;
                    foreach ($user as $key => $u) {
                        return $u->email;
                    }
                })
                ->addColumn('alamat', function ($row) {
                    return $row->customer ? $row->customer->alamat : '';
                })
                ->addColumn('no_hp', function ($row) {
                    return $row->customer ? $row->customer->no_hp : '';
                })
                ->addColumn('product', function ($row) {
                    return $row->keranjang->product->name;
                })

                ->make(true);
        }
        $data = checkout::sum('total');
        return view('checkout.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_metodePembayaran' => 'required|exists:metode_pembayarans,id|integer',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal_antar' => 'required|date|after_or_equal:today',
        ]);

        $krnjs = keranjang::with('product')->where('user_id', Auth::user()->id)->where('is_checkout', false)->get();
        $total = 0;

        foreach ($krnjs as $keranjang) {
            $price = $keranjang->product->price;
            $quantity_keranjang = $keranjang->quantity;
            $subtotal = $price * $quantity_keranjang;
            $total += $subtotal;

            $product = product::find($keranjang->product->id);
            $update_quantity = $product->quantity - $quantity_keranjang;

            if ($update_quantity < 0) {
                return redirect()->back()->withErrors(['error' => 'Insufficient stock for product: ' . $product->name]);
            }

            $product->update(['quantity' => $update_quantity]);
        }

        if ($krnjs->isNotEmpty()) {
            // Store the payment proof
            $bukti_pembayaran = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

            // Create checkout record
            $checkout = checkout::create([
                'user_id' => Auth::user()->id,
                'id_metodePembayaran' => $request->id_metodePembayaran,
                'bukti_pembayaran' => $bukti_pembayaran,
                'tanggal_antar' => $request->tanggal_antar,
                'status' => 'proses',
                'total' => $total,
                'keranjang_id' => $krnjs->first()->id,
            ]);

            // Mark items as checked out
            keranjang::where('user_id', Auth::user()->id)->where('is_checkout', false)->update(['is_checkout' => true]);
        }

        return redirect()->back()->with('success', 'Checkout Berhasil, Pesanan siap di antar sesuai tanggal yaa 👌😃!');
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
        return view('checkout.edit', compact('checkout'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkout $checkout)
    {
        $request->validate([
            'status' => 'required|string|in:Proses,Selesai',
        ]);

        $checkout->update([
            'status' => $request->status,
        ]);

        return redirect()->route('checkout.index')->with('success', 'Checkout status updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $checkout = Checkout::findOrFail($id);
        $checkout->delete();

        return redirect()->route('checkout.index')
            ->with('success', 'Data berhasil dihapus.');
    }


    public function history(Request $request)
    {
        if ($request->ajax()) {
            $data = Checkout::with('user')->select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('user', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('userEmail', function ($row) {
                    return $row->user->email;
                })
                ->make(true);
        }

        $datas = Checkout::with('user')->get();


        return view('history.index', compact('datas'));
    }

    public function cancel($id)
    {
        $checkout = Checkout::findOrFail($id);
        $checkout->status = 'Menunggu Pembatalan';
        $checkout->save();

        return redirect()->back()->with('success', 'Permintaan pembatalan telah dikirim.');
    }

    public function confirm($id)
    {
        $checkout = Checkout::findOrFail($id);
        $checkout->status = 'Dibatalkan';
        $checkout->save();

        return redirect()->route('checkout.index')->with('success', 'Pembatalan telah dikonfirmasi.');
    }

    public function reject($id)
    {
        $checkout = Checkout::findOrFail($id);
        $checkout->status = 'Proses';
        $checkout->save();

        return redirect()->route('checkout.index')->with('success', 'Pembatalan telah ditolak.');
    }
}
