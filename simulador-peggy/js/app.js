


			var colore = function(g,color, cor_fundo){

				var color_back = cor_fundo || ['#fff', '#fefefe'];


				console.log('Executando função...');
				// var color = '#0f0';

				for (var i = 0; i < g.length; i++) {

					if(g[i].nodeName == 'g' || g[i].nodeName == 'path' || g[i].nodeName == 'text' || g[i].nodeName == 'ellipse'){

						var fill = g[i].getAttribute('fill'),
						stroke = g[i].getAttribute('stroke');

						if(fill != null && fill != 'none' && fill != '#fff' && fill != '#fefefe'){
							g[i].setAttribute('fill', color);
						}else{
							if(fill == '#fff' || fill == '#fefefe'){
								g[i].setAttribute('fill', 'red');
							}
						}

						if(stroke != null && stroke != 'none' && stroke != '#fff' && stroke != '#fefefe'){
							g[i].setAttribute('stroke', color);
						}else{
							if(stroke == '#fff' || stroke == '#fefefe'){
								g[i].setAttribute('stroke', 'red');
							}
						}

						var childs = g[i].childNodes;

						if(childs.length > 0){
							colore(childs,color);
						}

					}

					

				};// fim do loop for
			};



document.addEventListener('DOMContentLoaded', function(){

	var btColorir = document.querySelector('button[name=colorir]');

			//recuperando todas as imagens em uma NodeList
			var listaArtes = document.querySelectorAll('ul li img'), 

			//identifica se a arte ainda está sendo carregada
			loading=false, 

			//Container onde a arte será exibida
			templateArte = document.querySelector('.show-arte'),

			//input de seleção de cor
			inputColor = document.querySelector('[type=color]'),

			//dicionario com posições dos textos
			positions,

			//campos do formulário de edição
			fieldsEdit = document.querySelectorAll('.form-edit input'), 

			//botão de salvar todos as grades
			btSaveAll = document.querySelector('[name=save-all]');

			var backColor = document.querySelectorAll('input[type=color]')[1];



			/*
			* evento de click em uma arte 
			*/
			for (var i = 0; i < listaArtes.length; i++) {
				listaArtes[i].addEventListener('click', function(){

					var src_image = this.getAttribute('data-src'),

					modelo = this.getAttribute('data-model');

					
					if(!loading){

						loading=true;

						ajaxExec("POST", 'http/ajax-request.php', {
							acao : 'load-arte',
							src_image : src_image
						}, function(response){
							templateArte.innerHTML = response;
							loading=false;

							parseToRosto();


							document.querySelector('span.modelo').setAttribute('data-value', modelo)

							positions = loadPositions();

							//colrindo arte
							btColorir.click();


						});

					}else{
						alert('A arte está sendo carregada');
					}

				});// fim do addEventListener
			};// fim do loop for




			/*
			* adicionando evento change ao input color
			*/
			inputColor.addEventListener('change', function(){
				var cor = this.value,

				gClip = document.querySelectorAll('.show-arte svg > g');

				colore(gClip, this.value);

				var modelo = document.querySelector('span.modelo').getAttribute('data-value');
				if(modelo == 'C182'){

					var g = document.querySelector('.show-arte svg > g[clip-path] > g');
					g.setAttribute('fill', cor, backColor.value);

				}





				// applyColor(this.value.toUpperCase());
			});


			backColor.addEventListener('change', function(){
				
				templateArte.style.background = this.value;

				var cor = document.querySelector('input[type=color]').value;

				gClip = document.querySelectorAll('.show-arte svg > g'),

				externPath = document.querySelectorAll('.show-arte svg > path');

				colore(gClip, cor, backColor.value);
				colore(externPath, cor, backColor.value);

				var modelo = document.querySelector('span.modelo').getAttribute('data-value');
				if(modelo == 'C182'){

					var g = document.querySelector('.show-arte svg > g[clip-path] > g');
					g.setAttribute('fill', cor);

				}

			});


			/*
			* Adicionando evento de input aos campos do formulário
			*/
			for (var i = 0; i < fieldsEdit.length; i++) {
				fieldsEdit[i].addEventListener('input', function(){
					var index = this.getAttribute('name');
					changeText(document.querySelectorAll('.show-arte svg text'), positions[index], this.value);
					
				});

				fieldsEdit[i].addEventListener('keydown', function(e){
					
					var shiftPressed = e.shiftKey, index = this.getAttribute('name');

					if(shiftPressed){
						if(e.keyCode == 39){
							alignToRight( document.querySelectorAll('.show-arte svg text'), positions[index] );

							e.preventDefault();
						}

						if(e.keyCode == 37){
							alignToLeft( document.querySelectorAll('.show-arte svg text'), positions[index] );

							e.preventDefault();
						}


					}

				});
			}



			/*
			* adicionando evento de click ao botão de salvar todas as grades
			*/
			btSaveAll.addEventListener('click', function(){

				var forSave = document.querySelector('.for-save');

				var p = {texto01:[]};

				var fieldTexto01 = document.querySelector('[name=texto01]');

				var t = document.querySelectorAll('.show-arte svg text');

				var grid = window.prompt('Numeração : ');
				grid = grid || 26;



				ajaxExec('POST', 'http/ajax-request.php', {
					acao : 'get-grid',
					numeracao : grid,
					modelo : document.querySelector('span.modelo').getAttribute('data-value')
				}, function(response){
					forSave.innerHTML=response;

					var textGrid = document.querySelectorAll('.for-save svg text');

					for (var i = 0; i < textGrid.length; i++) {
						var v = textGrid[i].innerHTML;

						if(/Texto 01/i.test(v)){
							p['texto01'].push(i);
						}

					}// fim do loop for

					var p1 = positions['texto01'];

					alert(t[p1[0]]);

					var oringinalX={
						texto01 : t[p1[0]].getAttribute('x')
					};

					console.log('Coordenadas X');
					console.log(oringinalX);
					changeText(textGrid, p['texto01'], fieldTexto01.value);

					for (var i = 0; i < p['texto01'].length; i++) {
						var c = p['texto01'][i];
						textGrid[c].setAttribute('x', oringinalX['texto01']);
					}

				});

			});


			btColorir.addEventListener('click', function(e){

				var cor = document.querySelector('input[type=color]').value;

				gClip = document.querySelectorAll('.show-arte svg > g'),

				externPath = document.querySelectorAll('.show-arte svg > path');

				colore(gClip, cor, backColor.value);
				colore(externPath, cor, backColor.value);

				var modelo = document.querySelector('span.modelo').getAttribute('data-value');
				if(modelo == 'C182'){

					var g = document.querySelector('.show-arte svg > g[clip-path] > g');
					g.setAttribute('fill', cor);

				}




			});


		});// fim do atrelamento