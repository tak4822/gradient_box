/**
 *  Slider
 */
export default function() {
  // eslint-disable-next-line no-undef
  const data = slider_data;

  const maxCount = data.length - 1;
  let count = 0;
  let slidable = true;

  let slideAnimation;
  if (window.matchMedia('(max-width:550px)').matches) {
    slideAnimation = '250px';
  } else if (window.matchMedia('(max-width:900px)').matches) {
    slideAnimation = '350px';
  } else if (window.matchMedia('(max-width:1100px)').matches)  {
    slideAnimation = '450px';
  } else if (window.matchMedia('(max-width:1400px)').matches) {
    slideAnimation = '500px';
  } else {
    slideAnimation = '550px';
  }

  $('.prev').on('click', prevAction);
  $('.next').on('click', nextAction);

  if (window.matchMedia('(max-width:1025px)').matches) {
    sliderTouchHandler();
  } else {
    sliderHoverHandler();
  }

  function prevAction() {
    if (count > 0 && slidable) {
      slidable = false;
      count -= 1;
      sliderAction('prev');
    }
  }

  function nextAction() {
    if (count < maxCount && slidable) {
      slidable = false;
      count += 1;
      sliderAction('next');
    }
  }

  function animateContents(el, index, className) {
    $('#slider-' + el)
    .addClass(className)
    .delay( 400 )
    .text(data[index][el])
    .delay( 400 )
    .queue(function(next){
      $(this).removeClass(className);
      next();
    });
  }

  function changeContents(index) {
    animateContents('title', index, 'slider-contents-animation');
    animateContents('short_description', index, 'slider-contents-animation');
    animateContents('category', index, 'slider-contents-animation');
    $('#contents-link').attr('href', data[index]['link']);
    $('.tablet-bg-button').attr('href', data[index]['link']);

    $('.current-number')
    .addClass('slider-slot-animation')
    .delay( 400 )
    .queue(function(next){
      $(this).text(count + 1);
      next();
    })
    .delay( 400 )
    .queue(function(next){
      $(this).removeClass('slider-slot-animation');
      next();
    });

    setTimeout(function() {
      slidable = true;
    }, 800)
  }

  function sliderAction(direction) {
    changeContents(count);
    const $active = $('.thumb-item.active');
    if(direction === 'prev') {
      $('.thumb-item').animate({'left': `+=${slideAnimation}`}, 100);
      changeBlur($active);
      $active.prev().removeClass('blur');
      $active.prev().addClass('active');
    } else if (direction === 'next') {
      $('.thumb-item').animate({'left': `-=${slideAnimation}`}, 100);
      changeBlur($active);
      $active.next().removeClass('blur');
      $active.next().addClass('active');
    }
    setTimeout(function() {
      slidable = true;
    }, 800)
  }

  function changeBlur(el) {
    el.addClass('blur');
    el.removeClass('active');
  }


  /*
   *  Slider for mobile
   */
  function sliderTouchHandler() {
    $('#touch').on('touchstart', onTouchStart); //指が触れたか検知
    $('#touch').on('touchmove', onTouchMove); //指が動いたか検知
    $('#touch').on('touchend', onTouchEnd); //指が離れたか検知
    let direction, position;

    //スワイプ開始時の横方向の座標を格納
    function onTouchStart(event) {
      position = getPosition(event);
      direction = ''; //一度リセットする
    }

    //スワイプの方向（left／right）を取得
    function onTouchMove(event) {
      if (position - getPosition(event) > 10) { // 70px以上移動しなければスワイプと判断しない
        direction = 'left'; //左と検知
      } else if (position - getPosition(event) < -10){  // 70px以上移動しなければスワイプと判断しない
        direction = 'right'; //右と検知
      }
    }

    function onTouchEnd() {
      if (direction == 'right'){
        prevAction();
      } else if (direction == 'left'){
        nextAction();
      }

      setTimeout(function() {
        slidable = true;
      }, 800)
    }

    //横方向の座標を取得
    function getPosition(event) {
      return event.originalEvent.touches[0].pageX;
    }
  }
  /**
   *  Slider Button
   */
  function sliderHoverHandler() {
    $('.tablet-bg-button').hover(
      function() {
        $(this).addClass('hoverSliderButton');
      },
      function() {
        $(this).removeClass('hoverSliderButton');
      }
    )
  }
}