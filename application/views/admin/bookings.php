<!--start content-->
<main class="page-content">
   <!--breadcrumb-->
   <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Bookings</div>
      <div class="ms-auto">
         
      </div>
   </div>
   <!--end breadcrumb-->
   <div class="card">
      <div class="card-body">
        <?php $this->load->view("admin/includes/_messages"); ?>
         <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
               <thead>
                  <tr>
                     <th>S.No.</th>
                     <th>Student</th>
                     <th>Guru</th>
                     <th>Course Name</th>
                     <th>Amount</th>
                     <th>Booking Date</th>
                     <th>Booking Time</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                 <?php
                 $i = 1;
                 foreach($bookings as $booking){
                    $student_info = $this->crud_model->get_by_id("ci_users",$booking->student_id);
                    $guru_info = $this->crud_model->get_by_id("ci_users",$booking->guru_id);
                 ?>
                  <tr>
                     <td><?=$i?></td>
                     <td><?=$student_info->name?></td>
                     <td><?=$guru_info->name?></td>
                     <td><?=$booking->course_name?></td>
                     <td><?=$booking->price?></td>
                     <td><?=$booking->booking_date?></td>
                     <td><?=$booking->booking_time?></td>
                     <td><?=$booking->status?></td>
                     <td>
                        <div class="d-flex align-items-center gap-3 fs-6">
                           <a href="<?=base_url("admin/bookings/delete/".$booking->id)?>" onclick="return confirm('are you sure to delete?')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                        </div>
                     </td>
                  </tr>
                  <?php
                  $i++;
                  }
                  ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</main>
<!--end page main-->