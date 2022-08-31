<?php

namespace App\Http\Livewire\Admin\Purchases;

use App\Models\Purchase;
use Livewire\Component;

class ListPurchases extends Component
{
    public function render()
    {
        $purchases = Purchase::latest()->paginate(20);

        return view('livewire.admin.purchases.list-purchases',
        [
            'purchases' => $purchases
        ]
    );
    }
}
