//Ejecuta owl.carousel con código personalizado
$(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
	autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsive:{
        200:{
			items:1
		}
    }
})
});