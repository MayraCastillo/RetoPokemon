<?php 

	$dato = $_POST['id'];

	if(($dato >= 0) && ($dato <= 10)){
		
		$arr = file_get_contents('carrito.json');

		$itemsagg = json_decode($arr);
		$tam = count($itemsagg);

		if($dato >= 0){	
			$itemsagg[$tam] = $dato;
			file_put_contents('carrito.json', json_encode($itemsagg));
		}

	}else{
		echo 'error, Pokemon no existente';
	}
?>