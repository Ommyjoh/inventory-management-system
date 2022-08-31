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
               <tr>
                    <td>1</td>
                    <td>EA 7656</td>
                    <td>2022-08-19</td>
                    <td>Azam Products</td>
                    <td>Drink</td>
                    <td>20</td>
                    <td>Azam Energy</td>
                    <td class="text-center"><span class="badge bg-warning text-dark py-2 px-2">Pending</span></td>
                    <td class="text-center">
                        <a href="#"> <i class="fa fa-check-circle  fs-6 text-primary pr-2" title="approve"></i> </a>
                        <a href="#"><i class="nav-icon fa fa-trash fs-6 text-danger" title="delete"></i></a>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>EA 7678</td>
                    <td>2022-08-20</td>
                    <td>New Balance</td>
                    <td>Clothes</td>
                    <td>35</td>
                    <td>Liverpool Jersey</td>

                    <td class="text-center">
                        <span class="badge bg-primary text-dark py-2 px-2">Approved</span>
                    </td>

                    <td class="text-center">
                        
                    </td>

                </tr>
            </tbody>

        </table>
    </div>

</div>
