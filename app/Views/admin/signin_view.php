

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


                                    <form action="<?php echo site_url('AdminControl/auth_admin'); ?>" method="post" id="client_login">

                                        <div class="form-group">
                                            <!-- <label for="admin_name">Tracking id</label> -->
                                            <input name="admin_name" value="<?= old('admin_name') ?>" type="text" class="form-control" placeholder="Admin Name">
                                            <!-- <i class="fa fa-envelope"></i> -->

                                            <!-- Error -->
                                            <?php if ($validation->getError('admin_name')) { ?>
                                                <div class='alert alert-danger mt-2'>
                                                    <?= $error = $validation->getError('admin_name'); ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <!-- <label for="password">Tracking Password</label> -->
                                            <input name="password" value="<?= old('password') ?>" type="password" class="form-control" placeholder="Password">
                                            <!-- <i class="fa fa-lock"></i> -->

                                            <!-- Error -->
                                            <?php if ($validation->getError('password')) { ?>
                                                <div class='alert alert-danger mt-2'>
                                                    <?= $error = $validation->getError('password'); ?>
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
                    admin_name: {
                        required: true,
                    },

                    password: {
                        required: true,
                    },
                },
                messages: {

                    admin_name: {
                        required: "tracking id",
                    },
                    password: {
                        required: "tracking password",
                    },
                },
            })
        }
    </script>
<!-- </body>

</html> -->

<?= $this->endSection() ?>