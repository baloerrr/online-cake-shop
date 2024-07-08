<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CatagoryController extends Controller
{
    public  function index(Request $request)
    {

        if ($request->ajax()) {
            $data = catagory::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                                  <a href="' . route('catagory.edit', $row->id) . '" class="edit btn btn-success btn-sm">Edit</a>
                                  <form action="' . route('catagory.destroy', $row->id) . '" method="POST" class="d-inline">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="delete  btn btn-sm bg-red-500 text-white transition-all hover:bg-red-700 " onclick="return confirm(\'Are you sure you want to delete this catagory?\')">Delete</button>
                                  </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('catagory.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {


        return view('catagory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_catagory' => 'required',
        ]);

        $input = $request->all();

        catagory::create($input);

        return redirect()->route('catagory.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $catagory = catagory::find($id);

        if (!$catagory) {
            return redirect()->route('product.index')
                ->with('error', 'Product not found');
        }

        return view('catagory.show', ['catagory' => $catagory]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $catagory = Catagory::find($id);

        if (!$catagory) {
            return redirect()->route('catagory.index')
                ->with('error', 'Category not found');
        }

        return view('catagory.edit', compact('catagory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_catagory' => 'required',
        ]);

        $catagory = Catagory::find($id);

        if (!$catagory) {
            return redirect()->route('catagory.index')
                ->with('error', 'Category not found');
        }

        $catagory->update($request->all());

        return redirect()->route('catagory.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(catagory $catagory)
    {
        $catagory->delete();
        return redirect()->route('catagory.index')
            ->with('success', 'product deleted successfully');
    }
}
