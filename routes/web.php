<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/home', function () {
//     return view('dashboard.index');
// });

Route::get('/add_product', function () {
    return view('dashboard.product.add_product');
});
Route::get('/manage_product',function (){
    return view('dashboard.product.manage_product');
});

Route::get('supplier', function () {
    return view('dashboard.peoples.suppliers.supplier');
});

Route::get('customers', function () {
    return view('dashboard.peoples.customers.customers');
});

Route::get('employee', function () {
    return view('dashboard.peoples.employees.employee');
});

Route::get('invoice', function(){
    return view('dashboard.invoice');
});
Route::get('profile', function() {
    return view('dashboard.profile');
});

Route::get('pdf','HomeController@generatePDF');
Route::get('product/pdf','ProductController@productPdf');

Route::resource('product', 'ProductController');
Route::resource('suppliers', 'SuppliersController');
Route::resource('customers', 'CustomersController');
Route::resource('employees', 'EmployeesController');
Route::resource('invoices', 'Invoices');
Route::resource('invoices', 'Invoices');
