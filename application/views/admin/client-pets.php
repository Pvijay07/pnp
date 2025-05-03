<link href="<?=base_url()?>assets/css/theme-default.css" rel="stylesheet" />

<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?=$title?></div>
        <div class="ms-auto">
            <a href="<?=base_url("admin/providers")?>" class="btn btn-primary"><i class="bi bi-list"></i> View
                Clients</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-12 col-lg-3">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-body">
                    <div class="profile-avatar text-center">
                        <img src="<?=$client->profile_pic?>" class="rounded-circle shadow" width="120" height="120"
                            alt="">
                    </div>

                    <div class="text-center mt-4">
                        <h4 class="mb-1"><?=$client->name?></h4>
                        <p class="mb-0 text-secondary"><?=$client->phone?></p>
                        <p class="mb-0 text-secondary"><?=$client->email?></p>
                    </div>
                </div>
                <?php $this->load->view("admin/includes/clients-menu"); ?>
            </div>
        </div>
        <div class="col-12 col-lg-9">
            <div class="card shadow-sm border-0">

                <div class="card-body">
                    <h5 class="mb-0"><?=$heading?></h5>
                    <hr>
                    <div class="card shadow-none border">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Age</th>
                                            <th>Breed Type</th>
                                            <th>Aggression</th>
                                            <th>Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Snoopy</td>
                                            <td>Male</td>
                                            <td>2 Yrs</td>
                                            <td>Lombord</td>
                                            <td>High</td>
                                            <td>2023-02-10 12:00:00</td>
                                        </tr>
                                        <tr>
                                            <td>Snoopy1</td>
                                            <td>Female</td>
                                            <td>2 Yrs</td>
                                            <td>Lombord</td>
                                            <td>Low</td>
                                            <td>2023-02-10 12:00:00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--end row-->
</main>
<!--end page main-->