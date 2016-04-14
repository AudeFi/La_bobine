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
	$(".section-2").animate({ top : 400}, 500);
	$(".music-info").fadeIn( "slow" );
	$("#bars").fadeIn( "fast" );
});

var img = document.getElementById("poster");
img.onload = function () {
  var colorThief = new ColorThief();
  var color = colorThief.getColor(img);
  console.log(color);
  if(color[0]+color[1]+color[2]>650){
    color[0] = color[0] - 30;
    color[1] = color[1] - 30;
    color[2] = color[2] - 30;
  }
  console.log(color);
  document.querySelector('.section-2').style.backgroundColor = "rgb(" + color + ")";
};
img.crossOrigin = 'Anonymous';
img.src = img.src;

