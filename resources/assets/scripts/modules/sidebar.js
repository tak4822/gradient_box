/*
*  side bar fixed top
*/
//TODO: fixed and show ranking instead line an ad

let footerPos = 0;
let sidebarPos = 0;
let sidebarHeight = 0;
let otherArticlesPos = 0;

const checkWindowSize = () => {
  footerPos = $("#footer").offset().top;
  sidebarPos = $('.side-container').offset().top;
  sidebarHeight = $('.side-container').height();
};

const setForPosts = () => {
  $('.side-container').css({
    'position': 'absolute',
    'top': $(window).height(),
  });
};

const setForFront = () => {
  let tabHeaderHeight = 320;
  if(window.matchMedia('(min-width:1400px)').matches && $('.sidebar').length) {
    tabHeaderHeight = 420;
  }

  let frontSidebarDefaultPosition = $(window).height() + tabHeaderHeight;
  $('.side-container').css({
    'position': 'absolute',
    'top': `${frontSidebarDefaultPosition}px`,
  });
}

// if (window.matchMedia('(min-width:1200px)').matches && $('.sidebar').length ) {
export default {
  fixTop() {
    if (window.matchMedia('(min-width:1200px)').matches && $('.sidebar').length ) {
      setForFront();
      checkWindowSize();
      $(window).scroll(function () {
        let scroll = $(window).scrollTop();
        if (scroll > sidebarPos && scroll < footerPos - sidebarHeight) {
          $('.side-container').css({
            'position': 'fixed',
            'top': '0',
          });
        } else if (scroll > footerPos - sidebarHeight) { // when reach footer
          $('.side-container').css({
            'position': 'absolute',
            'top': `${footerPos - sidebarHeight}px`,
          });
        } else { // before reach sidebar
          $('.side-container').css({
            'position': 'absolute',
            'top': `${sidebarPos}px`,
          });
        }
      });
    }
  },

  fixArticles() {
    if (window.matchMedia('(min-width:1200px)').matches && $('.sidebar').length ) {
      setForPosts();
      checkWindowSize();
      otherArticlesPos = $('.other-articles').offset().top;
      $(window).scroll(function () {
        let scroll = $(window).scrollTop();
        if (scroll > otherArticlesPos && scroll < footerPos - sidebarHeight) {
          $('.side-container').css({
            'position': 'fixed',
            'top': `${sidebarPos - otherArticlesPos}px`,
          });
        } else if (scroll > footerPos - sidebarHeight) { // when reach footer
          $('.side-container').css({
            'position': 'absolute',
            'top': `${footerPos - sidebarHeight + sidebarPos - otherArticlesPos}px`,
          });
        } else { // before reach sidebar
          $('.side-container').css({
            'position': 'absolute',
            'top': `${sidebarPos}px`,
          });
        }
      });
    }
  },
}
