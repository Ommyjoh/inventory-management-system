<?php

namespace App\Http\Livewire\Admin\Purchases;

use Livewire\Component;
use App\Models\Purchase;
use Livewire\WithPagination;

class ListPurchases extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $listeners = ['approve' => 'approvePurchase', 'deleted' => 'deletePurchase'];
    public $approvedId;
    public $deleteId;
    public $status;
    // protected $queryString = ['status'];

    public function approvePurchaseAlert($id){

        $this->approvedId = $id;
        $this->dispatchBrowserEvent('approvalConfirmation');
    }

    public function approvePurchase(){

        $purchase = Purchase::findOrFail($this->approvedId);
        $purchase->status = "APPROVED";
        $purchase->save();

        $this->dispatchBrowserEvent('approvalSuccessModal', ['message'=>'Purchase Approved Successful!']);
    }

    public function deleteAlert($id){

        $this->deleteId = $id;
        $this->dispatchBrowserEvent('deleteConfirmation');
    }

    public function deletePurchase(){

        $purchase  = Purchase::findOrFail($this->deleteId);
        
        $purchase->delete();
        $this->dispatchBrowserEvent('deletedSuccessModal', ['message' => 'Purchase Deleted Successfully!']);
    }

    public function statusFilter($status = null){
        $this->resetPage();
        $this->status = $status;

    }

    public function render()
    {
        
        $purchases = Purchase::when($this->status, function($query, $status){
            return $query->where('status', $status);
        })
        ->latest()->paginate(20);

        return view('livewire.admin.purchases.list-purchases',
        [
            'purchases' => $purchases,
            'allPurchases' => Purchase::all()->count(),
            'pendingPurchases' => Purchase::whereStatus('PENDING')->count(),
            'approvedPurchases' => Purchase::whereStatus('APPROVED')->count()
        ]
    );
    }
}
