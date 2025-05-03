
<!--start content-->
<main class="page-content">
   <!--breadcrumb-->
   <div class="page-breadcrumb d-none d-sm-flex align-items-center">
      <div class="breadcrumb-title pe-3"> Change Password</div>
   </div>
   <!--end breadcrumb-->
   <div class="row">
      <div class="card">
         <div class="card-body">
            <div class="border p-3 rounded">
                  <!-- For Messages -->
                  <?php $this->load->view('admin/includes/_messages.php') ?>
                  <?php echo form_open(base_url('admin/profile/change_pwd'), 'class="row g-3"')?> 
                  <div class="col-10">
                     <label class="form-label">New Password</label>
                     <input type="password" name="pass_confirmation" class="form-control" data-validation="length" data-validation-length="min6">
                  </div>
                  <div class="col-10">
                     <label class="form-label">Confirm Password</label>
                     <input type="password" name="pass" class="form-control" data-validation="confirmation">
                  </div>
                  
                 
                  <div class="col-sm-9">
                     <input type="submit" name="submit" class="btn btn-primary px-5" value="Submit">
                  </div>
                  <?php echo form_close(); ?>
            </div>
         </div>
      </div>
   </div>
   <!--end row-->
</main>
<!--end page main-->


  