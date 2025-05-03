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

  <link href="assets/plugins/datetimepicker/css/classic.css" rel="stylesheet" />
	<link href="assets/plugins/datetimepicker/css/classic.date.css" rel="stylesheet" />
	

  <!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />


  <!--Theme Styles-->
  <link href="assets/css/dark-theme.css" rel="stylesheet" />
  <link href="assets/css/light-theme.css" rel="stylesheet" />
  <link href="assets/css/semi-dark.css" rel="stylesheet" />
  <link href="assets/css/header-colors.css" rel="stylesheet" />

  <title>Products</title>
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
					<div class="breadcrumb-title pe-3">Add Products</div>
                    <div class="ms-auto">
							<a href="products.php" class="btn btn-primary">View Products</a>
                            <a href="#" class="btn btn-danger">Bulk Import</a>
                            <a href="#" class="btn btn-success">Export</a>
					</div>
				</div>
				<!--end breadcrumb-->
        
				<div class="row">

            <div class="card">
              <div class="card-body">
                <div class="border p-3 rounded">
                <form class="row g-3">
                  <div class="col-6">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-6">
                    <label class="form-label">Category</label>
                    <select name="text" class="form-select">
                        <option value="0">Select Category</option>
                        <option value="">Category One</option>
                        <option value="">Category Two</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label class="form-label">Short Description</label>
                    <textarea name="text" class="form-control"></textarea>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Store</label>
                    <select name="text" class="form-select">
                        <option value="0">Select Store</option>
                        <option value="">Store 1</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Manufacturing Date</label>
                    <input type="text" class="form-control datepicker">
                  </div>
                  <div class="col-6">
                    <label class="form-label">Expiry Date</label>
                    <input type="text" class="form-control datepicker">
                  </div>
                  <div class="col-6">
                    <label class="form-label">Batch Number</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-6">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control">
                  </div>
                  <div class="col-6">
                    <label class="form-label">Total Stock</label>
                    <input type="number" class="form-control">
                  </div>
                  <div class="col-3">
                    <label class="form-label">Units </label>
                    <input type="number" class="form-control">
                  </div>
                  <div class="col-3">
                    <label class="form-label">in </label>
                    <select name="units" class="form-select">
                        <option value="0">Select Units</option>
                        <option value="">Ml</option>
                        <option value="">Kgs</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Upload Image</label>
                    <input class="form-control" type="file" id="formFile">
                  </div> 
                  <div class="col-6">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">  
                    <label class="form-check-label" for="flexCheckDefault">Required Prescription</label>
                  </div>                  
                  <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary px-5">Submit</button>
                </div>
                </form>
              </div>
              </div>
            </div>
		
				</div>
				<!--end row-->

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
  
	<script src="assets/plugins/datetimepicker/js/picker.js"></script>
	<script src="assets/plugins/datetimepicker/js/picker.date.js"></script>
  <script src="assets/js/form-date-time-pickes.js"></script>

  <!--app-->
  <script src="assets/js/app.js"></script>
  

</body>

</html>