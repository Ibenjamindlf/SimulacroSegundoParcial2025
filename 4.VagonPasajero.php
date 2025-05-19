<?php
class VagonPasajero extends Vagon{
    // Zona de atributos
    private int $cantMaxPasajerosSoportado;
    private int $cantPasajerosTransportados;
    private float $pesoPromedioPasajeros; 
    // Zona de metodos
    // Metodo constructr (__construct)
    public function __construct($anioInstalacionVagon,$largoVagon,$anchoVagon,$maximoPesoVacio,$cantMaxPasajerosSoportadoVagonPasajero,$cantPasajerosTransportadosVagonPasajero) {
        parent::__construct($anioInstalacionVagon,$largoVagon,$anchoVagon,$maximoPesoVacio);
        $this->cantMaxPasajerosSoportado = $cantMaxPasajerosSoportadoVagonPasajero;
        $this->cantPasajerosTransportados = $cantPasajerosTransportadosVagonPasajero;
        $this->pesoPromedioPasajeros = 50; # El peso promedio de los pasajeros es de 50 kg
    }
    // Metodos de acceso (get's)
    public function getCantMaxPasajerosSoportado(){
        return $this->cantMaxPasajerosSoportado;
    }
    public function getCantPasajerosTransportados(){
        return $this->cantPasajerosTransportados;
    }
    public function getPesoPromedioPasajeros(){
        return $this->pesoPromedioPasajeros;
    }
    // Metodos de modificacion (set's)
    public function setCantMaxPasajerosSoportado($nuevaCantidadMax){
        $this->cantMaxPasajerosSoportado = $nuevaCantidadMax;
    }
    public function setCantPasajerosTransportados($nuevaCantidadPasajeros){
        $this->cantPasajerosTransportados = $nuevaCantidadPasajeros;
    }
    public function setPesoPromedioPasajeros($nuevoPesoPromedio){
        $this->pesoPromedioPasajeros = $nuevoPesoPromedio;
    }
    // Metodos de caracteres (__tostring)
    public function __toString()
    {
        $cadena = ("\n" . parent::__toString() . "\n");
        $cadena .= ("Cantidad maxima de pasajeros soportada: " . $this->getCantMaxPasajerosSoportado() . "\n");
        $cadena .= ("Cantidad de pasajeros transportados: " . $this->getCantPasajerosTransportados() . "\n");
        $cadena .= ("Peso promedio pasajeros: " . $this->getPesoPromedioPasajeros() . "\n" );
        // Siempre que quiera ver el objeto se va a calcular el peso con el metodo calcularPesoVagon()
        $cadena .= ("Peso actual del vagon: " . $this->calcularPesoVagon());
        return $cadena;
    }
    // Metodo calcularPesoVagon() redefinido 
    public function calcularPesoVagon(){

        $pesoVagonVacio = parent::getPesoMaximoVagonVacio();
        $pasajerosTransportados = $this->getCantPasajerosTransportados();
        $pesoPromedioPasajeros = $this->getPesoPromedioPasajeros();

        $pesoPasajeros = ($pasajerosTransportados*$pesoPromedioPasajeros);
        $pesoVagon = ($pesoVagonVacio+$pesoPasajeros);

        return $pesoVagon;
    }
    // Metodo incorporarPasajeroVagon($cantPasajerosIngresados) 
    public function incorporarPasajeroVagon($cantPasajerosIngresados){
        $seIncorporo = false;
        
        $cantPasajerosActual = $this->getCantPasajerosTransportados();
        $cantMaxPasajeros = $this->getCantMaxPasajerosSoportado();

        if (($cantPasajerosIngresados+$cantPasajerosActual)<=$cantMaxPasajeros){
            $cantActualizadaPasajeros = ($cantPasajerosActual+$cantPasajerosIngresados);
            $this->setCantPasajerosTransportados($cantActualizadaPasajeros);
            $seIncorporo = true;
        }

        return $seIncorporo;
    }
    // Metodo estaCompleto() redefinido
    // Verifica si el vagon esta completo o no
    public function estaCompleto(){
        $estaCompleto = false;
        $cantidadMaximaPasajeros = $this->getCantMaxPasajerosSoportado();
        $cantidadActualesPasajeros = $this->getCantPasajerosTransportados();
        $diferenciaDePasajeros = ($cantidadMaximaPasajeros-$cantidadActualesPasajeros);
        if ($diferenciaDePasajeros == 0){
            $estaCompleto = true;
        }
        return $estaCompleto;
    }
    // Metodo esValido() redefinido
    // Metodo que recibe por parametros un objVagon
    // Comprueba si es una vagon valido para sumar a la formacion
    // Retorna true en caso que el objVagon sea valido para sumar a la formacion o false en caso contrario
    public function esValido($objVagonIngresado){
        $esValido = false;
        $cantPasajerosActuales = $objVagonIngresado->getCantPasajerosTransportados();
        $cantPasajerosMax = $objVagonIngresado->getCantMaxPasajerosSoportado();
        if ($cantPasajerosActuales<=$cantPasajerosMax){
            $esValido = true;
        }
        return $esValido;
    }
}
?>