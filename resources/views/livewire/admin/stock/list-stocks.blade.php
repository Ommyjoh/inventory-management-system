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

            <div class="d-flex justify-content-center align-items-center border rounded bg-white ">
                <input wire:model='searchTerm' class="form-control border-0" type="text" placeholder="Search">
                <div wire:loading.delay.longer wire:target="searchTerm">
                    <div style="color: #252428" class="la-ball-clip-rotate la-sm mr-2">
                    <div></div>
                    </div>
                </div>
            </div>
            
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Supplier</th>
                    <th>Category</th>
                    <th>Product</th>
                    <th class="text-center">In Qty</th>
                    <th class="text-center">Out Qty</th>
                    <th class="text-center">Stock</th>
                </tr>
            </thead>
            <tbody wire:loading.class="text-muted">
                <tr>
                    <td>1</td>
                    <td>Azam Products</td>
                    <td>Drinks</td>
                    <td>Azam Energy</td>
                    <td class="text-center">
                        <span class="badge p-2 rounded-pill bg-primary">300</span>
                    </td>
                    <td class="text-center">
                        <span class="badge p-2 rounded-pill bg-info">120</span>
                    </td>
                    <td class="text-center">
                        <span class="badge p-2 rounded-pill bg-danger">180</span>
                    </td>
                </tr>

            </tbody>

        </table>
    </div>
</div>
