<?= $this->extend('layouts/layout_admin') ?>

<?= $this->section('content') ?>

<style type="text/css">
    #blah {
        width: 150px;
        height: auto;
        border: 2px solid;
        display: block;
        margin: 10px;
        background-color: white;
        border-radius: 5px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
        overflow: hidden;
    }
</style>

<div class="container
     mt-4">

    <div class="row justify-content-md-center">
        <div class="col col-lg-12">



            <p class="alert-success p-3">Subscriber Anonymous >>
                <?php if ($documents) : ?>
                    <?php $i = 1; ?>
                    <?php foreach ($documents as $row) : ?>
                        <?php echo $row['user_name']; ?>
            </p>
            <hr />

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <h4 class="alert-info p-3">Document list</h4>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Title</th>
                        <th>Attachment</th>
                    </tr>
                </thead>
                <tbody>


                    <tr></tr>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <th><?php echo $row['photo_identity']; ?></th>
                        <td>
                            <a href="#"><?php echo $row['identity_scan']; ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <th>Photo</th>
                        <td>
                            <a href="#"><?php echo $row['auth_person_photo']; ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <th>Trade license</th>
                        <td>
                            <a href="#"><?php echo $row['trade_license']; ?></a>
                        </td>
                    </tr>

                </tbody>
            </table>

            <?php
                        function endsWith($filename, $ext)
                        {
                            $extLength = strlen($ext);
                            if ($extLength) {
                                return substr($filename, $extLength) === $ext;
                            }
                            return true;
                        }
            ?>

            <div class="col">
                <div class="form-group">
                    <label for=""></label>

                </div>
                <div class="form-group">
                    <label for="" class="text-info"><?= $row['identity_scan'] ?></label>
                    
                        <?php if (endsWith($row['identity_scan'], ".jpg")) : ?>
                            <img src="<?= base_url() ?>/public/uploads/<?= $row['identity_scan'] ?>" width="150px" height="auto" id="blah" alt="identity_scan">
                        <?php else : ?>
                            <?php if ($row['identity_scan']) : ?>
                            <embed src="<?= base_url() ?>/public/uploads/<?= $row['identity_scan'] ?>" type="application/pdf" width="100%" height="600px" />
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="" class="text-info"><?= $row['auth_person_photo'] ?></label>
                    <?php if ($row['auth_person_photo']) : ?>
                        <?php if (endsWith($row['auth_person_photo'], ".jpg")) : ?>
                            <img src="<?= base_url() ?>/public/uploads/<?= $row['auth_person_photo'] ?>" width="150px" height="auto" id="blah" alt="auth_person_photo">
                        <?php else : ?>
                            <embed src="<?= base_url() ?>/public/uploads/<?= $row['auth_person_photo'] ?>" type="application/pdf" width="100%" height="600px" />
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="" class="text-info"><?= $row['trade_license'] ?></label>
                    <?php if ($row['trade_license']) : ?>
                        <?php if (endsWith($row['trade_license'], ".jpg")) : ?>
                            <img src="<?= base_url() ?>/public/uploads/<?= $row['trade_license'] ?>" width="150px" height="auto" id="blah" alt="trade_license">
                        <?php else : ?>
                            <embed src="<?= base_url() ?>/public/uploads/<?= $row['trade_license'] ?>" type="application/pdf" width="100%" height="600px" />
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <a href="<?php echo site_url('Approves/list'); ?>" class="btn btn-info mt-2">Close</a>

        </div>
    </div>
</div>


<script>

</script>





<?= $this->endSection() ?>