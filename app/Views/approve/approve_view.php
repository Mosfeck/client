<?= $this->extend('layouts/layout_admin') ?>

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
                            <?php echo $row['user_name']; ?>


                </p>
                <hr />

                <table class="table table-bordered table-striped" id="client_list">
                    <tbody>
                        <tr>
                            <th>Tracking ID</th>
                            <td id="tracking_id"><?php echo $row['tracking_id']; ?></td>
                        </tr>
                        <tr>
                            <th>Client Type</th>
                            <td><?php echo $row['client_type']; ?></td>
                        </tr>
                        <tr>
                            <th>Company Name</th>
                            <td><?php echo $row['company_name']; ?></td>
                        </tr>
                        <tr>
                            <th>User Name</th>
                            <td><?php echo $row['user_name']; ?></td>
                        </tr>
                        <tr>
                            <th>User's Birth Date</th>
                            <td><?php echo  date('d-m-Y', strtotime($row['birth_date'])); ?></td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td><?php echo $row['gender']; ?></td>
                        </tr>
                        <tr>
                            <th>Occupation</th>
                            <td><?php echo $row['occupation']; ?></td>
                        </tr>
                        <tr>
                            <th>Present Address</th>
                            <td><?php echo $row['present_add']; ?></td>
                        </tr>
                        <tr>
                            <th>Permanent Address</th>
                            <td><?php echo $row['permanent_add']; ?></td>
                        </tr>
                        <tr>
                            <th>Contact Phone</th>
                            <td><?php echo $row['contact_phone']; ?></td>
                        </tr>
                        <tr>
                            <th>Contact Mobile</th>
                            <td><?php echo $row['contact_mobile']; ?></td>
                        </tr>
                        <tr>
                            <th>Contact Email</th>
                            <td><?php echo $row['contact_email']; ?></td>
                        </tr>
                        <tr>
                            <th>Technical Phone</th>
                            <td><?php echo $row['technical_phone']; ?></td>
                        </tr>
                        <tr>
                            <th>Technical Mobile</th>
                            <td><?php echo $row['technical_mobile']; ?></td>
                        </tr>
                        <tr>
                            <th>Technical Email</th>
                            <td><?php echo $row['technical_email']; ?></td>
                        </tr>
                        <tr>
                            <th>Billing Phone</th>
                            <td><?php echo $row['billing_phone']; ?></td>
                        </tr>
                        <tr>
                            <th>Billing Mobile</th>
                            <td><?php echo $row['billing_mobile']; ?></td>
                        </tr>
                        <tr>
                            <th>Billing Email</th>
                            <td><?php echo $row['billing_email']; ?></td>
                        </tr>
                        <tr>
                            <th>Father Name</th>
                            <td><?php echo $row['father_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Mother Name</th>
                            <td><?php echo $row['mother_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Spouse Name</th>
                            <td><?php echo $row['spouse_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Photo Identity</th>
                            <td><?php echo $row['photo_identity']; ?></td>
                        </tr>
                        <tr>
                            <th>Identity Number</th>
                            <td><?php echo $row['identity_number']; ?></td>
                        </tr>
                        <tr>
                            <th>Provider Name</th>
                            <td><?php echo $row['provider_name']; ?></td>
                        </tr>


                    </tbody>
                </table>

                <hr />
                <div class="alert alert-success">Part B</div>
                <form action="<?php echo site_url('Approves/save'); ?>" name="ClientControlView" id="ClientControlView" method="POST" accept-charset="utf-8">
                    <input type="hidden" name="tracking_id" id="tracking" class="form-control" value="<?php echo $row['tracking_id']; ?>">
                    <!-- <input type="hidden" name="identity_scan" id="identity_scan" class="form-control" value="<?php echo $row['identity_scan']; ?>"> -->
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="col-sm">
                <div class="row">

                    <div class="col-sm">
                        <div class="row">
                            <div class="row form-group ml-2">
                                <div class="col-4">
                                    <label for="">Form serial No:</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="serial_no" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm">
                        <div class="row">
                            <div class="row form-group ml-1">
                                <div class="col-4">
                                    <label for="">IP Address</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="ip_address" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="row">
                            <div class="row form-group ml-2">
                                <div class="col-2">
                                    <label for="">Info</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="info[]" value="NAT/PAT">
                                        <label class="form-check-label" for="">NAT/PAT</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="info[]" value="Real_IP">
                                        <label class="form-check-label" for="">Real_IP</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="row">
                            <div class="row form-group ml-2">
                                <div class="col-4">
                                    <label for="">Physical Address</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="physical_address" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm">
                        <div class="row">
                            <div class="row form-group ml-2">
                                <div class="col-4">
                                    <label for="">Type</label>
                                </div>
                                <div class="col-8">
                                    <!-- <select class="form-control" name="type">
                                        <option value="">No Select</option>
                                        <option value="all">All</option>
                                        <option value="others">Others</option>
                                    </select> -->
                                    <?php echo form_dropdown('type', array('' => 'No Selected') + $types, set_value('type'), ['class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-sm">
                        <div class="row">
                            <div class="row form-group ml-2">
                                <div class="col-5">
                                    <label for="">Issued IPT No 09666</label>
                                </div>
                                <div class="col-7">
                                    <input type="text" name="sip_no" id="sip_no" class="form-control" maxlength="6">
                                    <span class="text-danger" id="duplicateSip"></span>
                                    <span class="text-success" id="availableSip"></span>

                                    <!-- <?php //if (session()->has('Insert')) : 
                                            ?>
                                        <span class="text-danger"><?php //echo session()->getFlashdata('Insert') 
                                                                    ?></span>
                                    <?php //endif 
                                    ?>
                                    <?php //if (session()->has('success')) : 
                                    ?>
                                        <span class="text-success"><?php //echo session()->getFlashdata('success') 
                                                                    ?></span>
                                    <?php //endif 
                                    ?> -->
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm">


                        <div class="col">
                            <!-- <button type="reset" class="btn btn-primary">Check Availability</button> -->
                            <div class="btn btn-primary" id="CheckSip">Check Availability</div>
                        </div>


                    </div>

                </div>
                <div class="row">

                    <div class="col-sm">
                        <div class="row">
                            <div class="row form-group ml-2">
                                <div class="col-4">
                                    <label for="">Package</label>
                                </div>
                                <div class="col-8">
                                    <!-- <select class="form-control" name="package">
                                        <option value="">No Select</option>
                                        <option value="0.40/min, 1 sec pulse">0.40/min, 1 sec pulse</option>
                                        <option value="0.50/min, 1 sec pulse">0.50/min, 1 sec pulse</option>
                                    </select> -->
                                    <?php echo form_dropdown('package', array('' => 'No Selected') + $packages, set_value('package'), ['class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm">
                        <div class="row">
                            <div class="row form-group ml-2">
                                <div class="col-4">
                                    <label for="">Channel</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="channel" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <hr />
            <div class="col-sm">
                <div class="row">

                    <div class="col-sm">
                        <div class="row">

                            <div class="col-8">
                                <label for="">Seller Details:</label>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-sm">
                        <div class="row">
                            <div class="row form-group ml-2">
                                <div class="col-4">
                                    <label for="">Name</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="action_by" value="<?php echo session('uname'); ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm">
                        <div class="row">
                            <div class="row form-group ml-2">
                                <div class="col-4">
                                    <label for="">ID No.</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="serial_no" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-sm">
                        <div class="row">
                            <div class="row form-group ml-2">
                                <div class="col-4">
                                    <label for="">Email</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="serial_no" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm">
                        <div class="row">
                            <div class="row form-group ml-2">
                                <div class="col-4">
                                    <label for="">Contact No.</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="serial_no" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-sm">
                        <div class="row">
                            <div class="row form-group ml-2">
                                <div class="col-4">
                                    <label for="">Address</label>
                                </div>
                                <div class="col-12">

                                    <textarea name="" class="form-control" cols="20" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



            <div class="col mb-2">
                <!-- <?php //if (session()->has('Insert')) : ?>
                    <div class="text-danger"><?php //echo session()->getFlashdata('Insert'); ?></div>
                <?php// endif ?> -->
                <div id="result"></div>
            </div>

            <div class="col">
                <button type="submit" id="submit_form" class="btn btn-primary">Approve</button>

            </div>

                </form>
                <div class="col">
                    <button id="send_form" class="btn btn-danger  mt-2">Cancel</button>
                </div>
                <div class="col">
                    <a href="<?php echo site_url('Approves/list'); ?>" class="btn btn-info  mt-2">Close</a>
                    <!-- <a href="<?php //echo site_url('ApproveControl/fileChecker'); 
                                    ?>" class="btn btn-info  mt-2">check</a> -->
                </div>
            </div>
        </div>
    </div>


    <script>
        function myFunction() {
            $('#submit_form').prop({
                disabled: true
            });
            $('#send_form').prop({
                disabled: true
            });
            var tracking_id = $("#tracking").val();
            console.log(tracking_id);
            $.ajax({
                url: "<?php echo site_url('ApproveControl/fileChecker'); ?>/" + tracking_id,
                method: "GET",
                success: function(res) {
                    console.log(res);
                    $('#submit_form').prop({
                        disabled: false
                    });
                    $('#send_form').prop({
                        disabled: false
                    });
                    // alert("working");
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Error get data from ajax');
                }

            })

        }
        // for cancel data
        $("#send_form").click(function() {
            var tracking_id = $("#tracking").val();
            console.log(tracking_id);
            $.ajax({
                url: "<?php echo site_url('ApproveControl/cancel'); ?>/" + tracking_id,
                method: "POST",
                success: function(data) {
                    console.log(data);
                    if(data == 'error')
                {
                    output = '<div class="text-danger">Duplicate tracking id. Please use another tracking id</div>';
                    // console.log(output);
                }
                else{
                    output = '<div class="text-success">Record Cancel Successfully</div>';
                    // console.log(output);
                }

                $("#result").hide().html(output).slideDown(); 
                },
                error: function(data) {
                    console.log(data);
                    alert('Error get data from ajax');
                }

            })

        });

        // for sip check
        $("#CheckSip").click(function() {
            var sip_no = $("#sip_no").val();
            console.log(sip_no);
            $.ajax({
                url: "<?php echo site_url('ApproveControl/sip_checker'); ?>/" + sip_no,
                type: "GET",
                dataType: "JSON",
                success: function(res) {
                    console.log(res);

                    var html = '';


                    if (res == null) {
                        html += 'SIP Number is available';

                        $('#availableSip').html(html);
                        $("#duplicateSip").hide();
                        $("#availableSip").show();

                    } else {
                        html += 'Duplicate SIP Number. Please use another SIP Number';
                        $('#duplicateSip').html(html);
                        $("#availableSip").hide();
                        $("#duplicateSip").show();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Error get data from ajax');
                }
            })
        });
    </script>


</body>


<?= $this->endSection() ?>