jQuery(document).ready(function($){ 
  
  

  //Banner
  $('.banner').slick({
    dots: true,
    arrows: false,
    infinite: false,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1
    autoplay: true,
    autoplaySpeed: 2000,
  });
  // Slider responsivo
	$('.responsivo').slick({
		dots: true,
		arrows: false,
		infinite: false,
		speed: 500,
		slidesToShow: 3,
		slidesToScroll: 3,
		responsive: [
				{
					breakpoint: 1200,
					settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
			},
				{
					breakpoint: 992,
					settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
				{
					breakpoint: 768,
					settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});


	/*  Default Scripts */
	/* ----------------------------------------- */			
	// SELECT , caso queira excluir algum elemento, colocar 'select:not(elementos)'
	$('select').wrap('<div class="select-box"></div>');

	// Fancybox
	$(".fancybox").fancybox();  	
	$("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']").fancybox();  	
	$(".gallery a[href$='.jpg'], .gallery a[href$='.png'], .gallery a[href$='.jpeg'], .gallery a[href$='.gif']").attr('rel','gallery').fancybox();  	
	$(".video").fancybox({ maxWidth		: 800, maxHeight		: 600, fitToView		: false, width			: '70%', height			: '70%', autoSize		: false, closeClick		: false, openEffect		: 'none', closeEffect		: 'none' });
	/* -----------------------------------------  Default Scripts */		
	


});