<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?=$title?></div>
        <div class="ms-auto">
            <a href="<?=base_url("admin/services/add")?>" class="btn btn-success"> <i class="bi bi-plus"></i> Add
                Service</a>
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach($services as $service){
                        ?>
                        <tr>
                            <td><?=$i?></td>
                            <td><img src="<?=$service->icon?>" width="40" height="40" class="img-circle"></td>
                            <td><?=$service->name?></td>
                            <td><?=$service->status?></td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="<?=base_url("admin/services/edit/".$service->id)?>" class="text-warning"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        data-bs-original-title="Edit info" aria-label="Edit"><i
                                            class="bi bi-pencil-fill"></i></a>
                                    <!-- <a href="<?=base_url("admin/services/delete/".$service->id)?>"
                                        onclick="return confirm('are you sure to delete?')" class="text-danger"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        data-bs-original-title="Delete" aria-label="Delete"><i
                                            class="bi bi-trash-fill"></i></a> -->
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