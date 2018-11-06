export default {
  mobile() {
    $('.background')
      .css('transform', 'translateY(0)')
      .delay(200)
      .queue(function(next) {
        $(this).siblings('.thumb-container').css('transform', 'translateX(0)');
        next();
      })
      .delay(600)
      .queue(function(next) {
        $('.desc-card').css('transform', 'rotateX(0deg) translateY(0)');
        $('.tab-container').css('opacity', 1);
        next();
      });
  },
  desktop() {
    $('.background')
      .css('transform', 'translateY(0)')
      .delay(600)
      .queue(function(next) {
        $('.thumb-item').css('transform', 'translateX(0)');
        next();
      })
      .delay(600)
      .queue(function(next) {
        $('.desc-card .navigation').css('transform', 'rotateX(0deg)');
        $('.desc-card .title').css({
          'transform': 'translateX(0)',
          'opacity': '1',
        });
        $('.slider-short-description').css({
          'transform': 'translateX(0)',
          'opacity': '1',
        });
        $('.tab-container').css('opacity', 1);

        // Button
        $('.tablet-bg-button .deco').css({
          'transform': 'translateX(0)',
        });
        $('.tablet-bg-button .text').css({
          'transform': 'translateX(0)',
          'opacity': '1',
        });
        next();
      });
  },
}
