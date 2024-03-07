<?php

use App\Http\Controllers\Api\AcessController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\CatgoryContoller;
use App\Http\Controllers\Api\CobonDiscountController;
use App\Http\Controllers\Api\CodeCheckController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\infromationRetiavl;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\OrderProdctController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\PillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductRatingController;
use App\Http\Controllers\Api\ResetPasswordController;
use App\Http\Controllers\Api\SerachController;
use App\Http\Controllers\Api\StoreCsvController;
use App\Models\Couppon;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('products', ProductController::class);
Route::apiResource('catgory', CatgoryContoller::class);
Route::apiResource('Company', CompanyController::class);
Route::get('company-product/{companyId}', [CompanyController::class, 'getC-ompanyProducts']);
Route::post('create-product', [ProductController::class, 'create']);
Route::post('update-product', [ProductController::class, 'update_product']);
Route::post('delete-product', [ProductController::class, 'destroy']);
Route::get('latest-product', [ProductController::class, 'getProductsSortedByLatestTime']);

Route::get('get-image-link/{image}', [ProductController::class, 'getImage']);

Route::apiResource('catgory', CatgoryContoller::class);
Route::post('create-catgory', [CatgoryContoller::class, 'create']);
Route::post('update-catgory', [CatgoryContoller::class, 'update']);
Route::post('delete-catgory', [CatgoryContoller::class, 'destroy']);
Route::get('products-in-catgory/{categoryId}', [CatgoryContoller::class, 'getCategoryProducts']);


Route::apiResource('Company', CompanyController::class);
Route::post('create-Company', [CompanyController::class, 'create']);
Route::post('update-Company', [CompanyController::class, 'update']);
Route::post('delete-Company', [CompanyController::class, 'destroy']);
Route::get('product-of-company/{companyId}', [CompanyController::class, 'getCompanyProducts']);

Route::get('show-address-user', [AddressController::class, 'index'])->middleware('auth:sanctum');;
Route::post('create-address-user', [AddressController::class, 'store'])->middleware('auth:sanctum');;
Route::post('update-address-user', [AddressController::class, 'update'])->middleware('auth:sanctum');;
Route::post('delete-address-user', [AddressController::class, 'destroy'])->middleware('auth:sanctum');;

Route::post('/user/store/product/csv', [StoreCsvController::class, 'importCsv'])->middleware('auth:sanctum');


Route::get('/IR', [infromationRetiavl::class, 'IR']);

Route::get('Serach/searchByName', [SerachController::class, 'searchByName']);
Route::get('Serach/searchByPrice', [SerachController::class, 'searchByPrice']);
Route::get('Serach/searchByCategory', [SerachController::class, 'searchByCategory']);
Route::get('Serach/searchByCompany', [SerachController::class, 'searchByCompany']);

Route::apiResource('user', UserController::class)->middleware('auth:sanctum');

Route::get('user/all-users', [UserController::class, 'index'])->middleware('auth:sanctum');
Route::post('user/show-user', [UserController::class, 'show'])->middleware('auth:sanctum');
Route::post('user/delete-user', [UserController::class, 'destroy'])->middleware('auth:sanctum');
Route::post('user/update-user', [UserController::class, 'update'])->middleware('auth:sanctum');

Route::post('/auth/register', [UserController::class, 'createUser']);
Route::post('/auth/login', [UserController::class, 'loginUser']);







Route::post('/create-order', [OrderProdctController::class, 'createOrder'])->middleware('auth:sanctum');
Route::post('/show-order/{id}', [OrderProdctController::class, 'show'])->middleware('auth:sanctum');
Route::post('/order-time-range', [OrderProdctController::class, 'getOrdersInTimeRange'])->middleware('auth:sanctum');
Route::apiResource('/order', OrderProdctController::class)->middleware('auth:sanctum');



Route::get('products/{productId}/rate', [ProductRatingController::class, 'rateProduct'])->middleware('auth:sanctum');


Route::get('/send-verfiy-email/{email}', [UserController::class, 'sendVerfication'])->middleware('auth:sanctum');


Route::post('/discount', [CobonDiscountController::class, 'applyDiscount'])->middleware('auth:sanctum');
Route::post('/update-cobon/{id}', [CobonDiscountController::class, 'update_cobon'])->middleware('auth:sanctum');

Route::apiResource('/cobon', CobonDiscountController::class)->middleware('auth:sanctum');


Route::post('/offers/store', [OfferController::class, 'store']);

Route::delete('/offers/{offerId}', [OfferController::class, 'deleteOffer']);

Route::post('/offers/modify/{offerId}', [OfferController::class, 'modifyOffer']);

Route::get('/offers', [OfferController::class, 'allOffers']);


Route::get('/show/offer/{id}', [OfferController::class, 'show_precent_offer']);


// Route::post('/create-payment-intent', [PaymentController::class, 'createPaymentIntent']);

Route::post('/payment', [PaymentController::class, 'payment']);

Route::get('/pill/{userId}/{orderId}', [PillController::class, 'Pill'])->middleware('auth:sanctum');


Route::post('/send-message', [ContactController::class, 'sendMessage'])->middleware('auth:sanctum');
Route::get('/all-message', [ContactController::class, 'get_all_message'])->middleware('auth:sanctum');

// Route::post('/send-response/{messageId}', [ContactController::class, 'sendResponse'])->middleware('auth:sanctum');

// Route::post('password/email',  ForgotPasswordController::class);
// Route::post('password/code/check', CodeCheckController::class);
// Route::post('password/reset', ResetPasswordController::class);
