$(".right").click(function(){
    $(".menu-responsive-toggle").slideToggle();
    $(".connect-you").slideToggle();

});

$(function() {
  $('.see_more').click(function() {
   $(".section-2").animate({ top : -330}, 500);
   $(".music-info").fadeOut( "fast" );
  });
});

$(".close").click(function(){
	$(".section-2").animate({ top : 470}, 500);
	$(".music-info").fadeIn( "slow" );
});
