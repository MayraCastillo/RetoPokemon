<?php

include 'pokemon.php';

$json = file_get_contents('./pokemons.json');

$pokemons = json_decode($json,true);

$p = Pokemon::createFromArray($pokemons[0]);

if(isset($_GET["pokemons"]))
{
    $n = $_GET["pokemons"];
    if($n < count($pokemons))
    {
        $p =  Pokemon::createFromArray($pokemons[$n]);
    }
    else
    {
        echo "Error, número dado no encontrado";
    }            
}
else
{
    echo "Error, número de pokemon no especificado"; 
}

echo json_encode($p);

?>
