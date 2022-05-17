jQuery(document).ready(function($) {
 
	$('.myLinkModal2').click(function(event) {
    event.preventDefault();
    $('#myOverlay2').fadeIn(297,	function()
    {
      $('#myModal2') 
      .css('display', 'block')        
      .animate({opacity: 1}, 198);
    });
  });
  
  
	$('#myModal__close2, #myOverlay2').click( function()
  {
    $('#myModal2').animate({opacity: 0}, 198, function()
    {
      $(this).css('display', 'none');
      $('#myOverlay2').fadeOut(297);
    });
  });
});




