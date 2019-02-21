<?php
route::get('/',[
    'uses'=>'NewShopController@index',
    'as'=>'/'
]);

route::get('/female-product',[
    'uses'=>'NewShopController@femaleProduct',
    'as'=>'/female-product'
]);
route::get('/category-product/{id}',[
    'uses'=>'NewShopController@categoryProduct',
    'as'=>'category-product'
]);
route::get('/brand-product/{id}',[
    'uses'=>'NewShopController@brandProduct',
    'as'=>'brand-product'
]);
route::get('/male-product',[
    'uses'=>'NewShopController@maleProduct',
    'as'=>'/male-product'
]);

route::get('/code',[
    'uses'=>'NewShopController@code',
    'as'=>'code'
]);


route::get('/mail-us',[
    'uses'=>'NewShopController@mailUs',
    'as'=>'mail-us'
]);

route::get('/single-product/{id}',[
    'uses'=>'NewShopController@singleProduct',
    'as'=>'single-product'
]);

Route::get('/checkout', [
    'uses'  =>  'CheckoutController@index',
    'as'    =>  'checkout'
]);

Route::post('/shipping/save', [
    'uses'  =>  'CheckoutController@saveShippingInfo',
    'as'    =>  'new-shipping'
]);
Route::get('/checkout/payment', [
    'uses'  =>  'CheckoutController@paymentForm',
    'as'    =>  'checkout-payment'
]);
Route::post('/checkout/order', [
    'uses'  =>  'CheckoutController@newOrder',
    'as'    =>  'new-order'
]);

Route::get('/complete/order', [
    'uses'  =>  'CheckoutController@completeOrder',
    'as'    =>  'complete-order'
]);



route::get('user/login',[
    'uses'=>'NewShopController@login',
    'as'=>'user/login'
]);

Route::post('/customer/registration', [
    'uses'  =>  'CheckoutController@customerSignUp',
    'as'    =>  'customer-sign-up'
]);
Route::get('/checkout/shipping', [
    'uses'  =>  'CheckoutController@shippingForm',
    'as'    =>  'checkout-shipping'
]);








Route::get('/category/add',[
    'uses' => 'CategoryController@index',
    'as'=>'add-category'
]);
Route::post('/category/save',[
    'uses' => 'CategoryController@saveCategoryInfo',
    'as'=>'new-category'
]);

Route::get('/category/manage',[
    'uses' => 'CategoryController@manageCategoryInfo',
    'as'=>'manage-category'
]);

Route::get('/category/unpublished/{id}',[
    'uses' => 'CategoryController@unpublishedCategoryInfo',
    'as'=>'unpublished-category'
]);


Route::get('/category/published/{id}',[
    'uses' => 'CategoryController@publishedCategoryInfo',
    'as'=>'published-category'
]);

Route::get('/category/edit/{id}',[
    'uses' => 'CategoryController@editCategoryInfo',
    'as'=>'edit-category'
]);
Route::get('/category/delete/{id}',[
    'uses' => 'CategoryController@deleteCategoryInfo',
    'as'=>'delete-category'
]);
Route::post('/category/update',[
    'uses' => 'CategoryController@updateCategoryInfo',
    'as'=>'update-category'
]);

Route::get('/brand/add',[
   'uses'=>'BrandController@index',
   'as'=>'add-brand'
]);

Route::post('/brand/save',[
   'uses'=>'BrandController@saveBrandInfo',
   'as'=>'new-brand'
]);

Route::get('/brand/manage',[
   'uses'=>'BrandController@manageBrandInfo',
   'as'=>'manage-brand'
]);


Route::get('/brand/unpublished/{id}',[
    'uses' => 'BrandController@unpublishedBrandInfo',
    'as'=>'unpublished-brand'
]);


Route::get('/brand/published/{id}',[
    'uses' => 'BrandController@publishedBrandInfo',
    'as'=>'published-brand'
]);

Route::get('/brand/edit/{id}',[
    'uses' => 'BrandController@editBrandInfo',
    'as'=>'edit-brand'
]);

Route::post('/brand/update',[
    'uses' => 'BrandController@updateBrandInfo',
    'as'=>'update-brand'
]);

Route::get('/brand/delete/{id}',[
    'uses' => 'BrandController@deleteBrandInfo',
    'as'=>'delete-brand'
]);
Route::get('/product/add', [
    'uses'  =>  'ProductController@index',
    'as'    =>  'add-product'
]);


Route::post('/product/save', [
    'uses'  =>  'ProductController@saveProduct',
    'as'    =>  'new-product'
]);
Route::get('/product/manage', [
    'uses'  =>  'ProductController@manageProduct',
    'as'    =>  'manage-product'
]);


Route::get('/product/unpublished/{id}',[
    'uses' => 'ProductController@unpublishedProductInfo',
    'as'=>'unpublished-product'
]);


Route::get('/product/published/{id}',[
    'uses' => 'ProductController@publishedProductInfo',
    'as'=>'published-product'
]);

Route::get('/product/edit/{id}',[
    'uses' => 'ProductController@editProductInfo',
    'as'=>'edit-product'
]);

Route::post('/product/update',[
    'uses' => 'ProductController@updateProduct',
    'as'=>'update-product'
]);

Route::get('/product/delete/{id}',[
    'uses' => 'ProductController@deleteProductInfo',
    'as'=>'delete-product'
]);

Route::post('/cart/add', [
    'uses'  =>  'CartController@addToCart',
    'as'    =>  'add-to-cart'
]);

Route::get('/cart/show', [
    'uses'  =>  'CartController@showCart',
    'as'    =>  'show-cart'
]);

Route::get('/cart/delete/{id}', [
    'uses'  =>  'CartController@deleteCart',
    'as'    =>  'delete-cart-item'
]);
Route::post('/cart/update', [
    'uses'  =>  'CartController@updateCart',
    'as'    =>  'update-cart'
]);






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
