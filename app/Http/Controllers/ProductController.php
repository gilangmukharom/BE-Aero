<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_maskapai' => 'required',
            'tujuan' => 'required',
            'tanggal_keberangkatan' => 'required|date',
            'jam_keberangkatan' => 'required|date_format:H:i',
            'harga' => 'required|numeric',
        ]);

        $data = $request->json()->all();

        $product = Product::create([
            'nama_maskapai' => $data['nama_maskapai'],
            'tujuan' => $data['tujuan'],
            'tanggal_keberangkatan' => $data['tanggal_keberangkatan'],
            'jam_keberangkatan' => $data['jam_keberangkatan'],
            'harga' => $data['harga'],
        ]);

        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}