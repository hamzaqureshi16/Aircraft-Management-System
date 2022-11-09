(function () {
    var calculateHeight;
  
    calculateHeight = function () {
      var $content, contentHeight, finalHeight, windowHeight;
      $content = $('#overlay-content');
      contentHeight = parseInt($content.height()) + parseInt($content.css('margin-top')) + parseInt($content.css('margin-bottom'));
      windowHeight = $(window).height();
      finalHeight = windowHeight > contentHeight ? windowHeight : contentHeight;
      return finalHeight;
    };
  
    $(document).ready(function () {
      $(window).resize(function () {
        if ($(window).height() < 560 && $(window).width() > 600) {
          $('#overlay').addClass('short');
        } else {
          $('#overlay').removeClass('short');
        }
        return $('#overlay-background').height(calculateHeight());
      });
      $(window).trigger('resize');
  
      // open
      $('#airports').click(function () {
        return $('#airportoverlay').addClass('open').find('.signup-form input:first').select();
      });
  
      // close
      return $('#overlay-background,#overlay-close').click(function () {
        return $('#airportoverlay').removeClass('open');
      });
    });
  
  }).call(this);
         