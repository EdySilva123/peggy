<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Peggy simulate!</title>
	<meta charset="utf-8" />

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
		width: 400px;
		float: left;
	}

	.form{
		width: 300px;
		float: right;
	}

	</style>


	<script type="text/javascript" src="http://localhost/development-kit/lib/jquery/jquery-2.2.3.min.js"></script>

	<script type="text/javascript">
		
		$(function(){

			$('body').on('click', 'ul li img', function(){

				var src_image = $(this).attr('data-src');

				$('.src').attr('data-value', src_image);
				$('.modelo').attr('data-value', $(this).attr('data-model'));

				$.post('http/ajax-request.php', {
					acao : 'load-arte',
					src_image : src_image
				}, function(response){
					$('.show-arte').html(response);
				});

			});


			$('body').on('click', '[name=compile]', function(){

				var objSender = {};
				var name, val;
				$('form input').each(function(){

					name = $(this).attr('name');
					val = $(this).val();

					objSender[name]=val;

				});

				objSender['src_image'] = $('.src').attr('data-value');
				objSender['acao']='compile-arte';

				$.post('http/ajax-request.php', objSender, function(response){
					// console.log(response);
					$('.show-arte').html(response);
				});

				console.log(objSender);

				return false;

			});


			$('body').on('click', '[name=save]', function(){

				var id_pedido = window.prompt('Numero do pedido:')

				var attr = {};

				attr['id_pedido']=id_pedido;

				var name, val;

				$('form input').each(function(){

					name = $(this).attr('name');
					val = $(this).val();

					attr[name]=val;

				});


				attr['cor_solado'] = "BRANCO";
				attr['cor_arte'] = "VERMELHA";
				attr['cor_alca'] = "BRANCA";

				attr['modelo'] = $('.modelo').attr("data-value");

				$.post('http/ajax-request.php', {
					acao : 'save-art',
					attrib : attr
				}, function(response){
					alert(response);
				});

				console.log(attr);


				return false;
			});

		});

	</script>
</head>
<body>

<?php
	$pasta = 'artes';
	$handle = opendir($pasta);
?>


	<section class="container">
		
		<h1>Choice your model!</h1>

		<div style="width: 100%; float:left;">

		<ul>
		<?php
			while($sub = readdir($handle)):
				if($sub != '.' && $sub != '..' && $sub != 'artes-clientes'):

					$src_image = $pasta.'/'.$sub.'/'.$sub.'R_cleaned.svg';
					$src_grade = $pasta.'/'.$sub.'/24_cleaned.svg';
		?>

			<li><img src="<?php echo $src_image; ?>" title="Model  <?php echo $sub; ?>" data-src="<?php echo $src_grade; ?>" data-model="<?php echo $sub; ?>"></li>

		<?php
					
				endif;
			endwhile;
		?>

			<li></li>
		</ul>

		</div>


		<div class="show-arte">
			
		</div>

		<div class="config-arte">
			<span class="modelo" data-value="NONE"></span>
			<span class="src" data-value="NONE"></span>
			<span class="cor_solado" data-value="BRANCO"></span>
			<span class="cor_arte" data-value="VERDE"></span>
			<span class="cor_alca" data-value="BRANCA"></span>
		</div>

		<div class="form">
			<form>
			<h2>Edit your model:</h2>

				<input type="text" name="texto01" placeholder="Texto 01">
				<input type="text" name="texto02" placeholder="Texto 02">
				<input type="text" name="texto03" placeholder="Texto 03">
				<input type="text" name="t1" placeholder="T1">
				<input type="text" name="t2" placeholder="T2">
				<input type="text" name="data" placeholder="Data">

				<button name="save">Save</button>
				<button name="compile">Compile</button>

			</form>
		</div>



	</section>

	<a href="colorir.php">Teste coloração das artes.</a>

</body>
</html>