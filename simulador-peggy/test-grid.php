<!DOCTYPE html>
<html>
<head>
	<title>Testando proporção de grades</title>
	<meta charset="utf-8">
</head>
<body>

	<form method="get">
		<input type="text" name="modelo">
		<input type="text" name="grade" value="24">
		<button>Search</button>
	</form>

	<?php 



		if(isset($_GET['modelo']) && isset($_GET['grade'])){
			$modelo = strtoupper($_GET['modelo']);
			$grade = $_GET['grade'];



			$src = 'artes/'.$modelo.'/'.$grade.'_cleaned.svg';

		}
	 ?>


	 <div class="arte">
	 	<?php 
	 		if(isset($src)){
	 			echo file_get_contents($src);
	 		}
	 	 ?>
	 </div>

	 <?php 
	 		if(isset($grade)){
	 			echo '<span class="grade">'.$grade.'</span>';
	 		}
	  ?>

</body>

	<script type="text/javascript">
	var grade = document.querySelector('.grade').innerHTML;

	var size = 0;

	// if(grade == 28){
	// 	size = 400;
	// }else if(grade == 30){
	// 	size = 500;
	// }else if(grade == 32){
	// 	size = 700;
	// }else if(grade == 34){
	// 	size = 900;
	// 	size = 100;// para a057
	// }else if(grade == 36){
	// 	size = 1100;
	// }else if(grade == 38){
	// 	size = 1300;
	// }else if(grade == 40){
	// 	size = 1500;
	// }else if(grade == 42){
	// 	size = 1700;
	// }else if(grade == 44){
	// 	size = 1900;
	// }


	var textoEscrito = 'E';
	var aumentaX = 2400+size;

		var texts = document.querySelectorAll('.arte svg text');
		var p = {texto01:[]}, regex = /Texto 01/i;

		if(typeof texts[0] !== 'undefined'){

			for (var i = 0; i < texts.length; i++) {
				var v = texts[i].innerHTML;

				if(regex.test(v)){
					p.texto01.push(i);
				}
			};



			var posicoes = p.texto01;

			for (var i = 0; i < posicoes.length; i++) {
				var pst = posicoes[i];
				texts[pst].innerHTML = textoEscrito;
				var x = Number(texts[pst].getAttribute('x'));
				texts[pst].setAttribute('x', x+aumentaX);
			};


		}else{
			alert('Arte não carregada');
		}

	</script>

</html>