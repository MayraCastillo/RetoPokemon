var condicion = "";
var codigosPokemon = new Array();
var indice = 0;


async function stall(stallTime = 2000) {
  await new Promise(resolve => setTimeout(resolve, stallTime));
}

function pokePrev() {
  var v = 0;
  if (condicion == "carrito"){
  	indice = indice - 1;
	if(indice<0){indice = codigosPokemon.length - 1;}
        v = codigosPokemon[indice];
  }else{
     var i = parseInt(document.getElementById("pokeCodigo").innerHTML);
     v = i - 1;
     if(v<0){v=15;}
     document.getElementById("pokeCodigo").innerHTML = v;
  }
  loadDoc(v);
}

function pokeNext() {
  var v = 0;
  if (condicion == "carrito"){
  	indice = indice + 1;
	if(indice>=codigosPokemon.length){indice = 0;}
	v = codigosPokemon[indice];
  }else{
     var i = parseInt(document.getElementById("pokeCodigo").innerHTML);
     v = i + 1;
     if(v>15){v=0;}
     document.getElementById("pokeCodigo").innerHTML = v;
  }
  loadDoc(v);
}

async function loadDoc(v)
{    
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
	  cargarPokemon(this.responseText,v);
      }
   };
   xhttp.open("GET", "obtenerPokemon.php?pokemons="+v, true);
   xhttp.send();
 }

 
 function cargarPokemon(pokemonJson, v) 
 {
    var pokemon = JSON.parse(pokemonJson);

    document.getElementById("centro").style.display = "block";
    document.getElementById("pokeNombre").innerHTML = pokemon.nombre;
    document.getElementById("pokeImagen").setAttribute("src","./img/"+pokemon.imagen);
    document.getElementById("pokeTipo").innerHTML = "Tipo: "+pokemon.tipo; 
    document.getElementById("pokeFuerza").innerHTML = "Fuerza: "+pokemon.fuerza; 
    document.getElementById("pokeVelocidad").innerHTML = "Velocidad: "+ pokemon.velocidad; 
    document.getElementById("pokeEvolucion").innerHTML = "Tipo de Evolucion: "+pokemon.evolucion;   
    document.getElementById("pokeCodigo").innerHTML = pokemon.codigo;
    document.getElementById("pokeCodigo").style.display = "none";
  }

window.onload = function(){ 
   loadDoc(0);
}

function agregarPokCarro()
{    
    var id = document.getElementById("pokeCodigo").innerHTML;

    $.ajax({
      url: 'procesarPok.php',
      type: 'POST',
      data: {id: id},
    }) 
}

function miCarrito()
{
   
   document.getElementById("centro").style.display = "none";
   document.getElementById("btn").style.display = "none";
   condicion = "carrito";
   //codigosPokemon = new Array();
   var xhttp = new XMLHttpRequest();
   xhttp.open('GET', 'carrito.json', true);
   xhttp.send();
   xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
	  let datos = JSON.parse(this.responseText);
	  
	  for(let item of datos){
		codigosPokemon[indice] = item;
		indice = indice+1;
	  }
	  indice = 0;
	  if(codigosPokemon.length < 1){
		//document.getElementById("pokeNombre").innerHTML = "No hay Pokemons agregados al carrito";
		alert("No hay Pokemons agregados al carrito");
	  }else{
		loadDoc(codigosPokemon[indice]);
	  }	
      }
   };
}

function tienda()
{
  document.getElementById("btn").style.display = "inline";
  condicion = "tienda";
  loadDoc(0);
}

async function abrir()
{
  document.getElementById("pokeImgBtn").style.display = "none";
  document.getElementById('pokedexImg').style.display = "none";
  document.getElementById('pokedexImg').src = "./img/pokedex2.png";
  var pokeAbrir = document.getElementById("pokedexAbrir");  
  pokeAbrir.style.display = "block";
  await stall();
  document.getElementById('pokedexImg').style.display = "block";
  pokeAbrir.style.display = "none";
  document.getElementById("contenido").style.display = "block"; 
}