

<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>


<div class="container">
    
    <h6 class="alert alert-secondary font-weight-normal text-primary p-3">Dashboard/Upload File</h6>


    <div class="row justify-content-md-center">
        <div class="col-md-12">

            <?php if (session('msg')) : ?>
                <div class="alert alert-success alert-dismissible text-center">
                    <?= session('msg') ?>
                </div>
            <?php endif ?>

            <?php echo form_open(site_url('Clients'), ['name' => 'Client_edit',  'id' => 'Client_edit', 'enctype' => 'multipart/form-data']); ?>

            <?php if (count($clients) > 0) : ?>
                <?php foreach ($clients as $row) : ?>

                    <?php
                    echo form_input(['name' => 'client_id', 'value' =>  $row['client_id'], 'class' => 'form-control', 'type' => 'hidden']);
                    ?>

                    <div class="row form-group">
                        <div class="col-md-4 d-flex justify-content-end">
                            <label for="photo_identity">Photo Identity<span style="color:red;" class="ml-1">*</label>
                        </div>
                        <div class="col-md-8">
                            <?php
                            $options = array(
                                'Birth certificate' => 'Birth certificate',
                                'Driving license' => 'Driving license',
                                'NID' => 'NID',
                                'Passport' => 'Passport'
                            );
                            
                                echo form_dropdown('photo_identity', array('' => 'No Selected') + $options,  $row['photo_identity'], ['class' => 'form-control']);
                             ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4 d-flex justify-content-end">
                            <label for="identity_number">Photo Identity Number<span style="color:red;" class="ml-1"> *</span></label>
                        </div>
                        <div class="col-md-8">
                            <?php
                                echo form_input(['name' => 'identity_number', 'class' => 'form-control', 'value' =>  $row['identity_number'], 'placeholder' => "Please enter identity number"]);
                             ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4 d-flex justify-content-end">
                            <label for="identity_scan">Photo Identity Scan Copy<span style="color:red;" class="ml-1"> *</span></label>
                        </div>
                        <div class="col-md-8">
                            <?php $js = 'onchange="readURL(this);"'; ?>
                            <?php echo form_input('identity_scan', '', $js, 'file'); ?>
                            <?php echo $row['identity_scan']; ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4 d-flex justify-content-end">
                            <label for="auth_person_photo">Authurized Person's Photo<span style="color:red;" class="ml-1"> *</span></label>
                        </div>
                        <div class="col-md-8">
                            <?php $js = 'onchange="readURL(this);"'; ?>
                            <?php echo form_input('auth_person_photo', '', $js, 'file'); ?>
                            <?php echo $row['auth_person_photo']; ?>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>

            <div class="row form-group">
                <div class="col-md-4 d-flex justify-content-end">

                </div>
                <div class="col-md-8">
                    <?php echo form_submit(['name' => 'submit', 'value' => 'Submit', 'class' => 'btn btn-success']); ?>
                    <a href="<?php echo site_url('ClientControl/getUser'); ?>" type="reset" value="reset" class="btn btn-info">Close</a>
                </div>
            </div>

            <?php echo form_close(); ?>
        </div>

    </div>

</div>
<script>
    if ($("#Client_edit").length > 0) {
        $("#Client_edit").validate({

            rules: {

                photo_identity: {
                    required: true,
                },
                identity_number: {
                    required: true,
                },
                identity_scan: {
                    required: true,
                },

                auth_person_photo: {
                    required: true,
                },

            },
            messages: {

                photo_identity: {
                    required: "Please enter photo indentity",
                },
                identity_number: {
                    required: "Please enter identity number",
                },
                identity_scan: {
                    required: "Please enter identity scan",
                },

                auth_person_photo: {
                    required: "Please enter auth person photo",
                },

            },
        })
    }
</script>



<?= $this->endSection() ?>