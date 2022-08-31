<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class ListProducts extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleted' => 'deleteProduct'];

    public $state = [];
    public $searchTerm;

    public $editModal = false;
    public $product;
    public $productToDelete;

    public function addProduct(){
        Validator::make($this->state,[
            'name' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
        ],
        [
            'name.required' => 'Please fill product name',
            'supplier_id.required' => 'Please select supplier name',
            'category_id.required' => 'Please select category name',
        ])->validate();

        Product::create($this->state);
        $this->dispatchBrowserEvent('hideForm', ['message'=>'Product Added Successfully!']);
    }

    public function addNewProductModal(){
        $this->editModal = false;
        $this->reset();
        $this->dispatchBrowserEvent('showForm');
    }

    public function editProductForm(Product $product){
        $this->editModal = true;
        $this->product = $product;
        $this->state = $product->toArray();
        $this->dispatchBrowserEvent('showForm');
    }

    public function editProduct(){
        $validatedData =  Validator::make($this->state,[
                                'name' => 'required',
                                'supplier_id' => 'required',
                                'category_id' => 'required', 
                            ],
                            [
                                'name.required' => 'Please fill product name',
                                'supplier_id.required' => 'Please select supplier name',
                                'category_id.required' => 'Please select category name',
                            ])->validate();

        $this->product->update($validatedData);
        $this->dispatchBrowserEvent('hideForm', ['message' => 'Product Updated Successfully!']);
    }

    public function showDeleteConfirmation($id){
        $this->productToDelete = $id;
        $this->dispatchBrowserEvent('deleteConfirmation');
    }

    public function deleteProduct(){
        $product  = Product::findOrFail($this->productToDelete);
        
        $product->delete();
        $this->dispatchBrowserEvent('deletedSuccessModal', ['message' => 'Product Deleted Successfully!']);
    }

    public function render()
    {
        $products = Product::query()
        ->where('name', 'like', '%'. $this->searchTerm . '%')
        ->latest()->paginate(20);

        $suppliers = Supplier::all(); 

        $categories = Category::all();

        return view('livewire.admin.products.list-products',
        [
            'products' => $products,
            'suppliers' => $suppliers,
            'categories' => $categories
        ]
    );
    }
}
