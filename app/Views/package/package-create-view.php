<?= $this->extend('layouts/layout_admin') ?>

<?= $this->section('content') ?>

<div class="container">
    <br>
    <p class="alert-info p-3">Package Add</p>


    <?php if (session('msg')) : ?>
        <div class="alert alert-success alert-dismissible text-center">
            <?= session('msg') ?>
        </div>
    <?php endif ?>

    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo site_url('Package/createOrUpdate'); ?>" name="Package_create" id="Package_create" method="post" accept-charset="utf-8">

                <div class="form-group">
                    <label for="">Package Name</label>
                    <input type="text" name="package" class="form-control" placeholder="Please enter Package name">

                    <?php if (session('Insert')) : ?>
                        <span class="text-danger"><?= session('Insert') ?></span>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <button type="submit" id="send_form" class="btn btn-success">Submit</button>
                    <a href="<?php echo site_url('Package'); ?>" type="reset" value="reset" class="btn btn-info">Close</a>
                </div>

            </form>
        </div>

    </div>

</div>
<script>
    if ($("#Package_create").length > 0) {
        $("#Package_create").validate({

            rules: {
                package: {
                    required: true,
                },
                
            },
            messages: {
                package: {
                    required: "Please enter package name",
                },
                
            },
        })
    }
</script>

<?= $this->endSection() ?>