<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SepoliaTransactionsController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/info', function () {
    return view('info');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('/transactions', [TransactionController::class, 'index']);





// Ruta para mostrar el formulario
Route::get('/transactions/form', function () {
    return view('sepolia.form');
})->name('transactions.form');

// Ruta para manejar la solicitud del formulario y mostrar las transacciones
Route::post('/transactions/fetch', [SepoliaTransactionsController::class, 'fetchTransactions'])->name('transactions.fetch');

require __DIR__.'/auth.php';
