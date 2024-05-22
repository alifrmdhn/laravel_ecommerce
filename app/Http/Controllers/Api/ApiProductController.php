<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prods = Product::with('variants')->get();

        return response()->json($prods, 200);
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
        $validateProduct = Validator::make($request->all(),[
            'name' => 'required|min:4',
            'price' => 'required|integer|min:1000000'
        ]);

        if($validateProduct->fails()) {
            return response()->json([
                'status' => false,
                'message' => "Error validation",
                'errors' => $validateProduct->errors()
            ],200);
        }

        $prod = new Product;
	    $prod->name = $request->name;
	    $prod->price = $request->price;
	    $prod->save();

        return response()->json([
            'status' => true,
            'message' => 'Saved succesffuly'
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prod = Product::find($id);

        return response()->json($prod, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prod = Product::find($id);
	    $prod->name = $request->name;
	    $prod->price = $request->price;
	    $prod->save();

        return response()->json([
            'status' => true,
            'message' => 'Edit success'
        ],201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $isdelete = Product::destroy($id);

        if($isdelete) {
            return response()->json([
                'status' => true,
                'message' => 'Delete success'
            ],200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Delete Error'
            ],200);
        }
    }
}
