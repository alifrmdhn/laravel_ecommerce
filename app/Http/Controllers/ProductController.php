<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $prods = Product::get();
        if(request()->segment(1) == 'api') return response()->json([
            'error' => false,
            'list' => $prods,
        ]);
        return view('view_product',[
            'title' => 'Daftar Product',
            'data' => $prods
        ]);
    }

    public function create()
    {
        return view('product.form', [
            'title' => 'Tambah',
            'method' => 'POST',
            'action' => 'product'
        ]);
    }

    public function store(Request $request)
    {
        $prod = new Product;
        $prod->name = $request->name;
        $prod->description = $request->description;
        $prod->processor = $request->processor;
        $prod->memory = $request->memory;
        $prod->storage = $request->storage;
        $prod->price = $request->price;
        $prod->save();
        if(request()->segment(1) == 'api') return response()->json([
            'error' => false,
            'message' => 'Tambah berhasil'
        ]);
        return redirect('/product')->with('msg', 'Tambah berhasil');
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function edit($id)
    {
        return view('product.form', [
            'title' => 'Edit',
            'method' => 'PUT',
            'action' => "product/$id",
            'data' => Product::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'description' => 'required',
            'processor' => 'required',
            'memory' => 'required',
            'storage' => 'required',
            'price' => 'required|integer|min:1000000'
        ]);

        $prod = Product::find($id);
        $prod->name = $request->name;
        $prod->description = $request->description;
        $prod->processor = $request->processor;
        $prod->memory = $request->memory;
        $prod->storage = $request->storage;
        $prod->price = $request->price;
        $prod->save();
        return redirect('/product')->with('msg', 'Edit berhasil');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/product')->with('msg', 'Hapus berhasil');
    }
}
