function ajaxExec(method, url, obj, call){
     
          var ajax =new XMLHttpRequest();
            ajax.onreadystatechange=function(){
                if( ajax.readyState == 4 && ajax.status == 200 ){
                    call(ajax.responseText);
                }
            }

            

            ajax.open(method, url, true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.send( toSend( obj ) );
    
            
            
     
 }
 
 function toSend(obj){
     var send = [];
    for(var i in obj){
        send.push(i+'='+obj[i]);
    }
    return send.join('&');
 }
 
 
 HTMLElement.prototype.css=function(obj){
     var formatCss='';
        for(var i in obj){
            formatCss += i+':'+obj[i]+';';
        }
        
        this.style = formatCss;
 };
 
 
 function isArray( array ){
        if( typeof array === 'object' && array instanceof Array ){
            return true;
        }else{
            return false;
        }
    }// isisArray()
    
      
    
    
  HTMLElement.prototype.soNumero=function(){
  
    this.addEventListener('input', function(){
        this.value = trimAll( this.value );
        var last = this.value[ this.value.length - 1 ], size = Number( this.value.length );
        
        
        if( isNaN( Number( last ) ) ){
          this.value = this.value.substring(0, this.value.length-1);
        }
        
    });
  
};

HTMLElement.prototype.moneyFormat=function(){
    this.addEventListener('input', function(){
        this.value = trimAll( this.value );
        var last = this.value[ this.value.length - 1 ], size = Number( this.value.length );
        
        if( isNaN( Number( last ) ) ){
          if(last != ',' && last != '.'){
              this.value = this.value.substring(0, this.value.length-1);
          }
        }
        
    });
};

HTMLElement.prototype.limit=function(max){
    this.addEventListener('input', function(){
       
        if( this.value.length >= max+1 ){
            this.value = this.value.substring(0, this.value.length-1);
        }
        
    });
};

function trimAll( str ){
    var newStr = '';
        
        for( var i=0; i<str.length; i++ ){
            if( str[i] != ' ' ){
                newStr += str[i];
            }
        }// loop for
        
        return newStr;
    
}



function numeroParaMoeda(n, c, d, t)
{
    c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}
 
