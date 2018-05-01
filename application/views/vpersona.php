<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>form</h1>
	<form action="<?php echo base_url();?>cpersona/guardar" method="POST">
		<label for="dni">dni</label>
		<input type="text" name="dni">
		</br>
		<label for="nombre">nombre</label>
		<input type="text" name="nombre">
		</br>
		<label for="apellido_p">apellido_p</label>
		<input type="text" name="apellido_p">
		</br>
		<label for="apellido_m">apellido_m</label>
		<input type="text" name="apellido_m">
		</br>
		<label for="direccion">direccion</label>
		<input type="text" name="direccion">
		</br>
		<label for="fecha_ingreso">fecha_ingreso</label>
		<input type="date" name="fecha_ingreso">
		</br>
		<label for="celular">celular</label>
		<input type="text" name="celular">
		</br>
		<label for="telefono">telefono</label>
		<input type="text" name="telefono">
		</br>
		<label for="correo">correo</label>
		<input type="email" name="correo">
		</br>
		<label for="cod_perfil">cod_perfil</label>
		<input type="text" name="cod_perfil">
		</br>
		<label for="usuario">usuario</label>
		<input type="text" name="usuario">
		</br>
		<label for="pass">pass</label>
		<input type="password" name="pass">
		</br>
		<label for="estado_persona">estado_persona</label>
		<input type="text" name="estado_persona">
		</br>
		<input type="submit" value="guardar">
	</form>
</body>
</html>
