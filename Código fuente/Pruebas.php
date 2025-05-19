<?php
include_once '1.Formacion.php';
include_once '2.Locomotora.php';
include_once '3.Vagon.php';
include_once '4.VagonPasajero.php';
include_once '5.VagonCarga.php';

/*----Vagon----*/
$vagon = new Vagon(2018,200,300,1000);
/*----Vagon Pasajeros----*/
// $vagonPasajero = new VagonPasajero(2022,300,400,1000,15,6);
// echo $vagonPasajero;
// $vagonPasajero->incorporarPasajeroVagon(10);
// echo $vagonPasajero;

/*----Vagon Carga----*/
// $vagonCarga = new VagonCarga(2022,300,500,9000,30000,10000);
// echo $vagonCarga;
// $var = $vagonCarga->incorporarCargaVagon(8500);
// echo $vagonCarga;

/*----Formacion----*/
$locomotora = new Locomotora(4000,50);

$vagonPasajero = new VagonPasajero(2021,300,400,1000,15,15);
$vagonPasajero2 = new VagonPasajero(2022,300,400,1000,15,15);
$vagonPasajero3 = new VagonPasajero(2023,300,400,1000,15,14);

$vagonCarga = new VagonCarga(2021,300,500,9000,30000,17500);
$vagonCarga2 = new VagonCarga(2022,300,500,9000,30000,17500);
$vagonCarga3 = new VagonCarga(2023,300,500,9000,30000,17500);
$vagonCarga4 = new VagonCarga(2024,300,500,9000,30000,17500);

// $formacion = new Formacion($locomotora,[$vagonCarga,$vagonCarga2,$vagonPasajero,$vagonCarga3,$vagonPasajero2,$vagonCarga4,$vagonPasajero3],7);
$formacion = new Formacion($locomotora,[$vagonCarga,$vagonPasajero],7);
echo $formacion;
// $bandera = $formacion->incorporarPasajeroFormacion(14);
// echo $formacion;
// $vagonIncompleto = $formacion->retornarVagonSinCompletar();
// echo $vagonIncompleto;
$vagonPasajeroInvalido = new VagonPasajero(2021,300,400,1000,15,16);
$vagonCargaInvalido = new VagonCarga(2024,300,500,9000,30000,20000);

$vagonCarga3 = new VagonCarga(2023,300,500,9000,30000,17500);
$vagonPasajero3 = new VagonPasajero(2023,300,400,1000,15,14);

$formacion->incorporarVagonFormacion($vagonCarga3);
echo ("------------------".$formacion);


?>