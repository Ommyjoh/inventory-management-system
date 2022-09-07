<div>
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Manage Stocks</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.listStocks') }}">Stocks / All Stocks</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <div class="card flat-card">
        <div class="d-flex justify-content-end m-2">
                <button style="border-radius: 20px" class="btn btn-primary"> <i class="nav-icon fa fa-print"></i> Stock Report Print</button>
        </div>

        <div class="d-flex justify-content-between m-2 align-items-center">
            <div class="px-2">
                <h5>Stock Report</h5>
            </div>

            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <h5 class="pr-4">Total {{ $stockCount }} Stocks</h5>
            </div>
            
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Product</th>
                    <th>Supplier</th>
                    <th>Category</th>
                    <th class="text-center">In Qty</th>
                    <th class="text-center">Out Qty</th>
                    <th class="text-center">Stock</th>
                </tr>
            </thead>
            <tbody wire:loading.class="text-muted">
                @forelse ($stocks as $stock)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $stock->product->name }}</td>
                        <td>{{ $stock->supplier->name }}</td>
                        <td>{{ $stock->category->name }}</td>
                        <td class="text-center">
                            <span class="badge p-2 rounded-pill bg-primary">{{ $stock->in_qty }}</span>
                        </td>
                        <td class="text-center">
                            @if ($stock->out_qty == NULL)
                                <span class="badge p-2 rounded-pill bg-info">0</span>
                            @else
                                <span class="badge p-2 rounded-pill bg-info">{{ $stock->out_qty }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <span class="badge p-2 rounded-pill bg-danger">{{ $stock->stock }}</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <img style="width: 200px" src="{{ asset('backend/dist/assets/images/notfound.png') }}" alt="">
                                <span class="mt-2">No result found!</span>
                            </div>
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

        <div class="d-flex justify-content-center">
            {{ $stocks->links() }}
        </div>
    </div>

    
</div>