<?php
class Locomotora{
    // Zona de atributos
    private float $informacionPeso;
    private float $velocidadMaxima;
    // Zona de metodos
    // Metodo constructor (__construct)
    public function __construct($pesoInformacion,$MaximaVelocidad) {
        $this->informacionPeso = $pesoInformacion;
        $this->velocidadMaxima = $MaximaVelocidad;
    }
    // Metodos de acceso (get's)
    public function getInformacionPeso(){
        return $this->informacionPeso;
    }
    public function getVelocidadMaxima(){
        return $this->velocidadMaxima;
    }
    // Metodos de modificacion (set's)
    public function setInformacionPeso($nuevaInfo){
        $this->informacionPeso = $nuevaInfo;
    }
    public function setVelocidadMaxima($nuevaVelocidad){
        $this->velocidadMaxima = $nuevaVelocidad;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $cadena = ("\nPeso: " . $this->getInformacionPeso() . "\n");
        $cadena .= ("Velocidad Maxima: " . $this->getVelocidadMaxima());
        return $cadena;
    }
}
?>