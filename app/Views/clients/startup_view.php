<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<style>
    p, a {
        color: #fff;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col col-lg-4">
            <div class="jumbotron" style="background:#0fcdb0 !important">
                <a class="d-flex justify-content-center mt-2" href="<?php echo site_url('Clients'); ?>">Client details</a>
                <a class="d-flex justify-content-center" href="<?php echo site_url('Clients/login'); ?>">Client Login</a><br />
                <a class="d-flex justify-content-center mb-2" href="<?php echo site_url('Admins/login'); ?>">Admin Login</a>
            </div>
        </div>
    </div>
</div>
</div>


<?= $this->endSection() ?>