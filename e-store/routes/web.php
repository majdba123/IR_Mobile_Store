<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CheckOutMiddleWare;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\WebController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RateProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaymentController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::get('/', function () {
        return view('web.layout');
    });

    Route::group(['prefix' => 'dashboard', 'middleware' => ['AdminMiddleware']], function () {
        Route::get('', [AdminController::class, 'index']);
        Route::get('/add-company', [AdminController::class, 'addcompany'])->name('add.comany');
        Route::post('/store-company', [AdminController::class, 'storecompany'])->name('store.comany');
        Route::get('/add-category', [AdminController::class, 'addcategory'])->name('add.category');
        Route::post('/store-category', [AdminController::class, 'storecategory'])->name('store.category');
        Route::get('/add-phone', [AdminController::class, 'addphone'])->name('add.phone');
        Route::post('/store-phone', [AdminController::class, 'storephone'])->name('store.phone');
        Route::get('/add-csv', [AdminController::class, 'addcsv'])->name('add.csv');
        Route::post('/store-csv', [AdminController::class, 'storecsv'])->name('store.csv');
        Route::get('/admin-main', [AdminController::class, 'main'])->name('admin.main');
        Route::delete('/company-destroy/{id}', [AdminController::class, 'companydistroy'])->name('company.destroy');
        Route::delete('/category-destroy/{id}', [AdminController::class, 'categorydistroy'])->name('category.destroy');
        Route::delete('/prduct-destroy/{id}', [AdminController::class, 'productdistroy'])->name('products.destroy');
        Route::get('/company-update/{id}', [AdminController::class, 'companyupdate'])->name('company.update');
        Route::get('/category-update/{id}}', [AdminController::class, 'categoryupdate'])->name('category.update');
        Route::get('/products-update/{id}', [AdminController::class, 'productupdate'])->name('product.update');
        Route::PUT('/update-category/{id}', [AdminController::class, 'updatecate'])->name('update.category');
        Route::PUT('/update-company/{id}', [AdminController::class, 'updatecomp'])->name('update.company');
        Route::PUT('/update-product/{id}', [AdminController::class, 'updateprod'])->name('update.product');
        Route::get('/Order', [OrderController::class, 'getOrder'])->name('admin.order');
    });

    Route::get('/index',)->name('home');


    Auth::routes();
    Route::get('/home', [WebController::class, 'index'])->name('web');


    Route::group(['prefix' => 'home', 'middleware' => ['auth']], function () {
        Route::get('/product_info/{id}', [WebController::class, 'productinfo'])->name('web.product_deatails');
        Route::get('/company', [WebController::class, 'company'])->name('web.company');
        Route::get('/category', [WebController::class, 'category'])->name('web.category');
        Route::get('/product_of_company/{id}', [WebController::class, 'get_product_of_company'])->name('company.product');
        Route::get('/product_of_category/{id}', [WebController::class, 'get_product_of_category'])->name('category.product');
        Route::get('/show_cart', [CartController::class, 'index'])->name('show.cart');
        Route::post('/add_product_to_cart/{id}', [CartController::class, 'addProducttoCart'])->name('add.cart');
        Route::put('/update_product_from_cart/{id}', [CartController::class, 'updateCart'])->name('update.sopping.cart');
        Route::delete('/delete-cart-product/{id}', [CartController::class, 'deletecart'])->name('delete.cart.product');
        Route::get('/problem',  [ProblemController::class, 'show'])->name('problem');
        Route::post('/problem/store',  [ProblemController::class, 'store'])->name('problem.store');
        Route::GET('/quiry',  [SearchController::class, 'result'])->name('search.search');
        Route::GET('/filter',  [SearchController::class, 'filter'])->name('filter');
        Route::GET('/filter_respone',  [SearchController::class, 'respone'])->name('respone.filter');
        Route::post('/review/store/{id}',  [RateProductController::class, 'store'])->name('review.store');
        Route::get('/review/show/{id},', [RateProductController::class, 'show'])->name('review.show');
        Route::resource('profile', ProfileController::class);
        Route::PUT('profile/updateprofile/{id}', [ProfileController::class, 'update'])->name('update.profile');
        Route::get('/order_place,', [OrderController::class, 'store'])->name('Order.Place');
        Route::get('/Order/history', [OrderController::class, 'get_User_Orders'])->name('history.order');
        Route::get('/Order/products/{id}', [OrderController::class, 'getOrder_Product'])->name('product.order');
    });

    Route::get('/verfiy-mail/{token}', [UserController::class, 'verficationMail']);
    Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::get('/session', [PaymentController::class, 'session'])->name('session');
    Route::get('/success', [PaymentController::class, 'success'])->name('success');
});
