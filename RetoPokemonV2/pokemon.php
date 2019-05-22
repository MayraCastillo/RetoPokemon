<?php
class Pokemon
{
    public $codigo = 0;
    public $nombre = null;
    public $tipo = null;
    public $fuerza = null;
    public $velocidad = null;
    public $evolucion = null;
    public $imagen = null;

    /*------------Constructor por parametros------------*/
    function __construct(int $codigo, string $nombre, string $tipo, int $fuerza, int $velocidad, int $evolucion, string $imagen){
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->fuerza = $fuerza;
        $this->velocidad = $velocidad;
        $this->evolucion = $evolucion;
        $this->imagen = $imagen;
    }

    public static function createFromArray($arr)
    {
        $pokemon = new Pokemon( $arr["codigo"],$arr["nombre"],$arr["tipo"],$arr["fuerza"],$arr["velocidad"],$arr["evolucion"],$arr["imagen"] );
        return $pokemon;
    }

    /*------------Set y get del codigo------------*/
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
        return $this;
    }

    /*------------Set y get del nombre------------*/
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /*------------Set y get del tipo------------*/
    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /*------------Set y get de la fuerza------------*/
    public function getFuerza()
    {
        return $this->fuerza;
    }

    public function setFuerza($fuerza)
    {
        $this->fuerza = $fuerza;
        return $this;
    }

    /*------------Set y get de la velocidad------------*/
    public function getVelocidad()
    {
        return $this->velocidad;
    }

    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
        return $this;
    }

    /*------------Set y get de la evolucion------------*/
    public function getEvolucion()
    {
        return $this->evolucion;
    }

    public function setEvolucion($evolucion)
    {
        $this->evolucion = $evolucion;
        return $this;
    }

    /*------------Set y get de la imagen------------*/
    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
        return $this;
    }
}
?>