import logoAnimation from '../modules/logoAnimation';

export default {
  logo() {
    if (window.matchMedia('(max-width:900px)').matches) {
      $('.bird').addClass('bird-walking-mobile');
    } else {
      $('.bird').addClass('bird-walking-desktop');
    }

    const $letters = $('.logo-letter');
    $('.logo-letter-container').css('transform', 'translateY(0)');

    setTimeout(function() {
      $.each($letters, function(i) {
        $letters
          .eq(i)
          .delay(i * 100)
          .queue(function(next) {
            $(this).css({ 'transition-delay': '0.3s', opacity: 1 });
            $(this).addClass('logo-bounce');
            next();
          });
      });
    }, 1000);

    setTimeout(function() {
      // wait for first loading header animation
      $letters.css({ 'transition-delay': '0s' });
      logoAnimation();
    }, 2400);
  },

  mobile() {
    $('.hamburger').css('opacity', '1');
  },

  desktop() {
    const $list = $('.menu-item');
    $.each($list, function(i) {
      $list
        .eq(i)
        .delay(i * 100)
        .queue(function(next) {
          $(this).css({
            opacity: '1',
            transform: 'translateX(0)'
          });
          next();
        });
    });
  }
};
