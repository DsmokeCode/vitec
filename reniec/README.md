# CONSULTA [RENIEC]
Obten los Nombres y apellidos de una Persona a partir de su Nro de DNI o CUI de cuidados Peruanos. puedes ver una demo [aqui].
### Metodo de Uso
```sh
<?php
    require ("curl.php");
    require ("reniec.php");

    $persona = new Reniec();
	$dni="00000000";
    print_r( $persona->search($dni) );
?>
```
como resultado obtenemos el array
```sh
Array
(
    [success] => 1
    [result] => Array
        (
            [Paterno] => Ap_Paterno
            [Materno] => Ap_Materno
            [Nombre] => Nombres
            [DNI] => 00000000
            [CodVerificacion] => 0
        )

)
```
en caso de error
```sh
Array
(
    [success] =>
    [msg] => Nro de DNI no valido.
)
```
[RENIEC]: <https://cel.reniec.gob.pe/valreg/valreg.do>
[aqui]: <https://geekdev.ml/demos>
