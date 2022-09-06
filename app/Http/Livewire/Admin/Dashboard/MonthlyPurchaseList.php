<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Purchase;
use Livewire\Component;

class MonthlyPurchaseList extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard.monthly-purchase-list', 
        [
            'purchases' => Purchase::whereBetween('updated_at', [now()->firstOfMonth(), now()])
                        ->where('status', 'APPROVED')
                        ->orderBy('totalPrice', 'DESC')
                        ->limit(5)
                        ->get()
        ]);
    }
}
