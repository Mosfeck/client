<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<div class="container mt-5">

    <div class="row justify-content-md-center">
        <div class="col col-lg-6">
            <div class="jumbotron" style="background:#0fcdb0 !important">
                <p class="display-5 text-center">
                    <?php if (count($clients) > 0) : ?>
                        <?php foreach ($clients as $row) : ?>
                            Dear client,
                            Thank you for your interest in our IP Telephony Number.
                            Your Tracking ID is <?php echo $row['tracking_id'];  ?> <br />
                            and your tracking password is <?php echo $row['tracking_password']; ?>
                            <br />To track your number request status please
                            <a style="color: #fff" href="<?php echo site_url('Clients/login'); ?>" target="_blank">Click Here</a>
                            Please Store This Tracking ID to Check Your Request Status.</p>
            <?php endforeach; ?>
        <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>




<?= $this->endSection() ?>