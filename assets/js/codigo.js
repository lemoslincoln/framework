jQuery(document).ready(function($){ 
  
  // Estilizando o select, exclui alguns
  // $('select:not()').wrap('<div class="select-box"></div>');

  //Banner
  $('.banner').slick({
    dots: true,
    arrows: false,
    infinite: false,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1
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
					breakpoint: 1024,
					settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
			},
				{
					breakpoint: 600,
					settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
				{
					breakpoint: 480,
					settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});
});