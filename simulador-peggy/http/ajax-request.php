<?php 
	
	$acao = $_POST['acao'];

	switch ($acao) {
		case 'load-arte':
			chdir('../');

			echo file_get_contents($_POST['src_image']);
		break;

		case 'get-grid':
			$numeracao = $_POST['numeracao'];
			$modelo = $_POST['modelo'];


			if($modelo != 'NONE'){
				$src = '../artes/'.$modelo.'/'.$numeracao.'_cleaned.svg';
				echo file_get_contents($src);
			}			

		break;

		case 'compile-arte':
			chdir('../');
			$content_arte = file_get_contents($_POST['src_image']);

			$content_arte = str_replace('Texto 01', $_POST['texto01'], $content_arte);
			$content_arte = str_replace('Texto 02', $_POST['texto02'], $content_arte);
			$content_arte = str_replace('00.00.0000', $_POST['data'], $content_arte);

			$content_arte = str_replace('+', '&nbsp;', $content_arte);

			echo $content_arte;

		break;


		case 'save-art':
			chdir('../');

	
			$attrib = $_POST['attrib'];
			$attrib['id']=0;

			$conn = new PDO('mysql:host=localhost; dbname=peggy;', 'root', '');

			$values = array_values($attrib);
			$p = array();

			for($i=0; $i<count($values); $i++){
				$p[] = '?';
			}

			$p = implode(',', $p);
			
			$k = implode(',', array_keys($attrib));

			$query = "INSERT INTO simulador_peggy ($k) VALUES ($p)";

			$add = $conn->prepare($query);
			echo $add->execute($values);


			

		break;
		
		default:
			echo 'Default code';
			break;
	}

 ?>