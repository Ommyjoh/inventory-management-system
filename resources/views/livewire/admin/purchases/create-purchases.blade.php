<div>
       
    <div class="card flat-card">
        <h4 class="text-center bg-primary text-white p-2">Complete Purchase</h4>
        <div class="col-lg-12">
            <form wire:submit.prevent="addPurchase" autocomplete="off">
                @csrf
                <div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-4">
                            <div class="row col-lg-6">
                                <label for="Name">Purchase No</label>
                                <input value="{{ $randNumber }}" type="text" class="form-control" readonly>
                            </div>

                            <div class="row col-lg-6">
                                <label for="Name">Supplier Name</label>
                                <select wire:model = "state.supId" wire:change="getSupplierValue($event.target.value)" class="form-select" aria-label="Default select example">
                                    <option selected>Choose supplier..</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{$supplier->id}}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="row col-lg-6">
                                <label for="Name">Category Name</label>
                                <select wire:model.defer = "state.catId" class="form-select" aria-label="Default select example">
                                    <option selected>Choose category..</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="row col-lg-6">
                                <label for="Name">Product Name</label>
                                <select wire:model.defer = "state.prodId" class="form-select" aria-label="Default select example">
                                    <option selected>Choose product..</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="mt-4">
                            <button wire:click="addPurchaseDetails" type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal"><i class="fa fa-plus mr-1"></i><a href="#" class="text-white">Prove purchase</a></button>
                        </div>

                        <table class="table table-bordered mt-2">

                            <thead>
                                <tr>
                                    <th>Supplier</th>
                                    <th>Category</th>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th>Initial price</th>
                                </tr>
                            </thead>
                
                            <tbody>
                               <tr>
                                    <td>{{ $supName }}</td>
                                    <td>{{ $catName }}</td>
                                    <td>{{ $prodName }}</td>
                                    <td><input wire:model = "qty" class="form-control @error('qty') is-invalid @enderror" type="number"></td>
                                    <td><input wire:model = "unitPrice" class="form-control @error('unitPrice') is-invalid @enderror" type="number"></td>
                                    <td><input value="{{ $initialPrice }}" class="form-control" type="number" readonly></td>
                                </tr>

                                <tr>
                                    <td colspan="5" class="text-end fw-bold fs-5">Discount</td>
                                    <td><input wire:model = "discPrice" class="form-control" type="number"></td>
                                </tr>

                                <tr>
                                    <td colspan="5" class="text-end fw-bold fs-5">Total Price</td>
                                    <td><input value="{{ $totalPrice }}" class="form-control" type="number" readonly></td>
                                </tr>
                
                            </tbody>
                
                        </table>

                        <div class="mt-2">
                            <button id="submit" type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart  mr-1"></i>Purchase Store</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    
                </div>

            </form>
        </div>
    </div>

</div>


@push('js')

    <script>
        $(document).ready(function(){
            toastr.options = {
            "positionClass": "toast-bottom-right",
            "closeButton": true,
            "showDuration": "800",
            "timeOut": "10000",
            "progressBar": true,
            }
        });

        window.addEventListener('success', event =>{
            toastr.success(event.detail.message, 'Success')
        })
    </script>

@endpush