<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Attendance in CodeIgniter 4</title>

	<!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
	<link href="<?php echo base_url('public/assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('public/assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('public/assets/css/main.css') ?>" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" type="text/css" />


	<script src="<?php echo base_url('public/assets/js/jquery.min.js') ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/assets/js/jquery.dataTables.min.js') ?>" type="text/javascript"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js" type="text/javascript"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="https://kit.fontawesome.com/f39b74c5da.js" crossorigin="anonymous"></script>

	
</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?= $this->renderSection('content') ?>
			</div>
		</div>
	</div>

</body>

</html>