<?php

namespace App\Http\Livewire\Admin\Purchases;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;

class CreatePurchases extends Component
{
    public $randNumber;
    public $state = [];
    public $supName, $catName, $prodName, $qty, $unitPrice, $discPrice;

    public $rules = [
        'qty' => 'required',
        'unitPrice' => 'required'
    ];


    public function addPurchaseDetails(){

        Validator::make($this->state, [
            'supName' => 'required',
            'catName' => 'required',
            'prodName' => 'required'
        ])->validate();


        $this->randNumber = "PA".rand(1000, 9999);
        $this->supName = $this->state['supName'];
        $this->catName = $this->state['catName'];
        $this->prodName = $this->state['prodName'];
    }

    public function addPurchase() {
        
        Validator::make($this->state, [
            'supName' => 'required',
            'catName' => 'required',
            'prodName' => 'required'
        ])->validate();

        $this->validate();

        $initialPrice = intval($this->qty) * intval($this->unitPrice);
        $totalPrice = $initialPrice - intval($this->discPrice);
        $status = "PENDING";

        Purchase::create([
            'supName' => $this->state['supName'],
            'catName' => $this->state['catName'],
            'prodName' => $this->state['prodName'],
            'pNo' => $this->randNumber,
            'qty' => $this->qty,
            'discount' => $this->discPrice,
            'totalPrice' => $totalPrice,
            'status' => $status
        ]);

        $this->dispatchBrowserEvent('success', ['message'=>'Purchase Added Successfully!']);
        $this->reset();
    }

    public function render()
    {
        $initialPrice = intval($this->qty) * intval($this->unitPrice);
        $totalPrice = $initialPrice - intval($this->discPrice);

        $suppliers = Supplier::all();
        $categories = Category::all();
        $products = Product::all();

        return view('livewire.admin.purchases.create-purchases',
        [
            'suppliers' => $suppliers,
            'categories' => $categories,
            'products' => $products,
            'initialPrice' => $initialPrice,
            'totalPrice' => $totalPrice
        ]
    );
    }
}
