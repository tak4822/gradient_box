export default {
  header() {
    let imageDeco = '10px';

    if (window.matchMedia('(min-width:550px)').matches) {
      imageDeco = '20px';
    }

    $('.featured-image').css({
      transform: 'translateX(0)',
      opacity: '1'
    });
    $('.featured-image-deco').css({
      top: imageDeco,
      left: imageDeco,
      opacity: '1'
    });
    setTimeout(function () {
      $('.article-header')
        .find('.date')
        .css({
          transform: 'translateX(0)',
          opacity: '1'
        })
        .siblings('.deco')
        .css({
          transform: 'translateX(0)',
          opacity: '1'
        })
        .siblings('.entry-title')
        .css({
          transform: 'translateX(0)',
          opacity: '1'
        })
        .siblings('.short_description')
        .css({
          transform: 'translateX(0)',
          opacity: '1'
        })
        .siblings('.interviewee')
        .css({
          transform: 'translateX(0)',
          opacity: '1'
        })
        .siblings('.author-container')
        .css({
          transform: 'translateX(0)',
          opacity: '1'
        });
      // TODO: if element is not exist, the chain is going to be broken.
    }, 400);
  },

  contents() {
    $('.entry-content').css({
      opacity: '1'
    });

    if (window.matchMedia('(max-width:900px)').matches) {
      $('.article-header').css({
        'border-bottom': 'dotted 1px #ccc'
      });
    }
  }
};
