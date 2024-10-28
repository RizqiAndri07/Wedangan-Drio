<?php
use App\Http\Controllers\ProductsController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $produk = Product::all(); 
    return view('home',compact('produk'));
})->name('home');


Route::get('/products', [ProductsController::class, 'index'])->name('produk.index');
Route::get('/products/add', [ProductsController::class, 'add'])->name('produk.add');
Route::post('/products/{id}', [ProductsController::class, 'delete'])->name('produk.delete');
Route::post('/products/submit', [ProductsController::class, 'submit'])->name('produk.submit');  // Pastikan POST
Route::get('/products/update/{id}', [ProductsController::class, 'update'])->name('produk.update');  // Pastikan POST