<?php

namespace App\Http\Livewire\Admin\Invoice;

use Livewire\Component;

class CreateInvoice extends Component
{
    public $invNumber;
    public $state = [];

    public function approveInvoice(){
        
        $this->invNumber = "T-".rand(1000, 9999)."-".rand(10, 99)."-". rand(100, 999);
    }
    public function render()
    {
        return view('livewire.admin.invoice.create-invoice');
    }
}
