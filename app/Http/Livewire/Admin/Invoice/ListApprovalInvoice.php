<?php

namespace App\Http\Livewire\Admin\Invoice;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

class ListApprovalInvoice extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    
    public function render()
    {
        $invoices = Invoice::where('status','PENDING')
                    ->latest()
                    ->paginate(20);

        $invoicesCount = Invoice::where('status','PENDING')
                        ->count();

        return view('livewire.admin.invoice.list-approval-invoice', 
        [
            'invoices' => $invoices,
            'invoicesCount' => $invoicesCount 
        ]);
    }
}
