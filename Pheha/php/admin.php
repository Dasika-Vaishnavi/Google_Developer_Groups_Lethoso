<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pheha- Managers' end</title>

    <link href="../css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../css/parsley.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="../css/admin.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">

            .feather {
              width: 20px;
              height: 20px;
              vertical-align: text-bottom;
            }
            nav .feather{
              color: orange;
            }
            a{
              color: rgb(0,0,15);
            }
            #userDropdown{
              color: rgb(0,0,15);
              font-size: 17px;
            }
            .sidebar-brand-icon {
                visibility: hidden;
                margin-left: -50%;
            }

            .navbar-nav .nav-link {
              font-weight: 500;
              font-size: 20px;
              color: rgb(0,0,15);
            }

            .navbar-nav .nav-link .feather {
              margin-right: 4px;
              color: rgb(0,0,15);
            }

            .navbar-nav .nav-link.active {
              color: #2470dc;
            }

            .navbar-nav.nav-link:hover .feather,
            .navbar-nav .nav-link.active .feather {
              color: inherit;
              font-size: 26px;
            }
            #accordionSidebar{
                border-right: 1px solid lightgrey;
            }
            .card li a{
             text-decoration: none;
             font-size: 13.5px;
            }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper" >

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-default sidebar bg-light accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3 pt-2 "><img src="../image/logo.png" width="60px"height="70px"></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0 mt-2">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <span data-feather='home'></span>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather='grid'></span>
                    <span>Products</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather='shopping-bag'></span>
                    <span>Orders</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Options
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#products_menu" role="button" aria-expanded="false" aria-controls="products_menu">
                    <span data-feather="codepen"></span>
                    <span>Adding Products</span>
                    <span data-feather="chevron-down"></span>
                </a>

                <div class="collapse" id="products_menu">
                  <ul class="list-unstyled card card-body bg-light">
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#add_category_modal">Enter products' category</a></li>
                    <div class="dropdown-divider"></div>
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#add_product_modal">Enter new product(s)</a></li>
                  </ul>

                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link"  href="#" data-bs-toggle="modal" data-bs-target="#record_plastic_modal">
                    <span data-feather="clipboard"></span>
                    <span>Record recieved plastic</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#event_modal">
                    <span data-feather="calendar"></span>
                    <span>Add upcoming events</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-default">
                       <span data-feather="menu"></span>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" style="border: 1px solid orange;" class="form-control bg-light small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-default" data-bs-toggle="dropdown" aria-expanded="false" type="button" style="background-color: orange;">
                                <span data-feather='search' style="color: #c5cae9;"></span>
                                </button>
                              <ul class="dropdown-menu mw-600" id="searchDropdown">
                                <li><a class="dropdown-item" href="#">result 1</a></li>
                                <li><a class="dropdown-item" href="#">result 2</a></li>
                                <li><a class="dropdown-item" href="#">result 3</a></li>
                              </ul>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span data-feather='search'></span>
                            </a>
                            <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                             <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for...." aria-label="Search"
                                        aria-describedby="basic-addon2">
                             <div class="input-group-append">
                              <button class="btn btn-default" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" style="background-color: orange;">
                                       <span data-feather='search' style="color: #c5cae9;"></span>
                                        </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1" >
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-bs-toggle="dropdown"  aria-expanded="false" >
                                <span data-feather='bell' style="color:orange"></span>
                                <!-- Counter - Alerts -->

                                <div class="spinner-grow spinner-grow-sm text-danger" role="status">
                                  <span class="visually-hidden"></span>
                                </div>
                            </a>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="notifications_dropdown">
                                <li><a class="dropdown-item" href="#">new orders...view..</a></li>
                                <li><a class="dropdown-item" href="#">3 days before workshop</a></li>
                                <li><a class="dropdown-item" href="#">only one ruler left</a></li>
                              </ul>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow" >
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:orange">
                                <span data-feather="user" style="color:orange"></span> <?php echo $_SESSION["manager_name"];?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                <span data-feather="home"></span>
                                    Home
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item dropdown-item-sm" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                <span data-feather="log-out"></span>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-outline-secondary shadow-sm"><span data-feather="folder"></span> files</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2"style="border-left: 5px solid orange;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Total volume of the collected plastic(kg)</div>
                                            <div class="h5 mb-0 font-weight-bold" id="total_volume">400</div>
                                        </div>
                                        <div class="col-auto px-3">
                                            <span data-feather="briefcase"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2"style="border-left: 5px solid orange;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Total amount payed for buying plastic(R)</div>
                                            <div class="h5 mb-0 font-weight-bold" id="total_payments">215</div>
                                        </div>
                                        <div class="col-auto px-3">
                                            <span data-feather="dollar-sign"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2"style="border-left: 5px solid orange;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Total number of uploaded products</div>
                                            <div class="h5 mb-0 font-weight-bold" id="uploads"></div>
                                        </div>
                                        <div class="col-auto px-3">
                                            <span data-feather="download"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 5px solid orange;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Online sales</div>
                                            <div class="h5 mb-0 font-weight-bold">0</div>
                                        </div>
                                        <div class="col-auto px-3">
                                            <span data-feather="gift"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- Content Row -->

      <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold" style="color:orange;">Waste management</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span data-feather='more-vertical'></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Actions:</div>
                                            <a class="dropdown-item" href="#"><span data-feather='edit-2'></span> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#"></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="container">
                                      <div class="row align-items-start">
                                        <div class="col" style="border-right: 1px solid lightgrey;">
                                            <div>
                                            <h5><strong>Physical Location:</strong></h5>
                                               <h6>
                                                <span data-feather="map-pin"></span> roma mafikeng
                                               </h6>
                                               <p>on the 10th october 2021, 30 trash cans were given to the community by</br> Mr <i>Thuto Tilo</i></p>
                                            </div>
                                                <div>
                                                <h5><strong>Physical Location:</strong></h5>
                                                   <h6>
                                                    <span data-feather="map-pin"></span> Thab Tseka
                                                   </h6>
                                                   <p>on the 10th october 2021, 20 trash plastics were given to the community by</br> Mrs <i>Limpho Koto</i></p>
                                              </div>
                                                  <div>
                                                  <h5><strong>Physical Location:</strong></h5>
                                                     <h6>
                                                      <span data-feather="map-pin"></span> roma mafikeng
                                                     </h6>
                                                     <p>on the 10th october 2021, 30 trash cans and 20 trash plastics were given to the community by</br> Mr <i>Thabang Sello</i></p>
                                                  </div>
                                        </div>
                                        <div class="col">
                                            <div>
                                            <h5><strong>Waste management officers:</strong></h5>
                                            <div>
                                               <h5>
                                                <span data-feather="user"></span> <span>Thumelo killer</span>
                                              </h5>
                                                 <p>
                                                <span data-feather="map-pin"></span> <span>Maseru Tsolo</span><br>
                                               <span data-feather="phone-call"></span> <span>+266 50590930</span><br>
                                                 </p>
                                            </div>
                                            <div>
                                               <h5>
                                                <span data-feather="user"></span> <span>Thumelo killer</span><br>
                                              </h5>
                                                 <p>
                                                <span data-feather="map-pin"></span> <span>Maseru Tsolo</span><br>
                                               <span data-feather="phone-call"></span> <span>+266 50590930</span><br>
                                                 </p>
                                            </div>
                                            <div>
                                               <h5>
                                                <span data-feather="user"></span> <span>Thumelo killer</span><br>
                                              </h5>
                                                 <p>
                                                <span data-feather="map-pin"></span> <span>Maseru Tsolo</span><br>
                                               <span data-feather="phone-call"></span> <span>+266 50590930</span><br>
                                                 </p>
                                            </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold" style="color:orange;">Payment methods</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                <table class="table table-bordered" style="border-bottom:10px solid orange;">
                                  <thead>
                                    <tr>
                                      <th><span data-feather='smartphone'></span> Mpesa</th>
                                      <th><span data-feather='smartphone'></span> Ecocash</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>50590196</td>
                                      <td>63782828</td>
                                    </tr>
                                  </tbody>
                                </table>
                                    </div>
                                    <div class="px-3"style="border-top:1px solid lightgrey;">
                                        <ul class="list list-unstyled" >
                                            <li style="color: orange;font-weight: 600;border-bottom: 0.5px solid lightgrey;"><strong>Standard Bank account:</strong></li>
                                            <li class="px-3">
                                                <span data-feather='credit-card'></span> 0003788490554</li>
                                        </ul>
                                    </div>
                                    <div class="px-3">
                                        <ul class="list list-unstyled" >
                                            <li style="color: orange;font-weight: 600;border-bottom: 0.5px solid lightgrey;"><strong>FNB Bank account:</strong></li>
                                            <li class="px-3">
                                                <span data-feather='credit-card'></span> 0003788490554</li>
                                        </ul>
                                    </div>
                                    <div class="px-3">
                                        <ul class="list list-unstyled" >
                                            <li style="color: orange;font-weight: 600;border-bottom: 0.5px solid lightgrey;"><strong>Netbank Bank account:</strong></li>
                                            <li class="px-3">
                                                <span data-feather='credit-card'></span> 0003788490554</li>
                                        </ul>
                                    </div>
                                    <div class="px-3">
                                        <ul class="list list-unstyled" >
                                            <li style="color: orange;font-weight: 600;border-bottom: 0.5px solid lightgrey;"><strong>Post Bank account:</strong></li>
                                            <li class="px-3">
                                                <span data-feather='credit-card'></span> 0003788490554</li>
                                        </ul>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold"style="color:orange;">List of the events</h6>
                                </div>
                                <div class="card-body">
                                <table class="table caption-top table-borderless">
                                  <thead>
                                    <tr>
                                      <th scope="col"></th>
                                      <th scope="col"> </th>
                                      <th scope="col"></th>
                                      <th scope="col"></th>
                                      <th scope="col"></th>
                                    </tr>
                                  </thead>
                                  <tbody class="px-3" id="events_tbl">
                                  </tbody>
                                </table>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold"style="color:orange;">List of product catrgories</h6>
                                </div>
                                <div class="card-body">
                                <table class="table caption-top table-borderless">
                                  <thead>
                                    <tr>
                                      <th scope="col"></th>
                                      <th scope="col"> </th>
                                      <th scope="col"></th>
                                      <th scope="col"></th>
                                    </tr>
                                  </thead>
                                  <tbody class="px-3" id="category_tbl">
                                  </tbody>
                                </table>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-12 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold"style="color:orange;">Plastic sales</h6>
                                </div>
                                <div class="card-body">
                                <table class="table caption-top table-borderless" id="sales_table">
                                  <thead>
                                    <tr style="border-bottom: 1px solid lightgrey;">
                                      <th scope="col"><span data-feather="clock"></span> Date</th>
                                      <th scope="col"><span data-feather="anchor"></span> weight</th>
                                      <th scope="col"><span data-feather="dollar-sign"></span> Cash</th>
                                      <th scope="col"><span data-feather="map-pin"></span> Location</th>
                                    </tr>
                                  </thead>
                                  <tbody class="px-3" id="plastic_sales">
                                    <tr>
                                      <td>21/10/2021</td>
                                      <td>49</td>
                                      <td>70</td>
                                      <td>Roma</td>
                                    </tr>
                                      <tr>
                                        <td>21/10/2021</td>
                                        <td>49</td>
                                        <td>70</td>
                                        <td>Roma</td>
                                      </tr>
                                        <tr>
                                          <td>21/10/2021</td>
                                          <td>49</td>
                                          <td>70</td>
                                          <td>Roma</td>
                                        </tr>
                                        <tr>
                                          <td>21/10/2021</td>
                                          <td>49</td>
                                          <td>70</td>
                                          <td>Roma</td>
                                        </tr>
                                        <tr>
                                          <td>21/10/2021</td>
                                          <td>49</td>
                                          <td>70</td>
                                          <td>Roma</td>
                                        </tr>
                                  </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
           </div>
           <div class="container fluid" id="shelf">
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-gray-800">List of Products</h1>

           </div>
                  <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-sm table-striped" id="product_table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>view</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>qty</th>
                            <th>Category</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id='product_tbody'>
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white border-top">
                    <ul class="nav justify-content-center pb-2 mb-2">
                      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Terms&Conditions</a></li>
                      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Privacy policy</a></li>
                      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">sell with us</a></li>
                    </ul>
                <div class="container">
                  <div class="d-flex flex-wrap justify-content-between align-items-center py-1 my-3 border-top">
                    <div class="col-md-4 d-flex align-items-center">
                      <span class="text-muted">&copy; 2021 pheha.co.ls</span>
                    </div>
                    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                      <li class="ms-3"><a href="#"><span data-feather="facebook"></span></a></li>
                      <li class="ms-3"><a href="#"><span data-feather="twitter"></span></a></li>
                      <li class="ms-3"><a href="#"><span data-feather="instagram"></span></a></li>
                      <li class="ms-3"><a href="#"><span data-feather="linkedin"></span></a></li>
                    </ul>
                  </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

  <!-- modals -->

  <!-- modal for inserting the product category -->

    <div class="modal fade" id="add_category_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="add_category_modalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="add_category_modalLabel">New products' category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id='category_form'>
              <div class="mb-3">
                <input class="form-control" type="text" pattern="/^[a-zA-Z0-9.,!() ]+$/" data-parsley-trigger="change" id="category_name" data-parsley-length="[3, 55]" placeholder="Enter product category" name="category_name">
              </div>
              <div class="input-group mb-3">
                <input type="file" class="form-control" id="select_image_category" name="category_image">
              </div>
              <div class="mb-3 text-center">
                <input type="hidden" value="insert_category" name="action" class="form-control d-none" id="category">
                  <img src="" class="img-thumbnail rounded" width="50%" height="50%" id="show_category_Img" alt="...">
              </div>
              <button type="submit" id="submit_category" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>

<!-- modal for inerting recieved plastic-->

    <div class="modal fade" id="record_plastic_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="record_plastic_modalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Record recieved plastic</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id='record_plastic_form'>
              <div class="mb-3 input-group">
                 <span class="input-group-text"><span data-feather="anchor"></span></span>
                <input data-parsley-type="number" data-parsley-trigger="change"  placeholder="mass..." id="mass" class="form-control">
              </div>
              <div class="mb-3 input-group">
                 <span class="input-group-text"><span data-feather="dollar-sign"></span></span>
                <input class="form-control" data-parsley-type="number" data-parsley-trigger="change" id="plastic_price" placeholder="price..." >
              </div>
              <div class="mb-3 input-group">
                 <span class="input-group-text"><span data-feather="map-pin"></span></span>
                <input class="form-control" type="text" pattern="/^[a-zA-Z0-9.,!() ]+$/" data-parsley-trigger="change" data-parsley-length="[3, 55]" id="location" placeholder="location..." >
              </div>
              <button type="submit" class="btn btn-primary" id="submit_plastic">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>

 <!-- modal for inserting product -->

    <div class="modal fade scrollable" id="add_product_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Enter a new product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="product_form">
             <div class="mb-3">
               <label class="form-label">Product name</label>
               <input class="form-control" type="text"
               pattern="/^[a-zA-Z0-9-.!, ]+$/" data-parsley-trigger="change" placeholder="Enter product name"  name="Product_name">
            </div>
             <div class="mb-3">
               <label class="form-label">Product Description</label>
               <textarea class="form-control" type="text" placeholder="Enter product description"  rows="4" cols="20"
               pattern="/^[a-zA-Z0-9-.!, ]+$/" data-parsley-trigger="change" data-parsley-length="[3, 55]" name="Product_description"></textarea>
            </div>
             <div class="mb-3">
               <label class="form-label">product category</label>
               <select class="form-select"  id='category_list' name="category_list" aria-label="Default select example">
                <option selected>select category</option>
                <option value="1">Jewellery</option>
                <option value="2">Accesories</option>
              </select>
            </div>
               <div class="mb-3">
                 <label class="form-label">price</label>
                 <input class="form-control" data-parsley-type="number" data-parsley-trigger="change" placeholder="Enter price"  name="price">
              </div>
               <div class="mb-3">
                 <label class="form-label">quantity</label>
                 <input class="form-control" data-parsley-type="number" data-parsley-trigger="change" placeholder="Enter qauntity"  name="quantity">
              </div>
              <div class="input-group mb-3">
                <input type="file" class="form-control" id="product_image" name="product_image">
              </div>
              <div class="mb-3 text-center">
                <input type="hidden" value="insert_product" name="action" class="form-control d-none">
                  <img src="..." class="img-thumbnail rounded" width="25%" height="25%" id="show_product_Img" alt="...">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
<!-- insert event -->

    <div class="modal fade" id="event_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Enter new event</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id='event_form'>
              <div class="mb-3">
                <label class="form-label">Event description</label>
                <textarea class="form-control" placeholder="Enter Event description,detailing all needed information" rows="4" cols="50" name="event_description"
                     pattern="/^[a-zA-Z0-9-.!, ]+$/" data-parsley-trigger="change" data-parsley-length="[3, 205]"></textarea>
                <div class="form-text"><span dat-feather="alert-circle"></span> Event description is only 205 letters,write only whats necessary!</div>
             </div>
              <div class="mb-3">
                <label class="form-label">Event date</label>
                <input class="form-control" type="date"  name="event_date">
             </div>
              <div class="mb-3">
                <label class="form-label">venue</label>
                <input class="form-control" type="text" placeholder="Enter location of the event"  name="event_location">
             </div>
                <div class="input-group mb-3">
                  <input type="file" class="form-control" id="event_image" name="event_image">
                </div>
                <div class="mb-3 text-center">
                  <input type="hidden" value="insert_event" name="action" class="form-control d-none">
                    <img src="..." class="img-thumbnail rounded" width="25%" height="25%" id="show_selected_event_Img" alt="...">
                </div>
              <button type="submit" id="submit_event" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
      </script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="../js/dashboard.js"></script>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/parsley.js"></script>
    <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <script src="../js/admin.min.js"></script>
    <script src="../js/admin.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="js/demo/chart-pie-demo.js"></script> -->

</body>


    <!-- canvas for search in small screens -->
<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasTopLabel">Offcanvas top</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    ...
  </div>
</div>

</html>
