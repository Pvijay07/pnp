<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-12 col-lg-12 col-xl-12 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-3 row-cols-xxl-3 g-3">
                        <div class="col">
                            <div class="card radius-10 bg-tiffany mb-0">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                        <a class="text-white" href="<?=base_url("admin/users/index/student")?>"><i
                                                class="bi bi-file-earmark-break-fill"></i></a>
                                    </div>
                                    <h3 class="text-white"><?=$total_students?></h3>
                                    <p class="mb-0 text-white">Total Students</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 bg-danger mb-0">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                        <a class="text-white" href="<?=base_url("admin/users/index/teacher")?>"><i
                                                class="bi bi-hdd-fill"></i></a>
                                    </div>
                                    <h3 class="text-white"><?=$total_teachers?></h3>
                                    <p class="mb-0 text-white">Total Teachers</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 bg-success mb-0">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                        <a class="text-white" href="<?=base_url("admin/courses")?>"><i
                                                class="bi bi-people-fill"></i></a>
                                    </div>
                                    <h3 class="text-white"><?=$total_courses?></h3>
                                    <p class="mb-0 text-white">Total Courses</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 bg-dark mb-0">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                        <a class="text-white" href="<?=base_url("admin/category")?>"><i
                                                class="bi bi-file-earmark-check-fill"></i></a>
                                    </div>
                                    <h3 class="text-white"><?=$total_categories?></h3>
                                    <p class="mb-0 text-white">Total Categories</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 bg-purple mb-0">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                        <a class="text-white" href="<?=base_url("admin/bookings")?>"><i
                                                class="bi bi-tags-fill"></i></a>
                                    </div>
                                    <h3 class="text-white"><?=$total_bookings?></h3>
                                    <p class="mb-0 text-white">Total Bookings</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 bg-orange mb-0">
                                <div class="card-body text-center">
                                    <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                        <a class="text-white" href="<?=base_url("admin/dashboard/enquiries")?>"><i
                                                class="bi bi-chat-left-quote-fill"></i></a>
                                    </div>
                                    <h3 class="text-white"><?=$total_enquiries?></h3>
                                    <p class="mb-0 text-white">Total Enquiries</p>
                                </div>
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