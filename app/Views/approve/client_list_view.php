

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
            <form action="<?php echo site_url('Approves/search'); ?>" name="ClientControlView" id="ClientControlView" method="get" accept-charset="utf-8">
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
                            <option value="Cancel">Cancel</option>
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" id="send_form" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </form>

            <a href="<?php echo site_url('Approves/export') ?>" class="btn btn-info mt-4 mb-4">Export</a>

            <table class="table table-bordered" id="client_list">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Sl</th>
                        <th>Tracking ID</th>
                        <th>User Name</th>
                        <th>Client Type</th>
                        <th>Contact Phone</th>
                        <th>Contact Mobile</th>
                        <th>Contact Email</th>
                        <th>Status</th>
                        <th>Created date</th>
                        <!-- <th>activation_date</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($approves) > 0) : ?>
                        <?php $i = 1; ?>
                        <?php foreach ($approves as $row) : ?>

                            <tr>
                                <td>
                                    <a href="<?php echo site_url('Approves/documentList/' . $row['id']); ?>" class="btn btn-success"><i class="fas fa-folder-open"></i></a>
                                </td>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['tracking_id']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('Approves/approveData/' . $row['tracking_id']); ?>"><?php echo $row['user_name']; ?></a>
                                </td>
                                <td><?php echo $row['client_type']; ?></td>
                                <td><?php echo $row['contact_phone']; ?></td>
                                <td><?php echo $row['contact_mobile']; ?></td>
                                <td><?php echo $row['contact_email']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td><?php echo $row['created_date']; ?></td>
                                <!-- <td><?php // echo $row['activation_date']; 
                                            ?></td> -->
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

            <div id="client_search">
            <table class="table table-bordered" id="client_search_list">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Sl</th>
                        <th>User Name</th>
                        <th>Client Type</th>
                        <th>Contact Phone</th>
                        <th>Contact Mobile</th>
                        <th>Contact Email</th>
                        <th>Approved No</th>
                        <th>Status</th>
                        <th>Created date</th>
                        <th>Action By</th>
                        <th>Action Date</th>
                        <!-- <th>activation_date</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($approves) > 0) : ?>
                        <?php $i = 1; ?>
                        <?php foreach ($approves as $row) : ?>

                            <tr>
                                <td>
                                    <a href="<?php echo site_url('approves/editAdmin/' . $row['tracking_id']); ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                </td>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['user_name']; ?></td>
                                <td><?php echo $row['client_type']; ?></td>
                                <td><?php echo $row['contact_phone']; ?></td>
                                <td><?php echo $row['contact_mobile']; ?></td>
                                <td><?php echo $row['contact_email']; ?></td>
                                <td><?php echo $row['approve_no']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td><?php echo $row['created_date']; ?></td>
                                <td><?php echo $row['action_by']; ?></td>
                                <td><?php echo $row['action_date']; ?></td>
                                <!-- <td><?php // echo $row['activation_date']; 
                                            ?></td> -->
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
   

    

       

        $('#client_list').DataTable();
        $('#client_search_list').DataTable();

        function myFunction() {
            $("#client_search").hide();
        }

        

        $('#ClientControlView').on('submit', function() {
            $("#client_search_list").show();
            $("#client_list").hide();
        });

        
</script>


 </body>


<?= $this->endSection() ?>