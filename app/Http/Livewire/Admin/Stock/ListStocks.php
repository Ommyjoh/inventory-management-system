<?php

namespace App\Http\Livewire\Admin\Stock;

use App\Models\Stock;
use Livewire\Component;
use Livewire\WithPagination;

class ListStocks extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchTerm;

    public function render()
    {
        $stocks = Stock::latest()->paginate(20);
        $stockCount = Stock::all()->count();
        return view('livewire.admin.stock.list-stocks',
        [
            'stocks' => $stocks,
            'stockCount' => $stockCount
        ]);
    }
}
