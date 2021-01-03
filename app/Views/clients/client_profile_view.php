<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<body onload="myFunction()">
    <div class="container
     mt-4">

        <div class="row justify-content-md-center">
            <div class="col col-lg-12">
               


                <?php if (session('msg')) : ?>
                    <div class="alert alert-success alert-dismissible text-center">
                        <?= session('msg') ?>
                    </div>
                <?php endif ?>

                <p class="alert-info p-3">Subscriber Anonymous >> 
                <?php if (count($clients) > 0) : ?>
                            <?php foreach ($clients as $row) : ?>
                                <?php echo $row->user_name; ?>
                            
                </p>
                <hr />




                <table class="table table-bordered table-striped" id="client_list">
                    <tbody>
                                
                                <tr>
                                    <th>Tracking ID</th>
                                    <td><?php echo $row->tracking_id; ?></td>
                                </tr>
                                <tr>
                                    <th>Client Type</th>
                                    <td><?php echo $row->client_type; ?></td>
                                </tr>
                                <tr>
                                    <th>Company Name</th>
                                    <td><?php echo $row->company_name; ?></td>
                                </tr>
                                <tr>
                                    <th>User Name</th>
                                    <td><?php echo $row->user_name; ?></td>
                                </tr>
                                <tr>
                                    <th>User's Birth Date</th>
                                    <td><?php echo  date('d-m-Y', strtotime($row->birth_date)); ?></td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td><?php echo $row->gender; ?></td>
                                </tr>
                                <tr>
                                    <th>Occupation</th>
                                    <td><?php echo $row->occupation; ?></td>
                                </tr>
                                <tr>
                                    <th>Present Address</th>
                                    <td><?php echo $row->present_add; ?></td>
                                </tr>
                                <tr>
                                    <th>Permanent Address</th>
                                    <td><?php echo $row->permanent_add; ?></td>
                                </tr>
                                <tr>
                                    <th>Contact Phone</th>
                                    <td><?php echo $row->contact_phone; ?></td>
                                </tr>
                                <tr>
                                    <th>Contact Mobile</th>
                                    <td><?php echo $row->contact_mobile; ?></td>
                                </tr>
                                <tr>
                                    <th>Contact Email</th>
                                    <td><?php echo $row->contact_email; ?></td>
                                </tr>
                                <tr>
                                    <th>Technical Phone</th>
                                    <td><?php echo $row->technical_phone; ?></td>
                                </tr>
                                <tr>
                                    <th>Technical Mobile</th>
                                    <td><?php echo $row->technical_mobile; ?></td>
                                </tr>
                                <tr>
                                    <th>Technical Email</th>
                                    <td><?php echo $row->technical_email; ?></td>
                                </tr>
                                <tr>
                                    <th>Billing Phone</th>
                                    <td><?php echo $row->billing_phone; ?></td>
                                </tr>
                                <tr>
                                    <th>Billing Mobile</th>
                                    <td><?php echo $row->billing_mobile; ?></td>
                                </tr>
                                <tr>
                                    <th>Billing Email</th>
                                    <td><?php echo $row->billing_email; ?></td>
                                </tr>
                                <tr>
                                    <th>Father Name</th>
                                    <td><?php echo $row->father_name; ?></td>
                                </tr>
                                <tr>
                                    <th>Mother Name</th>
                                    <td><?php echo $row->mother_name; ?></td>
                                </tr>
                                <tr>
                                    <th>Spouse Name</th>
                                    <td><?php echo $row->spouse_name; ?></td>
                                </tr>
                                <tr>
                                    <th>Photo Identity</th>
                                    <td><?php echo $row->photo_identity; ?></td>
                                </tr>
                                <tr>
                                    <th>Identity Number</th>
                                    <td><?php echo $row->identity_number; ?></td>
                                </tr>
                                <tr>
                                    <th>Provider Name</th>
                                    <td><?php echo $row->provider_name; ?></td>
                                </tr>
                                
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <a href="<?php echo site_url('ClientControl/getUser'); ?>" type="reset" value="reset" class="btn btn-info">Close</a>                

            </div>
        </div>
    </div>
    </div>

    <script>
        // $('#client_list').DataTable();
        // $('#client_search_list').DataTable();

        // function myFunction() {
        //     $("#client_search").hide();
        // }



        // $('#ClientControlView').on('submit', function() {
        //     $("#client_search_list").show();
        //     $("#client_list").hide();
        // });
    </script>


</body>


<?= $this->endSection() ?>