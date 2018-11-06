import headerTransition from '../transitions/header';

export default function () {
  const h = $(window).height();
  const w = $(window).width();

  const img = $('<img />')
    .attr('src', require('../../images/canarie_loading_low.gif'))
    .css({
      width: '200px',
      position: 'fixed',
      top: h / 2 - 80 + 'px',
      left: w / 2 - 100 + 'px'
    });

  $('.transition-overlay')
    .append(img)
    .height(h)
    .width(w)
    .css({
      top: 0
    })
    .fadeIn(100);

  $(window).on('load', function () {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    document.body.scrollIntoView();

    $('.loader')
      .delay(800)
      .fadeOut(800);
    $('.transition-overlay')
      .delay(1200)
      .fadeOut(300);
    $('#site-wrap').css('opacity', 1);
    setTimeout(function () {
      headerTransition.logo();
    }, 1500);
    setTimeout(function () {
      if (window.matchMedia('(max-width:900px)').matches) {
        headerTransition.mobile();
      } else {
        headerTransition.desktop();
      }
      //adjustTransitionOverlay(); // TODO: if you use loading image
    }, 3000);
  });

  // function adjustTransitionOverlay() {
  //   let top = 60;
  //   let left = 0;
  //   let width = w - left;
  //   let height = h - top;
  //   if (window.matchMedia('(min-width:550px)').matches && window.matchMedia('(max-width:899px)').matches) {
  //     top = 80;
  //   } else if (window.matchMedia('(min-width:900px)').matches && window.matchMedia('(max-width:1024px)').matches) {
  //     top = 200;
  //     left = 150;
  //   } else if (window.matchMedia('(min-width:1025px)').matches && window.matchMedia('(max-width:1099px)').matches) {
  //     top = 160;
  //   } else if (window.matchMedia('(min-width:1100px)').matches && window.matchMedia('(max-width:1599px)').matches) {
  //     left = 180;
  //   } else {
  //     top = 220;
  //     left = 300;
  //   }
  //
  //   $('.transition-overlay').css({
  //     'top': `${top}px`,
  //     'left': `${left}px`,
  //     'width': `${width}px`,
  //     'height': `${height}px`,
  //   })
  // }
}
