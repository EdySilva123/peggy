	<!DOCTYPE html>
	<html>
	<head>
		<title>Demanda #83</title>
		<meta charset="utf-8" />

		<link rel="stylesheet" type="text/css" href="../css/import-fonts.css">

	</head>
	<body>

	    
            <span class="texts" data-value="texto01=SF&texto01X=283&texto02=SF&texto02X=283&texto03=Texto 03&texto03X=none&t1=S&t1X=358&t2=F&t2X=371&dataArte=26.11.2016&dataArteX=none"></span>

			<!-- TESTANDO MODELO C274 -->
			<div class="show-arte" style="width: 400px;">
				
				<?php 
					$content = file_get_contents('../artes/C274/C274R_cleaned.svg');
					echo $content;
				 ?>

			</div>


	   <script type="text/javascript" src="js/app.js"></script>


	</body>
	</html>