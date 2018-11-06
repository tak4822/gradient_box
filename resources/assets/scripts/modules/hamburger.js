/*
*  Nav hamburger
*  - mobile hamburger animation
*/

export default function() {
  if (window.matchMedia('(max-width:900px)').matches){
    $('.hamburger').on('click', function(){
      if($(this).hasClass('is-active')) {
        $(this).removeClass('is-active');

        $('.nav-line')
        .find('.line-contents')
        .css({
          'opacity': 0,
          'transform': 'translateX(-30px)',
        })
        .siblings('.line-block')
        .removeClass('nav-in');

        setTimeout(function() {
          $('.nav-primary')
          .find('.nav-contents')
          .css({
            'opacity': 0,
            'transform': 'translateX(-30px)',
          })
          .siblings('.hover-el')
          .removeClass('nav-in');
        }, 200);

        setTimeout(function(){
          $('.nav-primary').removeClass('show-menu');
          $('.nav-line').removeClass('show-menu');
        }, 1000)
      } else {
        $(this).addClass('is-active');
        $('.nav-primary')
        .addClass('show-menu')
        .find('.hover-el')
        .addClass('nav-in')
        .siblings('.nav-contents')
        .css({
          'opacity': 1,
          'transform': 'translateX(0)',
        });

        setTimeout(function() {
          $('.nav-line')
          .delay(400)
          .addClass('show-menu')
          .find('.line-block')
          .addClass('nav-in')
          .siblings('.line-contents')
          .css({
            'opacity': 1,
            'transform': 'translateX(0)',
          });
        }, 400);
      }
    });

    $('.menu-item').on('click', function() {
      $('.hamburger').click();
    })
  }
}
