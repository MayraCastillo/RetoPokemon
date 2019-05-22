<!DOCTYPE html>
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
    function __construct($codigo, $nombre, $tipo, $fuerza, $velocidad, $evolucion, $imagen){
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->fuerza = $fuerza;
        $this->velocidad = $velocidad;
        $this->evolucion = $evolucion;
        $this->imagen = $imagen;
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

$pokemones = array();
$pokemones[0] = new Pokemon('0','Gothita', array('Psiquico'), 2, 3, 1, 'img/gothita.png');
$pokemones[1] = new Pokemon('1','Weezing', array('Veneno'), 5, 3, 2, 'img/weezing.png');
$pokemones[2] = new Pokemon('2','Ivysaur', array('Planta','Veneno'), 3, 3, 2, 'img/ivysaur.png');
$pokemones[3] = new Pokemon('3','Charmander', array('Fuego'), 3, 5, 1, 'img/charmander.png');
$pokemones[4] = new Pokemon('4','Poliwhirl', array('Agua'), 3, 5, 2, 'img/poliwhirl.png');
$pokemones[5] = new Pokemon('5','Cranidos', array('Roca'), 6, 3, 1, 'img/cranidos.png');
$pokemones[6] = new Pokemon('6','Squirtle', array('Agua'), 3, 2, 1, 'img/squirtle.png');
$pokemones[7] = new Pokemon('7','Metapod', array('Bicho'), 0, 0, 2, 'img/metapod.png');
$pokemones[8] = new Pokemon('8','Beedrill', array('Bicho','Veneno'), 5, 4, 3, 'img/beedrill.png');
$pokemones[9] = new Pokemon('9','Blastoise', array('Agua'), 4, 4, 3, 'img/blastoise.png');
$pokemones[10] = new Pokemon('10','Arbok', array('Veneno'), 4, 4, 2, 'img/arbok.png');
$pokemones[11] = new Pokemon('11','Pidgeot', array('Normal','Volador'), 4, 5, 3, 'img/pidgeot.png');
$pokemones[12] = new Pokemon('12','Butterfree', array('Bicho','Volador'), 0, 0, 3, 'img/butterfree.png');
$pokemones[13] = new Pokemon('13','Meowth', array('Normal'), 2, 5, 1, 'img/meowth.png');
$pokemones[14] = new Pokemon('14','Jigglypuff', array('Normal','Hada'), 2, 1, 2, 'img/jigglypuff.png');
$pokemones[15] = new Pokemon('15','Vulpix', array('Fuego'), 2, 4, 1, 'img/vulpix.png');

$todos = array();
$error="";


$tipoSeleccionado = $pokemones;
if(isset($_GET["tipoPokemon"])){
    $n = $_GET["tipoPokemon"];
    if($n=="todos")
    {
      $tipoSeleccionado=$pokemones;
    }
    else{
      $tipoSeleccionado=$todos;
      for($x=0;$x<count($pokemones);$x++)
      {
        for($y=0;$y<count($pokemones[$x]->getTipo());$y++)
        {
          if($pokemones[$x]->getTipo()[$y] == $n)
          {
            array_push($tipoSeleccionado, $pokemones[$x]);
          }
        }
      }
      if(count($tipoSeleccionado)<1) 
      {
        $error="No hay almacenados pokemon de ese tipo ";
      }
    }
}

if(isset($_POST["btnBuscar"])){
  $f = (int)$_REQUEST["txtFuerza"];
  if($f>0)
  {
    $tipoSeleccionado=$todos;
      for($x=0;$x<count($pokemones);$x++)
      {
        if($pokemones[$x]->getFuerza() > $f)
        {
          array_push($tipoSeleccionado, $pokemones[$x]);
        }
      }
      if(count($tipoSeleccionado)<1) 
      {
        $error="No hay pokemon con esa fuerza minima.";
      }
  }
  else{
    $Error = "ERROR - La fuerza debe ser mayor a cero";
  }
}
?>

<html lang="es" xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <title>Pokemon</title>
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <script src="js/animaciones.js"></script>
  <audio id="sonido" src="sounds/Ivysaur.mp3"></audio>
</head>

<body onload="showSlides(1)">
  <h1 id="titulo">Visualizador de Pokemon</h1>

  <form class="centrado caja" method="get">
      <p>Seleccione algun tipo de Pokemon para visualizar los correspondientes: 
        <select name="tipoPokemon" onchange="this.form.submit()">
          <option value"0">--SELECCIONE--</option>
          <option value="todos">Todos</option>
          <option value="Normal">Normal (Normal)</option>
          <option value="Fuego">Fuego (Fire)</option>
          <option value="Agua">Agua (Water)</option>   
          <option value="Planta">Planta (Grass)</option>
          <option value="Electrico">Electrico (Electric)</option>
          <option value="Hielo">Hielo (Ice)</option>
          <option value="Lucha">Lucha (Fighting)</option>   
          <option value="Veneno">Veneno (Poison)</option>     
          <option value="Tierra">Tierra (Normal)</option>
          <option value="Fuego">Fuego (Ground)</option>
          <option value="Volador">Volador (Flying)</option>   
          <option value="Psiquico">Psiquico (Psychic)</option>
          <option value="Bicho">Bicho (Bug)</option>
          <option value="Roca">Roca (Rock)</option>   
          <option value="Fantasma">Fantasma (Ghost)</option>     
          <option value="Dragon">Dragon (Dragon)</option>
          <option value="Siniestro">Siniestro (Dark)</option>
          <option value="Acero">Acero (Steel)</option>   
          <option value="Hada">Hada (Fairy)</option>  
        </select>
      </p>
    </form>
    <form class="centrado caja" method="post">
      <p>Digite el minimo de fuerza para visualizar los Pokemon correspondientes: 
        <input name="txtFuerza" type="text"/>
        <button name="btnBuscar">Buscar</button>
      </p>
    </form>

  <div class="container">
    <?php if($tipoSeleccionado != null):?>
    <div class="slideshow-container">
      <?php foreach($tipoSeleccionado as $tipoSeleccion):
      ?>  
      <div class="mySlides fade">
	
        <img class="imagen" src=<?php echo $tipoSeleccion->getImagen(); ?> alt="Imagen del Pokemon." onmouseover="reproducir();"/>
        <div class="text">
          <p id="nombrePokemon"><?php echo $tipoSeleccion->getNombre(); ?></p> 
          <p>Tipo:  
          <?php foreach($tipoSeleccion->getTipo() as $tipo):?>            
          (
          <?php echo $tipo; ?>
          )
          <?php endforeach; ?>
          </p>
          <p>Fuerza:<meter class="barra" min="0" max="10" low="2" high="7" optimum="10" value=<?php echo $tipoSeleccion->getFuerza(); ?>></p>
          <p>Velocidad:<meter class="barra" min="0" max="10" low="3" high="7" optimum="10" value=<?php echo $tipoSeleccion->getVelocidad(); ?>></p>
          <p>Tipo de Evolucion: <?php echo $tipoSeleccion->getEvolucion(); ?></p>
        </div>
      </div>
      <?php if(count($tipoSeleccionado) > 1):?>
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
      <?php endif;?>
      <?php endforeach;?>
    </div>
    <?php else:?>
    <h2 id="Error"><?php echo $error ?></h2>
    <?php endif;?>
    

  </div>
  



</body>

</html>