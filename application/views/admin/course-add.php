<link href="<?=base_url()?>assets/css/theme-default.css" rel="stylesheet" />

<!--start content-->
<main class="page-content">
   <!--breadcrumb-->
   <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3"><?=$title?></div>
      <div class="ms-auto">
         <a href="<?=base_url("admin/courses")?>" class="btn btn-primary"><i class="bi bi-list"></i> View Courses</a>
      </div>
   </div>
   <!--end breadcrumb-->
   <div class="row">
      <div class="card">
         <div class="card-body">
            <div class="border p-3 rounded">
              <?php $this->load->view("admin/includes/_messages"); ?>
               <form class="row g-3" action="<?=base_url('admin/courses/add')?>" method="post" enctype="multipart/form-data">
                  <div class="col-6">
                     <label class="form-label">Course Name</label>
                     <input type="text" class="form-control" name="name" data-validation="required">
                  </div>
                  <div class="col-6">
                     <label class="form-label">Category</label>
                     <select class="form-select" name="category" data-validation="required">
                        <option value="0">Select Category</option>
                        <?php foreach($categories as $category){ ?>
                        <option value="<?=$category->id?>"><?=$category->name?></option>
                        <?php } ?>
                     </select>
                  </div>
                  <div class="col-6">
                     <label class="form-label">Upload Image</label>
                     <input name="image" class="form-control" type="file" data-validation="mime size" break0="" data-validation-allowing="jpg, png, gif" break=""
       data-validation-max-size="5M" />
                  </div>
                  <div class="col-6">
                     <label class="form-label">Status </label>
                     <select name="status" class="form-select" data-validation="required">
                        <option value="">Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                     </select>
                  </div>
                  <div class="col-12">
                     <label class="form-label">Description</label>
                     <textarea class="form-control" name="content" data-validation="required"></textarea>
                  </div>
                  
                  <div class="col-sm-9">
                     <input name="submit" type="submit" class="btn btn-primary px-5" value="Submit">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!--end row-->
</main>
<!--end page main-->

<script src="<?=base_url()?>assets/js/jquery.form-validator.js"></script>

<script>
    $.validate({
        modules : 'file'
    });
</script>