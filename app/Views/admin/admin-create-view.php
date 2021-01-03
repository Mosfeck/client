<?= $this->extend('layouts/layout_admin') ?>

<?= $this->section('content') ?>

<div class="container">
    <br>
    <p class="alert-info p-3">Admin Add</p>


    <?php if (session('msg')) : ?>
        <div class="alert alert-success alert-dismissible text-center">
            <?= session('msg') ?>
        </div>
    <?php endif ?>

    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo site_url('Admins/createOrUpdate'); ?>" name="DesigControl_create" id="DesigControl_create" method="post" accept-charset="utf-8">

                <div class="form-group">
                    <label for="">Admin Name</label>
                    <input type="text" name="admin_name" class="form-control" placeholder="Please enter Admin name">

                    <?php if (session('Insert')) : ?>
                        <span class="text-danger"><?= session('Insert') ?></span>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Please enter Password">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Please enter Email">
                </div>

                <div class="form-group">
                    <label for="">Contact Number</label>
                    <input type="text" name="contact_no" class="form-control" placeholder="Please enter Contact Number" maxlength="11">
                </div>

                <div class="form-group">
                    <label for="">Address</label>
                    <textarea class="form-control" name="address" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" id="send_form" class="btn btn-success">Submit</button>
                    <a href="<?php echo site_url('Admins'); ?>" type="reset" value="reset" class="btn btn-info">Close</a>
                </div>

            </form>
        </div>

    </div>

</div>
<script>
    if ($("#DesigControl_create").length > 0) {
        $("#DesigControl_create").validate({

            rules: {
                admin_name: {
                    required: true,
                },
                password: {
                    required: true,
                },
                email: {
                    required: true,
                },
                contact_no: {
                    required: true,
                },
                address: {
                    required: true,
                },
            },
            messages: {

                admin_name: {
                    required: "Please enter admin name",
                },
                password: {
                    required: "Please enter password",
                },
                email: {
                    required: "Please enter email",
                },
                contact_no: {
                    required: "Please enter Contact Number",
                },
                address: {
                    required: "Please enter address",
                },
            },
        })
    }
</script>

<?= $this->endSection() ?>