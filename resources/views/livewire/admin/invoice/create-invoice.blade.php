<div>
       
    <div class="card flat-card">
        <h4 class="text-center bg-primary text-white p-2">Fill Invoice</h4>
        <div class="col-lg-12">
            <form autocomplete="off">
                @csrf
                <div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-4">
                            <div class="row col-lg-4">
                                <label for="Name">Invoice No</label>
                                <input value="{{ $invNumber }}" type="text" class="bg-dark text-white fw-bold form-control" readonly>
                            </div>

                            <div class="row col-lg-4">
                                <label for="Name">Customer Name</label>
                                <select wire:model='state.custNo' class="form-select" aria-label="Default select example">
                                    <option selected>Choose supplier..</option>
                                    <option value="1">Emmanuel Boshe</option>
                                    <option value="2">Emmanuel Boshe</option>
                                </select>
                            </div>

                            <div class="row col-lg-4">
                                <label for="Name">Supplier Name</label>
                                <select wire:model='state.supNo' class="form-select" aria-label="Default select example">
                                    <option selected>Choose supplier..</option>
                                    <option value="1">Emmanuel Boshe</option>
                                    <option value="2">Emmanuel Boshe</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">

                            <div class="row col-lg-4">
                                <label for="Name">Currently Stock</label>
                                <input value="60" type="text" class="bg-dark text-white fw-bold form-control" readonly>
                            </div>

                            <div class="row col-lg-4">
                                <label for="Name">Category Name</label>
                                <select wire:model='state.catNo' class="form-select" aria-label="Default select example">
                                    <option selected>Choose category..</option>
                                    <option value="1">Emmanuel Boshe</option>
                                    <option value="2">Emmanuel Boshe</option>
                                </select>
                            </div>
    
                            <div class="row col-lg-4">
                                <label for="Name">Product Name</label>
                                <select wire:model='state.prodNo' class="form-select" aria-label="Default select example">
                                    <option selected>Choose product..</option>
                                    <option value="1">Emmanuel Boshe</option>
                                    <option value="1">Emmanuel Boshe</option>
                                </select>
                            </div>

                        </div>



                        <div class="mt-4">
                            <button wire:click='approveInvoice' type="button" class="btn btn-info mr-2" data-bs-dismiss="modal"><i class="fa fa-plus mr-1"></i><a href="#" class="text-white">Prove invoice</a></button>
                        </div>

                        <table class="table table-bordered mt-2">

                            <thead>
                                <tr>
                                    <th>Customer</th>
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
                                    <td>Emmanuel Boshe</td>
                                    <td>Azam Company</td>
                                    <td>Drinks</td>
                                    <td>Azam Energy</td>
                                    <td><input class="form-control" type="number"></td>
                                    <td><input class="form-control" type="number"></td>
                                    <td><input value="900" class="bg-dark text-white fw-bold form-control" type="number" readonly></td>
                                </tr>

                                <tr>
                                    <td colspan="6" class="text-end fw-bold fs-5">Discount</td>
                                    <td><input class="form-control" type="number"></td>
                                </tr>

                                <tr>
                                    <td colspan="6" class="text-end fw-bold fs-5">Total Price</td>
                                    <td><input value="600" class="bg-dark text-white fw-bold form-control" type="number" readonly></td>
                                </tr>
                
                            </tbody>
                
                        </table>

                        <div class="mt-2">
                            <button id="submit" type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart  mr-1"></i>Store Invoice</button>
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