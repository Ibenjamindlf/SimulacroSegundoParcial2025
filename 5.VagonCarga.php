<?php
class VagonCarga extends Vagon{
    // Zona de atributos
    private float $pesoMaximoSoportable;
    private float $pesoCargaTransportada;
    private float $indiceCarga;
    // private float $pesoVagonActual;
    // Zona de metodos
    // Metodo constructr (__construct)
    public function __construct($anioInstalacionVagon,$largoVagon,$anchoVagon,$maximoPesoVacio,$pesoMaximoSoportableVagonCarga,$pesoCargaTransportadaVagonCarga) {
        parent::__construct($anioInstalacionVagon,$largoVagon,$anchoVagon,$maximoPesoVacio);
        $this->pesoMaximoSoportable = $pesoMaximoSoportableVagonCarga;
        $this->pesoCargaTransportada = $pesoCargaTransportadaVagonCarga;
        $this->indiceCarga = 0.2;
        // $this->pesoVagonActual = ($maximoPesoVacio+$pesoCargaTransportadaVagonCarga);
    }
    // Metodos de acceso (get's)
    public function getPesoMaximoSoportable(){
        return $this->pesoMaximoSoportable;
    }
    public function getPesoCargaTransportada(){
        return $this->pesoCargaTransportada;
    }
    public function getIndiceCarga(){
        return $this->indiceCarga;
    }
    // public function getPesoVagonActual(){
    //     return $this->pesoVagonActual;
    // }
    // Metodos de modificacion (set's)
    public function setPesoMaximoSoportable($nuevoPesoMax){
        $this->pesoMaximoSoportable = $nuevoPesoMax;
    }
    public function setPesoCargaTransportada($nuevaCargaTrans){
        $this->pesoCargaTransportada = $nuevaCargaTrans;
    }
    public function setIndiceCarga($nuevoIndice){
        $this->indiceCarga = $nuevoIndice;
    }
    // public function setPesoVagonActual($nuevoPeso){
    //     $this->pesoVagonActual = $nuevoPeso;
    // }
    // Metodos de caracteres (__tostring)
    public function __toString()
    {
        $cadena = ("\n" . parent::__toString() . "\n");
        $cadena .= ("Peso maximo soportable: " . $this->getPesoMaximoSoportable() . "\n");
        $cadena .= ("Peso carga transportada: ". $this->getPesoCargaTransportada() . "\n");
        $cadena .= ("Indice de carga: " . $this->getIndiceCarga(). "\n");
        // Siempre que quiera ver el objeto se va a calcular el peso con el metodo calcularPesoVagon()
        $cadena .= ("Peso actual del vagon: " . $this->calcularPesoVagon());
        return $cadena;
    }
    // Metodo calcularPesoVagon() redefinido
    public function calcularPesoVagon(){

        $pesoVagonVacio = parent::getPesoMaximoVagonVacio();
        $cantCargaTransportada = $this->getPesoCargaTransportada();
        $indiceDeCarga = $this->getIndiceCarga();

        $pesoCargaActual = ($cantCargaTransportada + ($cantCargaTransportada * $indiceDeCarga));
        $pesoVagon = ($pesoVagonVacio+$pesoCargaActual);

        return $pesoVagon;
    } 

    // Metodo incorporarCargaVagon($cantCargaIngresada)
    public function incorporarCargaVagon($cargaIngresada){
        $seIncorporo = false;
        
        $pesoActual = $this->calcularPesoVagon();
        $pesoMaximo = $this->getPesoMaximoSoportable();
        $cargaActual = $this->getPesoCargaTransportada();
        $indiceDeCarga = $this->getIndiceCarga();
        $pesoIngresado = ($cargaIngresada + ($cargaIngresada * $indiceDeCarga));

        if (($pesoActual+$pesoIngresado) <= $pesoMaximo){
            $nuevaCarga = ($cargaActual+$cargaIngresada);
            $this->setPesoCargaTransportada($nuevaCarga);
            $seIncorporo = true;
        }

        return $seIncorporo;
    }
    // Metodo estaCompleto() redefinido
    // Verifica si el vagon esta completo o no
    public function estaCompleto(){
        $estaCompleto = false;
        $pesoMax = $this->getPesoMaximoSoportable();
        $pesoActual = $this->calcularPesoVagon();
        $diferenciaDePesos = ($pesoMax-$pesoActual);
        if ($diferenciaDePesos == 0){
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
        $pesoActual = $objVagonIngresado->calcularPesoVagon();
        $pesoMaxSoportado = $objVagonIngresado->getPesoMaximoSoportable();
        if ($pesoActual<=$pesoMaxSoportado){
            $esValido = true;
        }
        return $esValido;
    }
}
?>