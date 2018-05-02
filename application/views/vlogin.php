<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Login</h1>
	<form action="<?php echo base_url();?>clogin/ingresar" method="POST">
		<label for="usuario">usuario</label>
		<input type="text" name="usuario">
		</br>
		<label for="pass">pass</label>
		<input type="password" name="pass">
		</br>
		<input type="submit" value="iniciar">
	</form>
	<?php echo $mensaje; ?>
</body>
</html>
