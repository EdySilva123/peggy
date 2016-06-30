
		/*
		* Colore a arte
		* @param color - Codificação hexadecimal da cor a ser aplicada
		*/
		var applyColor = function(color){
			
			var svg = document.querySelectorAll('.show-arte svg g'), g;

			var fill, stroke;

			for (var i = 0; i < svg.length; i++) {
				g = svg[i];
				
				fill = g.getAttribute('fill'), stroke = g.getAttribute('stroke');

				if(fill !== 'none' && fill !== null){
					g.setAttribute('fill', color);
				}


				if(stroke !== 'none' && stroke !== null){
					g.setAttribute('stroke', color);
				}

				// alert('Fill : '+fill+', Fill Type : '+typeof fill);

			}// fim do loop for



		};

		/*
		* Função que converte uma arte de grade como se fosse uma folha de rosto
		*/
		var parseToRosto = function(){

			try{

			var firstText = document.querySelector('.show-arte svg > text'),
			firstG = document.querySelector('.show-arte svg > g');
			firstText.innerHTML = '';
			firstG.innerHTML='';

			var all_texts = document.querySelectorAll('.show-arte svg text'), text;

			for (var i = 0; i < all_texts.length; i++) {
				text = all_texts[i];

				if(/NN 1/i.test(text.innerHTML)){
					text.innerHTML = '';
				}

				if(/NN 2/i.test(text.innerHTML)){
					text.innerHTML = '';
				}

				if(/DESC 1/i.test(text.innerHTML)){
					text.innerHTML = '';
				}

				if(/DESC 2/i.test(text.innerHTML)){
					text.innerHTML = '';
				}

				if(/DESC 3/i.test(text.innerHTML)){
					text.innerHTML = '';
				}

			};

		}catch(e){

		}

		};


		/*
		* Função que gera uma dicionário com as posições dos textos e retorna
		*/

		var loadPositions=function(){
			var p = {
				texto01:[],
				texto02:[],
				texto03:[],
				t1:[],
				t2:[],
				data:[]
			};


			var texts = document.querySelectorAll('.show-arte svg text'), valor_texto;

			for (var i = 0; i < texts.length; i++) {
				valor_texto = texts[i].innerHTML;

				if(/Texto 01/i.test(valor_texto)){
					p['texto01'].push(i);
				}

				if(/Texto 1/i.test(valor_texto)){
					p['texto01'].push(i);
				}


				if(/Texto 02/i.test(valor_texto)){
					p['texto02'].push(i);
				}

				if(/Texto 2/i.test(valor_texto)){
					p['texto02'].push(i);
				}


				if(/Texto 03/i.test(valor_texto)){
					p['texto03'].push(i);
				}

				if(/Texto 3/i.test(valor_texto)){
					p['texto03'].push(i);
				}

				if(/T1/i.test(valor_texto)){
					p['t1'].push(i);
				}

				if(/T2/i.test(valor_texto)){
					p['t2'].push(i);
				}

				if(/00.00.0000/i.test(valor_texto)){
					p['data'].push(i);
				}



			};// fim do loop for

			return p;

		};


		/*
		* Função que muda o texto de uma arte
		*/
		var changeText = function(texts, positions, value){
			for (var i = 0; i < positions.length; i++) {
				var p = positions[i];
				texts[p].innerHTML = value;
			};
		};



		/*
		* Alinha o texto para a direita
		*/
		var alignToRight=function(texts, positions){
			for (var i = 0; i < positions.length; i++) {
				var p = positions[i];

				var x = Number(texts[p].getAttribute('x'));
				
				var newX = x+90;

				texts[p].setAttribute('x', newX);

			};// fim do loop for
		};

		/*
		* Alinha o texto para a esquerda
		*/
		var alignToLeft=function(texts, positions){
			for (var i = 0; i < positions.length; i++) {
				var p = positions[i];

				var x = Number(texts[p].getAttribute('x'));
				
				var newX = x-90;

				texts[p].setAttribute('x', newX);

			};// fim do loop for
		};