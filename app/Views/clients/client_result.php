<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<style>
    p,
    a {
        color: #fff;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col col-lg-4">
            <div class="jumbotron" style="background:#0fcdb0 !important">

                <?php if (count($trackData) > 0) : ?>
                    <?php foreach ($trackData as $row) : ?>
                        <p class="text-center">Number status : <span style="color:blue"> <?php echo esc($row['status']); ?></p>
                        <?php if($row['sip_no']): ?>
                        <p class="text-center">SIP Number : <span style="color:blue"><?php echo esc($row['sip_no']); ?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?> <br />
                <a class="d-flex justify-content-center mt-2" href="<?php echo site_url('Clients/profile'); ?>">View Profile</a>
                <a class="d-flex justify-content-center mb-2" href="<?php echo site_url('Clients/edit'); ?>">File Upload</a><br />
                <a class="d-flex justify-content-center" href="<?php echo site_url('Clients/signout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
</div>


<?= $this->endSection() ?>