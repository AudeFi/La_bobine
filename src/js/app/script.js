$(".right").click(function(){
    $(".menu-responsive-toggle").slideToggle();
    $(".connect-you").slideToggle();

});

/*$(function() {
  $('.right').click(function() {
   $('.connect-you').css("margin-top","100px");
  });
});*/


$(function() {
  $('.see_more').click(function() {
   console.log('hi');
   $(".section-2").animate({ top : -330}, 500);
   $(".music-info").fadeOut( "fast" );
  });
});
