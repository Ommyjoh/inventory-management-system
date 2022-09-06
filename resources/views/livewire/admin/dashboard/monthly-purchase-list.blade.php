<div class="card flat-card">
    <div class="py-2 px-4">
        <h5><i style="color: gray" class="nav-icon fa fa-history "></i> Top Monthly Purchase List</h5>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Date</th>
                <th>Product Name</th>
                <th>Supplier</th>
                <th>Category</th>
                <th>Qty</th>
                <th>Total Price</th>
            </tr>
        </thead>

        <tbody>
        </tbody>
            @forelse ($purchases as $purchase)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $purchase->updated_at }}</td>
                    <td>{{ $purchase->product->name }}</td>
                    <td>{{ $purchase->supplier->name }}</td>
                    <td>{{ $purchase->category->name }}</td>
                    <td>{{ $purchase->qty }}</td>
                    <td>{{ $purchase->totalPrice }}</td>
                </tr>
            @empty
                
                <tr>
                    <td colspan="7" class="text-center">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <img style="width: 200px" src="{{ asset('backend/dist/assets/images/notfound.png') }}" alt="">
                            <span class="mt-2">No Purchase This Month!</span>
                        </div>
                    </td>
                </tr>

            @endforelse
    </table>
</div>