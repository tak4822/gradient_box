import tabs from '../modules/tabs';
import slider from '../modules/slider';
import frontTransitions from '../transitions/frontPage';
import trimString from '../modules/trimStringCard';
import sidebar from '../modules/sidebar';

export default {
  namespace: 'frontpage',
  onEnter: function() {
    // このページのcontainerが読み込みを開始した時。
  },
  onEnterCompleted: function() {
    // このページのトランジションが完了した時。
    tabs();
    slider();
    trimString.smallCard();
    sidebar.fixTop();

    setTimeout(function() {
      if(window.matchMedia('(max-width:900px)').matches) {
        frontTransitions.mobile();
      } else {
        frontTransitions.desktop();
      }
    }, 500);

  },
  onLeave: function() {
    // 次のページへのトランジションが始まった時。
  },
  onLeaveCompleted: function() {
    // このページのcontainerが完全に削除された時。
  },
}