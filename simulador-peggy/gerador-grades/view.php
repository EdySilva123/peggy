<!DOCTYPE html>
<html>
<head>
	<title>Visualizar arte</title>
	<meta charset="utf-8" />

	<link rel="stylesheet" type="text/css" href="../css/import-fonts.css">

	<style type="text/css">
	@media print{

		:not(svg){
			/*display: none;*/
		}

	}
	</style>

</head>
<body>

	<span class="texts" data-value="texto01=Nat&texto01X=11700&texto02=Leo&texto02X=11500&texto03=Texto 03&texto03X=none&t1=Nat &t1X=86&t2=Leo&t2X=250&dataArte=04.08.2016&dataArteX=none"></span>

	<span class="modelo"></span>

	<button class="load" style="display: none;">Load</button>
	<button class="impress" style="display: none;">Imprimir</button>

	<div class="show-arte"></div>


	<script type="text/javascript" src="../js/perspective.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	<script type="text/javascript">
		


		var btLoad = document.querySelector('.load'),
		btImpress = document.querySelector('.impress');

		if(btLoad.addEventListener){
			btLoad.addEventListener('click', fn, false)
		}else{
			btLoad.attachEvent('onclick', fn);
		}

		btImpress.addEventListener('click', function(){
			// var content = document.body.innerHTML;
			// document.body.innerHTML = document.querySelector('.show-arte').innerHTML;
			window.print();
			// document.body.innerHTML = content;
		}, false);


	</script>

</body>
</html>