export default {
  header() {
    $('.gradient-bg').css('transform', 'translateX(0)');
    $('.cat-hero-container .title-wrapper').css({
      transform: 'translateX(0)',
      opacity: '1'
    });
  },

  tags() {
    $('.tags-tile').css({
      transform: 'translateX(0)',
      opacity: '1'
    });

    setTimeout(function () {
      $('.cat-hero-container')
        .css('overflow', 'visible')
        .find('.tags-container')
        .css({
          transform: 'translateY(0)',
          opacity: '1'
        })
        .delay(200)
        .queue(function (next) {
          $(this)
            .find('.tag-wrapper')
            .addClass('bounce');
          next();
        });
    }, 1000);
  },

  entryContainer() {
    $('.category-container').css({
      opacity: '1',
      transform: 'translateY(0)'
    });
  }
};
