/* Ajax api */

class Ajax {
    constructor(){
        this.xhr = new XMLHttpRequest();
        this.data = null;
    }
    afterLoad(fun){
        this.xhr.onloadend = fun;
    }
    request(method , dir , data='' , setHeader = false ,sync = true ){
        var currentObj = this;
        this.xhr.onreadystatechange = function () {
            if( this.readyState == 4 && this.status == 200){
                currentObj.data = this.responseText;
            }
        }
        this.xhr.open(method , dir , sync);
        if(setHeader){
            this.xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        }
        this.xhr.send(data);
    }
}
/* example */ 
/*  
var y = new Ajax();

y.request("GET" , "js/ajaxTest.txt");
y.afterLoad(
    function(){

        console.log(y.data);

    }
);

*/