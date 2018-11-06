/*
*  Nav Hover
*  - Hover effect when the nav is hovered
*/

export default function() {
  if (window.matchMedia('(min-width:900px)').matches) {
    $('.menu-item').hover(
      function() {
        $(this)
          .find('.hover-el')
          .addClass('active');
      },
      function() {
        $(this)
          .find('.hover-el')
          .removeClass('active');
      }
    );
  }
}
