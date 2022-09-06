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
    public $supId, $catId, $prodId, $qty, $unitPrice, $discPrice;
    public $supName, $catName, $prodName, $Sid;
    public $supplierId;

    public $rules = [
        'qty' => 'required',
        'unitPrice' => 'required'
    ];

    public function idAssignment(){

        $this->supId = $this->state['supId'];
        $this->catId = $this->state['catId'];
        $this->prodId = $this->state['prodId'];
    }



    public function addPurchaseDetails(){


        Validator::make($this->state, [
            'supId' => 'required',
            'catId' => 'required',
            'prodId' => 'required'
        ])->validate();

        $this->randNumber = "PA".rand(1000, 9999);
        $this->idAssignment();

        $supplier = Supplier::find($this->supId);
        $category = Category::find($this->catId);
        $product = Product::find($this->prodId);

        $this->supName = $supplier->name;
        $this->catName = $category->name;
        $this->prodName = $product->name;

    }

    public function addPurchase() {
        
        Validator::make($this->state, [
            'supId' => 'required',
            'catId' => 'required',
            'prodId' => 'required'
        ])->validate();

        $this->validate();

        $initialPrice = intval($this->qty) * intval($this->unitPrice);
        $totalPrice = $initialPrice - intval($this->discPrice);
        $status = "PENDING";

        Purchase::create([
            'supplier_id' => $this->state['supId'],
            'category_id' => $this->state['catId'],
            'product_id' => $this->state['prodId'],
            'pNo' => $this->randNumber,
            'qty' => $this->qty,
            'discount' => $this->discPrice,
            'totalPrice' => $totalPrice,
            'status' => $status
        ]);
        

        $this->dispatchBrowserEvent('success', ['message'=>'Purchase Added Successfully!']);
        $this->reset();
    }

    public function getSupplierValue($id){
        $this->supplierId = $id;
    }

    public function render()
    {
        $initialPrice = intval($this->qty) * intval($this->unitPrice);
        $totalPrice = $initialPrice - intval($this->discPrice);

        $suppliers = Supplier::all();
        $categories = Category::all();
        $products = Product::all()->where('supplier_id', $this->supplierId);

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
