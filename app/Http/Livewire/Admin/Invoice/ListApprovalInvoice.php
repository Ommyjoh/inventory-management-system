<?php

namespace App\Http\Livewire\Admin\Invoice;

use App\Models\Invoice;
use Livewire\Component;

class ListApprovalInvoice extends Component
{
    public function render()
    {
        $invoices = Invoice::where('status','PENDING')
                    ->latest()
                    ->paginate(20);

        return view('livewire.admin.invoice.list-approval-invoice', 
        [
            'invoices' => $invoices
        ]);
    }
}
