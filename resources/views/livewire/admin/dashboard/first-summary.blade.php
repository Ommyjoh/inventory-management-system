<!-- table card-1 start -->
<div class="col-md-12 col-xl-4">
    <div class="card flat-card">
     <div class="row-table">
         <div class="small-box bg-success text-white">
             <div class="inner p-4">
                 <div class="d-flex justify-center justify-content-between">
                     <h2 class="text-white">{{ $mostStocks }}</h2>
                     <i class="feather icon-layers"></i>
                 </div>
                 <p class="fs-6">Most Stock Products</p>
             </div>
             <div class="bg-dark p-2">
                 <a href="{{ route('admin.listStocks') }}" class="small-box-footer text-white d-flex justify-center justify-content-between">
                     <div>
                         View all stock products 
                     </div>
                     <div>
                         <i class="fs-5 fas fa-arrow-circle-right"></i>
                     </div>
                 </a>
             </div>
         </div>
     </div>
    </div>
 </div>
 <!-- table card-1 end -->

    <!-- table card-2 start -->
    <div class="col-md-12 col-xl-4">
        <div class="card flat-card">
         <div class="row-table">
             <div class="small-box bg-warning text-white">
                 <div class="inner p-4">
                     <div class="d-flex justify-center justify-content-between">
                         <h2 class="text-white">{{ $lowStocks }}</h2>
                         <i class="feather icon-box"></i>
                     </div>
                     <p class="fs-6">Low Stock Products</p>
                 </div>
                 <div class="bg-dark p-2">
                     <a href="{{ route('admin.listStocks') }}" class="small-box-footer text-white d-flex justify-center justify-content-between">
                         <div>
                             View all stock products 
                         </div>
                         <div>
                             <i class="fs-5 fas fa-arrow-circle-right"></i>
                         </div>
                     </a>
                 </div>
             </div>
         </div>
        </div>
    </div>
     <!-- table card-2 end -->

     <!-- table card-3 start -->
    <div class="col-md-12 col-xl-4">
        <div class="card flat-card">
         <div class="row-table">
             <div class="small-box bg-danger text-white">
                 <div class="inner p-4">
                     <div class="d-flex justify-center justify-content-between">
                         <h2 class="text-white">{{ $outOfStock }}</h2>
                         <i class="feather icon-codepen"></i>
                     </div>
                     <p class="fs-6">Out of Stock Products</p>
                 </div>
                 <div class="bg-dark p-2">
                     <a href="{{ route('admin.listStocks') }}" class="small-box-footer text-white d-flex justify-center justify-content-between">
                         <div>
                             View all stock products 
                         </div>
                         <div>
                             <i class="fs-5 fas fa-arrow-circle-right"></i>
                         </div>
                     </a>
                 </div>
             </div>
         </div>
        </div>
    </div>
    <!-- table card-3 end -->

    <!-- table card-4 start -->
    <div class="col-md-12 col-xl-4">
        <div class="card flat-card">
            <div class="row-table">
                <div class="small-box bg-secondary text-white">
                    <div class="inner p-4">
                        <div class="d-flex justify-center justify-content-between">
                            <h2 class="text-white">{{ $allProducts }}</h2>
                            <i class="fs-5 fas fa-tags"></i>
                        </div>
                        <p class="fs-6">Total Stock Products</p>
                    </div>
                    <div class="bg-dark p-2">
                        <a href="{{ route('admin.listStocks')}}" class="small-box-footer text-white d-flex justify-center justify-content-between">
                            <div>
                                View all stock products 
                            </div>
                            <div>
                                <i class="fs-5 fas fa-arrow-circle-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
           </div>
         <!-- widget primary card start -->
         <div class="card flat-card widget-primary-card">
             <div class="row-table">
                 <div class="col-sm-3 card-body">
                     <i class="nav-icon fa fa-cart-plus"></i>
                 </div>
                 <div class="col-sm-9">
                     <h4>Tsh {{ $sumPurchases }}/=</h4>
                     <h6>Total Purchases</h6>
                 </div>
             </div>
         </div>
         <!-- widget primary card end -->
    </div>
     <!-- table card-4 end -->

      <!-- table card-5 start -->
    <div class="col-md-12 col-xl-4">
        <div class="card flat-card">
            <div class="row-table">
                <div class="small-box bg-secondary text-white">
                    <div class="inner p-4">
                        <div class="d-flex justify-center justify-content-between">
                            <h2 class="text-white">{{ $allCustomers }}</h2>
                            <i class="feather icon-users"></i>
                        </div>
                        <p class="fs-6">Total Customers</p>
                    </div>
                    <div class="bg-dark p-2">
                        <a href="{{ route('admin.listCustomers')}}" class="small-box-footer text-white d-flex justify-center justify-content-between">
                            <div>
                                View all customers 
                            </div>
                            <div>
                                <i class="fs-5 fas fa-arrow-circle-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
           </div>
         <!-- widget primary card start -->
         <div class="card flat-card widget-primary-card">
             <div class="row-table">
                 <div class="col-sm-3 card-body">
                    <i class="nav-icon fa fa-child"></i>
                 </div>
                 <div class="col-sm-9">
                     <h4>Tsh {{ $discount }}/=</h4>
                     <h6>Total Discounts</h6>
                 </div>
             </div>
         </div>
         <!-- widget primary card end -->
    </div>
     <!-- table card-5 end -->

     <!-- table card-6 start -->
    <div class="col-md-12 col-xl-4">
        <div class="card flat-card">
         <div class="row-table">
             <div class="small-box bg-secondary text-white">
                 <div class="inner p-4">
                     <div class="d-flex justify-center justify-content-between">
                         <h2 class="text-white">{{ $allSuppliers }}</h2>
                         <i class="nav-icon fa fa-cart-arrow-down "></i>
                     </div>
                     <p class="fs-6">Total Suppliers</p>
                 </div>
                 <div class="bg-dark p-2">
                     <a href="{{ route('admin.listSupplies') }}" class="small-box-footer text-white d-flex justify-center justify-content-between">
                         <div>
                             View all suppliers 
                         </div>
                         <div>
                             <i class="fs-5 fas fa-arrow-circle-right"></i>
                         </div>
                     </a>
                 </div>
             </div>
         </div>
        </div>
     </div>
     <!-- table card-6 end -->