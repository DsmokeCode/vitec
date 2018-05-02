<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>secicon</title>
</head>
<body>
	<?php echo $this->session->userdata('s_nombre'); ?>
	<form action="<?php echo base_url();?>cpersona/actualizar" method="POST">
		<input type="text" name="nombre" placeholder="nombre">
		<input type="text" name="apellido_p" placeholder="apellido_p">
		<input type="text" name="apellido_m" placeholder="apellido_m">
		<input type="submit" value="actualizar">
	</form>
</body>
</html>