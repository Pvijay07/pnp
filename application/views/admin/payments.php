

       <!--start content-->
       <main class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Store Withdraw Requests</div>
					
					<div class="ms-auto">
							
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
                    <th>S.No.</th>
                    <th>Txn ID</th>
                    <th>Booking ID</th>
                    <th>Amount</th>
										<th>Course</th>
                    <th>Booking Date</th>
                    <th>Booking Time</th>
                    <th>Payment Mode</th>
                    <th>Status</th>
									</tr>
								</thead>
								<tbody>
                  <?php 
                  $i=1;
                  foreach($payments as $payment){ 
                    $booking_info = $this->crud_model->get_by_id("bookings", $payment->booking_id);
                  ?>
									<tr>
										<td><?php echo $i; ?></td>
                    <td><?php echo $payment->payment_id; ?></td>
                    <td><?php echo $booking_info->booking_id; ?></td>
										<td><?=$payment->amount?></td>
                    <td><?=$booking_info->course_name?></td>
                    <td><?=$booking_info->booking_date?></td>
                    <td><?=$booking_info->booking_time?></td>
                    <td><?=$payment->payment_method?></td>
									  <td><?=$payment->status?></td>
									</tr>
                  <?php
                  $i++;
                  } ?>
								</tbody>
								
							</table>
						</div>
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
  <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
  <script src="assets/js/table-datatable.js"></script>
	
  <!--app-->
  <script src="assets/js/app.js"></script>
  
</body>

</html>