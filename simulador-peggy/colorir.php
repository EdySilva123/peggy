<!DOCTYPE html>
<html>
<head>
	<title>Teste de coloração das grades</title>
	<meta charset="utf-8" />

	<link rel="stylesheet" type="text/css" href="css/import-fonts.css">

	<style type="text/css">
	ul{list-style: none;}
	ul li{
		float: left;
		padding: 10px;
		transition: all .2s linear;
	}

	ul li:hover{background: tomato;}
	ul li img{width: 200px; cursor: pointer;}

	.show-arte{
		width: 100%;
		float: left;
	}


	.show-arte svg{width: 50%; height: 800px; background: #333;}

	.form{
		width: 300px;
		float: right;
	}

	</style>

</head>
<body>


	<?php
	$pasta = 'artes';
	$handle = opendir($pasta);

	$g = isset($_GET['g']) ? $_GET['g'] : '24';
?>
	<section class="container">
		
		<h1>Choice your model and apply a color!</h1>

		<div style="width: 100%; float:left; height: 200px; overflow-y: auto;">

		<ul>
		<?php
			while($sub = readdir($handle)):
				if($sub != '.' && $sub != '..' && $sub != 'artes-clientes'):

					$src_image = $pasta.'/'.$sub.'/'.$sub.'R_cleaned.svg';
					$src_grade = $pasta.'/'.$sub.'/'.$g.'_cleaned.svg';
		?>

			<li><img src="<?php echo $src_grade; ?>" title="Model  <?php echo $sub; ?>" data-src="<?php echo $src_grade; ?>" data-model="<?php echo $sub; ?>"></li>

		<?php
					
				endif;
			endwhile;
		?>

			<li></li>
		</ul>

		</div>

		<div class="form-edit">
			<input name="texto01" value="Texto 01">
			<input name="texto02" value="Texto 02">
			<input name="texto03" value="Texto 03">
			<input name="t1" value="T1">
			<input name="t2" value="T2">
			<input name="data" value="00.00.0000">
			<button name="save-all">Save All Grids</button>
		</div>

		<div class="space-color">
			<label>Selecione a cor : </label><input type="color">
			<label>Selecione a cor de fundo : </label><input type="color" class="back-color" value="#ffffff">
			<button name="colorir">Colorir</button>
		</div>

		<div class="show-arte" style="background: red;">
		</div>

		<div class="for-save" style="display: none;"></div>

		

		<div class="config-arte">
			<span class="modelo" data-value="NONE"></span>
			<span class="src" data-value="NONE"></span>
			<span class="cor_solado" data-value="BRANCO"></span>
			<span class="cor_arte" data-value="VERDE"></span>
			<span class="cor_alca" data-value="BRANCA"></span>
		</div>

		


	</section>

	<script type="text/javascript" src="js/perspective.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	<script type="text/javascript" src="js/app.js"></script>


</body>
</html>