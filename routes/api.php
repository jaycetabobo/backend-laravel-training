<?php
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/products', function () {
    return response()->json([
        'products' => Product::all(),
        'status' => 'success',
        //basta
    ]);
});
