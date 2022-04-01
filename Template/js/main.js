/* just a variable to be used in counters*/
var i;
/* Cunstructor function */
function slider(slider){
  this.photo = slider;              // query selector all for divs which contain the photo
  this.lenPhoto = this.photo.length;
  this.activePhoto = function (){   // get the element which contain (active) class and its index
    for(i=0 ; i < this.lenPhoto ; i++){
      if(this.photo[i].className.includes('active')){
        return {active:this.photo[i] , num:i};
      }
    }
  };
  this.action = function(F,S){
      // F or S = [ NumberOfPhoto , Operation] where Operation = add/remove
      this.photo[ F[0] ].classList[ F[1] ]('active');
      this.photo[ S[0] ].classList[ S[1] ]('active');
  }
  this.sliderNext = function(){
    const x = this.activePhoto().num;     // the number of current active photo
    if(x < (this.lenPhoto-1) ){
      this.action( [x + 1 , 'add' ] ,[ x , 'remove' ]);
    }else if(x == (this.lenPhoto-1) ){
      this.action( [this.lenPhoto-1 , 'remove' ] ,[ 0 , 'add' ]);
    }
  };
}

var sliderPhotos = document.querySelectorAll('.background'),  // divs that have imgs
    slider = new slider(sliderPhotos );          // initialize the slider and its requements

if(sliderPhotos.length != 0){
  setInterval(function(){ slider.sliderNext(); } , 5000);
}



/* 
  -- nav bars on mobile 
  -- on click on bars 
    -> check if it has class "active-nav" or not
      to toggle "active-nav" and "nav-toggle" classes
*/
$_('.nav-bars').event('click' , function(){
  if ( this.className.includes('active-nav') ){
    this.classList.remove('active-nav');
    $_('.nav-content ul').removeClass('nav-toggle');
  }else{
    this.classList.add('active-nav');
    $_('.nav-content ul').addClass('nav-toggle');
  }
});


// top animation effect & scrolled img effect
function topScrolled(selector = "undefined" , innerSelector = "undefined"){
    
  var elements = document.querySelectorAll(selector) , i;

  window.onscroll = function(){
      
      for( i of elements){
          if(window.pageYOffset > ( i.offsetTop - 300 ) ){
              i.style.transform = 'translateY(' + 0 + 'px)';
              i.style.opacity = '1';
          }
      }
  }
}

topScrolled(".scrolled-view");

/* optimize slider photo height */
function sliderPhotoObt(){
  var winWidth = $(window).outerWidth() ,
      winHeight = $(window).outerHeight();
  if( winWidth <= 992 ){

    $('header .background img').css('height',screen.height);

  }else{
    var ratio = ( winWidth * 2 ) / 3 ,
        imgHeight = ratio > winHeight ? ratio:winHeight;
    $('header .background img').css('height',imgHeight);

  }
};

sliderPhotoObt();

$(window).resize(function(){

  sliderPhotoObt();

});

/* animations */
$('.cta-btn a button').hover(
  function(){
  
    $('.cta-btn span').css('width',0);
  
  },
  function(){
  
    $('.cta-btn span').css('width','160px');
  
  });

function slideOutAlert(){
  $(".alert").delay(4000).slideUp(200, function() {
    $(this).alert('close');
  });
}

/* optimize footer */
let sections = [
  'section.programs' ,
  'section.plans' ,
  'section.contact',
  'section.about' ,
  'section.trans',
  'section.blogs',
  'section.training-programs' ,
  'section.sign-up',
  'section.login' ,
  'section.single-post',
  'section.create-post',
  'section.controle-posts',
  'section.calculator',
  'section.add-transform'
];
// main element in the page
let mainElement;
// add the required height to the element
function optimizeSectionHeight(element,addHeight){
  element.style.minHeight = element.offsetHeight + addHeight + 'px';    
}
// calculate the required height
function requiredHeight(){
  return window.innerHeight - document.querySelector('body').offsetHeight;
}
// if the height change due to adding an element on the page
const resize_observer = new ResizeObserver((elements)=>{
  let rect = elements[0].contentRect;
  if(requiredHeight() > 0){
    optimizeSectionHeight(elements[0].target,requiredHeight());
  }
})
// catch the container element and add resize observer to it
sections.forEach((e)=>{
  if(document.querySelector(e)!==null){
    mainElement = document.querySelector(e);
    resize_observer.observe(document.querySelector(e));
  }
});
// optimize on window resize
function handleOnResize(){
  if(mainElement !== undefined){
    optimizeSectionHeight(mainElement,requiredHeight());
  }
}
window.onresize = handleOnResize;
