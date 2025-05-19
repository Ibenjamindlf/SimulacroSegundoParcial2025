<?php
class Formacion {
    // Zona de atributos
    private object $refLocomotora; # Referencia a la clase Locomotora
    private array $colVagones; # Espero una sola coleccion de vagones (Carga y/o Pasajeros)
    private int $cantMaximaVagones;
    // Zona de metodos
    // Metodo constructor (__construct)
    public function __construct($objLocomotora,$coleccionVagones,$cantMaxVagones) {
        $this->refLocomotora = $objLocomotora;
        $this->colVagones = $coleccionVagones;
        $this->cantMaximaVagones = $cantMaxVagones;
    }
    // Metodos de acceso (get's)
    public function getRefLocomotora(){
        return $this->refLocomotora;
    }
    public function getColVagones(){
        return $this->colVagones;
    }
    public function getCantMaximaVagones(){
        return $this->cantMaximaVagones;
    }
    // Metodos de modificacion (set's)
    public function setRefLocomotora($nuevaLocomotora){
        $this->refLocomotora = $nuevaLocomotora;
    }
    public function setColVagones($nuevaColeccion){
        $this->colVagones = $nuevaColeccion;
    }
    public function setCantMaximaVagones($nuevaCantidad){
        $this->cantMaximaVagones = $nuevaCantidad;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $vagones = $this->getColVagones();
        $cantidadVagones = count($vagones);
        $cadenaVagones = "";
        foreach ($vagones as $unVagon) {
            $cadenaVagones .= $unVagon . "\n";
        }

        $cadena = ("\nLocomotora: " . $this->getRefLocomotora(). "\n");
        $cadena .= ("Vagones: (" . $cantidadVagones . ")"  . $cadenaVagones . "\n");
        $cadena .= ("Cantidad Maxima Vagones: " . $this->getCantMaximaVagones());

        return $cadena;
    }
    // Metodo incorporarPasajeroFormacion()
    // recibe la cantidad de pasajeros que se desea incorporar a la formación y 
    // busca dentro de la colección de vagones aquel vagón capaz de incorporar esa cantidad de pasajeros. 
    // Si no hay ningún vagón en la formación que pueda ingresar la cantidad de pasajeros, 
    // el método debe retornar un valor falso y verdadero en caso contrario. 
    // Puede utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros. 
    public function incorporarPasajeroFormacion($cantPasajerosIngresados){
        $seIncorporaron = false;
        $vagones = $this->getColVagones();
        $cantidadVagones = count($vagones); 
        $i=0;
        while(!$seIncorporaron && $i<$cantidadVagones){
            $unVagon = $vagones[$i];
            if (is_a($unVagon, 'VagonPasajero')) {
                    $vagonDisponible = $unVagon->incorporarPasajeroVagon($cantPasajerosIngresados);
                if ($vagonDisponible){
                    $seIncorporaron = true;
                }
            }
        $i++;
        }
        return $seIncorporaron;
    }
    // Metodo incorporarVagonFormacion()
    // recibe por parámetro un objeto vagón y lo incorpora a la formación. 
    // El método retorna verdadero si la incorporación se realizó con éxito y falso en caso contrario.
    // Comprobar si se puede incorporar a la formacion
    public function incorporarVagonFormacion($objVagonIngresado){
        $seIncorpora = false;
        $vagones = $this->getColVagones();
        $cantidadVagones = count($vagones); 
        $cantidadMaximaVagones = $this->getCantMaximaVagones();
        $esValido = $objVagonIngresado->esValido($objVagonIngresado);
        if (($cantidadVagones<$cantidadMaximaVagones) && $esValido){
            array_push($vagones,$objVagonIngresado);
            $this->setColVagones($vagones);
            $seIncorpora = true;
        }
        return $seIncorpora;
    }
    // Metodo promedioPasajeroFormacion()
    // recorre la colección de vagones y retorna un valor que represente el promedio de pasajeros por vagón que se encuentran en la formación. 
    // Puede utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros. 
    public function promedioPasajeroFormacion(){
        $vagones = $this->getColVagones();
        $promedioPasajeros = 0;
        $contVagonesPasajeros = 0;
        $cantPasajerosTotal = 0; 
        foreach ($vagones as $unVagon) {
            if (is_a($unVagon, 'VagonPasajero')){
                // $cantPasajerosTotal = ($cantPasajerosTotal + ($unVagon->getCantPasajerosTransportados()));
                $cantPasajerosTotal += $unVagon->getCantPasajerosTransportados();
                $contVagonesPasajeros++;
            }
        }
        if ($contVagonesPasajeros > 0) {
        $promedioPasajeros = ($cantPasajerosTotal/$contVagonesPasajeros);
    }
        
        return $promedioPasajeros;
    }
    // Metodo pesoFormacion()
    // el cual retorna el peso de la formación completa.
    public function pesoFormacion(){
        $pesoFormacion = 0;
        $locomotora = $this->getRefLocomotora();
        $pesoLocomotora = $locomotora->getInformacionPeso();
        $pesoFormacion = $pesoLocomotora;
        $vagones = $this->getColVagones();
        foreach ($vagones as $unVagon) {
            $pesoUnVagon = $unVagon->calcularPesoVagon();
            $pesoFormacion += $pesoUnVagon;
        }
        return $pesoFormacion;
    }
    // Metodo retornarVagonSinCompletar()
    // el cual retorna el primer vagón de la formación que aún no se encuentra completo
    public function retornarVagonSinCompletar(){
        $vagonSinCompletar = null;
        $vagones = $this->getColVagones();
        $cantVagones = count($vagones);
        $i = 0;
        while($vagonSinCompletar === null && $i<$cantVagones){
            $unVagon = $vagones[$i];
            $estaCompleto = $unVagon->estaCompleto();
            if (!$estaCompleto){
                $vagonSinCompletar = $unVagon;
            }
        $i++;}
        return $vagonSinCompletar;
    }
}
?>