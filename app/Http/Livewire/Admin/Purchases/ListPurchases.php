<?php

namespace App\Http\Livewire\Admin\Purchases;

use App\Models\Stock;
use Livewire\Component;
use App\Models\Purchase;
use Livewire\WithPagination;

class ListPurchases extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $listeners = ['approve' => 'approvePurchase', 'deleted' => 'deletePurchase'];
    public $approvePurchase;
    public $deleteId;
    public $status;
    // protected $queryString = ['status'];

    public function approvePurchaseAlert(Purchase $purchase){

        $this->approvePurchase = $purchase;
        $this->dispatchBrowserEvent('approvalConfirmation');
    }

    public function approvePurchase(){

        $this->approvePurchase->status = "APPROVED";
        $this->approvePurchase->save();

        $stock = Stock::
                whereSupplierId($this->approvePurchase->supplier_id)
                ->whereCategoryId($this->approvePurchase->category_id)
                ->whereProductId($this->approvePurchase->product_id)
                ->get()->toArray();

        if (empty($stock)) {

            Stock::create([
                'supplier_id' => $this->approvePurchase->supplier_id,
                'category_id' => $this->approvePurchase->category_id,
                'product_id' => $this->approvePurchase->product_id,
                'in_qty' => $this->approvePurchase->qty,
                'stock' => $this->approvePurchase->qty,
            ]);

        } else {

            $qty = $this->approvePurchase->qty + $stock[0]['in_qty'];
            $stockQty = $this->approvePurchase->qty + $stock[0]['stock'];

            $updateStock = Stock::find($stock[0]['id']);

            $updateStock->update([
                'in_qty' => $qty,
                'stock' => $stockQty,
            ]);
        }

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
