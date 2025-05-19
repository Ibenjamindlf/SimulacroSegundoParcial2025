<?php
class Vagon{
    // Zona de atributos
    private int $anioInstalacion;
    private float $largo;
    private float $ancho;
    private float $pesoMaximoVagonVacio;
    // Zona de metodos
    // Metodo constructor (__construct)
    public function __construct($anioInstalacionVagon,$largoVagon,$anchoVagon,$maximoPesoVacio) {
        $this->anioInstalacion = $anioInstalacionVagon;
        $this->largo = $largoVagon;
        $this->ancho = $anchoVagon;
        $this->pesoMaximoVagonVacio = $maximoPesoVacio;
    }
    // Metodos de acceso (get's)
    public function getAnioInstalacion(){
        return $this->anioInstalacion;
    }
    public function getLargo(){
        return $this->largo;
    }
    public function getAncho(){
        return $this->ancho;
    }
    public function getPesoMaximoVagonVacio(){
        return $this->pesoMaximoVagonVacio;
    }
    // Metodos de modificacion (set's)
    public function setAnioInstalacion($nuevoAnio){
        $this->anioInstalacion = $nuevoAnio;
    }
    public function setLargo($nuevoLargo){
        $this->largo = $nuevoLargo;
    }
    public function setAncho($nuevoAncho){
        $this->ancho = $nuevoAncho;
    }
    public function setPesoMaximoVagonVacio($nuevoPeso){
        $this->pesoMaximoVagonVacio = $nuevoPeso;
    }
    // Metodo de caracteres (__tostring)
    public function __toString()
    {
        $cadena = ("\nAño Instalacion: " . $this->getAnioInstalacion() . "\n");
        $cadena .= ("Largo: " . $this->getLargo() . "\n");
        $cadena .= ("Ancho: ". $this->getAncho() . "\n");
        $cadena .= ("Peso Maximo Vagon Vacio: " . $this->getPesoMaximoVagonVacio() );
        return $cadena;
    }

    # En este enunciado los metodos a continuacion no son tan utiles debido a su simplicidad.
    # Estan pensandos para que el funcionamiento de la formacion sea el correcto.
    # En la formacion se pueden agregar Vagones de carga, Vagones de pasajeros y Vagones.
    
    // Metodo calcularPesoVagon()
    public function calcularPesoVagon(){
        $pesoVagonVacio = $this->getPesoMaximoVagonVacio();
        return $pesoVagonVacio;
    }
    // Metodo estaCompleto()
    public function estaCompleto(){
        $estaCompleto = true;
        return $estaCompleto;
    }
    // Metodo esValido()
    public function esValido($objVagonIngresado){
        $esValido = false;
        if ($objVagonIngresado != null) {
            $esValido = true;
        }
        return $esValido;
    }
}
?>