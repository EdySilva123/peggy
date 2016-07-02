var showArte = function(){


	    var query = {};
               
           var q = document.querySelector('.texts').getAttribute('data-value').split('&');
           var aux='';
           for(var i=0; i<q.length; i++){
               aux = q[i].split('=');
               query[aux[0]] = aux[1];
           };// fim do loop for
           
           
           var plus = {
           	texto01:0,
           	texto02:0,
           	texto03:0,
           	t1 : 0,
           	t2 : 0,
           	data : 0
           };

           
           var texts = document.querySelectorAll('.show-arte svg text');

          	var pTexto01=false, 

          	pTexto02=false,

          	pTexto03=false,

          	pT1=false,

          	pT2=false,

          	pData=false;

           
           for(var i=0; i<texts.length; i++){
             var v = texts[i].innerHTML;
             
             if(/Texto 01/g.test(v)){
                 texts[i].innerHTML = query['texto01'];
                 
                 var x = texts[i].getAttribute('x');

                 if(!pTexto01){

                 	plus['texto01'] = ( Number(query['texto01X']) - Number(x) ) || 0;

                 	pTexto01=true;
                 }

                 if(query['texto01X'] !== 'none'){
                     texts[i].setAttribute('x', Number(x)+plus['texto01']);
                 }
             }
             
             
             if(/Texto 02/g.test(v)){
                 texts[i].innerHTML = query['texto02'];

                 var x = texts[i].getAttribute('x');

                 if(!pTexto02){

                 	plus['texto02'] = ( Number(query['texto02X']) - Number(x) ) || 0;

                 	pTexto02=true;
                 }
                 
                 if(query['texto02X'] !== 'none'){
                     texts[i].setAttribute('x', Number(x)+plus['texto02']);
                 }
             }
             
             
             if(/Texto 03/g.test(v)){
                 texts[i].innerHTML = query['texto03'];
                 
                  var x = texts[i].getAttribute('x');

                 if(!pTexto03){

                 	plus['texto03'] = ( Number(query['texto03X']) - Number(x) ) || 0;

                 	pTexto03=true;
                 }

                 if(query['texto03X'] !== 'none'){
                     texts[i].setAttribute('x', Number(x)+plus['texto03']);
                 }
             }
             
             if(/T1/g.test(v)){
                 texts[i].innerHTML = query['t1'];

                 var x = texts[i].getAttribute('x');

                 if(!pT1){

                 	plus['t1'] = ( Number(query['t1X']) - Number( x ) ) || 0;

                 	pT1=true;
                 }
                 
                 if(query['t1X'] !== 'none'){
                     texts[i].setAttribute('x', Number(x)+plus['t1']);
                 }
             }
             
             
             if(/T2/g.test(v)){
                 texts[i].innerHTML = query['t2'];

                 var x = texts[i].getAttribute('x');

                 if(!pT2){
                 	plus['t2'] = ( Number( query['t2X'] ) - Number(x) ) || 0;
                 	pT2=true;
                 }
                 
                 if(query['t2X'] !== 'none'){
                     texts[i].setAttribute('x', Number(x)+plus['t2']);
                 }
             }
             
             
             if(/00.00.0000/.test(v)){
                 texts[i].innerHTML = query['dataArte'];
                 
                  var x = texts[i].getAttribute('x');

                 if(!pData){
                 	plus['data'] = ( Number( query['dataArteX'] ) - Number(x) ) || 0;
                 	pData=true;
                 }

                 if(query['dataArteX'] !== 'none'){
                     texts[i].setAttribute('x', Number(x)+plus['data']);
                 }
             }
            
             
             
             
           };// fim do loop for
           
           console.log(query);
           console.log(plus);


};

if(document.addEventListener){
	document.addEventListener('DOMContentLoaded', showArte, false);
}else{
	document.attachEvent('onDOMContentLoaded', showArte);
}