	<!DOCTYPE html>
	<html>
	<head>
		<title>Demanda #83</title>
		<meta charset="utf-8" />

		<link rel="stylesheet" type="text/css" href="../css/import-fonts.css">

	</head>
	<body>

	            <span class="texts" data-value="texto01=Nat&texto01X=98&texto02=Leo&texto02X=107&texto03=Texto 03&texto03X=none&t1=Nat &t1X=86&t2=Leo&t2X=250&dataArte=04.08.2016&dataArteX=none">LINK</span>


			<!-- TESTANDO MODELO C204 -->
			<div class="show-arte" style="width: 400px;">
				
				<?php 
					/**
						Texto 01
							Valor : Edy
							X = ORIGINAL + 32

						Texto 02
							Valor : Silva
							X = ORIGINAL + 23
					**/
					

					$content = file_get_contents('../artes/C204/C204R_cleaned.svg');

					// $content = preg_replace('/Texto 01/i', 'Edy', $content);
					// $content = preg_replace('/Texto 02/i', 'Silva', $content);

					echo $content;

				 ?>

			</div>


	   <script type="text/javascript" src="js/app.js"></script>


	</body>
	</html>