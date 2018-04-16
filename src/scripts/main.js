var $card, $downloadAll, $filter, $grid, $logoFill, $logoStroke;

$logoStroke = $('.logo');

$downloadAll = $('.downloadAll');

$card = $('.grid-item');

$grid = $('.grid');

$filter = mixitup($grid);

// Animation logo
//setTimeout((function() {
//  $logoStroke.show();
//}), 200);

// Change active class on buttons
$('.filters-content').each(function(i, buttonGroup) {
  var $buttonGroup;
  $buttonGroup = $(buttonGroup);
  $buttonGroup.on('click', 'button', function() {
    $buttonGroup.find('.active').removeClass('active');
    $(this).addClass('active');
  });
});

// Download all
$card.on('click', function() {
  var $this;
  $this = $(this);
  window.location.href = 'sketchsheets/' + $this.data('src') + '.zip';
});

// Download individual
$downloadAll.on('click', function() {
  var $this;
  $this = $(this);
  window.location.href = 'sketchsheets/' + $this.data('src') + '.zip';
});

// 3d perspective via Doğacan Bilgili http://www.dbilgili.com
$(function() {
  var card, map;
  card = $('.grid-item');
  map = function(x, in_min, in_max, out_min, out_max) {
    return (x - in_min) * (out_max - out_min) / (in_max - in_min) + out_min;
  };
  card.on('mousemove', function(e) {
    var rX, rY, x, y;
    x = e.clientX - ($(this).offset().left) + $(window).scrollLeft();
    y = e.clientY - ($(this).offset().top) + $(window).scrollTop();
    rY = map(x, 0, $(this).width(), -7, 7);
    rX = map(y, 0, $(this).height(), -7, 7);
    $(this).children('img').css('transform', 'scale(1.05)' + ' ' + 'rotateY(' + rY + 'deg)' + ' ' + 'rotateX(' + -rX + 'deg)');
  });
  card.on('mouseenter', function() {
    $(this).children('img').css({
      transition: 'all ' + 0.05 + 's' + ' linear'
    });
  });
  card.on('mouseleave', function() {
    $(this).children('img').css({
      transition: 'all ' + 0.2 + 's' + ' linear'
    });
    $(this).children('img').css('transform', 'scale(1)' + ' ' + 'rotateY(' + 0 + 'deg)' + ' ' + 'rotateX(' + 0 + 'deg)');
  });
});
