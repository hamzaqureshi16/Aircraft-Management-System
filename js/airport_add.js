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
          $('#add_port').addClass('short');
        } else {
          $('#add_port').removeClass('short');
        }
        return $('#overlay-background').height(calculateHeight());
      });
      $(window).trigger('resize');
  
      // open
      $('#addairport').click(function () {
        return $('#add_port').addClass('open').find('.signup-form input:first').select();
      });
  
      // close
      return $('#overlay-background,#overlay-close').click(function () {
        return $('#add_port').removeClass('open');
      });
    });
  
  }).call(this);
         