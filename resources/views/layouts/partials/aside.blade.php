<nav class="pcoded-navbar">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >
            
            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{asset('backend/dist/assets/images/user/emma.jpg')}}" alt="User-Profile-Image">
                    <div class="user-details">
                        <span>Emanuel Boshe</span>
                        <div id="more-details">Admin<i class="m-l-5"></i></div>
                    </div>
                </div>
            </div>
            
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link "><span class="pcoded-micon {{ request()->is('admin/dashboard') ? 'active' : '' }}"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="nav-icon fa fa-truck"></i></span><span class="pcoded-mtext">Manage Suppliers</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('admin.listSupplies')}}">All Suppliers</a></li>
                    </ul>
                </li>


                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="nav-icon fa fa-shopping-bag"></i></span><span class="pcoded-mtext">Manage Categories</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('admin.ListCategories') }}">All Categories</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="nav-icon fa fa-archive"></i></span><span class="pcoded-mtext">Manage Products</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('admin.listProducts') }}">All Products</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="nav-icon fa fa-cart-arrow-down"></i></span><span class="pcoded-mtext">Manage Purchases</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('admin.listPurchases') }}">All Purchases</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="nav-icon fa fa-file"></i></span><span class="pcoded-mtext">Manage Invoices</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('admin.listInvoices') }}">All Invoices</a></li>
                        <li><a href="{{ route('admin.listApprovalInvoices') }}">Approval Invoices</a></li>
                        <li><a href="#">Daily Invoice Report</a></li>
                    </ul>
                </li>



                <li class="nav-item pcoded-menu-caption">
                    <label>Customers</label>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="nav-icon fa fa-users"></i></span><span class="pcoded-mtext">Manage Customers</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('admin.listCustomers')}}">All Customers</a></li>
                    </ul>
                </li>


                <li class="nav-item pcoded-menu-caption">
                    <label>Stocks</label>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="nav-icon fa fa-archive"></i></span><span class="pcoded-mtext">Manage Stocks</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('admin.listStocks') }}">All Stocks</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="nav-icon fa fa-question-circle"></i></span><span class="pcoded-mtext">Support</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="#" target="_blank">Support</a></li>
                    </ul>
                </li>
            </ul>
            
        </div>
    </div>
</nav>