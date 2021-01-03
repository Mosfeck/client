

<?= $this->extend('layouts/layout_admin') ?>

<?= $this->section('content') ?>

<body onload="myFunction()"> 
<div class="container-fluid mt-4">

    <div class="row justify-content-md-center">
        <div class="col col-lg-12">
            


            <?php if (session('msg')) : ?>
                <div class="alert alert-success alert-dismissible text-center">
                    <?= session('msg') ?>
                </div>
            <?php endif ?>

            <p class="alert-info p-3">Subscriber Anonymous</p>
            <hr />
            <form action="<?php echo site_url('Approved/search'); ?>" name="approvedControlView" id="approvedControlView" method="get" accept-charset="utf-8">
                <div class="row justify-content-md-center">

                    <div class="col">
                        <input type="text" name="tracking_id" value="<?= old('tracking_id') ?>" class="form-control" placeholder="Tracking ID">
                    </div>
                    <div class="col">
                        <input type="text" name="user_name" value="<?= old('user_name') ?>" class="form-control" placeholder="Name">
                    </div>
                    <div class="col">
                        <input type="text" name="contact_mobile" value="<?= old('contact_mobile') ?>" class="form-control" placeholder="Phone">
                    </div>
                    <div class="col">
                        <input type="text" name="contact_email" value="<?= old('contact_email') ?>" class="form-control" placeholder="Email">
                    </div>
                    <div class="col">
                        <select class="form-control" name="client_type">
                            <option value="">Client Type</option>
                            <option value="Individual">Individual</option>
                            <option value="Corporate">Corporate</option>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control" name="status">
                            <option value="">Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Approved">Approved</option>
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" id="send_form" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </form>

            <a href="<?php echo site_url('Approved/export') ?>" class="btn btn-info mt-4 mb-4">Export</a>

            <table class="table table-bordered" id="approved_list">
                <thead>
                    <tr>
                        <!-- <th>Action</th> -->
                        <th>Sl</th>
                        <th>Tracking ID</th>
                        <th>User Name</th>
                        <th>Approved Number</th>
                        <th>Client Type</th>
                        <!-- <th>Contact Phone</th> -->
                        <th>Contact Mobile</th>
                        <th>Contact Email</th>
                        <th>Status</th>
                        <th>Created date</th>
                        <th>Action By</th>
                        <th>Action Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($approved) > 0) : ?>
                        <?php $i = 1; ?>
                        <?php foreach ($approved as $row) : ?>

                            <tr>
                               <!-- <td>
                                     <a href="<?php //echo site_url('Approves/documentList/' . $row['id']); ?>" class="btn btn-success"><i class="fas fa-folder-open"></i></a> 
                                </td>-->
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['tracking_id']; ?></td>
                                <td>
                                    <?php echo $row['user_name']; ?>
                                    <!-- <a href="<?php //echo site_url('Approves/approveData/' . $row['tracking_id']); ?>"><?php //echo $row['user_name']; ?></a> -->
                                </td>
                                <td><?php echo $row['sip_no']; ?></td>
                                <td><?php echo $row['client_type']; ?></td>
                                <!-- <td><?php //echo $row['contact_phone']; ?></td> -->
                                <td><?php echo $row['contact_mobile']; ?></td>
                                <td><?php echo $row['contact_email']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td><?php echo $row['created_date']; ?></td>
                                <td><?php echo $row['action_by']; ?></td>
                                <td><?php echo $row['action_date']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

            <div id="approved_search">
            <table class="table table-bordered" id="approved_search_list">
                <thead>
                    <tr>
                        <!-- <th>Action</th> -->
                        <th>Sl</th>
                        <th>Tracking ID</th>
                        <th>User Name</th>
                        <th>Approved Number</th>
                        <th>Client Type</th>
                        <!-- <th>Contact Phone</th> -->
                        <th>Contact Mobile</th>
                        <th>Contact Email</th>
                        <th>Status</th>
                        <th>Created date</th>
                        <th>Action By</th>
                        <th>Action Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($approved) > 0) : ?>
                        <?php $i = 1; ?>
                        <?php foreach ($approved as $row) : ?>

                            <tr>
                               <!-- <td>
                                     <a href="<?php //echo site_url('Approves/documentList/' . $row['id']); ?>" class="btn btn-success"><i class="fas fa-folder-open"></i></a> 
                                </td>-->
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['tracking_id']; ?></td>
                                <td>
                                    <?php echo $row['user_name']; ?>
                                    <!-- <a href="<?php //echo site_url('Approves/approveData/' . $row['tracking_id']); ?>"><?php //echo $row['user_name']; ?></a> -->
                                </td>
                                <td><?php echo $row['sip_no']; ?></td>
                                <td><?php echo $row['client_type']; ?></td>
                                <!-- <td><?php //echo $row['contact_phone']; ?></td> -->
                                <td><?php echo $row['contact_mobile']; ?></td>
                                <td><?php echo $row['contact_email']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td><?php echo $row['created_date']; ?></td>
                                <td><?php echo $row['action_by']; ?></td>
                                <td><?php echo $row['action_date']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>

<script>
   

    

       

        $('#approved_list').DataTable();
        $('#approved_search_list').DataTable();

        function myFunction() {
            $("#approved_search").hide();
        }

        

        $('#approvedControlView').on('submit', function() {
            $("#approved_search_list").show();
            $("#approved_list").hide();
        });

        
</script>


 </body>


<?= $this->endSection() ?>