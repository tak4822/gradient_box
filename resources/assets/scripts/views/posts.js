import postsTransition from '../transitions/posts';
import trimString from '../modules/trimStringCard';
import sidebar from '../modules/sidebar';
import toc from '../modules/toc';

export default {
  namespace: 'posts',
  onEnter: function() {
    // このページのcontainerが読み込みを開始した時。
  },
  onEnterCompleted: function() {
    // このページのトランジションが完了した時。
    toc();

    trimString.smallCard();
    sidebar.fixArticles();

    postsTransition.header();
    setTimeout(function() {
      postsTransition.contents();
    }, 1500);
  },
  onLeave: function() {
    // 次のページへのトランジションが始まった時。
  },
  onLeaveCompleted: function() {
    // このページのcontainerが完全に削除された時。
  }
};
