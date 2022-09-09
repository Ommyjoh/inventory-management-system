<div>

    <!-- [ breadcrumb ] start -->
    <div class="page-header">
       <div class="page-block">
           <div class="row align-items-center">
               <div class="col-md-12">
                   <div class="page-header-title">
                       <h5 class="m-b-10">Manage Invoices</h5>
                   </div>
                   <ul class="breadcrumb">
                       <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                       <li class="breadcrumb-item"><a href="{{ route('admin.listApprovalInvoices') }}">Manage Invoice / Approval Invoices</a></li>
                   </ul>
               </div>
           </div>
       </div>
   </div>
   <!-- [ breadcrumb ] end -->

   <div class="card flat-card">
       <div class="d-flex justify-content-between m-2 align-items-center">
           <div class="px-2">
               <h5>Invoice All Data</h5>
           </div>

           <div class="btn-group" role="group" aria-label="Basic outlined example">
               <h5 class="pr-4">Total of {{ $invoicesCount }} Invoices</h5>
           </div>
       </div>

       <table class="table table-bordered">

           <thead>
               <tr>
                   <th style="width: 10px">#</th>
                   <th>Invoice No</th>
                   <th>Date</th>
                   <th>Customer Name</th>
                   <th>Product Name</th>
                   <th>Qty</th>
                   <th>Amount</th>
                   <th>Action</th>
               </tr>
           </thead>

           <tbody>
                   @forelse ($invoices as $invoice)
                   <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $invoice->iNo }}</td>
                        <td>{{ $invoice->created_at }}</td>
                        <td>{{ $invoice->customer->name }}</td>
                        <td>{{ $invoice->product->name }}</td>
                        <td>{{ $invoice->qty }}</td>
                        <td>{{ $invoice->totalPrice }}</td>
                        <td class="text-center">
                            <a wire:click.prevent = "approveInvoiceAlert({{$invoice}})" href="#"> <i class="fa fa-check-circle  fs-6 text-primary pr-2" title="approve"></i> </a>
                            <a wire:click.prevent = "deleteAlert({{$invoice->id}})" href="#"><i class="nav-icon fa fa-trash fs-6 text-danger" title="delete"></i></a>
                        </td>
                    </tr>
                   @empty
                        <td colspan="9" class="text-center">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <img style="width: 200px" src="{{ asset('backend/dist/assets/images/notfound.png') }}" alt="">
                                <span class="mt-2">No Invoice Records!</span>
                            </div>
                        </td>
                   @endforelse
           </tbody>

       </table>

       <div class="d-flex justify-content-center">
        {{ $invoices->links() }}
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
        title: 'Approve this invoice?',
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
            'Invoice not approved!',
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