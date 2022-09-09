<div>

    <x-loading-indicator></x-loading-indicator>

    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Manage Purchases</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.listPurchases') }}">Manage Purchases / All Purchases</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
       
    <div class="card flat-card">
        <div class="d-flex justify-content-end m-2">
                <a href="{{ route('admin.createPurchases') }}"><button style="border-radius: 20px" class="btn btn-primary"> <i class="nav-icon fa fa-plus-circle"></i> Add Purchase</button></a>
        </div>
    
        <div class="d-flex justify-content-between m-2 align-items-center">
            <div class="px-2">
                <h5>Purchase All Data</h5>
            </div>

            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <button wire:click = "statusFilter" type="button" class="btn btn-outline-dark {{ is_null($status) ? 'active' : ' ' }}">All 
                    <span class="badge rounded-pill bg-info">{{ $allPurchases }}</span>
                </button>
                <button wire:click = "statusFilter('pending')" type="button" class="btn btn-outline-dark {{ ($status == 'pending') ? ' active' : ' ' }}">Pending
                    <span class="badge rounded-pill bg-warning">{{ $pendingPurchases }}</span>
                </button>
                <button wire:click = "statusFilter('approved')" type="button" class="btn btn-outline-dark {{ ($status == 'approved') ? ' active ' : ' ' }}">Approved
                    <span class="badge rounded-pill bg-primary">{{ $approvedPurchases }}</span>
                </button>
            </div>
        </div>

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Purchase No</th>
                    <th>Date</th>
                    <th>Supplier</th>
                    <th>Qty</th>
                    <th>Product Name</th>
                    <th>Total price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($purchases as $purchase)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $purchase->pNo }} </td>
                        <td> {{ $purchase->created_at }} </td>
                        <td> {{ $purchase->supplier->name }} </td>
                        <td> {{ $purchase->qty }} </td>
                        <td> {{ $purchase->product->name }} </td>
                        <td>{{ $purchase->totalPrice }}</td>
                        <td class="text-center">
                            @if ($purchase->status == "PENDING")
                                <span class="badge bg-warning text-dark py-2 px-2">Pending</span>
                            @else
                                <span class="badge bg-primary text-white py-2 px-2">Approved</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($purchase->status == "PENDING")
                                <a wire:click.prevent = "approvePurchaseAlert({{$purchase}})" href="#"> <i class="fa fa-check-circle  fs-6 text-primary pr-2" title="approve"></i> </a>
                                <a wire:click.prevent = "deleteAlert({{$purchase->id}})" href="#"><i class="nav-icon fa fa-trash fs-6 text-danger" title="delete"></i></a>
                            @else
                                
                            @endif
                        </td>
                    </tr>
                @empty
                    <td colspan="9" class="text-center">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <img style="width: 200px" src="{{ asset('backend/dist/assets/images/notfound.png') }}" alt="">
                            <span class="mt-2">No Purchase Records!</span>
                        </div>
                    </td>
                @endforelse

            </tbody>

        </table>

        <div class="d-flex justify-content-center">
            {{ $purchases->links() }}
        </div>
    </div>

</div>

<x-delete-confirmation></x-delete-confirmation>

@push('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    window.addEventListener('approvalConfirmation', event=>{
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success ml-2',
            cancelButton: 'btn btn-danger mr-2'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Approve this purchase?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, approve!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            
            Livewire.emit('approve');

        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Purchase not approved!',
            'error'
            )
        }
        })
    })


    window.addEventListener('approvalSuccessModal', event=>{

        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
        swalWithBootstrapButtons.fire(
        'Approved!',
        event.detail.message,
        'success'
    )

    })
</script>

@endpush
