<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?=$title?></div>
        
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
                            <th>Service</th>
                            <th>Mobile No.</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>City</th>
                            <th>Id Proof</th>
                            <th>Add Proof</th>
                            <th>Crt Proof</th>
                            <th>PNP Status</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;

                        foreach($providers as $provider){

                            $tmpSrv = '--';
                            if (!empty($provider->service_id)) {
                                $sid = explode(",", $provider->service_id);
                                $tmpSrv =  array();
                                if (count($sid) > 0) {
                                    foreach ($sid as $skey => $svalue) {
                                        $service_info = $this->crud_model->select_row("services", ["id"=>$svalue]);
                                        array_push($tmpSrv, $service_info->name);
                                    }
                                }
                                $tmpSrv = implode(',', $tmpSrv);
                            }
                            
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $provider->first_name.' '.$provider->last_name; ?></td>
                            <td><?php echo  $tmpSrv; ?></td>
                            
                            <td><?php echo $provider->phone?></td>
                            <td><?php echo $provider->email?></td>
                            <td><?php echo $provider->gender?></td>
                            <td><?php echo $provider->age?></td>
                            <td><?php echo $provider->city?></td>

                            <td> 
                                <?php if (!empty($provider->id_proof)) { ?>
                                    <a href="<?php echo $provider->id_proof ?>" target="_blank"> Id Proof </a>
                                <?php }else{ echo "--"; } ?>
                            </td>
                            <td> 
                                <?php if (!empty($provider->address_proof)) { ?>
                                    <a href="<?php echo $provider->address_proof ?>" target="_blank"> Address Proof </a>
                                <?php }else{ echo "--"; } ?>
                            </td>
                            <td> 
                                <?php if (!empty($provider->crt_proof)) { ?>
                                    <a href="<?php echo $provider->crt_proof ?>" target="_blank"> Crt Proof </a>
                                <?php }else{ echo "--"; } ?>
                            </td>

                            <td><?php if($provider->pnp_verified == 1) echo '<span class="badge rounded-pill alert-success">Verified</span>'; else echo '<span class="badge rounded-pill alert-danger">Un Verified</span>'; ?>
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