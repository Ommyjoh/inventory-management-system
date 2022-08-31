<?php

namespace App\Http\Livewire\Admin\Suppliers;

use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class ListSupplies extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleted' => 'deleteSupplier'];

    public $state = [];
    public $searchTerm;

    public $editModal = false;
    public $supplier;
    public $supplierToDelete;

    public function addSupplier(){
        Validator::make($this->state,[
            'name' => 'required',
            'telephone' => 'required|numeric|digits:10',
            'email' => 'required|email|unique:suppliers'
        ],
        [
            'name.required' => 'Please fill supplier name',
            'telephone.required' =>'Please fill supplier telephone',
            'telephone.numeric' => 'Please remove Letters in a number',
            'telephone.digits' => 'Please enter valid number',
            'email.required'=> 'Please fill supplier email address',
            'email.email' => 'Please fill valid email address',
            'email.unique' => 'Please select another email address'
        ])->validate();

        Supplier::create($this->state);
        $this->dispatchBrowserEvent('hideForm', ['message'=>'Supplier Added Successfully!']);
    }

    public function addNewSupplierModal(){
        $this->editModal = false;
        $this->reset();
        $this->dispatchBrowserEvent('showForm');
    }

    public function editSupplierForm(Supplier $supplier){
        $this->editModal = true;
        $this->supplier = $supplier;
        $this->state = $supplier->toArray();
        $this->dispatchBrowserEvent('showForm');
    }

    public function editSupplier(){
        $validatedData =  Validator::make($this->state,[
                                'name' => 'required',
                                'telephone' => 'required|numeric|digits:10',
                                'email' => 'required|email|unique:suppliers,email,'.$this->supplier->id,
                                'address' => 'nullable'
                            ],
                            [
                                'name.required' => 'Please fill supplier name',
                                'telephone.required' =>'Please fill supplier telephone',
                                'telephone.numeric' => 'Please remove Letters in a number',
                                'telephone.digits' => 'Please enter valid number',
                                'email.required'=> 'Please fill supplier email address',
                                'email.email' => 'Please fill valid email address',
                            ])->validate();

        $this->supplier->update($validatedData);
        $this->dispatchBrowserEvent('hideForm', ['message' => 'Supplier Updated Successfully!']);
    }

    public function showDeleteConfirmation($id){
        $this->supplierToDelete = $id;
        $this->dispatchBrowserEvent('deleteConfirmation');
    }

    public function deleteSupplier(){
        $supplier  = Supplier::findOrFail($this->supplierToDelete);
        
        $supplier->delete();
        $this->dispatchBrowserEvent('deletedSuccessModal', ['message' => 'Supplier Deleted Successfully!']);
    }

    public function render()
    {
        $suppliers = Supplier::query()
        ->where('name', 'like', '%'. $this->searchTerm . '%')
        ->orWhere('email', 'like', '%'. $this->searchTerm . '%')
        ->orWhere('address', 'like', '%'. $this->searchTerm . '%')
        ->latest()->paginate(20);
        return view('livewire.admin.suppliers.list-supplies',
            [
                'suppliers' => $suppliers
            ]
        );
    }
}
