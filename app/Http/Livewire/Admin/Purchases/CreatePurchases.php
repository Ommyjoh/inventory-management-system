<?php

namespace App\Http\Livewire\Admin\Purchases;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;

class CreatePurchases extends Component
{
    public $randNumber;
    public $state = [];
    public $supId, $catId, $prodId, $qty, $unitPrice, $discPrice;
    public $supName, $catName, $prodName, $Sid;

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

        $stock = Stock::
                whereSupplierId($this->state['supId'])
                ->whereCategoryId($this->state['catId'])
                ->whereProductId($this->state['prodId'])
                ->get()->toArray();

        if (empty($stock)) {

            Stock::create([
                'supplier_id' => $this->state['supId'],
                'category_id' => $this->state['catId'],
                'product_id' => $this->state['prodId'],
                'in_qty' => $this->qty,
                'out_qty' => 0,
                'stock' => $this->qty,
            ]);

        } else {

            $qty = $this->qty + $stock[0]['in_qty'];
            $stockQty = $this->qty + $stock[0]['stock'];

            $updateStock = Stock::find($stock[0]['id']);

            $updateStock->update([
                'in_qty' => $qty,
                'stock' => $stockQty,
            ]);
        }
        

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
