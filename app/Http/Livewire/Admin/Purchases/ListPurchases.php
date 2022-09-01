<?php

namespace App\Http\Livewire\Admin\Purchases;

use App\Models\Purchase;
use Livewire\Component;

class ListPurchases extends Component
{
    public $listeners = ['approve' => 'approvePurchase', 'deleted' => 'deletePurchase'];
    public $approvedId;
    public $deleteId;

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

    public function render()
    {
        $purchases = Purchase::latest()->paginate(20);

        return view('livewire.admin.purchases.list-purchases',
        [
            'purchases' => $purchases
        ]
    );
    }
}
