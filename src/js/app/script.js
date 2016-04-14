$(".right").click(function(){
    $(".menu-responsive-toggle").slideToggle();
});

$(function() {
  $('.right').click(function() {
   $('.connect-you').fadeToggle("slow","linear");
  });
});

$(function() {
  $('.see_more').click(function() {
   console.log('hi');
   $(".section-2").animate({ top : -330}, 500);
   $(".music-info").fadeOut( "fast" );
  });
});
