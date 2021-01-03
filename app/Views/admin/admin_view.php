<?= $this->extend('layouts/layout_admin') ?>

<?= $this->section('content') ?>


<div class="container mt-5">

    <div class="row justify-content-md-center">
        <div class="col col-lg-12">
            <!-- <div class="jumbotron">
                    <p class="display-4 text-center">Designation Details</p>
                </div> -->
            <p class="alert-info p-3">Admin details</p>
            <hr />

            <!-- <?php
                    if (isset($_SESSION['update'])) {
                        echo $_SESSION['update'];
                    }
                    ?> -->

            <?php if (session('msg')) : ?>
                <div class="alert alert-success alert-dismissible text-center">
                    <?= session('msg') ?>
                </div>
            <?php endif ?>

            <!-- <div class="row mt-3"> -->
            <a href="<?php echo site_url('Admins/create') ?>" class="btn btn-success mb-4">Add</a>

            <table class="table table-bordered" id="admin1">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Id</th>
                        <th>admin_name</th>
                        <th>email</th>
                        <th>contact_no</th>
                        <th>address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($admins) : ?>
                        <?php foreach ($admins as $row) : ?>
                            <tr id="<?php echo $row['admin_id']; ?>">
                                <td>
                                    <!-- <a href="<?php //echo site_url('Desigs/edit/' . $row['desg_id']); 
                                                    ?>" class="btn btn-success"><i class="fa fa-edit"></i></a> -->
                                    <a href="<?php echo site_url('Admins/delete/' . $row['admin_id']); ?>" class="btn btn-danger"><i class="fa fa-trash remove"></i></a>
                                </td>
                                <td><?php echo $row['admin_id']; ?></td>
                                <td><?php echo $row['admin_name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['contact_no']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <!-- <?php //$pager = \Config\Services::pager(); ?> -->
                        <?php if ($pager) : ?>
                            <?php $pagi_path =  '/myprojects/Client-Management/Client-13-December-2020-4.0.3-captcha/client/public/index.php/Admins'; ?>
                            <?php $pager->setPath($pagi_path); ?>
                            <?php echo $pager->links() ?>
                            <?php //$pager->setSurroundCount(1) 
                            ?>

<!-- <nav aria-label="Page navigation">
    <ul class="pagination"> -->
    <!-- <?php //if ($pager->hasPrevious()) : ?>
        <li>
            <a href="<?php// $pager->getFirst() ?>" aria-label="<?php // lang('Pager.first') ?>">
                <span aria-hidden="true"><?php// lang('Pager.first') ?></span>
            </a>
        </li>
        <li>
            <a href="<?php// $pager->getPrevious() ?>" aria-label="<?php// lang('Pager.previous') ?>">
                <span aria-hidden="true"><?php// lang('Pager.previous') ?></span>
            </a>
        </li>
    <?php// endif ?> -->

    <!-- <?php// foreach ($pager->links() as $link) : ?>
        <li <?php// $link['active'] ? 'class="active"' : '' ?>>
            <a href="<?php// $link['uri'] ?>">
                <?php// $link['title'] ?>
            </a>
        </li>
    <?php// endforeach ?> -->

    <!-- <?php //if ($pager->hasNext()) : ?>
        <li>
            <a href="<?php// $pager->getNext() ?>" aria-label="<?php// lang('Pager.next') ?>">
                <span aria-hidden="true"><?php// lang('Pager.next') ?></span>
            </a>
        </li>
        <li>
            <a href="<?php// $pager->getLast() ?>" aria-label="<?php// lang('Pager.last') ?>">
                <span aria-hidden="true"><?php// lang('Pager.last') ?></span>
            </a>
        </li>
    <?php //endif ?> -->
    <!-- </ul>
</nav> -->
                            
                        <?php endif ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#admin').DataTable();
    });
</script>

<script>
    $(".remove").click(function() {
        var id = $(this).parents("tr").attr("id");

        if (confirm('Are you sure to remove this record?')) {
            $.ajax({
                url: "<?php echo site_url('Admins') ?>/" + id,
                type: 'DELETE',
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    $("#" + id).remove();
                    alert("Record removed successfully");
                }
            });
        }
    });
</script>

<?= $this->endSection() ?>