 $(document).ready(function(){


function openVentana(){

$('.ventana').fadeIn('slow');


}
function closeVentana(){

$('.ventana').fadeOut('fast');


}

 $(".ventanaAbrir").on('click', function(){

openVentana();

 });
  $(".cerrar").on('click', function(){

closeVentana()

 });


if ($('input[name=session]').val()==0){

   $("a.ventanaAbrir").trigger('click');


/*
  function showLightBox() 
  { 
    var delayseconds = 3;
    function pause() {
    myTimer = setTimeout('whatToDo()', delayseconds * 1000)
    }
   function whatToDo() {
        $("a.lightbox").click();
    }
  }
  showLightBox();*/

}


$(function() {
$("input.sessionNull").change(function(){

	 

	 alert($('input[name=session]').val());
  
});
});


$("#menu-icono li a").mousemove(function(e) {  

	
  //    var title = $(this).attr("alt");
      var title =$(this).attr("alt");

      var top = (document.documentElement && document.documentElement.scrollTop) || 
              document.body.scrollTop;
      var left = (document.documentElement && document.documentElement.scrollLeft) || 
              document.body.scrollLeft;

     // var id = $(this).attr("id");
      $(".tooltip").html(title);
      $('.tooltip').css('left', e.pageX +5-left).css('top', e.pageY + 5-top).css('display', 'block');
   
  });
 $("#menu-icono li a").mouseout(function() { 
     $('.tooltip').css('display', 'none');
  });

 });