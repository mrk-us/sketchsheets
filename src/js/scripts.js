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

  // Change 'is-checked' class on buttons
  $('.filter-list').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'button', function() {
      $buttonGroup.find('.checked').removeClass('checked');
      $( this ).addClass('checked');
    });
  });
  
  var checkbox = $('input[name="files[]"]'),
      label = document.querySelector('.collection-total-count'),
      downloadCollection = document.querySelector('.download-collection-button');

  checkbox.change(function() {
    var total= $('input[name="files[]"]:checked').length,
        card = $(this).parent();
    
    // Toggle purple border
    card.toggleClass('border');
    
    // Get total :checked
    checkbox.each(function() {
      // Display total :checked
      setTimeout(function() {
        $(label).html(total);
      }, 200);
      
    });
    
    if (total > 0) { 
      // Trigger form submit on click
      $(downloadCollection).on('click', function () {
        setTimeout(function() {
          $('input[name="zipit"]').trigger("click");
        }, 1100);
        $('.download-collection-button').removeClass('shadow');
        // Hide button
        setTimeout(function() {
          $('.download-collection').removeClass('appear');
        }, 300);
        setTimeout(function() {
          $('.alert-wrap').addClass('appear');
          setTimeout(function() {
            $('.alert').addClass('shadow');
          }, 300);
          setTimeout(function() {
            $('.alert').removeClass('shadow');
            $('input[name="files[]"]:checked').trigger("click");
            setTimeout(function() {
              $('.alert-wrap').removeClass('appear');
            }, 350);
          }, 2000);
        }, 300);
      });
      // Show button
      $('.download-collection').addClass('appear');
      // Apply shadow
      setTimeout(function() {
        $('.download-collection-button').addClass('shadow');
      }, 300);
    }
    
    else {
      // Remove shadow
      $('.download-collection-button').removeClass('shadow');
      // Hide button
      setTimeout(function() {
        $('.download-collection').removeClass('appear');
      }, 300);
    }
    
    // Add count animation
    classie.add(label, 'countAnim');
    // Remove count animation
    setTimeout(function() {
      classie.remove(label, 'countAnim');
    }, 350);
  });
  
  $('.downloadzip > span').on('click', function() {
	var $this = $(this);
    setTimeout(function() {
      window.location.href = 'sketchsheets/' + $this.data('src') + '.zip';
    }, 300);
    $('.alert-wrap').addClass('appear');
    setTimeout(function() {
      $('.alert').addClass('shadow');
    }, 300);
    setTimeout(function() {
      $('.alert').removeClass('shadow');
      setTimeout(function() {
        $('.alert-wrap').removeClass('appear');
      }, 350);
    }, 2000);
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

