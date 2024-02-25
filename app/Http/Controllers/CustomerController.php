<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use App\Models\customer;
use App\Models\product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = customer::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
        }
        $breadcrumb = 'Customer';
        return view('customer.index',['breadcrumb' => $breadcrumb]);
    }

    public function shop(string $id = null)
    {
        $selectedCategory = new catagory();
        $selectedCategory->name_catagory = "All";
        $products = product::get();
        if($id){
            $products = product::where('catagory_id',$id)->get();
            $selectedCategory = catagory::where('id',$id)->first();
        }
        $catagorys = catagory::get();
        return view('shop.index',compact('products' , 'catagorys', 'selectedCategory'));
    }
    public function profile()
    {
        return view('profile.index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer $customer)
    {
        //
    }
}
