<?php

namespace App\Http\Livewire\Admin\Invoice;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Supplier;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class CreateInvoice extends Component
{
    public $invNumber;
    public $state = [];
    public $custName, $supName, $catName, $prodName;

    public function approveInvoice(){

        Validator::make($this->state, [
            'custNo' =>'required',
            'supNo' => 'required',
            'catNo' => 'required',
            'prodNo' => 'required'
        ])->validate();
        
        $this->invNumber = "T-".rand(1000, 9999)."-".rand(10, 99)."-". rand(100, 999);

        $this->custName = Customer::find($this->state['custNo']);
        $this->supName = Supplier::find($this->state['supNo']);
        $this->catName = Category::find($this->state['catNo']);
        $this->prodName = Product::find($this->state['prodNo']);

    }
    public function render()
    {
        return view('livewire.admin.invoice.create-invoice');
    }
}
