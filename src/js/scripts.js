$(document).ready( function() {
  
  // init Isotope
  var $grid = $('.grid-content').imagesLoaded( function() {
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
      downloadCollection = document.querySelector('.download-collection-button'),
      clearCollection = document.querySelector('.clear-collection');

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
          setTimeout(function() {
            $('input[name="zipit"]').trigger("click");
          }, 500);
        });
        $('.download-collection').addClass('appear');
      }
    // Remove red bg color if 0
    else
      { classie.remove(label, 'color');
        classie.add(downloadCollection, 'disabled');
        $('.download-collection').removeClass('appear');
      }
    $(clearCollection).on('click', function () {
      $('input[name="files[]"]:checked').trigger("click");
    });
    // Add count animation
    classie.add(label, 'countAnim');
    // Remove count animation
    setTimeout(function() {
      classie.remove(label, 'countAnim');
    }, 350);
  });
  
  $('a.downloadzip').on('click', function(e) {
    e.preventDefault();
    var $this = $(this); //Assigned a reference
    setTimeout(function() {
      window.location = $this.attr('href'); 
    }, 500);
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

