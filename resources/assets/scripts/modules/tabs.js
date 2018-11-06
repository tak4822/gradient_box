/**
 *  Tab
 */
export default function() {
  let activeNewPost = true;

  function changeTabStyle(el) {
    const otherTab = ((el === 'tabPop') ? 'tabNew' : 'tabPop');
    const direction = ((el === 'tabPop') ? '+' : '-');
    $(`#${el}`)
      .addClass('active')
      .find('.tab-bg')
      .css('transform', 'translateX(0)')
      .siblings('.active-line')
      .css('transform', 'translateX(0)')
      .siblings('.tab-text')
      .css('color', '#ff6a4e');
    $(`#${otherTab}`)
      .removeClass('active')
      .find('.tab-bg')
      .css('transform', `translateX(${direction}100%)`)
      .siblings('.active-line')
      .css('transform', `translateX(${direction}100%)`)
      .siblings('.tab-text')
      .css('color', '#444');
  }

  $('#tabNew').on('click', function() {
    if(!activeNewPost) {
      changeTabStyle('tabNew');
      $('.tab-pop-wrapper').css({'opacity': '0', 'z-index': '0'});
      setTimeout(function () {
        $('.tab-new-wrapper').css({'opacity': '1', 'z-index': '5'});
      }, 500);
      activeNewPost = true;
    }
  });

  $('#tabPop').on('click', function() {
    if(activeNewPost) {
      changeTabStyle('tabPop');

      $('.tab-new-wrapper').css({'opacity': '0', 'z-index': '0'});
      setTimeout(function () {
        $('.tab-pop-wrapper').css({'opacity': '1', 'z-index': '5'});
      }, 500);
      activeNewPost = false;
    }
  });
}