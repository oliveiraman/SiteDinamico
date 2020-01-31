
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {
 
    edge: 'left',
    draggable: true,
    inDuration: 250,
    outDuration: 200,
    onOpenStart: null,
    onOpenEnd: null,
    onCloseStart: null,
    onCloseEnd: null,
    preventScrolling: true

    });
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, {

    alignment: 'left',  
    autoTrigger: true,  
    constrainWidth: true,  
    container: null,
    coverTrigger: true,
    closeOnClick: true,
    hover: false,  
    inDuration: 250,
    outDuration: 200,
    onOpenStart: null,
    onOpenEnd: null,
    onCloseStart: null,
    onCloseEnd: null
    });
  });


document.addEventListener('DOMContentLoaded', function() {
   var elems = document.querySelectorAll('select');
   var options = document.querySelectorAll('option');
   var instances = M.FormSelect.init(elems, options);

    })




$(document).ready(function(){
    //$('.sidenav').sidenav();
    //$(".button-collapse").sidenav();
    $('.slider').slider({full_width: true});
  });


function sliderPrev(){
		$('.slider').slider('pause');
		$('.slider').slider('prev');
		};

function sliderNext(){
		$('.slider').slider('pause');
		$('.slider').slider('next');
		};

document.addEventListener('DOMContentLoaded', function() {
   var elems = document.querySelectorAll('select');
   var options = document.querySelectorAll('option');
   var instances = M.FormSelect.init(elems, options); })