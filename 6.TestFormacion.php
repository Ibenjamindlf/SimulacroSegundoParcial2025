<?php
include_once '1.Formacion.php';
include_once '2.Locomotora.php';
include_once '3.Vagon.php';
include_once '4.VagonPasajero.php';
include_once '5.VagonCarga.php';

// 1. Se crea un objeto locomotora con un peso de 188 toneladas y una velocidad de 140 km/h.
$locomotora = new Locomotora(188000,140);
// 2. Se crea 3 objetos con la  información visualizada en la tabla 
$vagon1 = new Vagon(1981,15,3,15000);
$vagonCarga = new Vagon(1980,15,3,15000);
$vagon = new Vagon(1980,15,3,15000);
// 3. Se crea un objeto formación que tiene la locomotora y los vagones creados en (1) y (2) usando el método incorporarVagonFormacion.
$formacion = new Formacion($locomotora,[],10);
$formacion->incorporarVagonFormacion($vagon1);
$formacion->incorporarVagonFormacion($vagonCarga);
$formacion->incorporarVagonFormacion($vagon);
// 4. Invocar al método  incorporarPasajeroFormacion con el parámetros cantidad de pasajero = 6 y visualizar el resultado.
$formacion->incorporarPasajeroFormacion(6);
// 5. Realizar un print de los 3 objetos vagones creados.
print_r($vagon1);
print_r($vagonCarga);
print_r($vagon);
// 6. Invocar al método incorporarPasajeroFormacion con el parámetros cantidad de pasajero = 14 y visualizar el resultado.
$formacion->incorporarPasajeroFormacion(14);
// 7. Realizar un print del objeto locomotora
print_r($locomotora);
// 8. Invocar al método promedioPasajeroFormacion y visualizar el resultado obtenido.
$var = $formacion->promedioPasajeroFormacion();
echo $var;
// 9. Invocar al método  pesoFormacion y visualizar el resultado obtenido.
$var1 = $formacion->pesoFormacion();
echo $var1;
// 10. Realizar un print de los 3 objetos vagones creados.
print_r($vagon1);
print_r($vagonCarga);
print_r($vagon);
?>