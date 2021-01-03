<?= $this->extend('layouts/layout_admin') ?>

<?= $this->section('content') ?>

<div class="container">
    <br>
    <p class="alert-info p-3">Type Add</p>


    <?php if (session('msg')) : ?>
        <div class="alert alert-success alert-dismissible text-center">
            <?= session('msg') ?>
        </div>
    <?php endif ?>

    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo site_url('Types/createOrUpdate'); ?>" name="type_create" id="type_create" method="post" accept-charset="utf-8">

                <div class="form-group">
                    <label for="">Type Name</label>
                    <input type="text" name="typeName" class="form-control" placeholder="Please enter type name">

                    <?php if (session('Insert')) : ?>
                        <span class="text-danger"><?= session('Insert') ?></span>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <button type="submit" id="send_form" class="btn btn-success">Submit</button>
                    <a href="<?php echo site_url('Types'); ?>" type="reset" value="reset" class="btn btn-info">Close</a>
                </div>

            </form>
        </div>

    </div>

</div>
<script>
    if ($("#type_create").length > 0) {
        $("#type_create").validate({

            rules: {
                typeName: {
                    required: true,
                },
                
            },
            messages: {
                typeName: {
                    required: "Please enter Type name",
                },
                
            },
        })
    }
</script>

<?= $this->endSection() ?>