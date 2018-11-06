/*
 *  Nav fixed解除
 *  - if its' desktop, clear fix nav when it reaching th footer
 */
export default function () {
  if (window.matchMedia('(min-width:900px)').matches) {
    const windowHeight = $(window).height();
    const footerPos = $('#footer').offset().top;
    const clearFixedPos = footerPos - windowHeight;
    $(window).scroll(function () {
      let scroll = $(window).scrollTop();
      if (scroll > clearFixedPos) {
        $('#header').css({
          position: 'absolute',
          top: `${clearFixedPos}px`
        });
      } else {
        $('#header').css({
          position: 'fixed',
          top: '0'
        });
      }
    });
  }
}
