/*
 *  Logo Animation
 *  - logo letter is disappeared when user start scrolling
 */
export default function () {
  if (window.matchMedia('(min-width:900px)').matches) {
    const letters = document.querySelectorAll('.logo-letter');
    // letters.removeClass('logo-bounce');
    $(window).scroll(function () {
      let scroll = $(window).scrollTop();
      const distance_y = [1, 3, 2.2, 3.5, 2, 1.5, 2.5];

      letters.forEach(function (el, i) {
        let distance = (scroll * distance_y[i]) / 4;
        el.style.opacity = 1 - scroll / 200;
        el.style.transform = `translate3d(0, -${distance}px, 0)`;
      });
    });
  }
}
