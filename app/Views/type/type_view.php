<?= $this->extend('layouts/layout_admin') ?>

<?= $this->section('content') ?>


<div class="container mt-5">

    <div class="row justify-content-md-center">
        <div class="col col-lg-12">
            <!-- <div class="jumbotron">
                    <p class="display-4 text-center">Designation Details</p>
                </div> -->
            <p class="alert-info p-3">Type details</p>
            <hr />

            

            <?php if (session('msg')) : ?>
                <div class="alert alert-success alert-dismissible text-center">
                    <?= session('msg') ?>
                </div>
            <?php endif ?>

            <!-- <div class="row mt-3"> -->
            <a href="<?php echo site_url('Types/create') ?>" class="btn btn-success mb-4">Add</a>
            
            <table class="table table-bordered" id="type">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Id</th>
                        <th>Type Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($types) : ?>
                        <?php foreach ($types as $row) : ?>
                            <tr id="<?php echo $row['id']; ?>">
                                <td>
                                    <!-- <a href="<?php //echo site_url('Desigs/edit/' . $row['desg_id']); 
                                                    ?>" class="btn btn-success"><i class="fa fa-edit"></i></a> -->
                                    <a href="<?php echo site_url('Types/delete/' . $row['id']); ?>" class="btn btn-danger"><i class="fa fa-trash remove"></i></a>
                                </td>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['typeName']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#type').DataTable();
    });
</script>

<script>
    $(".remove").click(function() {
        var id = $(this).parents("tr").attr("id");

        if (confirm('Are you sure to remove this record?')) {
            $.ajax({
                url: "<?php echo site_url('Types') ?>/" + id,
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