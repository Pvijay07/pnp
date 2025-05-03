<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3"> <?=$title?></div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <?php echo form_open(base_url('admin/profile'), 'class="row g-3"')?>
                    <div class="col-6">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $profile->name; ?>"
                            data-validation="required">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Email ID</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $profile->email; ?>"
                            data-validation="email">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Mobile No.</label>
                        <input type="text" name="phone" class="form-control" maxlength="10"
                            value="<?php echo $profile->phone; ?>" data-validation="number,length"
                            data-validation-length="min10">
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