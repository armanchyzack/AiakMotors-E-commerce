<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="{{ asset('Backend/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">AiakMotors Dashboard</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li> <a class="dropdown-item active" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                      Log Out
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ route('index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Order</div>
                        <a class="nav-link" href="{{ route('orders.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            Order List
                        </a>
                        <a class="nav-link" href="{{ route('orders.confirmed') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            Confirm Order List
                        </a>
                        <a class="nav-link" href="{{ route('orders.delivered') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            Sold Item List
                        </a>
                        <div class="sb-sidenav-menu-heading">Voucher</div>
                        <a class="nav-link" href="{{ route('discount.code.all') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            All Discount Code
                        </a>
                        <a class="nav-link" href="{{ route('discount.code.coupon.usage') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            Coupon User
                        </a>
                        {{-- <a class="nav-link" href="{{ route('disc') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            Add Discount Text
                        </a> --}}
                        <div class="sb-sidenav-menu-heading">Product</div>
                        <a class="nav-link" href="{{ route('category.all') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            Category
                        </a>
                        <a class="nav-link" href="{{ route('product.all') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            All Car
                        </a>
                        
                        <a class="nav-link" href="{{ route('accessory.all') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            All Accessory
                        </a>
                        <a class="nav-link" href="{{ route('service.all') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            All Service
                        </a>


                        <div class="sb-sidenav-menu-heading">Navigation</div>
                        <a class="nav-link" href="{{ route('logo.view') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            Logo
                        </a>
                        <a class="nav-link" href="{{ route('menu.all') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            Nav-Bar
                        </a>
                        <a class="nav-link" href="{{ route('footer.view') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            Add Footer
                        </a>
                        <div class="sb-sidenav-menu-heading">Social</div>
                        <a class="nav-link" href="{{ route('social.view') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            Add Social media
                        </a>
                        <a class="nav-link" href="{{ route('marquery.view') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            Add Marquery
                        </a>
                        <div class="sb-sidenav-menu-heading">Spine</div>
                        <a class="nav-link" href="{{ route('spinewheel.view') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            Spine Wheel Text
                        </a>
                        <a class="nav-link" href="{{ route('wheel.slice.view') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            Spine Wheel Slice Text
                        </a>
                        <a class="nav-link" href="{{ route('details.create') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            Detail's
                        </a>

                        <a class="nav-link" href="{{ route('company.info.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            Company Detail's
                        </a>
                        <a class="nav-link" href="{{ route('popup.message.manage') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            PopUp Detail's
                        </a>



                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: Admin</div>

                    </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @yield('content')
                </div>
            </main>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('Backend/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    @stack('customJs')
</body>

</html>
