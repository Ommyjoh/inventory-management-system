<?php

namespace App\Http\Livewire\Admin\Invoice;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class CreateInvoice extends Component
{
    public $invNumber;
    public $state = [];

    public function approveInvoice(){

        Validator::make($this->state, [
            'custNo' =>'required',
            'supNo' => 'required',
            'catNo' => 'required',
            'prodNo' => 'required'
        ])->validate();
        
        $this->invNumber = "T-".rand(1000, 9999)."-".rand(10, 99)."-". rand(100, 999);
    }
    public function render()
    {
        return view('livewire.admin.invoice.create-invoice');
    }
}
