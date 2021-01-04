

<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

    <div class="container mt-5">
        <br>



        <div class="login">
            
            <div class="login-bottom">

                
                <?php $validation =  \Config\Services::validation(); ?>
                <div class="row justify-content-md-center">
                    
                    <div class="col-md-6">
                        <div class="card-deck">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION['msg'])) {
                                        echo $_SESSION['msg'];
                                    }
                                    ?>


                                    <form action="<?php echo site_url('ClientControl/auth_client'); ?>" method="post" id="client_login">

                                        <div class="form-group">
                                            <!-- <label for="tracking_id">Tracking id</label> -->
                                            <input name="tracking_id" value="<?= old('tracking_id') ?>" type="text" class="form-control" placeholder="Tracking ID">
                                            <!-- <i class="fa fa-envelope"></i> -->

                                            <!-- Error -->
                                            <?php if ($validation->getError('tracking_id')) { ?>
                                                <div class='alert alert-danger mt-2'>
                                                    <?= $error = $validation->getError('tracking_id'); ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <!-- <label for="tracking_password">Tracking Password</label> -->
                                            <input name="tracking_password" value="<?= old('tracking_password') ?>" type="password" class="form-control" placeholder="Secret">
                                            <!-- <i class="fa fa-lock"></i> -->

                                            <!-- Error -->
                                            <?php if ($validation->getError('tracking_password')) { ?>
                                                <div class='alert alert-danger mt-2'>
                                                    <?= $error = $validation->getError('tracking_password'); ?>
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" value="Login" class="btn btn-primary">
                                        </div>

                                        <div class="clearfix"> </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
    <script>
        if ($("#client_login").length > 0) {
            $("#client_login").validate({

                rules: {
                    tracking_id: {
                        required: true,
                    },

                    tracking_password: {
                        required: true,
                    },
                },
                messages: {

                    tracking_id: {
                        required: "Please enter tracking id",
                    },
                    tracking_password: {
                        required: "Please enter tracking password",
                    },
                },
            })
        }
    </script>
<!-- </body>

</html> -->

<?= $this->endSection() ?>