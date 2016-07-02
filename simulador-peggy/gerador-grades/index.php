<!DOCTYPE html>
<html>
<head>
	<title>Gerador de Grades</title>
	<meta charset="utf-8" />

	<style type="text/css">

	*{margin: 0; padding: 0; box-sizing: border-box;}

	#content{float: left;padding: 6px; width: 100%;}

	#content iframe{
		width: 100%;
		height: 600px;
		border:none;
		padding: 10px;
	}

	.art{
		width: 100%;
		float: left;
		font-family: "Ubuntu", sans-serif;
	}

	.art label{display: block; padding: 5px; margin-bottom: 3px; background: #ddd;}
	.art strong{color: #00f;}

	.generate{padding: 8px; cursor: pointer; font-weight: bold; font-size: 16px; background: #00f; border:none; color: #fff; border-radius: 4px;}

	.generate:hover{opacity: .9;}


	</style>

</head>
<body>


<section id="content">
	 
	 <span class="texts" data-value="texto01=Nat&texto01X=98&texto02=Leo&texto02X=107&texto03=Texto 03&texto03X=none&t1=Nat&t1X=86&t2=Leo&t2X=250&dataArte=04.08.2016&dataArteX=none"></span>


	<aside class="art">
		<label>Modelo : <strong class="modelo">C204</strong></label>
		<label>Texto 01 : <strong class="texto01"></strong></label>
		<label>Texto 02 : <strong class="texto02"></strong></label>
		<label>Texto 03 : <strong class="texto03"></strong></label>
		<label>T1 : <strong class="t1"></strong></label>
		<label>T2 : <strong class="t2"></strong></label>
		<label>Data : <strong class="dataArte"></strong></label>
	</aside>

	<section>
		
		<button class="generate">Generate 24</button>
		<button class="generate reset" style="background: #f00;">Reset</button>
		<button class="generate impress" style="background: orange;">Imprimir</button>

	</section>


	<iframe src="view.php"></iframe>

</section>

<script type="text/javascript" src="../js/perspective.js"></script>
<script type="text/javascript">
var index = 0;
var grid = [24, 26, 28, 30, 32, 34, 36, 38, 40, 42, 44], n;

	


		var generate = function(){

			n = (grid.length > 0) ? grid[0] : 0;
			grid.shift();

			index = grid[0] || '';

			this.innerHTML='Generate '+index;

			//objeto document
			var doc = window.document;

			// //objeto iframe
			iframe = document.querySelector('iframe'),

			// //objetos document do IFRAME
			doc_frame = iframe.contentWindow.document;

			var modelo = doc.querySelector('.modelo').innerHTML;

			//recuperando document do IFRAME
			doc_frame = iframe.contentWindow.document;


			if(n !=0){

				ajaxExec("POST", '../http/ajax-request.php', {
			      acao : 'load-arte',
			      src_image : 'artes/'+modelo+'/'+n+'_cleaned.svg'
			    }, function(response){
			      doc_frame.querySelector('.show-arte').innerHTML=response;
			      doc_frame.querySelector('.load').click();
			      // showArte();

			    });

			}		


			// doc_frame.querySelector('.show-arte').innerHTML=modelo;

		};


	   //end functions

	   var query = {}, btGenerate = document.querySelector('.generate'), 
	   btReset = document.querySelector('.reset'),
	   btImpress = document.querySelector('.impress');
               
	   var q = document.querySelector('.texts').getAttribute('data-value').split('&');
	   var aux='';
	   for(var i=0; i<q.length; i++){
	       aux = q[i].split('=');
	       query[aux[0]] = aux[1];

	       try{
	       		document.querySelector('.'+aux[0]).innerHTML = aux[1];
	       }catch(e){
	       	console.log(e.toString());
	       }

	   };// fim do loop for



	   /*
	   * adicionando evento de click ao botão generate
	   */
	   if(btGenerate.addEventListener){
	   		btGenerate.addEventListener('click', generate, false);
	   }else{
	   		btGenerate.attachEvent('onclick', generate);
	   }

	   btImpress.addEventListener('click', function(){
	   		var iframe = document.querySelector('iframe');
	   		doc_frame = iframe.contentWindow.document;

	   		doc_frame.querySelector('.impress').click();

	   });

	   btReset.addEventListener('click', function(){
	   		grid=[24, 26, 28, 30, 32, 34, 36, 38, 40, 42, 44];
	   		btGenerate.innerHTML = 'Generate 24';
	   });


          	

</script>


</body>
</html>