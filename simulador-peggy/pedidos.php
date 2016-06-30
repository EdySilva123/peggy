<!DOCTYPE html>
<html>
<head>
	<title>Pedidos!</title>
	<meta charset="utf-8">
</head>
<body>

<?php 
	
	$conn = new PDO('mysql:host=localhost; dbname=peggy;', 'root', '');

		$get = $conn->prepare("SELECT * FROM simulador_peggy");
		$get->execute();

		while($row = $get->fetchObject()){
			echo '<a href="?id_pedido='.$row->id_pedido.'">Pedido: '.$row->id_pedido.'</a><br>';
		}




		if(isset($_GET['id_pedido'])){
			$id = $_GET['id_pedido'];

			$getPedido = $conn->prepare("SELECT * FROM simulador_peggy WHERE id_pedido=?");
			$getPedido->execute(array($id));

			$attr = $getPedido->fetchObject();


			$src = 'artes/'.$attr->modelo.'/'.$attr->modelo.'R_cleaned.svg';

			$content = file_get_contents($src);
			$content = str_replace('Texto 01', $attr->texto01, $content);
			$content = str_replace('Texto 02', $attr->texto02, $content);
			$content = str_replace('Texto 03', $attr->texto03, $content);
			$content = str_replace('T1', $attr->t1, $content);
			$content = str_replace('T2', $attr->t2, $content);
			$content = str_replace('00.00.0000', $attr->data, $content);

			$content = str_replace('+', '&nbsp;', $content);

			echo $content;


		}


	unset($conn);

 ?>


</body>
</html>