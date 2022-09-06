<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Stock;
use App\Models\Supplier;
use Livewire\Component;

class FirstSummary extends Component
{
    public function render()
    {

        return view('livewire.admin.dashboard.first-summary',
        [
            'allProducts' => Stock::all()->count(),
            'allSuppliers' => Supplier::all()->count(),
            'allCustomers' => Customer::all()->count(),
            'allCategories' => Category::all()->count(),
            'lowStocks' => Stock::all()->where('stock', '<=', 30)->count(),
            'mostStocks' => Stock::all()->where('stock', '>=', 60)->count()
        ]);
    }
}
