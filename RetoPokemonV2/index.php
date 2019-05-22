<!DOCTYPE html>

<html lang="es" xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <title>Pokemon</title>
  <script
  src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>  
  <link rel="stylesheet" type="text/css" href="estilos.css">
  <script src="PokemonsAJAX.js"></script>
</head>

<body onload="loadDoc(0)">
  <div class="contenedor">
    <div id="pokedex"><img src="img/pokedex1.png" alt="Imagen del pokedex." id="pokedexImg">
	<div id="pokedexBtn"><a onclick="abrir()"><img src="img/pokeBtn.png" alt="Imagen del boton del pokedex." id="pokeImgBtn"></a></div>
	<div id="pokedexAbrir"><img id="pokedexGif" src="img/pokedexAbrir.gif"/></div>

	<div id="contenido">
 	<div class="filtros">
	  <div class="btnFiltro" id="btnTienda"><a onclick="tienda()">Tienda</a></div>
	  <div class="btnFiltro" id="btnMisPokemon"><a onclick="miCarrito()">Carrito</a></div>
	</div>

      <div class="visualizador">
	<a class="prev" onclick="pokePrev()">&#10094;</a>
	<div class="centro fade" id="centro">
	   <p id="pokeNombre">Nombre: </p>
	   <img id="pokeImagen" class="imagen" src="" alt="Imagen del Pokemon."/>
	   <p id="pokeTipo">Tipo: </p>
	   <p id="pokeFuerza">Fuerza: </p>
	   <p id="pokeVelocidad">Velocidad: </p>
	   <p id="pokeEvolucion">Tipo de Evolucion: </p>
	   <p id="pokeCodigo"></p>
	   <p><button name="botonAgregar" id= "btn" onclick="agregarPokCarro();">Agregar Al Carrito</button> </p>
	</div>
	<a class="next" onclick="pokeNext()">&#10095;</a>
      </div>

    </div>
  </div>
</body>

</html>