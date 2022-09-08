<?php

namespace App\Http\Livewire\Admin\Invoice;

use Livewire\Component;

class CreateInvoice extends Component
{

    public function approveInvoice(){
        dd('Here');
    }
    public function render()
    {
        return view('livewire.admin.invoice.create-invoice');
    }
}
