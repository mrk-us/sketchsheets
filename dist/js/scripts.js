$(function () {
  $('a.lightbox').fluidbox({
    loader: true
  });
});
var swiper = new Swiper('.swiper-container', {
  pagination: '.swiper-pagination',
  paginationClickable: true,
  autoplay: 7500,
  autoplayDisableOnInteraction: false
});
$(document).ready( function() {
  // init Isotope
  var $grid = $('.grid').imagesLoaded( function() {
    $grid.isotope({
      itemSelector: '.item',
      transitionDuration: '0.6s',
    });
  });
  // store filter for each group
  var filters = {};

  $('.filter').on( 'click', 'button', function() {
    var $this = $(this);
    // get group key
    var $buttonGroup = $this.parents('.filter-list');
    var filterGroup = $buttonGroup.attr('data-filter-group');
    // set filter for group
    filters[ filterGroup ] = $this.attr('data-filter');
    // combine filters
    var filterValue = concatValues( filters );
    // set filter for Isotope
    $grid.isotope({ filter: filterValue });
  });

  // change is-checked class on buttons
  $('.filter-list').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'button', function() {
      $buttonGroup.find('.checked').removeClass('checked');
      $( this ).addClass('checked');
    });
  });
  
  // Total in collection
  var checkbox = $('input[name="files[]"]'),
      label = document.querySelector('.collection-total-count'),
      downloadCollection = document.querySelector('.download-collection-button');

  checkbox.change(function() {
    var total= $('input[name="files[]"]:checked').length;
    var card = $(this).parent();
    card.toggleClass('border');
    // Get total :checked
    checkbox.each(function() {
      $(label).html(total);
    });
    // Display total :checked
    // Add red bg color if > 0
    if (total > 0) 
      { classie.add(label, 'color');
        classie.remove(downloadCollection, 'disabled');
        $(downloadCollection).on('click', function () {
          $('input[name="zipit"]').trigger("click");
        });
      }
    // Remove red bg color if 0
    else
      { classie.remove(label, 'color');
        classie.add(downloadCollection, 'disabled');
      }
    // Add count animation
    classie.add(label, 'countAnim');
    // Remove count animation
    setTimeout(function() {
      classie.remove(label, 'countAnim');
    }, 350);
  });
  
  // flatten object by concatting values
  function concatValues( obj ) {
    var value = '';
    for ( var prop in obj ) {
      value += obj[ prop ];
    }
    return value;
  }

});

