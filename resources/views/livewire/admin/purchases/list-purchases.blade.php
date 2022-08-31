<div>

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
        </div>

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Purchase No</th>
                    <th>Date</th>
                    <th>Supplier</th>
                    <th>Category</th>
                    <th>Qty</th>
                    <th>Product Name</th>
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
                        <td> {{ $purchase->supName }} </td>
                        <td> {{ $purchase->catName }} </td>
                        <td> {{ $purchase->qty }} </td>
                        <td> {{ $purchase->prodName }} </td>
                        <td class="text-center">
                            @if ($purchase->status == "PENDING")
                                <span class="badge bg-warning text-dark py-2 px-2">Pending</span>
                            @else
                                <span class="badge bg-primary text-dark py-2 px-2">Approved</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($purchase->status == "PENDING")
                                <a href="#"> <i class="fa fa-check-circle  fs-6 text-primary pr-2" title="approve"></i> </a>
                                <a href="#"><i class="nav-icon fa fa-trash fs-6 text-danger" title="delete"></i></a>
                            @else
                                
                            @endif
                        </td>
                    </tr>
                @empty
                    
                @endforelse

            </tbody>

        </table>
    </div>

</div>
