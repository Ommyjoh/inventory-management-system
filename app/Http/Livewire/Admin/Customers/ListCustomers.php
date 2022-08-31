<?php

namespace App\Http\Livewire\Admin\Customers;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class ListCustomers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleted' => 'deleteCustomer'];

    public $state = [];
    public $searchTerm;

    public $editModal = false;
    public $customer;
    public $customerToDelete;

    public function addCustomer(){
        Validator::make($this->state,[
            'name' => 'required',
            'telephone' => 'required|numeric|digits:10',
            'email' => 'required|email|unique:suppliers'
        ],
        [
            'name.required' => 'Please fill customer name',
            'telephone.required' =>'Please fill customer telephone',
            'telephone.numeric' => 'Please remove Letters in a number',
            'telephone.digits' => 'Please enter valid number',
            'email.required'=> 'Please fill customer email address',
            'email.email' => 'Please fill valid email address',
            'email.unique' => 'Please select another email address'
        ])->validate();

        Customer::create($this->state);
        $this->dispatchBrowserEvent('hideForm', ['message'=>'Customer Added Successfully!']);
    }

    public function addNewCustomerModal(){
        $this->editModal = false;
        $this->reset();
        $this->dispatchBrowserEvent('showForm');
    }

    public function editCustomerForm(Customer $customer){
        $this->editModal = true;
        $this->customer = $customer;
        $this->state = $customer->toArray();
        $this->dispatchBrowserEvent('showForm');
    }

    public function editCustomer(){
        $validatedData =  Validator::make($this->state,[
                                'name' => 'required',
                                'telephone' => 'required|numeric|digits:10',
                                'email' => 'required|email|unique:suppliers,email,'.$this->customer->id,
                                'address' => 'nullable'
                            ],
                            [
                                'name.required' => 'Please fill customer name',
                                'telephone.required' =>'Please fill customer telephone',
                                'telephone.numeric' => 'Please remove Letters in a number',
                                'telephone.digits' => 'Please enter valid number',
                                'email.required'=> 'Please fill customer email address',
                                'email.email' => 'Please fill valid email address',
                            ])->validate();

        $this->customer->update($validatedData);
        $this->dispatchBrowserEvent('hideForm', ['message' => 'Customer Updated Successfully!']);
    }

    public function showDeleteConfirmation($id){
        $this->customerToDelete = $id;
        $this->dispatchBrowserEvent('deleteConfirmation');
    }

    public function deleteCustomer(){
        $customer  = Customer::findOrFail($this->customerToDelete);
        
        $customer->delete();
        $this->dispatchBrowserEvent('deletedSuccessModal', ['message' => 'Customer Deleted Successfully!']);
    }
    public function render()
    {
        $customers = Customer::query()
        ->where('name', 'like', '%'. $this->searchTerm . '%')
        ->orWhere('email', 'like', '%'. $this->searchTerm . '%')
        ->orWhere('address', 'like', '%'. $this->searchTerm . '%')
        ->latest()->paginate(20);
        return view('livewire.admin.customers.list-customers',
        [
            'customers' => $customers
        ]
    );
    }
}
