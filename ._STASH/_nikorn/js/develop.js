// HEADER COLOR CHANGE
$('.header__row_top > .header__link').hover(function() {
  $('.header__row_top').addClass($(this).data('name'));
  }, function() {
  $('.header__row_top').removeClass($(this).data('name'));
});


//carousel nikorenok
$(".slider-nikorenok__carousel").owlCarousel({
  items: 1,
  smartSpeed: 450,
  mouseDrag: true,
  nav: true,
  dots: true,
  loop: true,
  navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
  navClass: ['slider-tech__nav slider-tech__nav_prev', 'slider-tech__nav slider-tech__nav_next'],
  navContainerClass: 'slider-tech__nav-container',
  dotsClass: 'slider-tech__dots',
  dotClass: 'slider-tech__dot',
});

// SLIDER-TECH__CAROUSEL PAGINATION
if ($('.slider-nikorenok__carousel').length != 0) {

  owlDotsNumbers($('.slider-tech__dot'));

  var
      prevDot = $('.slider-tech__dot.active').index()-1;
  nextDot = $('.slider-tech__dot.active').index()+1;

  if ($('.slider-tech__dot.active').index() == 0) {
    prevDot = $('.slider-tech__dot.active').index()+2;
  }
  $('.slider-tech__dot').hide();
  $('.slider-tech__dot:eq(' + prevDot + ')').show();
  $('.slider-tech__dot.active').show();
  $('.slider-tech__dot:eq(' + nextDot + ')').show();

  $(".slider-nikorenok__carousel").on('changed.owl.carousel', function(event) {
    var lastDot = event.page.count - 1;
    prevDot = $('.slider-tech__dot.active').index()-1;
    nextDot = $('.slider-tech__dot.active').index()+1;
    if ($('.slider-tech__dot.active').index() == 0) {
      prevDot = $('.slider-tech__dot.active').index()+2;
    }
    if ($('.slider-tech__dot.active').index() == lastDot) {
      nextDot = $('.slider-tech__dot.active').index()-2;
    }
    $('.slider-tech__dot').hide();
    $('.slider-tech__dot:eq(' + prevDot + ')').show();
    $('.slider-tech__dot.active').show();
    $('.slider-tech__dot:eq(' + nextDot + ')').show();
  })
}

//TARGET
$('#order-form').on('submit', function () {
    yaCounter34629495.reachGoal('39355459', {params: {script: 'order-form'}});
	roistat.event.send('zayavka');
})
$('form.asteriskcallback-widget-form').on('submit', function () {
	yaCounter34629495.reachGoal('56892709', {params: {script: 'asteriskcallback'}});
	roistat.event.send('zayavka');
})


//Roistat
//