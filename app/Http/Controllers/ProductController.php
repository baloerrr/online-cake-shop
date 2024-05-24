<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use App\Models\customer;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public  function index(Request $request) {

        if ($request->ajax()) {
            $data = product::select('*')->with('catagory');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('product.show', $row->id) . '" class="edit btn btn-primary btn-sm">Show</a>
                                  <a href="'.route('product.edit', $row->id).'" class="edit btn btn-success btn-sm">Edit</a>
                                  <form action="' . route('product.destroy', $row->id) . '" method="POST" class="d-inline">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="delete btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</button>
                                  </form>';
                    return $actionBtn;
                })->addColumn('catagory',function($row){
                        return $row->catagory->name_catagory;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $catagorys = catagory::get();
        return view('product.create', compact('catagorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity'=>'required',
            'catagory_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $namaBaru = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $namaBaru);
            $input['image'] = $destinationPath . $namaBaru;
        }

        product::create($input);

        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = product::find($id);

        if (!$product) {
            return redirect()->route('product.index')
                ->with('error', 'Product not found');
        }

        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        $products = product::first();
        $catagorys = catagory::get();
        return view('product.edit', compact('products','catagorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $input = $request->all();
        product::find($id)->update($input);

        return redirect()->route('product.index')->with('success','Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
       $product->delete();
        return redirect()->route('product.index')
        ->with('success', 'product deleted successfully');
    }
}
