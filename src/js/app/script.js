var img = document.getElementById("poster");
img.onload = function () {
  var colorThief = new ColorThief();
  var color = colorThief.getColor(img);
  console.log(color);
  document.querySelector('.section-2').style.backgroundColor = "rgb(" + color + ")";
};
img.crossOrigin = 'Anonymous';
img.src = img.src;




$(".right").click(function(){
    $(".menu-responsive-toggle").slideToggle();
    $(".connect-you").slideToggle();

});

$(function() {
  $('.see_more').click(function() {
   $(".section-2").animate({ top : -330}, 500);
   $(".music-info").fadeOut( "fast" );
   $("#bars").fadeOut( "fast" );
  });
});

$(".close").click(function(){
	$(".section-2").animate({ top : 470}, 500);
	$(".music-info").fadeIn( "slow" );
	$("#bars").fadeIn( "fast" );
});
