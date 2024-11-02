<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * All Product
     */
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'success' => true,
            'message' => 'Sukses',
            'data' => $products
        ]);
    }

    /**
     * Create Product
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show Product
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update Product
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Delete Product
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Show By Barcode Product
     */
    public function showByBarcode($barcode)
    {
        $product = Product::where('barcode', $barcode)->first();
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $product,
            'message' => 'Success'
        ]);
    }
}
