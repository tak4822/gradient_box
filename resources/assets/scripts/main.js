import 'jquery';

import firstTransition from './modules/firstTransition';
firstTransition();

import barbaInit from './barba/init';
import frontPage from './views/frontPage';
import category from './views/category';
import tags from './views/tags';
import posts from './views/posts';

import common from './common';

const views = [
  frontPage,
  category,
  tags,
  posts,
];

// Load Events
jQuery(document).ready(() => {
  common();
});

// 最初のページローディングのスピードはこっちで調節
// ページ間でのトランジションはBarba.jsで調節
$(window).on('load', function() {
  barbaInit(views);
});

