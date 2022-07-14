<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Admin\CountriesController;
use App\Http\Controllers\CheckOutController;
use App\Models\category;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::get('/welcome.php', [WelcomeController::class, 'welcome']);
Route::get('/welcomessss.php', [WelcomeController::class, 'welcome']);
Route::get('/welcome/to/laravel', 'App\Http\Controllers\WelcomeController@welcome');

Route::get('/admin/categories/create', [CategoriesController::class, 'create'])->name('categories.create');

Route::post('/admin/categories', [CategoriesController::class, 'store'])->name('categories.store');
Route::get('/admin/categories/{category}', [CategoriesController::class, 'show'])->name('categories.show');
Route::get('/admin/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::put('/admin/categories/{id}', [CategoriesController::class, 'update'])->name('categories.update');
Route::delete('/admin/categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');




Route::resource(
    '/admin/roles',
    'App\Http\Controllers\Admin\RolesController'
)
    ->middleware('auth');


Route::resource(
    '/admin/countries',
    'App\Http\Controllers\Admin\CountriesController'
)
    ->middleware('auth');




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('test', function () {
            return View('test');
        });

        Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');


        Route::get('products/trash', [ProductController::class, 'trash'])->name('products.trash');
        Route::resource('products', 'App\Http\Controllers\ProductController')->middleware('auth');
    }
);


Route::get('/rating/{type}', [RatingController::class, 'store'])
    ->where('type', 'product|profile');



Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');


Route::get('productsss', [ProductsController::class, 'index'])->name('products');
Route::get('productsss/{slug}', [ProductsController::class, 'show'])->name('product.details');



Route::get('/checkout', [CheckOutController::class, 'create'])->name('checkout');
Route::post('/send', [CheckOutController::class, 'store'])->name('send');

Route::get('/orders', function () {
    return Order::all();
})->name('orders');