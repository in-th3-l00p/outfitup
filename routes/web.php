<?php

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name("index");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::apiResource("cart", CartItemController::class)
        ->only(["index", "store", "update", "destroy"]);

    Route::post("/checkout", [CheckoutController::class, "checkout"])->name("checkout");
    Route::get("/checkout/success", [CheckoutController::class, "success"])->name("checkout.success");
    Route::get("/checkout/cancel", [CheckoutController::class, "cancel"])->name("checkout.cancel");
});

require __DIR__.'/auth.php';
