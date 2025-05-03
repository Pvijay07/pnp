<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
  <!--plugins-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />


  <!--Theme Styles-->
  <link href="assets/css/dark-theme.css" rel="stylesheet" />
  <link href="assets/css/light-theme.css" rel="stylesheet" />
  <link href="assets/css/semi-dark.css" rel="stylesheet" />
  <link href="assets/css/header-colors.css" rel="stylesheet" />

  <title>Order Details</title>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <?php include("includes/header.php"); ?>

       <?php include("includes/sidebar.php"); ?>

       <!--start content-->
          <main class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">eCommerce</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Order details</li> 
                  </ol>
                </nav>
              </div>
              <div class="ms-auto">
                
                  <a href="orders.php" class="btn btn-primary">Back</a>
                  
              </div>
            </div>
            <!--end breadcrumb-->

              <div class="card">
                <div class="card-header py-3"> 
                  <div class="row g-3 align-items-center">
                    <div class="col-12 col-lg-4 col-md-6 me-auto">
                      <h5 class="mb-1">Tue, Apr 15, 2020, 8:44PM</h5>
                      <p class="mb-0">Order ID : #8965327</p>
                    </div>
                    <div class="col-12 col-lg-3 col-6 col-md-3">
                      <select class="form-select">
                        <option>Change Status</option>
                        <option>Pending</option>
                        <option>Confirmed</option>
                        <option>Proccessing</option>
                        <option>Handover</option>
                        <option>Out for Delivery</option>
                        <option>Deliveried</option>
                        <option>Cancelled</option>
                      </select>
                    </div>
                    <div class="col-12 col-lg-3 col-6 col-md-3">
                       <button type="button" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                 </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-xl-2 row-cols-xxl-3">
                       <div class="col">
                         <div class="card border shadow-none radius-10">
                           <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                              <div class="icon-box bg-light-primary border-0">
                                <i class="bi bi-person text-primary"></i>
                              </div>
                              <div class="info">
                                 <h6 class="mb-2">Customer</h6>
                                 <p class="mb-1">anantha Reddy</p>
                                 <p class="mb-1">anantha@gmail.com</p>
                                 <p class="mb-1">+91-9874563210</p>
                              </div>
                           </div>
                           </div>
                         </div>
                       </div>
                       <div class="col">
                        <div class="card border shadow-none radius-10">
                          <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                              <div class="icon-box bg-light-success border-0">
                                <i class="bx bx-rupee text-success"></i>
                              </div>
                              <div class="info">
                                 <h6 class="mb-2">Payment info</h6>
                                 <p class="mb-1"><strong>Total</strong> : 10,000.00</p>
                                 <p class="mb-1"><strong>Payment Method</strong> : Online</p>
                                 <p class="mb-1"><strong>Status</strong> : Completed</p>
                              </div>
                           </div>
                           </div>
                          </div>
                       </div>
                      <div class="col">
                        <div class="card border shadow-none radius-10">
                          <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                              <div class="icon-box bg-light-danger border-0">
                                <i class="bi bi-geo-alt text-danger"></i>
                              </div>
                              <div class="info">
                                <h6 class="mb-2">Deliver to</h6>
                                <p class="mb-1"><strong>Address</strong> : 47-A, Street Name, <br>Hyderabad.</p>
                              </div>
                            </div>
                          </div>
                         </div>
                    </div>
                  </div><!--end row-->

                  <div class="row">
                      <div class="col-12 col-lg-8">
                         <div class="card border shadow-none radius-10">
                           <div class="card-body">
                               <div class="table-responsive">
                                 <table class="table align-middle mb-0">
                                   <thead class="table-light">
                                     <tr>
                                       <th>Product</th>
                                       <th>Unit Price</th>
                                       <th>Quantity</th>
                                       <th>Total</th>
                                     </tr>
                                   </thead>
                                   <tbody>
                                     <tr>
                                       <td>
                                         <div class="orderlist">
                                          <a class="d-flex align-items-center gap-2" href="javascript:;">
                                            
                                            <div>
                                                <P class="mb-0 product-title">Men White Polo T-shirt</P>
                                            </div>
                                           </a>
                                         </div>
                                       </td>
                                       <td>₹35.00</td>
                                       <td>2</td>
                                       <td>₹70.00</td>
                                     </tr>
                                     <tr>
                                      <td>
                                        <div class="orderlist">
                                         <a class="d-flex align-items-center gap-2" href="javascript:;">
                                           
                                           <div>
                                               <P class="mb-0 product-title">Formal Black Coat Pant</P>
                                           </div>
                                          </a>
                                        </div>
                                      </td>
                                      <td>₹25.00</td>
                                      <td>1</td>
                                      <td>₹25.00</td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="orderlist">
                                         <a class="d-flex align-items-center gap-2" href="javascript:;">
                                           
                                           <div>
                                               <P class="mb-0 product-title">Blue Shade Jeans</P>
                                           </div>
                                          </a>
                                        </div>
                                      </td>
                                      <td>₹65.00</td>
                                      <td>2</td>
                                      <td>₹130.00</td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="orderlist">
                                         <a class="d-flex align-items-center gap-2" href="javascript:;">
                                           
                                           <div>
                                               <P class="mb-0 product-title">Yellow Winter Jacket for Men</P>
                                           </div>
                                          </a>
                                        </div>
                                      </td>
                                      <td>₹56.00</td>
                                      <td>1</td>
                                      <td>₹56.00</td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="orderlist">
                                         <a class="d-flex align-items-center gap-2" href="javascript:;">
                                           
                                           <div>
                                               <P class="mb-0 product-title">Men Sports Shoes Nike</P>
                                           </div>
                                          </a>
                                        </div>
                                      </td>
                                      <td>₹85.00</td>
                                      <td>1</td>
                                      <td>₹85.00</td>
                                    </tr>
                                   </tbody>
                                 </table>
                               </div>
                           </div>
                         </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="card border shadow-none bg-light radius-10">
                          <div class="card-body">
                              <div class="d-flex align-items-center mb-4">
                                 <div>
                                    <h5 class="mb-0">Order Summary</h5>
                                 </div>
                                 <div class="ms-auto">
                                   <button type="button" class="btn alert-success radius-30 px-4">Confirmed</button>
                                </div>
                              </div>
                                <div class="d-flex align-items-center mb-3">
                                  <div>
                                    <p class="mb-0">Subtotal</p>
                                  </div>
                                  <div class="ms-auto">
                                    <h5 class="mb-0">₹198.00</h5>
                                </div>
                              </div>
                              <div class="d-flex align-items-center mb-3">
                                <div>
                                  <p class="mb-0">Shipping Price</p>
                                </div>
                                <div class="ms-auto">
                                  <h5 class="mb-0">₹0.00</h5>
                              </div>
                            </div>
                              <div class="d-flex align-items-center mb-3">
                                <div>
                                  <p class="mb-0">Taxes</p>
                                </div>
                                <div class="ms-auto">
                                  <h5 class="mb-0">₹24.00</h5>
                              </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                              <div>
                                <p class="mb-0">Payment Fee</p>
                              </div>
                              <div class="ms-auto">
                                <h5 class="mb-0">₹104.00</h5>
                            </div>
                          </div>

                          
                            
                          </div>
                          </div>

                          <div class="ms-auto">
                            <a href="#" class="btn btn-primary text-center">Assign to Delivery Boy Manually</a>
                        </div>
                        </div>

                        

                        


                     </div>
                  </div><!--end row-->

                </div>
              </div>

          </main>
       <!--end page main-->


       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        
        

  </div>
  <!--end wrapper-->


  <!-- Bootstrap bundle JS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/js/pace.min.js"></script>
  <!--app-->
  <script src="assets/js/app.js"></script>
  

</body>

</html>