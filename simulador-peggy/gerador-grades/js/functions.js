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

           var firstText = document.querySelector('.show-arte svg > text');

           var numeracao = firstText.innerHTML;


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
                 

                 if(query['texto01X'] != 'none'){
                    texts[i].setAttribute('x', query['texto01X']);
                 }

             }
             
             
             if(/Texto 02/g.test(v)){
                 texts[i].innerHTML = query['texto02'];

                 if(query['texto02X'] != 'none'){
                    texts[i].setAttribute('x', query['texto02X']);
                 }
             }
             
             
             if(/Texto 03/g.test(v)){
                 texts[i].innerHTML = query['texto03'];
                 
                 if(query['texto03X'] != 'none'){
                    texts[i].setAttribute('x', query['texto03X']);
                 }
             }
             
             if(/T1/g.test(v)){
                 texts[i].innerHTML = query['t1'];

                  if(query['t1X'] != 'none'){
                    texts[i].setAttribute('x', query['t1X']);
                 }
             }
             
             
             if(/T2/g.test(v)){
                 texts[i].innerHTML = query['t2'];

                  if(query['t2X'] != 'none'){
                    texts[i].setAttribute('x', query['t2X']);
                 }
             }
             
             
             if(/00.00.0000/.test(v)){
                 texts[i].innerHTML = query['dataArte'];
                 
                 //  var x = texts[i].getAttribute('x');

                 // if(!pData){
                 // 	plus['data'] = ( Number( query['dataArteX'] ) - Number(x) ) || 0;
                 // 	pData=true;
                 // }

                 // if(query['dataArteX'] !== 'none'){
                 //     texts[i].setAttribute('x', Number(x)+plus['data']);
                 // }
             }

             if(/NN 1/.test(v)){
                texts[i].innerHTML = (Number(numeracao)-1).toString()+'/'+numeracao[1];
             }
            
             
             
             
           };// fim do loop for
           
           console.log(query);
           console.log(plus);


};




  var fn = function(){
    
    showArte();

    

  };