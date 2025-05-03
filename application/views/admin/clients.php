<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?=$title?></div>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile No</th>
                            <th>Address</th>
                            <th>Dogs</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        foreach($clients as $client){
                            $totDogs = 0;
                            $petsinfo = $this->crud_model->rowCount("pets", ["customer_id" => $client->id]);

                            if ($petsinfo) {
                              $totDogs = $petsinfo;
                            }
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $client->name?></td>
                            <td><?php echo $client->email?></td>
                            <td><?php echo $client->phone?></td>
                            <td><?php echo !empty($client->address) ? $client->address : '--'; ?></td>
                            <td><?php echo $totDogs?></td>
                           
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