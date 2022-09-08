<?php

namespace App\Http\Livewire\Admin\Invoice;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Supplier;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class CreateInvoice extends Component
{
    public $invNumber, $supplierId, $categoryId, $productId, $stock;
    public $state = [];
    public $custName, $supName, $catName, $prodName;

    public function approveInvoice(){

        Validator::make($this->state, [
            'custNo' =>'required',
            'supNo' => 'required',
            'catNo' => 'required',
            'prodNo' => 'required'
        ])->validate();
        
        

        $customer = Customer::find($this->state['custNo']);
        $supplier= Supplier::find($this->state['supNo']);
        $category= Category::find($this->state['catNo']);
        $product= Product::find($this->state['prodNo']);

        $this->custName = $customer->name;
        $this->supName = $supplier->name;
        $this->catName = $category->name;
        $this->prodName = $product->name;

    }

    public function getSupplierId($id){
        $this->supplierId = $id;
    }

    public function getCategoryId($id){
        $this->categoryId = $id;
    }

    public function getProductId($id){
        $this->invNumber = "T-".rand(1000, 9999)."-".rand(10, 99)."-". rand(100, 999);
        $this->productId = $id;
    }
    public function render()
    {

        $stockNo = Stock::where('supplier_id', $this->supplierId)
                ->where('category_id', $this->categoryId)
                ->where('product_id', $this->productId)
                ->get()->toArray();

        if(empty($stockNo)){
            $this->stock = 0;
        } else {
            $this->stock = $stockNo[0]['stock'];
        }

        return view('livewire.admin.invoice.create-invoice',
        [
            'customers' => Customer::latest()->get(),
            'suppliers' => Supplier::latest()->get(),
            'products' => Product::where('supplier_id', $this->supplierId)->latest()->get(),
            
        ]);
    }
}
