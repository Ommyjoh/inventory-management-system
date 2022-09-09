<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Livewire\Admin\Categories\ListCategories;
use App\Http\Livewire\Admin\Customers\ListCustomers;
use App\Http\Livewire\Admin\Invoice\CreateInvoice;
use App\Http\Livewire\Admin\Invoice\ListApprovalInvoice;
use App\Http\Livewire\Admin\Invoice\ListInvoice;
use App\Http\Livewire\Admin\Products\ListProducts;
use App\Http\Livewire\Admin\Purchases\CreatePurchases;
use App\Http\Livewire\Admin\Purchases\ListPurchases;
use App\Http\Livewire\Admin\Stock\ListStocks;
use App\Http\Livewire\Admin\Suppliers\ListSupplies;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', DashboardController::class)->name('admin.dashboard');

Route::get('admin/listsupplies', ListSupplies::class)->name('admin.listSupplies');

Route::get('admin/listcustomers', ListCustomers::class)->name('admin.listCustomers');

Route::get('admin/listcategories', ListCategories::class)->name('admin.ListCategories');

Route::get('admin/listproducts', ListProducts::class)->name('admin.listProducts');

Route::get('admin/listpurchases', ListPurchases::class)->name('admin.listPurchases');

Route::get('admin/createpurchases', CreatePurchases::class)->name('admin.createPurchases');

Route::get('admin/liststocks', ListStocks::class)->name('admin.listStocks');

Route::get('admin/listinvoices', ListInvoice::class)->name('admin.listInvoices');

Route::get('admin/createinvoice', CreateInvoice::class)->name('admin.createInvoice');

Route::get('admin/listapprovalinvoices', ListApprovalInvoice::class)->name('admin.listApprovalInvoices');