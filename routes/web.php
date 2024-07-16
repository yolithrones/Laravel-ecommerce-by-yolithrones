<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\SaintController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum', 'verified',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/shopsaints', [HomeController::class, 'shopsaints'])
        ->middleware('verified')
        ->name('shopsaints');
});

Route::get('/maintenance', [SaintController::class, 'maintenanceSTT']);

Route::post('/closed', [SaintController::class, 'toggleUnderConstruction']);

Route::get('/viewCategory', [SaintController::class, 'viewCategory']);

Route::post('/addCategory', [SaintController::class, 'addCategory']);

Route::get('/deleteCategory/{id}', [SaintController::class, 'deleteCategory']);

Route::post('/addProduct', [SaintController::class, 'addProduct']);

Route::get('/postProduct', [SaintController::class, 'postProduct']);

Route::get('/displayProduct', [SaintController::class, 'displayProduct']);

Route::get('/deleteProduct/{id}', [SaintController::class, 'deleteProduct']);

Route::get('/editProduct/{id}', [SaintController::class, 'editProduct']);

Route::post('/confirmEdit/{id}', [SaintController::class, 'confirmEdit']);

Route::get('/orders', [SaintController::class, 'orders']);

Route::get('/delivered/{id}', [SaintController::class, 'delivered']);

Route::get('/print_pdf/{id}', [SaintController::class, 'print_pdf']);

Route::get('/customer_mailling/{id}', [SaintController::class, 'customer_mailling']);

Route::post('/send_customer_email/{id}', [SaintController::class, 'send_customer_email']);

Route::get('/search', [SaintController::class, 'searchData']);

Route::get('/users', [SaintController::class, 'viewUsers']);

Route::get('/subscribers', [SaintController::class, 'viewSubscribers']);

Route::get('/login_stt', [SaintController::class, 'loginSTT']);

Route::get('/register_stt', [SaintController::class, 'registerSTT']);

Route::get('/currency', [SaintController::class, 'currencyTable']);

Route::get('/new_currency', [SaintController::class, 'newCurrency']);

Route::post('/add_currency', [SaintController::class, 'addCurrency']);

Route::get('/delete_currency/{id}', [SaintController::class, 'deleteCurrency']);

Route::get('/edit_currency/{id}', [SaintController::class, 'editCurrency']);

Route::get('/status/{id}', [SaintController::class, 'editStatus']);

Route::post('/confirmEdit_currency/{id}', [SaintController::class, 'confirmEdit_Currency']);




Route::get('/itemDetails/{id}', [HomeController::class, 'itemDetails'])->name('itemDetails');

Route::post('/addCart/{id}', [HomeController::class, 'addCart']);

Route::get('/displayCart', [HomeController::class, 'displayCart']);

Route::get('/contact_us', [HomeController::class, 'contactUs']);

Route::get('/about_us', [HomeController::class, 'aboutUs']);

Route::post('/subscribed', [HomeController::class, 'subscribeSTT']);

Route::post('/updateCart/{id}', [HomeController::class, 'updateCart']);

Route::get('/removeCart/{id}', [HomeController::class, 'removeCart']);

Route::get('/orderCheckout', [HomeController::class, 'orderCheckout']);

Route::get('/saintCheckout', [HomeController::class, 'saintCheckout']);

Route::post('/confirmBilling/{id}', [HomeController::class, 'confirmBilling']);

Route::POST('/payment', [HomeController::class, 'payment'])->name('payment');

Route::get('/paymentHandle', [HomeController::class, 'paymentHandle'])->name('paymentHandle');

Route::post('/drop_comment', [HomeController::class, 'dropComment']);

Route::post('/reply_users', [HomeController::class, 'replyUsers']);

Route::get('/search', [HomeController::class, 'searchProduct']);

Route::get('/shop', [HomeController::class, 'shopMerch'])->name('shop');

Route::get('/order', [HomeController::class, 'orderHistory'])->name('order');

Route::post('/messagesaintthethird', [HomeController::class, 'messageSTT']);

Route::get('/api/exchange-rate/{currencyCode}', [HomeController::class, 'ExchangeRate']);



