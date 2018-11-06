/*
 *  News letter
 *  - label shrink effect
 */
export default function () {
  $('.mailpoet_text').css('width', '100%');
  $('.mailpoet_text_label').css('font-weight', '400');
  $('.mailpoet_text').on('focus', function () {
    $(this)
      .siblings('label')
      .animate({
          'font-size': '0.7rem',
          top: -10,
          left: 0
        },
        200,
        'linear'
      );
  });

  $('form.mailpoet_form').on('submit', function () {
    let height = '400px';
    if (
      window.matchMedia('(min-width:900px)').matches &&
      window.matchMedia('(max-width:1600px)').matches
    ) {
      height = '450px';
    } else if (window.matchMedia('(min-width:1600px)').matches) {
      height = '530px';
    }
    $('.footer-newsLetter').css('height', height);
  });
}
