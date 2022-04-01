/*  Start of Selector API */
var d = document,
    i ,ii ;

function Element( name ) {
    
    // name inserted as a css selector becouse of querySelectorAll function

    this.name = d.querySelectorAll(name); 
    
    // return HTMLCollection

    this.css = function( properties , operation = 'set' ){

        if( operation === 'set'){ 
            
            // set css values
            // css() accept properties as an object as {property:value}

            for( i of this.name ){

                // for every i ==> every element in HTMLCollection

                for( ii = 0 ; ii < Object.getOwnPropertyNames(properties).length ; ii++ ) {

                    /* 
                        Object.getOwnPropertyNames(properties) retune property Name from properties object and Object.values(properties) its value 
                    */

                    i.style[ Object.getOwnPropertyNames( properties )[ ii ] ] = Object.values(properties)[ ii ];
                }

            }

        } else if( operation === 'get' ){
            
            // get css style values
            // css() accept properties as an array as ['pesudo-element' , 'style1' , 'style2' ,  ....]
            // if you don't want pesudo-element set it as a null
            
            for(i of this.name){
            
                // for every i ==>  every element in HTMLCollection
            
                for(ii in properties){
            
                    return getComputedStyle( i , properties[0] )[ properties[ parseInt(ii) + 1 ] ];
            
                }
                
            }

        }
        
    };

    this.attr  = function(attr , value= undefined ){

        if(typeof value == "undefined"){
            
            // get attribute

            for(i of this.name){
        
                return i[attr]
        
            }

        }else{

            // set attribute

            for(i of this.name){
            
                i[attr] = value;
            
            }
        }
    };

    this.event = function(name , action){
        
        // event handler for every element in collection 

        for(i of this.name){
        
            i.addEventListener(name , action);
        
        }
    };

    this.addClass = function(name){
        for (i of this.name){
            i.classList.add(name);
        }
    }

    this.removeClass = function(name){
        for (i of this.name){
            i.classList.remove(name);
        }
    }

    
}

function $_(element){
    var collection = new Element(element);
    return collection;
}

/* End of selector API */





















