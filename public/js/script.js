 $(document).ready(function(){ 



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