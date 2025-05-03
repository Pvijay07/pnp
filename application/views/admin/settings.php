<link href="<?=base_url()?>assets/css/theme-default.css" rel="stylesheet" />

<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Settings</div>
    </div>
    <!--end breadcrumb-->

    <div class="row">



        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <form class="row g-3" method="post" method="<?=base_url()?>">

                        <div class="col-6">
                            <label class="form-label">Website Name</label>
                            <input type="text" class="form-control" name="name" data-validation="required"
                                value="<?=$settings->application_name?>">
                        </div>

                        <div class="col-6">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" data-validation="required"
                                value="<?=$settings->phone?>">
                        </div>

                        <div class="col-6">
                            <label class="form-label">Email ID</label>
                            <input type="text" class="form-control" name="email" data-validation="email"
                                value="<?=$settings->email?>">
                        </div>

                        <div class="col-6">
                            <label class="form-label">Time Zone</label>
                            <?php timezone_dropdown('timezone', $settings->timezone, 'class="form-select" data-validation="required"'); ?>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Currency</label>
                            <select name="currency" class="form-select">
                                <option value="INR" <?php if($settings->currency == 'INR') echo 'selected'; ?>)>Rupee
                                    (INR)</option>
                            </select>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Copyrights</label>
                            <input type="text" class="form-control" name="copyright" data-validation="required"
                                value="<?=$settings->copyright?>">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="address"
                                data-validation="required"><?=nl2br($settings->address)?></textarea>
                        </div>

                        <div class="card-header">
                            <h6 class="mb-0">Email Settings</h6>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Email From</label>
                            <input type="text" class="form-control" name="email_from" data-validation="email"
                                value="<?=$settings->email_from?>">
                        </div>

                        <div class="col-6">
                            <label class="form-label">SMTP Host</label>
                            <input type="text" class="form-control" name="smtp_host" data-validation="required"
                                value="<?=$settings->smtp_host?>">
                        </div>

                        <div class="col-6">
                            <label class="form-label">Port</label>
                            <input type="number" class="form-control" name="port" data-validation="required"
                                value="<?=$settings->smtp_port?>">
                        </div>

                        <div class="col-6">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" data-validation="required"
                                value="<?=$settings->smtp_user?>">
                        </div>

                        <div class="col-6">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="col-sm-9">
                            <input type="submit" name="submit" class="btn btn-primary px-5" value="Submit">
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
    modules: 'security'
});
</script>