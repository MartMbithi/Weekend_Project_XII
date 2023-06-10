<header id="topnav">
    <div class="topbar-main">
        <div class="container">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="dashboard" class="logo">
                    <i class="zmdi zmdi-shopping-basket"></i>
                    <span>e - Furniture Store</span>
                </a>
            </div>
            <!-- End Logo container-->


            <div class="menu-extras navbar-topbar">

                <ul class="list-inline float-right mb-0">

                    <li class="list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>


                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="../public/backoffice/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow"><small>Welcome !</small> </h5>
                            </div>

                            <!-- item-->
                            <a href="profile" class="dropdown-item notify-item">
                                <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
                            </a>

                            <!-- item-->
                            <a href="logout" class="dropdown-item notify-item">
                                <i class="zmdi zmdi-power"></i> <span>Logout</span>
                            </a>

                        </div>
                    </li>

                </ul>

            </div> <!-- end menu-extras -->
            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->


    <div class="navbar-custom">
        <div class="container">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li>
                        <a href="dashboard"><i class="fa fa-home"></i> <span> Dashboard </span> </a>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="fa fa-users"></i> <span> System Users </span> </a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li><a href="staffs">Staffs</a></li>
                                    <li><a href="sellers">Furniture Sellers</a></li>
                                    <li><a href="customers">Customers</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="fa fa-bed"></i> <span> Furnitures </span> </a>
                        <ul class="submenu">
                            <li><a href="categories">Categories</a></li>
                            <li><a href="furnitures">Furnitures</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="orders"><i class="fa fa-shopping-cart"></i> <span> Orders </span> </a>
                    </li>
                    <li>
                        <a href="payments"><i class="fa fa-money"></i> <span> Payments </span> </a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="zmdi zmdi-format-list-bulleted"></i> <span> Reports </span> </a>
                        <ul class="submenu">
                            <li><a href="reports_customers">Customers</a></li>
                            <li><a href="reports_furniture_sellers">Furniture Sellers</a></li>
                            <li><a href="reports_furniture">Furnitures</a></li>
                            <li><a href="reports_orders">Orders</a></li>
                            <li><a href="reports_payments">Payments</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- End navigation menu  -->
            </div>
        </div>
    </div>
</header>